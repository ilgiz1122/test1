<?php

namespace App\Http\Controllers;

use App\Models\Tests_kupit;
use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Test_category;
use App\Models\Test_voprosy;

class TestsKupitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function moi_ort_testy1($subdomain)
    {
        $tests = Tests_kupit::where('user_id', \Auth::user()->id)->where('dop_category', 1)->orderBy('created_at', 'desc')->paginate(8);
        $test_voprosy = Test_voprosy::get();
           $count = Tests_kupit::where('user_id', \Auth::user()->id)->where('dop_category', 1)->count();
        return view('ort/moi_online_testy', [
            'tests' => $tests,
            'count' => $count,
            'test_voprosy' => $test_voprosy,
        ]);
    }


    public function moi_testy($for_action)
    {
        $tests = Tests_kupit::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->orderBy('created_at', 'desc')->paginate(8);
        $test_voprosy = Test_voprosy::get();
           $count = Tests_kupit::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->count();
        return view('pajes/moi_online_testy', [
            'tests' => $tests,
            'count' => $count,
            'for_action' => $for_action,
            'test_voprosy' => $test_voprosy,
        ]);
    }

    public function kupit_test($id)
    {
        $tests = Test::where('id', $id)->first();
        $test_category = Test_category::where('id', $tests->test_category_id)->first();

        $com = 0.8;
        $newprice = $tests->price * $com;
        $pribyl_sistems = $tests->price * 0.2;
        
        DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $tests->price);
        DB::table('users')->where('id', $tests->user_id)->increment('balance', $newprice);
        DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $pribyl_sistems);

        $proverka = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$id)->first();

        if($proverka != null){
            DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->update([
                'proverka' => 0,
            ]);
        }


        $kupits = new Tests_kupit();
        $kupits->user_id = \Auth::user()->id;
        $kupits->test_id = $id;
        $kupits->price = $tests->price;
        $kupits->proverka = \Auth::user()->id.'-'.$id;
        $kupits->test_autor_id = $tests->user_id;
        $kupits->pribyl = $newprice;
        $kupits->time = time();
        $kupits->srok_dostupa = $tests->srok_dostupa;
        $kupits->kol_popytkov = $tests->kol_popytkov;
        $kupits->dop_category = $test_category->dop_category;
        $kupits->save();

        return redirect()->back()->withSuccess('Поздравляем, теперь у вас есть доступ.');

        //return redirect()->route('kurs', $podcategories->id)->withSuccess('Поздравляем, теперь у вас есть доступ');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tests_kupit  $tests_kupit
     * @return \Illuminate\Http\Response
     */
    public function show(Tests_kupit $tests_kupit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tests_kupit  $tests_kupit
     * @return \Illuminate\Http\Response
     */
    public function edit(Tests_kupit $tests_kupit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tests_kupit  $tests_kupit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tests_kupit $tests_kupit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tests_kupit  $tests_kupit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tests_kupit $tests_kupit)
    {
        //
    }
}
