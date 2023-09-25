<?php

namespace App\Http\Controllers;

use App\Models\Kupitmaterialov;
use Illuminate\Http\Request;
use App\Models\Materialy;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Partnerka;
use App\Models\Materialcategory;
use App\Models\Materialpodcategory;
use App\Models\Materialimgy;

class KupitmaterialovController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moi_materialy($for_action)
    {
        $kupitmaterialovss = Kupitmaterialov::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->orderBy('created_at', 'desc')->paginate(8);
        $count = Kupitmaterialov::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->count();
        $materialimgs = Materialimgy::get();
           
        return view('pajes/moimaterialy', [
            'kupitmaterialovss' => $kupitmaterialovss,
            'count' => $count,
            'materialimgs' => $materialimgs,
            'for_action' => $for_action,
        ]);
    }

   

 

    public function bay2($id)
    {
        $materialies = Materialy::where('id', $id)->first();
        $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $id)->count();

        return view('pajes/kupitmaterialov', [
            'materialies' => $materialies,
            'kupitmaterialovs' => $kupitmaterialovs,
        ]);
    }


    public function bay3($id)
    {
        $materialies = Materialy::where('id', $id)->first();
        $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $id)->count();

        return view('pajes/kupitmaterialov_kupon', [
            'materialies' => $materialies,
            'kupitmaterialovs' => $kupitmaterialovs,
        ]);
    }


    public function bay4($for_action, $podcat_id, $materialyId, $proverkaId)
    {
        $materialies = Materialy::where('id', $materialyId)->first();
        $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $materialyId)->count();
        $proverka2 = Partnerka::where('id', $proverkaId)->first();
        $materialimgs = Materialimgy::get();
        $materialcategories = Materialcategory::where('id', $materialies->materialcategory_id)->first();
        $materialpodcategories = Materialpodcategory::where('id', $podcat_id)->first();
        $count_cat = Materialcategory::where('dop_category', $for_action)->count();

        if (\Auth::user()) {
            $proverka = DB::table('kupitmaterialovs')->where('proverka', \Auth::user()->id.'-'.$materialyId)->first();
            return view('pajes/kupitmaterialov_kupon2', [
                'materialies' => $materialies,
                'kupitmaterialovs' => $kupitmaterialovs,
                'proverka' => $proverka,
                'proverka2' => $proverka2,
                'materialimgs' => $materialimgs,
                'for_action' => $for_action,
                'materialcategories' => $materialcategories,
                'materialpodcategories' => $materialpodcategories,
                'count_cat' => $count_cat,
            ]);
        }else{

            return view('pajes/kupitmaterialov_kupon2', [
                'materialies' => $materialies,
                'kupitmaterialovs' => $kupitmaterialovs,
                'proverka2' => $proverka2,
                'materialimgs' => $materialimgs,
                'for_action' => $for_action,
                'materialcategories' => $materialcategories,
                'materialpodcategories' => $materialpodcategories,
                'count_cat' => $count_cat,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function pokupkymaterialov($id)
    {
        $materialies = Materialy::where('id', $id)->first();
        $materialcategory = Materialcategory::where('id', $materialies->materialcategory_id)->first();

        $com = 0.8;
        $kupon3 = 0.2;
        $newprice = $materialies->price * $com;
        $pricekupon3 = $materialies->price * $kupon3;
        
        DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $materialies->price);
        DB::table('users')->where('id', $materialies->user_id)->increment('balance', $newprice);
        DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $pricekupon3);

        $kupits = new Kupitmaterialov();
        $kupits->user_id = \Auth::user()->id;
        $kupits->user_name = \Auth::user()->name;
        $kupits->materialy_id = $materialies->id;
        $kupits->dop_category = $materialcategory->dop_category;
        $kupits->price = $materialies->price;
        $kupits->proverka = \Auth::user()->id.'-'.$id;
        $kupits->materialy_user_id = $materialies->user_id;
        $kupits->pribyl = $newprice;
        $kupits->save();
        
        return redirect()->route('skachatmaterialov', ['for_action' => $materialcategory->dop_category, 'podcat_id' => $materialies->materialpodcategory_id, 'id' => $id])->withSuccess('Поздравляем, теперь у вас есть доступ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materialies = Materialy::where('id', $request->materialy_id)->first();
        $materialcategory = Materialcategory::where('id', $materialies->materialcategory_id)->first();

        $com = 0.8;
        $kupon3 = 0.2;
        $newprice = $materialies->price * $com;
        $pricekupon3 = $materialies->price * $kupon3;
        
        DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $materialies->price);
        DB::table('users')->where('id', $materialies->user_id)->increment('balance', $newprice);
        DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $pricekupon3);

        $kupits = new Kupitmaterialov();
        $kupits->user_id = \Auth::user()->id;
        $kupits->user_name = \Auth::user()->name;
        $kupits->materialy_id = $materialies->id;
        $kupits->dop_category = $materialcategory->dop_category;
        $kupits->price = $materialies->price;
        $kupits->proverka = $request->proverka;
        $kupits->materialy_user_id = $materialies->user_id;
        $kupits->pribyl = $newprice;
        $kupits->save();

        
        return redirect()->route('moimaterialy')->withSuccess('Поздравляем, теперь у вас есть доступ');
    }


    public function store_kupon($materialyId, $proverka2Id)
    {
        $materialies = Materialy::where('id', $materialyId)->first();
        $materialcategory = Materialcategory::where('id', $materialies->materialcategory_id)->first();

        $com = 0.7;
        $kupon = 0.9;
        $kupon2 = 0.05;
        $kupon3 = 0.15;
        $newprice = $materialies->price * $com;
        $pricekupon = $materialies->price * $kupon;
        $pricekupon2 = $materialies->price * $kupon2;
        $pricekupon3 = $materialies->price * $kupon3;
        
        $proverka = Partnerka::where('id', $proverka2Id)->first();

        DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $pricekupon);
        DB::table('users')->where('id', $materialies->user_id)->increment('balance', $newprice);
        DB::table('users')->where('id', $proverka->user_id)->increment('balance', $pricekupon2);
        DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $pricekupon3);

        
        $partner_pribyl = DB::table('partner_pribyls')->insert([
                'promocod_id' => $proverka->id,
                'user_id' => $proverka->user_id,
                'summa' => $pricekupon2,
            ]);

        $kupits = new Kupitmaterialov();
        $kupits->user_id = \Auth::user()->id;
        $kupits->user_name = \Auth::user()->name;
        $kupits->materialy_id = $materialies->id;
        $kupits->dop_category = $materialcategory->dop_category;
        $kupits->price = $pricekupon;
        $kupits->proverka = \Auth::user()->id.'-'.$materialyId;
        $kupits->materialy_user_id = $materialies->user_id;
        $kupits->pribyl = $newprice;
        $kupits->promocod = $proverka->id;
        $kupits->save();

        
        return redirect()->route('moimaterialy')->withSuccess('Поздравляем, теперь у вас есть доступ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kupitmaterialov  $kupitmaterialov
     * @return \Illuminate\Http\Response
     */
    public function show(Kupitmaterialov $kupitmaterialov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kupitmaterialov  $kupitmaterialov
     * @return \Illuminate\Http\Response
     */
    public function edit(Kupitmaterialov $kupitmaterialov)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kupitmaterialov  $kupitmaterialov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kupitmaterialov $kupitmaterialov)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kupitmaterialov  $kupitmaterialov
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kupitmaterialov $kupitmaterialov)
    {
        //
    }
}