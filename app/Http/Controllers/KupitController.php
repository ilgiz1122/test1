<?php

namespace App\Http\Controllers;

use App\Models\Kupit;
use Illuminate\Http\Request;
use App\Models\Podcategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Uroky;
use App\Models\Partnerka;

class KupitController extends Controller
{
    /**
     * Display a listing of the resource.  
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $kupits = Kupit::where('user_id', \Auth::user()->id)->where('proverka', '!=', 0)->withCount('uroky')->orderBy('created_at', 'desc')->get();
        $kupits2 = Kupit::where('user_id', \Auth::user()->id)->where('proverka', 0)->withCount('uroky')->orderBy('created_at', 'desc')->get();
        
        return view('pajes/kurs3', [
            'kupits' => $kupits,
            'kupits2' => $kupits2,
        ]);
        
    }

    public function bay2($id)
    {
        $podcategories = Podcategory::where('id', $id)->first();
        $users = User::orderBy('created_at', 'desc')->get();

        return view('pajes/kupit', [
            'users' => $users,
            'podcategories' => $podcategories
        ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $podcategories = Podcategory::where('id', $id)->first();

        $com = 0.8;
        $newprice = $podcategories->price * $com;
        $balance = new User();
        DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $podcategories->price);
        DB::table('users')->where('id', $podcategories->user_id)->increment('balance', $newprice);

        $test = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$id)->first();

        if($test != null){
            DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$id)->update([
                'proverka' => 0,
            ]);
        }


        $kupits = new Kupit();
        $kupits->user_id = \Auth::user()->id;
        $kupits->user_name = \Auth::user()->name;
        $kupits->kurs_id = $id;
        $kupits->kurs_title = $podcategories->title;
        $kupits->price = $podcategories->price;
        $kupits->proverka = \Auth::user()->id.'-'.$id;
        $kupits->podcat_user_id = $podcategories->user_id;
        $kupits->pribyl = $newprice;
        $kupits->time = time();
        $kupits->srok_dostupa = $podcategories->srok_dostupa;
        $kupits->save();

        

        return redirect()->route('kurs', $podcategories->id)->withSuccess('Поздравляем, теперь у вас есть доступ');
    }



    public function store_kupon_kurs(Request $request, $podcat_id, $id)
    {
        $podcategories = Podcategory::where('id', $podcat_id)->first();

        
        $com = 0.7;
        $kupon = 0.9;
        $kupon2 = 0.05;
        $kupon3 = 0.15;
        $newprice = $podcategories->price * $com;
        $pricekupon = $podcategories->price * $kupon;
        $pricekupon2 = $podcategories->price * $kupon2;
        $pricekupon3 = $podcategories->price * $kupon3;
        
        $proverka = Partnerka::where('id', $id)->first();


        DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $pricekupon);
        DB::table('users')->where('id', $podcategories->user_id)->increment('balance', $newprice);

        DB::table('users')->where('id', $proverka->user_id)->increment('balance', $pricekupon2);
        DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $pricekupon3);

        
        $partner_pribyl = DB::table('partner_pribyls')->insert([
                'promocod_id' => $proverka->id,
                'user_id' => $proverka->user_id,
                'summa' => $pricekupon2,
            ]);

        $test = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$id)->first();
        
        if($test != null){
            DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$id)->update([
                'proverka' => 0,
            ]);
        }

        $kupits = new Kupit();
        $kupits->user_id = \Auth::user()->id;
        $kupits->user_name = \Auth::user()->name;
        $kupits->kurs_id = $podcat_id;
        $kupits->kurs_title = $podcategories->title;
        $kupits->price = $podcategories->price;
        $kupits->proverka = \Auth::user()->id.'-'.$podcat_id;
        $kupits->podcat_user_id = $podcategories->user_id;
        $kupits->pribyl = $newprice;
        $kupits->promocod = $proverka->id;
        $kupits->time = time();
        $kupits->srok_dostupa = $podcategories->srok_dostupa;
        $kupits->save();

        

        return redirect()->route('kurs', $podcategories->id)->withSuccess('Поздравляем, теперь у вас есть доступ');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kupit  $kupit
     * @return \Illuminate\Http\Response
     */
    public function show(Kupit $kupit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kupit  $kupit
     * @return \Illuminate\Http\Response
     */
    public function edit(Kupit $kupit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kupit  $kupit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kupit $kupit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kupit  $kupit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kupit $kupit)
    {
        //
    }
}
