<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Test_voprosy;
use App\Models\Test_otvety;
use Illuminate\Http\Request;
use App\Models\Gods;
use App\Models\Mounths;
use App\Models\Days;
use App\Models\Hours;
use App\Models\Minutes;
use App\Models\Vidy_partnerkas;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Test_category;
use App\Models\Test_podcategory;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use App\Models\Tests_kupit;
use App\Models\Test_controls;
use App\Models\Test_controls_variants;
use App\Models\Uroky;
use App\Models\Podcategory;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    protected function getDateFormat()
    {
        return 'U';
    }
    


    public function ort_negizgi_test_podcat($subdomain, $id)
    {
        $tests = Test::where('test_podcategory_id', $id)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('created_at', 'desc')->paginate(8);
        $test_podcategories = Test_podcategory::where('id', $id)->first();
        $test_category = Test_category::where('id', $test_podcategories->test_category_id)->first();
        if ($id) {
            $tests->where('test_podcategory_id', $id);
        }
        $for_action = 1;

        return view('ort/vse_testy_view', [
                'test_podcategories' => $test_podcategories,
                'tests' => $tests,
                'test_category' => $test_category,
                'for_action' => $for_action
            ]);
    }
    public function ort_predmettik_test_podcat($subdomain, $id)
    {
        $tests = Test::where('test_podcategory_id', $id)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('created_at', 'desc')->paginate(8);
        $test_podcategories = Test_podcategory::where('id', $id)->first();
        $test_category = Test_category::where('id', $test_podcategories->test_category_id)->first();
        if ($id) {
            $tests->where('test_podcategory_id', $id);
        }
        $for_action = 2;

        return view('ort/vse_testy_view', [
                'test_podcategories' => $test_podcategories,
                'tests' => $tests,
                'test_category' => $test_category,
                'for_action' => $for_action
            ]);
    }

    public function index2($for_action, $id)
    {
        $tests = Test::where('test_podcategory_id', $id)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('created_at', 'desc')->paginate(8);
        $test_podcategories = Test_podcategory::where('id', $id)->first();
        $test_category = Test_category::where('id', $test_podcategories->test_category_id)->first();
        if ($id) {
            $tests->where('test_podcategory_id', $id);
        }
        

        return view('pajes/testy', [
               'test_podcategories' => $test_podcategories,
               'tests' => $tests,
               'test_category' => $test_category,
               'for_action' => $for_action
         ]);
    }

    public function ort_negizgi_test_opentest($subdomain, $for_action, $id)
    {
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $test_podcategory = Test_podcategory::where('id', $tests->test_podcategory_id)->first();
        $test_category = Test_category::where('id', $tests->test_category_id)->first();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_controls_many = Test_controls::where('test_id', $id)->where('kol_ballov_usera', '>', 'test_summa_ballov / 2')->orderBy('kol_ballov_usera', 'desc')->take(50)->get();
        $kol_pokupok = Tests_kupit::where('test_id', $id)->count();

        if (\Auth::user()){            
            $test_controls_one = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->orderBy('created_at', 'desc')->get();
            $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
                return view('ort.testy_kupit', [
                    'tests' => $tests,
                    'summa_ballov' => $summa_ballov,
                    'test_controls_one' => $test_controls_one,
                    'test_controls_many' => $test_controls_many,
                    'proverka' => $proverka,
                    'kol_pokupok' => $kol_pokupok,
                    'test_category' => $test_category,
                    'test_podcategory' => $test_podcategory,
                    'for_action' => $for_action
                ]);
        }else{
            return view('ort.testy_kupit', [
                'tests' => $tests,
                'summa_ballov' => $summa_ballov,
                'test_controls_many' => $test_controls_many,
                'kol_pokupok' => $kol_pokupok,
                'test_category' => $test_category,
                'test_podcategory' => $test_podcategory,
                'for_action' => $for_action
            ]);
        }
    }

    
    public function ort_predmettik_test_opentest($subdomain, $for_action, $id)
    {
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $test_podcategory = Test_podcategory::where('id', $tests->test_podcategory_id)->first();
        $test_category = Test_category::where('id', $tests->test_category_id)->first();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_controls_many = Test_controls::where('test_id', $id)->where('kol_ballov_usera', '>', 'test_summa_ballov / 2')->orderBy('kol_ballov_usera', 'desc')->take(50)->get();
        $kol_pokupok = Tests_kupit::where('test_id', $id)->count();

        if (\Auth::user()){            
            $test_controls_one = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->orderBy('created_at', 'desc')->get();
            $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
                return view('ort.testy_kupit', [
                    'tests' => $tests,
                    'summa_ballov' => $summa_ballov,
                    'test_controls_one' => $test_controls_one,
                    'test_controls_many' => $test_controls_many,
                    'proverka' => $proverka,
                    'kol_pokupok' => $kol_pokupok,
                    'test_category' => $test_category,
                    'test_podcategory' => $test_podcategory,
                    'for_action' => $for_action
                ]);
        }else{
            return view('ort.testy_kupit', [
                'tests' => $tests,
                'summa_ballov' => $summa_ballov,
                'test_controls_many' => $test_controls_many,
                'kol_pokupok' => $kol_pokupok,
                'test_category' => $test_category,
                'test_podcategory' => $test_podcategory,
                'for_action' => $for_action
            ]);
        }
    }

    public function opentest($for_action, $id)
    {
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $test_podcategory = Test_podcategory::where('id', $tests->test_podcategory_id)->first();
        $test_category = Test_category::where('id', $tests->test_category_id)->first();

        if (\Auth::user()){
            $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
            $test_controls_one = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->orderBy('created_at', 'desc')->get();
            $test_controls_many = Test_controls::where('test_id', $id)->where('kol_ballov_usera', '>', 'test_summa_ballov / 2')->orderBy('kol_ballov_usera', 'desc')->take(50)->get();
            $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
            $kol_pokupok = Tests_kupit::where('test_id', $id)->count();
                return view('pajes.testy_kupit', [
                    'tests' => $tests,
                    'summa_ballov' => $summa_ballov,
                    'test_controls_one' => $test_controls_one,
                    'test_controls_many' => $test_controls_many,
                    'proverka' => $proverka,
                    'kol_pokupok' => $kol_pokupok,
                    'test_category' => $test_category,
                    'test_podcategory' => $test_podcategory,
                    'for_action' => $for_action
                ]);
        }else{
            $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
            $test_controls_many = Test_controls::where('test_id', $id)->where('kol_ballov_usera', '>', 'test_summa_ballov / 2')->orderBy('kol_ballov_usera', 'desc')->take(50)->get();
            $kol_pokupok = Tests_kupit::where('test_id', $id)->count();
            return view('pajes.testy_kupit', [
                'tests' => $tests,
                'summa_ballov' => $summa_ballov,
                'test_controls_many' => $test_controls_many,
                'kol_pokupok' => $kol_pokupok,
                'test_category' => $test_category,
                    'test_podcategory' => $test_podcategory,
                    'for_action' => $for_action
            ]);
        }
    }

    public function opentest2($id)
    {
            $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
            $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
            $test_controls_one = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->orderBy('created_at', 'desc')->get();
            $test_controls_many = Test_controls::where('test_id', $id)->where('kol_ballov_usera', '>', 'test_summa_ballov / 2')->orderBy('kol_ballov_usera', 'desc')->take(50)->get();
            $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
            $kol_pokupok = Tests_kupit::where('test_id', $id)->count();
                return view('pajes.testy_kupit', [
                    'tests' => $tests,
                    'summa_ballov' => $summa_ballov,
                    'test_controls_one' => $test_controls_one,
                    'test_controls_many' => $test_controls_many,
                    'proverka' => $proverka,
                    'kol_pokupok' => $kol_pokupok,
                ]);
    }
    //'distinct' 


    public function ort_play_negizgi_test($subdomain, $id, $for_action)
    {
        $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_voprosy = Test_voprosy::where('test_id', $id)->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();
        

        if($tests->price > 0){

            if ($proverka->srok_dostupa != 0) {
                if ((time() - strtotime($proverka->created_at)) <= $proverka->srok_dostupa) {
                    if($proverka->kol_popytkov > 0){
                        DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->decrement('kol_popytkov', 1);

                        $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                        $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
               
                        if($kol_popytkov < 3){
                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('ort.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'proverka' => $proverka,
                                'test_controls' => $test_controls,
                                'for_action' => $for_action,
                            ]);
                        }else{
                            $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                            
                            $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                            $delete->delete();

                            $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('ort.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'proverka' => $proverka,
                                'test_controls' => $test_controls,
                                'for_action' => $for_action,
                            ]);
                        } 
                    }
                    else{
                        return redirect()->back()->withSuccess('У вас нет попыток');
                    }
                }else{
                    return redirect()->back()->withSuccess('Срок доступа истекло');
                }
            }else{
                
                if($proverka->kol_popytkov > 0){
                    DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->decrement('kol_popytkov', 1);

                    $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                    $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
           
                    if($kol_popytkov < 3){
                        $test_controls = new Test_controls();
                        $test_controls->user_id = \Auth::user()->id;
                        $test_controls->test_id = $id;
                        $test_controls->popytka = $kol_popytkov2 + 1;
                        $test_controls->time = time();
                        $test_controls->kol_voprosov = $tests->test_voprosy_count;
                        $test_controls->test_summa_ballov = $summa_ballov;
                        $test_controls->kol_pravilnyh_otvetov = 0;
                        $test_controls->kol_ballov_usera = 0;
                        $test_controls->save();

                        return view('ort.testy_play1', [
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_voprosy' => $test_voprosy,
                            'test_otvety' => $test_otvety,
                            'proverka' => $proverka,
                            'test_controls' => $test_controls,
                            'for_action' => $for_action,
                        ]);
                    }else{
                        $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                        
                        $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                        $delete->delete();

                        $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                        $test_controls = new Test_controls();
                        $test_controls->user_id = \Auth::user()->id;
                        $test_controls->test_id = $id;
                        $test_controls->popytka = $kol_popytkov2 + 1;
                        $test_controls->time = time();
                        $test_controls->kol_voprosov = $tests->test_voprosy_count;
                        $test_controls->test_summa_ballov = $summa_ballov;
                        $test_controls->kol_pravilnyh_otvetov = 0;
                        $test_controls->kol_ballov_usera = 0;
                        $test_controls->save();

                        return view('ort.testy_play1', [
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_voprosy' => $test_voprosy,
                            'test_otvety' => $test_otvety,
                            'proverka' => $proverka,
                            'test_controls' => $test_controls,
                            'for_action' => $for_action,
                        ]);
                    } 
                }
                else{
                    return redirect()->back()->withSuccess('У вас нет попыток');
                }
            }

        }else{
            $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
            $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
   
            if($kol_popytkov < 3){
                    $test_controls = new Test_controls();
                    $test_controls->user_id = \Auth::user()->id;
                    $test_controls->test_id = $id;
                    $test_controls->popytka = $kol_popytkov2 + 1;
                    $test_controls->time = time();
                    $test_controls->kol_voprosov = $tests->test_voprosy_count;
                    $test_controls->test_summa_ballov = $summa_ballov;
                    $test_controls->kol_pravilnyh_otvetov = 0;
                    $test_controls->kol_ballov_usera = 0;
                    $test_controls->save();

                    return view('ort.testy_play1', [
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_voprosy' => $test_voprosy,
                        'test_otvety' => $test_otvety,
                        'proverka' => $proverka,
                        'test_controls' => $test_controls,
                        'for_action' => $for_action,
                    ]);
                }else{
                    $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                    
                    $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                    $delete->delete();

                    $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                    $test_controls = new Test_controls();
                    $test_controls->user_id = \Auth::user()->id;
                    $test_controls->test_id = $id;
                    $test_controls->popytka = $kol_popytkov2 + 1;
                    $test_controls->time = time();
                    $test_controls->kol_voprosov = $tests->test_voprosy_count;
                    $test_controls->test_summa_ballov = $summa_ballov;
                    $test_controls->kol_pravilnyh_otvetov = 0;
                    $test_controls->kol_ballov_usera = 0;
                    $test_controls->save();

                    return view('ort.testy_play1', [
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_voprosy' => $test_voprosy,
                        'test_otvety' => $test_otvety,
                        'proverka' => $proverka,
                        'test_controls' => $test_controls,
                        'for_action' => $for_action,
                    ]);
                } 
        }  
    }


    
    public function ort_play_predmettik_test($subdomain, $id, $for_action)
    {
        $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_voprosy = Test_voprosy::where('test_id', $id)->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();
        

        if($tests->price > 0){

            if ($proverka->srok_dostupa != 0) {
                if ((time() - strtotime($proverka->created_at)) <= $proverka->srok_dostupa) {
                    if($proverka->kol_popytkov > 0){
                        DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->decrement('kol_popytkov', 1);

                        $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                        $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
               
                        if($kol_popytkov < 3){
                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('ort.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'proverka' => $proverka,
                                'test_controls' => $test_controls,
                                'for_action' => $for_action,
                            ]);
                        }else{
                            $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                            
                            $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                            $delete->delete();

                            $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('ort.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'proverka' => $proverka,
                                'test_controls' => $test_controls,
                                'for_action' => $for_action,
                            ]);
                        } 
                    }
                    else{
                        return redirect()->back()->withSuccess('У вас нет попыток');
                    }
                }else{
                    return redirect()->back()->withSuccess('Срок доступа истекло');
                }
            }else{
                
                if($proverka->kol_popytkov > 0){
                    DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->decrement('kol_popytkov', 1);

                    $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                    $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
           
                    if($kol_popytkov < 3){
                        $test_controls = new Test_controls();
                        $test_controls->user_id = \Auth::user()->id;
                        $test_controls->test_id = $id;
                        $test_controls->popytka = $kol_popytkov2 + 1;
                        $test_controls->time = time();
                        $test_controls->kol_voprosov = $tests->test_voprosy_count;
                        $test_controls->test_summa_ballov = $summa_ballov;
                        $test_controls->kol_pravilnyh_otvetov = 0;
                        $test_controls->kol_ballov_usera = 0;
                        $test_controls->save();

                        return view('ort.testy_play1', [
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_voprosy' => $test_voprosy,
                            'test_otvety' => $test_otvety,
                            'proverka' => $proverka,
                            'test_controls' => $test_controls,
                            'for_action' => $for_action,
                        ]);
                    }else{
                        $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                        
                        $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                        $delete->delete();

                        $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                        $test_controls = new Test_controls();
                        $test_controls->user_id = \Auth::user()->id;
                        $test_controls->test_id = $id;
                        $test_controls->popytka = $kol_popytkov2 + 1;
                        $test_controls->time = time();
                        $test_controls->kol_voprosov = $tests->test_voprosy_count;
                        $test_controls->test_summa_ballov = $summa_ballov;
                        $test_controls->kol_pravilnyh_otvetov = 0;
                        $test_controls->kol_ballov_usera = 0;
                        $test_controls->save();

                        return view('ort.testy_play1', [
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_voprosy' => $test_voprosy,
                            'test_otvety' => $test_otvety,
                            'proverka' => $proverka,
                            'test_controls' => $test_controls,
                            'for_action' => $for_action,
                        ]);
                    } 
                }
                else{
                    return redirect()->back()->withSuccess('У вас нет попыток');
                }
            }

        }else{
            $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
            $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
   
            if($kol_popytkov < 3){
                    $test_controls = new Test_controls();
                    $test_controls->user_id = \Auth::user()->id;
                    $test_controls->test_id = $id;
                    $test_controls->popytka = $kol_popytkov2 + 1;
                    $test_controls->time = time();
                    $test_controls->kol_voprosov = $tests->test_voprosy_count;
                    $test_controls->test_summa_ballov = $summa_ballov;
                    $test_controls->kol_pravilnyh_otvetov = 0;
                    $test_controls->kol_ballov_usera = 0;
                    $test_controls->save();

                    return view('ort.testy_play1', [
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_voprosy' => $test_voprosy,
                        'test_otvety' => $test_otvety,
                        'proverka' => $proverka,
                        'test_controls' => $test_controls,
                        'for_action' => $for_action,
                    ]);
                }else{
                    $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                    
                    $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                    $delete->delete();

                    $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                    $test_controls = new Test_controls();
                    $test_controls->user_id = \Auth::user()->id;
                    $test_controls->test_id = $id;
                    $test_controls->popytka = $kol_popytkov2 + 1;
                    $test_controls->time = time();
                    $test_controls->kol_voprosov = $tests->test_voprosy_count;
                    $test_controls->test_summa_ballov = $summa_ballov;
                    $test_controls->kol_pravilnyh_otvetov = 0;
                    $test_controls->kol_ballov_usera = 0;
                    $test_controls->save();

                    return view('ort.testy_play1', [
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_voprosy' => $test_voprosy,
                        'test_otvety' => $test_otvety,
                        'proverka' => $proverka,
                        'test_controls' => $test_controls,
                        'for_action' => $for_action,
                    ]);
                } 
        }  
    }

    public function play_test($id)
    {
        $proverka = Tests_kupit::where('proverka', \Auth::user()->id.'-'.$id)->first();
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_voprosy = Test_voprosy::where('test_id', $id)->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();

        if($tests->price > 0){

            if ($proverka->srok_dostupa != 0) {
                if ((time() - strtotime($proverka->created_at)) <= $proverka->srok_dostupa) {
                    if($proverka->kol_popytkov > 0){
                        DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->decrement('kol_popytkov', 1);

                        $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                        $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
               
                        if($kol_popytkov < 3){
                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('pajes.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'proverka' => $proverka,
                                'test_controls' => $test_controls,
                            ]);
                        }else{
                            $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                            
                            $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                            $delete->delete();

                            $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('pajes.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'proverka' => $proverka,
                                'test_controls' => $test_controls,
                            ]);
                        } 
                    }
                    else{
                        return redirect()->back()->withSuccess('У вас нет попыток');
                    }
                }else{
                    return redirect()->back()->withSuccess('Срок доступа истекло');
                }
            }else{
                
                if($proverka->kol_popytkov > 0){
                    DB::table('tests_kupits')->where('proverka', \Auth::user()->id.'-'.$id)->decrement('kol_popytkov', 1);

                    $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                    $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
           
                    if($kol_popytkov < 3){
                        $test_controls = new Test_controls();
                        $test_controls->user_id = \Auth::user()->id;
                        $test_controls->test_id = $id;
                        $test_controls->popytka = $kol_popytkov2 + 1;
                        $test_controls->time = time();
                        $test_controls->kol_voprosov = $tests->test_voprosy_count;
                        $test_controls->test_summa_ballov = $summa_ballov;
                        $test_controls->kol_pravilnyh_otvetov = 0;
                        $test_controls->kol_ballov_usera = 0;
                        $test_controls->save();

                        return view('pajes.testy_play1', [
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_voprosy' => $test_voprosy,
                            'test_otvety' => $test_otvety,
                            'proverka' => $proverka,
                            'test_controls' => $test_controls,
                        ]);
                    }else{
                        $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                        
                        $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                        $delete->delete();

                        $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                        $test_controls = new Test_controls();
                        $test_controls->user_id = \Auth::user()->id;
                        $test_controls->test_id = $id;
                        $test_controls->popytka = $kol_popytkov2 + 1;
                        $test_controls->time = time();
                        $test_controls->kol_voprosov = $tests->test_voprosy_count;
                        $test_controls->test_summa_ballov = $summa_ballov;
                        $test_controls->kol_pravilnyh_otvetov = 0;
                        $test_controls->kol_ballov_usera = 0;
                        $test_controls->save();

                        return view('pajes.testy_play1', [
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_voprosy' => $test_voprosy,
                            'test_otvety' => $test_otvety,
                            'proverka' => $proverka,
                            'test_controls' => $test_controls,
                        ]);
                    } 
                }
                else{
                    return redirect()->back()->withSuccess('У вас нет попыток');
                }
            }

        }else{
            $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
            $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');
   
            if($kol_popytkov < 3){
                    $test_controls = new Test_controls();
                    $test_controls->user_id = \Auth::user()->id;
                    $test_controls->test_id = $id;
                    $test_controls->popytka = $kol_popytkov2 + 1;
                    $test_controls->time = time();
                    $test_controls->kol_voprosov = $tests->test_voprosy_count;
                    $test_controls->test_summa_ballov = $summa_ballov;
                    $test_controls->kol_pravilnyh_otvetov = 0;
                    $test_controls->kol_ballov_usera = 0;
                    $test_controls->save();

                    return view('pajes.testy_play1', [
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_voprosy' => $test_voprosy,
                        'test_otvety' => $test_otvety,
                        'proverka' => $proverka,
                        'test_controls' => $test_controls,
                    ]);
                }else{
                    $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                    
                    $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                    $delete->delete();

                    $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                    $test_controls = new Test_controls();
                    $test_controls->user_id = \Auth::user()->id;
                    $test_controls->test_id = $id;
                    $test_controls->popytka = $kol_popytkov2 + 1;
                    $test_controls->time = time();
                    $test_controls->kol_voprosov = $tests->test_voprosy_count;
                    $test_controls->test_summa_ballov = $summa_ballov;
                    $test_controls->kol_pravilnyh_otvetov = 0;
                    $test_controls->kol_ballov_usera = 0;
                    $test_controls->save();

                    return view('pajes.testy_play1', [
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_voprosy' => $test_voprosy,
                        'test_otvety' => $test_otvety,
                        'proverka' => $proverka,
                        'test_controls' => $test_controls,
                    ]);
                } 
        }  
    }



    public function play_test_for_kurs($id)
    {
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_voprosy = Test_voprosy::where('test_id', $id)->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();
        $kol_popytkov2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->max('popytka');

                    if($kol_popytkov2 < $tests->kol_popytkov){

                        $kol_popytkov = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->count();
                        
               
                        if($kol_popytkov < 3){
                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('pajes.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'test_controls' => $test_controls,
                            ]);
                        }else{
                            $test_controls_delet = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->min('kol_pravilnyh_otvetov');
                            
                            $delete = Test_controls::where('kol_pravilnyh_otvetov', $test_controls_delet)->first();
                            $delete->delete();

                            $test_controls_delet2 = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $id)->where('time', '>', 0)->get();
                            foreach ($test_controls_delet2 as $test_controls_delet22) {
                                $test_controls_delet22->delete();
                            }

                            $test_controls = new Test_controls();
                            $test_controls->user_id = \Auth::user()->id;
                            $test_controls->test_id = $id;
                            $test_controls->popytka = $kol_popytkov2 + 1;
                            $test_controls->time = time();
                            $test_controls->kol_voprosov = $tests->test_voprosy_count;
                            $test_controls->test_summa_ballov = $summa_ballov;
                            $test_controls->kol_pravilnyh_otvetov = 0;
                            $test_controls->kol_ballov_usera = 0;
                            $test_controls->save();

                            return view('pajes.testy_play1', [
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_voprosy' => $test_voprosy,
                                'test_otvety' => $test_otvety,
                                'test_controls' => $test_controls,
                            ]);
                        } 
                    }
                    else{
                        return redirect()->back()->withSuccess('У вас нет попыток');
                    }
                
            
        
    }

    public function ort_result_test($subdomain, $test_id, $test_controls_id, $for_action, Request $request)
    {
       
        $time = Test_controls::where('id', $test_controls_id)->first();
        
        if ($time->time < 1) {
            if ($for_action == 1) {
                return redirect()->route('ort_negizgi_test_opentest', ['subdomain' => 'ort', 'for_action' => '1', 'id' => $test_id])->withSuccess('Хотел схитрить, чтобы сдать тест зайдите заново!');
            }
            if ($for_action == 2) {
                return redirect()->route('ort_predmettik_test_opentest', ['subdomain' => 'ort', 'for_action' => '2', 'id' => $test_id])->withSuccess('Хотел схитрить, чтобы сдать тест зайдите заново!');
            }
        }else{

            $tests = Test::where('id', $test_id)->withCount('test_voprosy')->first();
            $summa_ballov = Test_voprosy::where('test_id', $test_id)->sum('ball');
            
            if (time() - $time->time < $tests->time) {
                if($request->has('otvet_1')){
                    foreach($request->otvet_1 as $one1)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_1;
                            $request['otvet_id']=$one1;
                            Test_controls_variants::create($request->all());
                        }
                    $status1 = Test_otvety::where('id', $request->otvet_1)->first();
                    $status1 = $status1->status_otveta;

                    if ($status1 > 0) {
                        $test_voprosy1 = Test_voprosy::where('id', $request->vopros_1)->first();
                        $test_voprosy1 = $test_voprosy1->ball;
                    }else{$test_voprosy1 = 0;}
                }else{
                    $status1 = 0;
                    $test_voprosy1 = 0;
                }

                if($request->has('otvet_2')){
                    foreach($request->otvet_2 as $one2)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_2;
                            $request['otvet_id']=$one2;
                            Test_controls_variants::create($request->all());
                        }
                    $status2 = Test_otvety::where('id', $request->otvet_2)->first();
                    $status2 = $status2->status_otveta;

                    if ($status2 > 0) {
                        $test_voprosy2 = Test_voprosy::where('id', $request->vopros_2)->first();
                        $test_voprosy2 = $test_voprosy2->ball;
                    }else{$test_voprosy2 = 0;}
                }
                else{
                    $status2 = 0;
                    $test_voprosy2 = 0;
                }

                if($request->has('otvet_3')){
                    foreach($request->otvet_3 as $one3)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_3;
                            $request['otvet_id']=$one3;
                            Test_controls_variants::create($request->all());
                        }
                    $status3 = Test_otvety::where('id', $request->otvet_3)->first();
                    $status3 = $status3->status_otveta;

                    if ($status3 > 0) {
                        $test_voprosy3 = Test_voprosy::where('id', $request->vopros_3)->first();
                        $test_voprosy3 = $test_voprosy3->ball;
                    }else{$test_voprosy3 = 0;}
                }
                else{
                    $status3 = 0;
                    $test_voprosy3 = 0;
                }

                if($request->has('otvet_4')){
                    foreach($request->otvet_4 as $one4)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_4;
                            $request['otvet_id']=$one4;
                            Test_controls_variants::create($request->all());
                        }
                    $status4 = Test_otvety::where('id', $request->otvet_4)->first();
                    $status4 = $status4->status_otveta;

                    if ($status4 > 0) {
                        $test_voprosy4 = Test_voprosy::where('id', $request->vopros_4)->first();
                        $test_voprosy4 = $test_voprosy4->ball;
                    }else{$test_voprosy4 = 0;}
                }
                else{
                    $status4 = 0;
                    $test_voprosy4 = 0;
                }

                if($request->has('otvet_5')){
                    foreach($request->otvet_5 as $one5)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_5;
                            $request['otvet_id']=$one5;
                            Test_controls_variants::create($request->all());
                        }
                    $status5 = Test_otvety::where('id', $request->otvet_5)->first();
                    $status5 = $status5->status_otveta;

                    if ($status5 > 0) {
                        $test_voprosy5 = Test_voprosy::where('id', $request->vopros_5)->first();
                        $test_voprosy5 = $test_voprosy5->ball;
                    }else{$test_voprosy5 = 0;}
                }
                else{
                    $status5 = 0;
                    $test_voprosy5 = 0;
                }

                if($request->has('otvet_6')){
                    foreach($request->otvet_6 as $one6)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_6;
                            $request['otvet_id']=$one6;
                            Test_controls_variants::create($request->all());
                        }
                    $status6 = Test_otvety::where('id', $request->otvet_6)->first();
                    $status6 = $status6->status_otveta;

                    if ($status6 > 0) {
                        $test_voprosy6 = Test_voprosy::where('id', $request->vopros_6)->first();
                        $test_voprosy6 = $test_voprosy6->ball;
                    }else{$test_voprosy6 = 0;}
                }
                else{
                    $status6 = 0;
                    $test_voprosy6 = 0;
                }

                if($request->has('otvet_7')){
                    foreach($request->otvet_7 as $one7)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_7;
                            $request['otvet_id']=$one7;
                            Test_controls_variants::create($request->all());
                        }
                    $status7 = Test_otvety::where('id', $request->otvet_7)->first();
                    $status7 = $status7->status_otveta;

                    if ($status7 > 0) {
                        $test_voprosy7 = Test_voprosy::where('id', $request->vopros_7)->first();
                        $test_voprosy7 = $test_voprosy7->ball;
                    }else{$test_voprosy7 = 0;}
                }
                else{
                    $status7 = 0;
                    $test_voprosy7 = 0;
                }

                if($request->has('otvet_8')){
                    foreach($request->otvet_8 as $one8)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_8;
                            $request['otvet_id']=$one8;
                            Test_controls_variants::create($request->all());
                        }
                    $status8 = Test_otvety::where('id', $request->otvet_8)->first();
                    $status8 = $status8->status_otveta;

                    if ($status8 > 0) {
                        $test_voprosy8 = Test_voprosy::where('id', $request->vopros_8)->first();
                        $test_voprosy8 = $test_voprosy8->ball;
                    }else{$test_voprosy8 = 0;}
                }
                else{
                    $status8 = 0;
                    $test_voprosy8 = 0;
                }

                if($request->has('otvet_9')){
                    foreach($request->otvet_9 as $one9)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_9;
                            $request['otvet_id']=$one9;
                            Test_controls_variants::create($request->all());
                        }
                    $status9 = Test_otvety::where('id', $request->otvet_9)->first();
                    $status9 = $status9->status_otveta;

                    if ($status9 > 0) {
                        $test_voprosy9 = Test_voprosy::where('id', $request->vopros_9)->first();
                        $test_voprosy9 = $test_voprosy9->ball;
                    }else{$test_voprosy9 = 0;}
                }
                else{
                    $status9 = 0;
                    $test_voprosy9 = 0;
                }

                if($request->has('otvet_10')){
                    foreach($request->otvet_10 as $one10)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_10;
                            $request['otvet_id']=$one10;
                            Test_controls_variants::create($request->all());
                        }
                    $status10 = Test_otvety::where('id', $request->otvet_10)->first();
                    $status10 = $status10->status_otveta;

                    if ($status10 > 0) {
                        $test_voprosy10 = Test_voprosy::where('id', $request->vopros_10)->first();
                        $test_voprosy10 = $test_voprosy10->ball;
                    }else{$test_voprosy10 = 0;}
                }
                else{
                    $status10 = 0;
                    $test_voprosy10 = 0;
                }

                if($request->has('otvet_11')){
                    foreach($request->otvet_11 as $one11)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_11;
                            $request['otvet_id']=$one11;
                            Test_controls_variants::create($request->all());
                        }
                    $status11 = Test_otvety::where('id', $request->otvet_11)->first();
                    $status11 = $status11->status_otveta;

                    if ($status11 > 0) {
                        $test_voprosy11 = Test_voprosy::where('id', $request->vopros_11)->first();
                        $test_voprosy11 = $test_voprosy11->ball;
                    }else{$test_voprosy11 = 0;}
                }
                else{
                    $status11 = 0;
                    $test_voprosy11 = 0;
                }

                if($request->has('otvet_12')){
                    foreach($request->otvet_12 as $one12)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_12;
                            $request['otvet_id']=$one12;
                            Test_controls_variants::create($request->all());
                        }
                    $status12 = Test_otvety::where('id', $request->otvet_12)->first();
                    $status12 = $status12->status_otveta;

                    if ($status12 > 0) {
                        $test_voprosy12 = Test_voprosy::where('id', $request->vopros_12)->first();
                        $test_voprosy12 = $test_voprosy12->ball;
                    }else{$test_voprosy12 = 0;}
                }
                else{
                    $status12 = 0;
                    $test_voprosy12 = 0;
                }

                if($request->has('otvet_13')){
                    foreach($request->otvet_13 as $one13)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_13;
                            $request['otvet_id']=$one13;
                            Test_controls_variants::create($request->all());
                        }
                    $status13 = Test_otvety::where('id', $request->otvet_13)->first();
                    $status13 = $status13->status_otveta;

                    if ($status13 > 0) {
                        $test_voprosy13 = Test_voprosy::where('id', $request->vopros_13)->first();
                        $test_voprosy13 = $test_voprosy13->ball;
                    }else{$test_voprosy13 = 0;}
                }
                else{
                    $status13 = 0;
                    $test_voprosy13 = 0;
                }

                if($request->has('otvet_14')){
                    foreach($request->otvet_14 as $one14)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_14;
                            $request['otvet_id']=$one14;
                            Test_controls_variants::create($request->all());
                        }
                    $status14 = Test_otvety::where('id', $request->otvet_14)->first();
                    $status14 = $status14->status_otveta;

                    if ($status14 > 0) {
                        $test_voprosy14 = Test_voprosy::where('id', $request->vopros_14)->first();
                        $test_voprosy14 = $test_voprosy14->ball;
                    }else{$test_voprosy14 = 0;}
                }
                else{
                    $status14 = 0;
                    $test_voprosy14 = 0;
                }

                if($request->has('otvet_15')){
                    foreach($request->otvet_15 as $one15)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_15;
                            $request['otvet_id']=$one15;
                            Test_controls_variants::create($request->all());
                        }
                    $status15 = Test_otvety::where('id', $request->otvet_15)->first();
                    $status15 = $status15->status_otveta;

                    if ($status15 > 0) {
                        $test_voprosy15 = Test_voprosy::where('id', $request->vopros_15)->first();
                        $test_voprosy15 = $test_voprosy15->ball;
                    }else{$test_voprosy15 = 0;}
                }
                else{
                    $status15 = 0;
                    $test_voprosy15 = 0;
                }

                if($request->has('otvet_16')){
                    foreach($request->otvet_16 as $one16)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_16;
                            $request['otvet_id']=$one16;
                            Test_controls_variants::create($request->all());
                        }
                    $status16 = Test_otvety::where('id', $request->otvet_16)->first();
                    $status16 = $status16->status_otveta;

                    if ($status16 > 0) {
                        $test_voprosy16 = Test_voprosy::where('id', $request->vopros_16)->first();
                        $test_voprosy16 = $test_voprosy16->ball;
                    }else{$test_voprosy16 = 0;}
                }
                else{
                    $status16 = 0;
                    $test_voprosy16 = 0;
                }

                if($request->has('otvet_17')){
                    foreach($request->otvet_17 as $one17)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_17;
                            $request['otvet_id']=$one17;
                            Test_controls_variants::create($request->all());
                        }
                    $status17 = Test_otvety::where('id', $request->otvet_17)->first();
                    $status17 = $status17->status_otveta;

                    if ($status17 > 0) {
                        $test_voprosy17 = Test_voprosy::where('id', $request->vopros_17)->first();
                        $test_voprosy17 = $test_voprosy17->ball;
                    }else{$test_voprosy17 = 0;}
                }
                else{
                    $status17 = 0;
                    $test_voprosy17 = 0;
                }

                if($request->has('otvet_18')){
                    foreach($request->otvet_18 as $one18)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_18;
                            $request['otvet_id']=$one18;
                            Test_controls_variants::create($request->all());
                        }
                    $status18 = Test_otvety::where('id', $request->otvet_18)->first();
                    $status18 = $status18->status_otveta;

                    if ($status18 > 0) {
                        $test_voprosy18 = Test_voprosy::where('id', $request->vopros_18)->first();
                        $test_voprosy18 = $test_voprosy18->ball;
                    }else{$test_voprosy18 = 0;}
                }
                else{
                    $status18 = 0;
                    $test_voprosy18 = 0;
                }

                if($request->has('otvet_19')){
                    foreach($request->otvet_19 as $one19)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_19;
                            $request['otvet_id']=$one19;
                            Test_controls_variants::create($request->all());
                        }
                    $status19 = Test_otvety::where('id', $request->otvet_19)->first();
                    $status19 = $status19->status_otveta;

                    if ($status19 > 0) {
                        $test_voprosy19 = Test_voprosy::where('id', $request->vopros_19)->first();
                        $test_voprosy19 = $test_voprosy19->ball;
                    }else{$test_voprosy19 = 0;}
                }
                else{
                    $status19 = 0;
                    $test_voprosy19 = 0;
                }

                if($request->has('otvet_20')){
                    foreach($request->otvet_20 as $one20)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_20;
                            $request['otvet_id']=$one20;
                            Test_controls_variants::create($request->all());
                        }
                    $status20 = Test_otvety::where('id', $request->otvet_20)->first();
                    $status20 = $status20->status_otveta;

                    if ($status20 > 0) {
                        $test_voprosy20 = Test_voprosy::where('id', $request->vopros_20)->first();
                        $test_voprosy20 = $test_voprosy20->ball;
                    }else{$test_voprosy20 = 0;}
                }
                else{
                    $status20 = 0;
                    $test_voprosy20 = 0;
                }

                if($request->has('otvet_21')){
                    foreach($request->otvet_21 as $one21)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_21;
                            $request['otvet_id']=$one21;
                            Test_controls_variants::create($request->all());
                        }
                    $status21 = Test_otvety::where('id', $request->otvet_21)->first();
                    $status21 = $status21->status_otveta;

                    if ($status21 > 0) {
                        $test_voprosy21 = Test_voprosy::where('id', $request->vopros_21)->first();
                        $test_voprosy21 = $test_voprosy21->ball;
                    }else{$test_voprosy21 = 0;}
                }
                else{
                    $status21 = 0;
                    $test_voprosy21 = 0;
                }

                if($request->has('otvet_22')){
                    foreach($request->otvet_22 as $one22)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_22;
                            $request['otvet_id']=$one22;
                            Test_controls_variants::create($request->all());
                        }
                    $status22 = Test_otvety::where('id', $request->otvet_22)->first();
                    $status22 = $status22->status_otveta;

                    if ($status22 > 0) {
                        $test_voprosy22 = Test_voprosy::where('id', $request->vopros_22)->first();
                        $test_voprosy22 = $test_voprosy22->ball;
                    }else{$test_voprosy22 = 0;}
                }
                else{
                    $status22 = 0;
                    $test_voprosy22 = 0;
                }

                if($request->has('otvet_23')){
                    foreach($request->otvet_23 as $one23)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_23;
                            $request['otvet_id']=$one23;
                            Test_controls_variants::create($request->all());
                        }
                    $status23 = Test_otvety::where('id', $request->otvet_23)->first();
                    $status23 = $status23->status_otveta;

                    if ($status23 > 0) {
                        $test_voprosy23 = Test_voprosy::where('id', $request->vopros_23)->first();
                        $test_voprosy23 = $test_voprosy23->ball;
                    }else{$test_voprosy23 = 0;}
                }
                else{
                    $status23 = 0;
                    $test_voprosy23 = 0;
                }

                if($request->has('otvet_24')){
                    foreach($request->otvet_24 as $one24)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_24;
                            $request['otvet_id']=$one24;
                            Test_controls_variants::create($request->all());
                        }
                    $status24 = Test_otvety::where('id', $request->otvet_24)->first();
                    $status24 = $status24->status_otveta;

                    if ($status24 > 0) {
                        $test_voprosy24 = Test_voprosy::where('id', $request->vopros_24)->first();
                        $test_voprosy24 = $test_voprosy24->ball;
                    }else{$test_voprosy24 = 0;}
                }
                else{
                    $status24 = 0;
                    $test_voprosy24 = 0;
                }

                if($request->has('otvet_25')){
                    foreach($request->otvet_25 as $one25)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_25;
                            $request['otvet_id']=$one25;
                            Test_controls_variants::create($request->all());
                        }
                    $status25 = Test_otvety::where('id', $request->otvet_25)->first();
                    $status25 = $status25->status_otveta;

                    if ($status25 > 0) {
                        $test_voprosy25 = Test_voprosy::where('id', $request->vopros_25)->first();
                        $test_voprosy25 = $test_voprosy25->ball;
                    }else{$test_voprosy25 = 0;}
                }
                else{
                    $status25 = 0;
                    $test_voprosy25 = 0;
                }

                if($request->has('otvet_26')){
                    foreach($request->otvet_26 as $one26)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_26;
                            $request['otvet_id']=$one26;
                            Test_controls_variants::create($request->all());
                        }
                    $status26 = Test_otvety::where('id', $request->otvet_26)->first();
                    $status26 = $status26->status_otveta;

                    if ($status26 > 0) {
                        $test_voprosy26 = Test_voprosy::where('id', $request->vopros_26)->first();
                        $test_voprosy26 = $test_voprosy26->ball;
                    }else{$test_voprosy26 = 0;}
                }
                else{
                    $status26 = 0;
                    $test_voprosy26 = 0;
                }

                if($request->has('otvet_27')){
                    foreach($request->otvet_27 as $one27)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_27;
                            $request['otvet_id']=$one27;
                            Test_controls_variants::create($request->all());
                        }
                    $status27 = Test_otvety::where('id', $request->otvet_27)->first();
                    $status27 = $status27->status_otveta;

                    if ($status27 > 0) {
                        $test_voprosy27 = Test_voprosy::where('id', $request->vopros_27)->first();
                        $test_voprosy27 = $test_voprosy27->ball;
                    }else{$test_voprosy27 = 0;}
                }
                else{
                    $status27 = 0;
                    $test_voprosy27 = 0;
                }

                if($request->has('otvet_28')){
                    foreach($request->otvet_28 as $one28)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_28;
                            $request['otvet_id']=$one28;
                            Test_controls_variants::create($request->all());
                        }
                    $status28 = Test_otvety::where('id', $request->otvet_28)->first();
                    $status28 = $status28->status_otveta;

                    if ($status28 > 0) {
                        $test_voprosy28 = Test_voprosy::where('id', $request->vopros_28)->first();
                        $test_voprosy28 = $test_voprosy28->ball;
                    }else{$test_voprosy28 = 0;}
                }
                else{
                    $status28 = 0;
                    $test_voprosy28 = 0;
                }

                if($request->has('otvet_29')){
                    foreach($request->otvet_29 as $one29)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_29;
                            $request['otvet_id']=$one29;
                            Test_controls_variants::create($request->all());
                        }
                    $status29 = Test_otvety::where('id', $request->otvet_29)->first();
                    $status29 = $status29->status_otveta;

                    if ($status29 > 0) {
                        $test_voprosy29 = Test_voprosy::where('id', $request->vopros_29)->first();
                        $test_voprosy29 = $test_voprosy29->ball;
                    }else{$test_voprosy29 = 0;}
                }
                else{
                    $status29 = 0;
                    $test_voprosy29 = 0;
                }

                if($request->has('otvet_30')){
                    foreach($request->otvet_30 as $one30)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_30;
                            $request['otvet_id']=$one30;
                            Test_controls_variants::create($request->all());
                        }
                    $status30 = Test_otvety::where('id', $request->otvet_30)->first();
                    $status30 = $status30->status_otveta;

                    if ($status30 > 0) {
                        $test_voprosy30 = Test_voprosy::where('id', $request->vopros_30)->first();
                        $test_voprosy30 = $test_voprosy30->ball;
                    }else{$test_voprosy30 = 0;}
                }
                else{
                    $status30 = 0;
                    $test_voprosy30 = 0;
                }

                if($request->has('otvet_31')){
                    foreach($request->otvet_31 as $one31)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_31;
                            $request['otvet_id']=$one31;
                            Test_controls_variants::create($request->all());
                        }
                    $status31 = Test_otvety::where('id', $request->otvet_31)->first();
                    $status31 = $status31->status_otveta;

                    if ($status31 > 0) {
                        $test_voprosy31 = Test_voprosy::where('id', $request->vopros_31)->first();
                        $test_voprosy31 = $test_voprosy31->ball;
                    }else{$test_voprosy31 = 0;}
                }
                else{
                    $status31 = 0;
                    $test_voprosy31 = 0;
                }

                if($request->has('otvet_32')){
                    foreach($request->otvet_32 as $one32)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_32;
                            $request['otvet_id']=$one32;
                            Test_controls_variants::create($request->all());
                        }
                    $status32 = Test_otvety::where('id', $request->otvet_32)->first();
                    $status32 = $status32->status_otveta;
                
                    if ($status32 > 0) {
                        $test_voprosy32 = Test_voprosy::where('id', $request->vopros_32)->first();
                        $test_voprosy32 = $test_voprosy32->ball;
                    }else{$test_voprosy32 = 0;}
                }
                else{
                    $status32 = 0;
                    $test_voprosy32 = 0;
                }

                if($request->has('otvet_33')){
                    foreach($request->otvet_33 as $one33)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_33;
                            $request['otvet_id']=$one33;
                            Test_controls_variants::create($request->all());
                        }
                    $status33 = Test_otvety::where('id', $request->otvet_33)->first();
                    $status33 = $status33->status_otveta;
                
                    if ($status33 > 0) {
                        $test_voprosy33 = Test_voprosy::where('id', $request->vopros_33)->first();
                        $test_voprosy33 = $test_voprosy33->ball;
                    }else{$test_voprosy33 = 0;}
                }
                else{
                    $status33 = 0;
                    $test_voprosy33 = 0;
                }

                if($request->has('otvet_34')){
                    foreach($request->otvet_34 as $one34)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_34;
                            $request['otvet_id']=$one34;
                            Test_controls_variants::create($request->all());
                        }
                    $status34 = Test_otvety::where('id', $request->otvet_34)->first();
                    $status34 = $status34->status_otveta;
                
                    if ($status34 > 0) {
                        $test_voprosy34 = Test_voprosy::where('id', $request->vopros_34)->first();
                        $test_voprosy34 = $test_voprosy34->ball;
                    }else{$test_voprosy34 = 0;}
                }
                else{
                    $status34 = 0;
                    $test_voprosy34 = 0;
                }

                if($request->has('otvet_35')){
                    foreach($request->otvet_35 as $one35)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_35;
                            $request['otvet_id']=$one35;
                            Test_controls_variants::create($request->all());
                        }
                    $status35 = Test_otvety::where('id', $request->otvet_35)->first();
                    $status35 = $status35->status_otveta;
                
                    if ($status35 > 0) {
                        $test_voprosy35 = Test_voprosy::where('id', $request->vopros_35)->first();
                        $test_voprosy35 = $test_voprosy35->ball;
                    }else{$test_voprosy35 = 0;}
                }
                else{
                    $status35 = 0;
                    $test_voprosy35 = 0;
                }

                if($request->has('otvet_36')){
                    foreach($request->otvet_36 as $one36)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_36;
                            $request['otvet_id']=$one36;
                            Test_controls_variants::create($request->all());
                        }
                    $status36 = Test_otvety::where('id', $request->otvet_36)->first();
                    $status36 = $status36->status_otveta;
                
                    if ($status36 > 0) {
                        $test_voprosy36 = Test_voprosy::where('id', $request->vopros_36)->first();
                        $test_voprosy36 = $test_voprosy36->ball;
                    }else{$test_voprosy36 = 0;}
                }
                else{
                    $status36 = 0;
                    $test_voprosy36 = 0;
                }

                if($request->has('otvet_37')){
                    foreach($request->otvet_37 as $one37)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_37;
                            $request['otvet_id']=$one37;
                            Test_controls_variants::create($request->all());
                        }
                    $status37 = Test_otvety::where('id', $request->otvet_37)->first();
                    $status37 = $status37->status_otveta;
                
                    if ($status37 > 0) {
                        $test_voprosy37 = Test_voprosy::where('id', $request->vopros_37)->first();
                        $test_voprosy37 = $test_voprosy37->ball;
                    }else{$test_voprosy37 = 0;}
                }
                else{
                    $status37 = 0;
                    $test_voprosy37 = 0;
                }

                if($request->has('otvet_38')){
                    foreach($request->otvet_38 as $one38)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_38;
                            $request['otvet_id']=$one38;
                            Test_controls_variants::create($request->all());
                        }
                    $status38 = Test_otvety::where('id', $request->otvet_38)->first();
                    $status38 = $status38->status_otveta;
                
                    if ($status38 > 0) {
                        $test_voprosy38 = Test_voprosy::where('id', $request->vopros_38)->first();
                        $test_voprosy38 = $test_voprosy38->ball;
                    }else{$test_voprosy38 = 0;}
                }
                else{
                    $status38 = 0;
                    $test_voprosy38 = 0;
                }

                if($request->has('otvet_39')){
                    foreach($request->otvet_39 as $one39)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_39;
                            $request['otvet_id']=$one39;
                            Test_controls_variants::create($request->all());
                        }
                    $status39 = Test_otvety::where('id', $request->otvet_39)->first();
                    $status39 = $status39->status_otveta;
                
                    if ($status39 > 0) {
                        $test_voprosy39 = Test_voprosy::where('id', $request->vopros_39)->first();
                        $test_voprosy39 = $test_voprosy39->ball;
                    }else{$test_voprosy39 = 0;}
                }
                else{
                    $status39 = 0;
                    $test_voprosy39 = 0;
                }

                if($request->has('otvet_40')){
                    foreach($request->otvet_40 as $one40)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_40;
                            $request['otvet_id']=$one40;
                            Test_controls_variants::create($request->all());
                        }
                    $status40 = Test_otvety::where('id', $request->otvet_40)->first();
                    $status40 = $status40->status_otveta;
                
                    if ($status40 > 0) {
                        $test_voprosy40 = Test_voprosy::where('id', $request->vopros_40)->first();
                        $test_voprosy40 = $test_voprosy40->ball;
                    }else{$test_voprosy40 = 0;}
                }
                else{
                    $status40 = 0;
                    $test_voprosy40 = 0;
                }

                if($request->has('otvet_41')){
                    foreach($request->otvet_41 as $one41)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_41;
                            $request['otvet_id']=$one41;
                            Test_controls_variants::create($request->all());
                        }
                    $status41 = Test_otvety::where('id', $request->otvet_41)->first();
                    $status41 = $status41->status_otveta;
                
                    if ($status41 > 0) {
                        $test_voprosy41 = Test_voprosy::where('id', $request->vopros_41)->first();
                        $test_voprosy41 = $test_voprosy41->ball;
                    }else{$test_voprosy41 = 0;}
                }
                else{
                    $status41 = 0;
                    $test_voprosy41 = 0;
                }

                if($request->has('otvet_42')){
                    foreach($request->otvet_42 as $one42)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_42;
                            $request['otvet_id']=$one42;
                            Test_controls_variants::create($request->all());
                        }
                    $status42 = Test_otvety::where('id', $request->otvet_42)->first();
                    $status42 = $status42->status_otveta;
                
                    if ($status42 > 0) {
                        $test_voprosy42 = Test_voprosy::where('id', $request->vopros_42)->first();
                        $test_voprosy42 = $test_voprosy42->ball;
                    }else{$test_voprosy42 = 0;}
                }
                else{
                    $status42 = 0;
                    $test_voprosy42 = 0;
                }

                if($request->has('otvet_43')){
                    foreach($request->otvet_43 as $one43)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_43;
                            $request['otvet_id']=$one43;
                            Test_controls_variants::create($request->all());
                        }
                    $status43 = Test_otvety::where('id', $request->otvet_43)->first();
                    $status43 = $status43->status_otveta;
                
                    if ($status43 > 0) {
                        $test_voprosy43 = Test_voprosy::where('id', $request->vopros_43)->first();
                        $test_voprosy43 = $test_voprosy43->ball;
                    }else{$test_voprosy43 = 0;}
                }
                else{
                    $status43 = 0;
                    $test_voprosy43 = 0;
                }

                if($request->has('otvet_44')){
                    foreach($request->otvet_44 as $one44)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_44;
                            $request['otvet_id']=$one44;
                            Test_controls_variants::create($request->all());
                        }
                    $status44 = Test_otvety::where('id', $request->otvet_44)->first();
                    $status44 = $status44->status_otveta;
                
                    if ($status44 > 0) {
                        $test_voprosy44 = Test_voprosy::where('id', $request->vopros_44)->first();
                        $test_voprosy44 = $test_voprosy44->ball;
                    }else{$test_voprosy44 = 0;}
                }
                else{
                    $status44 = 0;
                    $test_voprosy44 = 0;
                }

                if($request->has('otvet_45')){
                    foreach($request->otvet_45 as $one45)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_45;
                            $request['otvet_id']=$one45;
                            Test_controls_variants::create($request->all());
                        }
                    $status45 = Test_otvety::where('id', $request->otvet_45)->first();
                    $status45 = $status45->status_otveta;
                
                    if ($status45 > 0) {
                        $test_voprosy45 = Test_voprosy::where('id', $request->vopros_45)->first();
                        $test_voprosy45 = $test_voprosy45->ball;
                    }else{$test_voprosy45 = 0;}
                }
                else{
                    $status45 = 0;
                    $test_voprosy45 = 0;
                }

                if($request->has('otvet_46')){
                    foreach($request->otvet_46 as $one46)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_46;
                            $request['otvet_id']=$one46;
                            Test_controls_variants::create($request->all());
                        }
                    $status46 = Test_otvety::where('id', $request->otvet_46)->first();
                    $status46 = $status46->status_otveta;
                
                    if ($status46 > 0) {
                        $test_voprosy46 = Test_voprosy::where('id', $request->vopros_46)->first();
                        $test_voprosy46 = $test_voprosy46->ball;
                    }else{$test_voprosy46 = 0;}
                }
                else{
                    $status46 = 0;
                    $test_voprosy46 = 0;
                }

                if($request->has('otvet_47')){
                    foreach($request->otvet_47 as $one47)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_47;
                            $request['otvet_id']=$one47;
                            Test_controls_variants::create($request->all());
                        }
                    $status47 = Test_otvety::where('id', $request->otvet_47)->first();
                    $status47 = $status47->status_otveta;
                
                    if ($status47 > 0) {
                        $test_voprosy47 = Test_voprosy::where('id', $request->vopros_47)->first();
                        $test_voprosy47 = $test_voprosy47->ball;
                    }else{$test_voprosy47 = 0;}
                }
                else{
                    $status47 = 0;
                    $test_voprosy47 = 0;
                }

                if($request->has('otvet_48')){
                    foreach($request->otvet_48 as $one48)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_48;
                            $request['otvet_id']=$one48;
                            Test_controls_variants::create($request->all());
                        }
                    $status48 = Test_otvety::where('id', $request->otvet_48)->first();
                    $status48 = $status48->status_otveta;
                
                    if ($status48 > 0) {
                        $test_voprosy48 = Test_voprosy::where('id', $request->vopros_48)->first();
                        $test_voprosy48 = $test_voprosy48->ball;
                    }else{$test_voprosy48 = 0;}
                }
                else{
                    $status48 = 0;
                    $test_voprosy48 = 0;
                }

                if($request->has('otvet_49')){
                    foreach($request->otvet_49 as $one49)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_49;
                            $request['otvet_id']=$one49;
                            Test_controls_variants::create($request->all());
                        }
                    $status49 = Test_otvety::where('id', $request->otvet_49)->first();
                    $status49 = $status49->status_otveta;
                
                    if ($status49 > 0) {
                        $test_voprosy49 = Test_voprosy::where('id', $request->vopros_49)->first();
                        $test_voprosy49 = $test_voprosy49->ball;
                    }else{$test_voprosy49 = 0;}
                }
                else{
                    $status49 = 0;
                    $test_voprosy49 = 0;
                }

                if($request->has('otvet_50')){
                    foreach($request->otvet_50 as $one50)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_50;
                            $request['otvet_id']=$one50;
                            Test_controls_variants::create($request->all());
                        }
                    $status50 = Test_otvety::where('id', $request->otvet_50)->first();
                    $status50 = $status50->status_otveta;
                
                    if ($status50 > 0) {
                        $test_voprosy50 = Test_voprosy::where('id', $request->vopros_50)->first();
                        $test_voprosy50 = $test_voprosy50->ball;
                    }else{$test_voprosy50 = 0;}
                }
                else{
                    $status50 = 0;
                    $test_voprosy50 = 0;
                }

                if($request->has('otvet_51')){
                    foreach($request->otvet_51 as $one51)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_51;
                            $request['otvet_id']=$one51;
                            Test_controls_variants::create($request->all());
                        }
                    $status51 = Test_otvety::where('id', $request->otvet_51)->first();
                    $status51 = $status51->status_otveta;
                
                    if ($status51 > 0) {
                        $test_voprosy51 = Test_voprosy::where('id', $request->vopros_51)->first();
                        $test_voprosy51 = $test_voprosy51->ball;
                    }else{$test_voprosy51 = 0;}
                }
                else{
                    $status51 = 0;
                    $test_voprosy51 = 0;
                }

                if($request->has('otvet_52')){
                    foreach($request->otvet_52 as $one52)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_52;
                            $request['otvet_id']=$one52;
                            Test_controls_variants::create($request->all());
                        }
                    $status52 = Test_otvety::where('id', $request->otvet_52)->first();
                    $status52 = $status52->status_otveta;
                
                    if ($status52 > 0) {
                        $test_voprosy52 = Test_voprosy::where('id', $request->vopros_52)->first();
                        $test_voprosy52 = $test_voprosy52->ball;
                    }else{$test_voprosy52 = 0;}
                }
                else{
                    $status52 = 0;
                    $test_voprosy52 = 0;
                }

                if($request->has('otvet_53')){
                    foreach($request->otvet_53 as $one53)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_53;
                            $request['otvet_id']=$one53;
                            Test_controls_variants::create($request->all());
                        }
                    $status53 = Test_otvety::where('id', $request->otvet_53)->first();
                    $status53 = $status53->status_otveta;
                
                    if ($status53 > 0) {
                        $test_voprosy53 = Test_voprosy::where('id', $request->vopros_53)->first();
                        $test_voprosy53 = $test_voprosy53->ball;
                    }else{$test_voprosy53 = 0;}
                }
                else{
                    $status53 = 0;
                    $test_voprosy53 = 0;
                }

                if($request->has('otvet_54')){
                    foreach($request->otvet_54 as $one54)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_54;
                            $request['otvet_id']=$one54;
                            Test_controls_variants::create($request->all());
                        }
                    $status54 = Test_otvety::where('id', $request->otvet_54)->first();
                    $status54 = $status54->status_otveta;
                
                    if ($status54 > 0) {
                        $test_voprosy54 = Test_voprosy::where('id', $request->vopros_54)->first();
                        $test_voprosy54 = $test_voprosy54->ball;
                    }else{$test_voprosy54 = 0;}
                }
                else{
                    $status54 = 0;
                    $test_voprosy54 = 0;
                }

                if($request->has('otvet_55')){
                    foreach($request->otvet_55 as $one55)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_55;
                            $request['otvet_id']=$one55;
                            Test_controls_variants::create($request->all());
                        }
                    $status55 = Test_otvety::where('id', $request->otvet_55)->first();
                    $status55 = $status55->status_otveta;
                
                    if ($status55 > 0) {
                        $test_voprosy55 = Test_voprosy::where('id', $request->vopros_55)->first();
                        $test_voprosy55 = $test_voprosy55->ball;
                    }else{$test_voprosy55 = 0;}
                }
                else{
                    $status55 = 0;
                    $test_voprosy55 = 0;
                }

                if($request->has('otvet_56')){
                    foreach($request->otvet_56 as $one56)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_56;
                            $request['otvet_id']=$one56;
                            Test_controls_variants::create($request->all());
                        }
                    $status56 = Test_otvety::where('id', $request->otvet_56)->first();
                    $status56 = $status56->status_otveta;
                
                    if ($status56 > 0) {
                        $test_voprosy56 = Test_voprosy::where('id', $request->vopros_56)->first();
                        $test_voprosy56 = $test_voprosy56->ball;
                    }else{$test_voprosy56 = 0;}
                }
                else{
                    $status56 = 0;
                    $test_voprosy56 = 0;
                }

                if($request->has('otvet_57')){
                    foreach($request->otvet_57 as $one57)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_57;
                            $request['otvet_id']=$one57;
                            Test_controls_variants::create($request->all());
                        }
                    $status57 = Test_otvety::where('id', $request->otvet_57)->first();
                    $status57 = $status57->status_otveta;
                
                    if ($status57 > 0) {
                        $test_voprosy57 = Test_voprosy::where('id', $request->vopros_57)->first();
                        $test_voprosy57 = $test_voprosy57->ball;
                    }else{$test_voprosy57 = 0;}
                }
                else{
                    $status57 = 0;
                    $test_voprosy57 = 0;
                }

                if($request->has('otvet_58')){
                    foreach($request->otvet_58 as $one58)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_58;
                            $request['otvet_id']=$one58;
                            Test_controls_variants::create($request->all());
                        }
                    $status58 = Test_otvety::where('id', $request->otvet_58)->first();
                    $status58 = $status58->status_otveta;
                
                    if ($status58 > 0) {
                        $test_voprosy58 = Test_voprosy::where('id', $request->vopros_58)->first();
                        $test_voprosy58 = $test_voprosy58->ball;
                    }else{$test_voprosy58 = 0;}
                }
                else{
                    $status58 = 0;
                    $test_voprosy58 = 0;
                }

                if($request->has('otvet_59')){
                    foreach($request->otvet_59 as $one59)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_59;
                            $request['otvet_id']=$one59;
                            Test_controls_variants::create($request->all());
                        }
                    $status59 = Test_otvety::where('id', $request->otvet_59)->first();
                    $status59 = $status59->status_otveta;
                
                    if ($status59 > 0) {
                        $test_voprosy59 = Test_voprosy::where('id', $request->vopros_59)->first();
                        $test_voprosy59 = $test_voprosy59->ball;
                    }else{$test_voprosy59 = 0;}
                }
                else{
                    $status59 = 0;
                    $test_voprosy59 = 0;
                }

                if($request->has('otvet_60')){
                    foreach($request->otvet_60 as $one60)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_60;
                            $request['otvet_id']=$one60;
                            Test_controls_variants::create($request->all());
                        }
                    $status60 = Test_otvety::where('id', $request->otvet_60)->first();
                    $status60 = $status60->status_otveta;
                
                    if ($status60 > 0) {
                        $test_voprosy60 = Test_voprosy::where('id', $request->vopros_60)->first();
                        $test_voprosy60 = $test_voprosy60->ball;
                    }else{$test_voprosy60 = 0;}
                }
                else{
                    $status60 = 0;
                    $test_voprosy60 = 0;
                }

                $kol_pravilnyh_otvetov = $status1 + $status2 + $status3 + $status4 + $status5 + $status6 + $status7 + $status8 + $status9 + $status10 + $status11 + $status12 + $status13 + $status14 + $status15 + $status16 + $status17 + $status18 + $status19 + $status20 + $status21 + $status22 + $status23 + $status24 + $status25 + $status26 + $status27 + $status28 + $status29 + $status30 + $status31 + $status32 + $status33 + $status34 + $status35 + $status36 + $status37 + $status38 + $status39 + $status40 + $status41 + $status42 + $status43 + $status44 + $status45 + $status46 + $status47 + $status48 + $status49 + $status50 + $status51 + $status52 + $status53 + $status54 + $status55 + $status56 + $status57 + $status58 + $status59 + $status60;
                $kol_ballov_usera = $test_voprosy1 + $test_voprosy2 + $test_voprosy3 + $test_voprosy4 + $test_voprosy5 + $test_voprosy6 + $test_voprosy7 + $test_voprosy8 + $test_voprosy9 + $test_voprosy10 + $test_voprosy11 + $test_voprosy12 + $test_voprosy13 + $test_voprosy14 + $test_voprosy15 + $test_voprosy16 + $test_voprosy17 + $test_voprosy18 + $test_voprosy19 + $test_voprosy20 + $test_voprosy21 + $test_voprosy22 + $test_voprosy23 + $test_voprosy24 + $test_voprosy25 + $test_voprosy26 + $test_voprosy27 + $test_voprosy28 + $test_voprosy29 + $test_voprosy30 + $test_voprosy31 + $test_voprosy32 + $test_voprosy33 + $test_voprosy34 + $test_voprosy35 + $test_voprosy36 + $test_voprosy37 + $test_voprosy38 + $test_voprosy39 + $test_voprosy40 + $test_voprosy41 + $test_voprosy42 + $test_voprosy43 + $test_voprosy44 + $test_voprosy45 + $test_voprosy46 + $test_voprosy47 + $test_voprosy48 + $test_voprosy49 + $test_voprosy50 + $test_voprosy51 + $test_voprosy52 + $test_voprosy53 + $test_voprosy54 + $test_voprosy55 + $test_voprosy56 + $test_voprosy57 + $test_voprosy58 + $test_voprosy59 + $test_voprosy60;

                Test_controls::where('id', $test_controls_id)->update([
                    'kol_voprosov' => $tests->test_voprosy_count,
                    'test_summa_ballov' => $summa_ballov,
                    'kol_pravilnyh_otvetov' => $kol_pravilnyh_otvetov,
                    'kol_ballov_usera' => $kol_ballov_usera,
                    'time' => 0,
                ]);
                
                if ($for_action == 1) {
                    return redirect()->route('ort_result_negizgi_test_one', ['subdomain' => 'ort', $test_id, $test_controls_id, $for_action])->withSuccess('Сиздин жыйынтык');
                }
                if ($for_action == 2) {
                    return redirect()->route('ort_result_predmettik_test_one', ['subdomain' => 'ort', $test_id, $test_controls_id, $for_action])->withSuccess('Сиздин жыйынтык');
                }
                
                
            }else{
                if ($for_action == 1) {
                    return redirect()->route('ort_negizgi_test_opentest', ['subdomain' => 'ort', 'for_action' => '1', 'id' => $test_id])->withSuccess('Убакыт бүттү! Жетишпей калдыңыз');
                }
                if ($for_action == 2) {
                    return redirect()->route('ort_predmettik_test_opentest', ['subdomain' => 'ort', 'for_action' => '2', 'id' => $test_id])->withSuccess('Убакыт бүттү! Жетишпей калдыңыз');
                }
            }
        }
    }


    public function result_test($test_id, $test_controls_id, Request $request)
    {
       /** $request->validate([
            'vopros_1' => 'required|numeric',
            'otvet_1' => 'numeric',
        ]);
        $request->validate([
            'vopros_2' => 'required|numeric',
            'otvet_2' => 'numeric',
        ]);*/
        $time = Test_controls::where('id', $test_controls_id)->first();

        if ($time->time < 1) {
            return redirect()->route('opentest', [$test_id, $test_controls_id])->withSuccess('Хотел схитрить, чтобы сдать тест зайдите заново!');
        }else{

            $tests = Test::where('id', $test_id)->withCount('test_voprosy')->first();
            $summa_ballov = Test_voprosy::where('test_id', $test_id)->sum('ball');
            
            if (time() - $time->time < $tests->time) {
                if($request->has('otvet_1')){
                    foreach($request->otvet_1 as $one1)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_1;
                            $request['otvet_id']=$one1;
                            Test_controls_variants::create($request->all());
                        }
                    $status1 = Test_otvety::where('id', $request->otvet_1)->first();
                    $status1 = $status1->status_otveta;

                    if ($status1 > 0) {
                        $test_voprosy1 = Test_voprosy::where('id', $request->vopros_1)->first();
                        $test_voprosy1 = $test_voprosy1->ball;
                    }else{$test_voprosy1 = 0;}
                }else{
                    $status1 = 0;
                    $test_voprosy1 = 0;
                }

                if($request->has('otvet_2')){
                    foreach($request->otvet_2 as $one2)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_2;
                            $request['otvet_id']=$one2;
                            Test_controls_variants::create($request->all());
                        }
                    $status2 = Test_otvety::where('id', $request->otvet_2)->first();
                    $status2 = $status2->status_otveta;

                    if ($status2 > 0) {
                        $test_voprosy2 = Test_voprosy::where('id', $request->vopros_2)->first();
                        $test_voprosy2 = $test_voprosy2->ball;
                    }else{$test_voprosy2 = 0;}
                }
                else{
                    $status2 = 0;
                    $test_voprosy2 = 0;
                }

                if($request->has('otvet_3')){
                    foreach($request->otvet_3 as $one3)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_3;
                            $request['otvet_id']=$one3;
                            Test_controls_variants::create($request->all());
                        }
                    $status3 = Test_otvety::where('id', $request->otvet_3)->first();
                    $status3 = $status3->status_otveta;

                    if ($status3 > 0) {
                        $test_voprosy3 = Test_voprosy::where('id', $request->vopros_3)->first();
                        $test_voprosy3 = $test_voprosy3->ball;
                    }else{$test_voprosy3 = 0;}
                }
                else{
                    $status3 = 0;
                    $test_voprosy3 = 0;
                }

                if($request->has('otvet_4')){
                    foreach($request->otvet_4 as $one4)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_4;
                            $request['otvet_id']=$one4;
                            Test_controls_variants::create($request->all());
                        }
                    $status4 = Test_otvety::where('id', $request->otvet_4)->first();
                    $status4 = $status4->status_otveta;

                    if ($status4 > 0) {
                        $test_voprosy4 = Test_voprosy::where('id', $request->vopros_4)->first();
                        $test_voprosy4 = $test_voprosy4->ball;
                    }else{$test_voprosy4 = 0;}
                }
                else{
                    $status4 = 0;
                    $test_voprosy4 = 0;
                }

                if($request->has('otvet_5')){
                    foreach($request->otvet_5 as $one5)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_5;
                            $request['otvet_id']=$one5;
                            Test_controls_variants::create($request->all());
                        }
                    $status5 = Test_otvety::where('id', $request->otvet_5)->first();
                    $status5 = $status5->status_otveta;

                    if ($status5 > 0) {
                        $test_voprosy5 = Test_voprosy::where('id', $request->vopros_5)->first();
                        $test_voprosy5 = $test_voprosy5->ball;
                    }else{$test_voprosy5 = 0;}
                }
                else{
                    $status5 = 0;
                    $test_voprosy5 = 0;
                }

                if($request->has('otvet_6')){
                    foreach($request->otvet_6 as $one6)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_6;
                            $request['otvet_id']=$one6;
                            Test_controls_variants::create($request->all());
                        }
                    $status6 = Test_otvety::where('id', $request->otvet_6)->first();
                    $status6 = $status6->status_otveta;

                    if ($status6 > 0) {
                        $test_voprosy6 = Test_voprosy::where('id', $request->vopros_6)->first();
                        $test_voprosy6 = $test_voprosy6->ball;
                    }else{$test_voprosy6 = 0;}
                }
                else{
                    $status6 = 0;
                    $test_voprosy6 = 0;
                }

                if($request->has('otvet_7')){
                    foreach($request->otvet_7 as $one7)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_7;
                            $request['otvet_id']=$one7;
                            Test_controls_variants::create($request->all());
                        }
                    $status7 = Test_otvety::where('id', $request->otvet_7)->first();
                    $status7 = $status7->status_otveta;

                    if ($status7 > 0) {
                        $test_voprosy7 = Test_voprosy::where('id', $request->vopros_7)->first();
                        $test_voprosy7 = $test_voprosy7->ball;
                    }else{$test_voprosy7 = 0;}
                }
                else{
                    $status7 = 0;
                    $test_voprosy7 = 0;
                }

                if($request->has('otvet_8')){
                    foreach($request->otvet_8 as $one8)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_8;
                            $request['otvet_id']=$one8;
                            Test_controls_variants::create($request->all());
                        }
                    $status8 = Test_otvety::where('id', $request->otvet_8)->first();
                    $status8 = $status8->status_otveta;

                    if ($status8 > 0) {
                        $test_voprosy8 = Test_voprosy::where('id', $request->vopros_8)->first();
                        $test_voprosy8 = $test_voprosy8->ball;
                    }else{$test_voprosy8 = 0;}
                }
                else{
                    $status8 = 0;
                    $test_voprosy8 = 0;
                }

                if($request->has('otvet_9')){
                    foreach($request->otvet_9 as $one9)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_9;
                            $request['otvet_id']=$one9;
                            Test_controls_variants::create($request->all());
                        }
                    $status9 = Test_otvety::where('id', $request->otvet_9)->first();
                    $status9 = $status9->status_otveta;

                    if ($status9 > 0) {
                        $test_voprosy9 = Test_voprosy::where('id', $request->vopros_9)->first();
                        $test_voprosy9 = $test_voprosy9->ball;
                    }else{$test_voprosy9 = 0;}
                }
                else{
                    $status9 = 0;
                    $test_voprosy9 = 0;
                }

                if($request->has('otvet_10')){
                    foreach($request->otvet_10 as $one10)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_10;
                            $request['otvet_id']=$one10;
                            Test_controls_variants::create($request->all());
                        }
                    $status10 = Test_otvety::where('id', $request->otvet_10)->first();
                    $status10 = $status10->status_otveta;

                    if ($status10 > 0) {
                        $test_voprosy10 = Test_voprosy::where('id', $request->vopros_10)->first();
                        $test_voprosy10 = $test_voprosy10->ball;
                    }else{$test_voprosy10 = 0;}
                }
                else{
                    $status10 = 0;
                    $test_voprosy10 = 0;
                }

                if($request->has('otvet_11')){
                    foreach($request->otvet_11 as $one11)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_11;
                            $request['otvet_id']=$one11;
                            Test_controls_variants::create($request->all());
                        }
                    $status11 = Test_otvety::where('id', $request->otvet_11)->first();
                    $status11 = $status11->status_otveta;

                    if ($status11 > 0) {
                        $test_voprosy11 = Test_voprosy::where('id', $request->vopros_11)->first();
                        $test_voprosy11 = $test_voprosy11->ball;
                    }else{$test_voprosy11 = 0;}
                }
                else{
                    $status11 = 0;
                    $test_voprosy11 = 0;
                }

                if($request->has('otvet_12')){
                    foreach($request->otvet_12 as $one12)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_12;
                            $request['otvet_id']=$one12;
                            Test_controls_variants::create($request->all());
                        }
                    $status12 = Test_otvety::where('id', $request->otvet_12)->first();
                    $status12 = $status12->status_otveta;

                    if ($status12 > 0) {
                        $test_voprosy12 = Test_voprosy::where('id', $request->vopros_12)->first();
                        $test_voprosy12 = $test_voprosy12->ball;
                    }else{$test_voprosy12 = 0;}
                }
                else{
                    $status12 = 0;
                    $test_voprosy12 = 0;
                }

                if($request->has('otvet_13')){
                    foreach($request->otvet_13 as $one13)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_13;
                            $request['otvet_id']=$one13;
                            Test_controls_variants::create($request->all());
                        }
                    $status13 = Test_otvety::where('id', $request->otvet_13)->first();
                    $status13 = $status13->status_otveta;

                    if ($status13 > 0) {
                        $test_voprosy13 = Test_voprosy::where('id', $request->vopros_13)->first();
                        $test_voprosy13 = $test_voprosy13->ball;
                    }else{$test_voprosy13 = 0;}
                }
                else{
                    $status13 = 0;
                    $test_voprosy13 = 0;
                }

                if($request->has('otvet_14')){
                    foreach($request->otvet_14 as $one14)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_14;
                            $request['otvet_id']=$one14;
                            Test_controls_variants::create($request->all());
                        }
                    $status14 = Test_otvety::where('id', $request->otvet_14)->first();
                    $status14 = $status14->status_otveta;

                    if ($status14 > 0) {
                        $test_voprosy14 = Test_voprosy::where('id', $request->vopros_14)->first();
                        $test_voprosy14 = $test_voprosy14->ball;
                    }else{$test_voprosy14 = 0;}
                }
                else{
                    $status14 = 0;
                    $test_voprosy14 = 0;
                }

                if($request->has('otvet_15')){
                    foreach($request->otvet_15 as $one15)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_15;
                            $request['otvet_id']=$one15;
                            Test_controls_variants::create($request->all());
                        }
                    $status15 = Test_otvety::where('id', $request->otvet_15)->first();
                    $status15 = $status15->status_otveta;

                    if ($status15 > 0) {
                        $test_voprosy15 = Test_voprosy::where('id', $request->vopros_15)->first();
                        $test_voprosy15 = $test_voprosy15->ball;
                    }else{$test_voprosy15 = 0;}
                }
                else{
                    $status15 = 0;
                    $test_voprosy15 = 0;
                }

                if($request->has('otvet_16')){
                    foreach($request->otvet_16 as $one16)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_16;
                            $request['otvet_id']=$one16;
                            Test_controls_variants::create($request->all());
                        }
                    $status16 = Test_otvety::where('id', $request->otvet_16)->first();
                    $status16 = $status16->status_otveta;

                    if ($status16 > 0) {
                        $test_voprosy16 = Test_voprosy::where('id', $request->vopros_16)->first();
                        $test_voprosy16 = $test_voprosy16->ball;
                    }else{$test_voprosy16 = 0;}
                }
                else{
                    $status16 = 0;
                    $test_voprosy16 = 0;
                }

                if($request->has('otvet_17')){
                    foreach($request->otvet_17 as $one17)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_17;
                            $request['otvet_id']=$one17;
                            Test_controls_variants::create($request->all());
                        }
                    $status17 = Test_otvety::where('id', $request->otvet_17)->first();
                    $status17 = $status17->status_otveta;

                    if ($status17 > 0) {
                        $test_voprosy17 = Test_voprosy::where('id', $request->vopros_17)->first();
                        $test_voprosy17 = $test_voprosy17->ball;
                    }else{$test_voprosy17 = 0;}
                }
                else{
                    $status17 = 0;
                    $test_voprosy17 = 0;
                }

                if($request->has('otvet_18')){
                    foreach($request->otvet_18 as $one18)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_18;
                            $request['otvet_id']=$one18;
                            Test_controls_variants::create($request->all());
                        }
                    $status18 = Test_otvety::where('id', $request->otvet_18)->first();
                    $status18 = $status18->status_otveta;

                    if ($status18 > 0) {
                        $test_voprosy18 = Test_voprosy::where('id', $request->vopros_18)->first();
                        $test_voprosy18 = $test_voprosy18->ball;
                    }else{$test_voprosy18 = 0;}
                }
                else{
                    $status18 = 0;
                    $test_voprosy18 = 0;
                }

                if($request->has('otvet_19')){
                    foreach($request->otvet_19 as $one19)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_19;
                            $request['otvet_id']=$one19;
                            Test_controls_variants::create($request->all());
                        }
                    $status19 = Test_otvety::where('id', $request->otvet_19)->first();
                    $status19 = $status19->status_otveta;

                    if ($status19 > 0) {
                        $test_voprosy19 = Test_voprosy::where('id', $request->vopros_19)->first();
                        $test_voprosy19 = $test_voprosy19->ball;
                    }else{$test_voprosy19 = 0;}
                }
                else{
                    $status19 = 0;
                    $test_voprosy19 = 0;
                }

                if($request->has('otvet_20')){
                    foreach($request->otvet_20 as $one20)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_20;
                            $request['otvet_id']=$one20;
                            Test_controls_variants::create($request->all());
                        }
                    $status20 = Test_otvety::where('id', $request->otvet_20)->first();
                    $status20 = $status20->status_otveta;

                    if ($status20 > 0) {
                        $test_voprosy20 = Test_voprosy::where('id', $request->vopros_20)->first();
                        $test_voprosy20 = $test_voprosy20->ball;
                    }else{$test_voprosy20 = 0;}
                }
                else{
                    $status20 = 0;
                    $test_voprosy20 = 0;
                }

                if($request->has('otvet_21')){
                    foreach($request->otvet_21 as $one21)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_21;
                            $request['otvet_id']=$one21;
                            Test_controls_variants::create($request->all());
                        }
                    $status21 = Test_otvety::where('id', $request->otvet_21)->first();
                    $status21 = $status21->status_otveta;

                    if ($status21 > 0) {
                        $test_voprosy21 = Test_voprosy::where('id', $request->vopros_21)->first();
                        $test_voprosy21 = $test_voprosy21->ball;
                    }else{$test_voprosy21 = 0;}
                }
                else{
                    $status21 = 0;
                    $test_voprosy21 = 0;
                }

                if($request->has('otvet_22')){
                    foreach($request->otvet_22 as $one22)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_22;
                            $request['otvet_id']=$one22;
                            Test_controls_variants::create($request->all());
                        }
                    $status22 = Test_otvety::where('id', $request->otvet_22)->first();
                    $status22 = $status22->status_otveta;

                    if ($status22 > 0) {
                        $test_voprosy22 = Test_voprosy::where('id', $request->vopros_22)->first();
                        $test_voprosy22 = $test_voprosy22->ball;
                    }else{$test_voprosy22 = 0;}
                }
                else{
                    $status22 = 0;
                    $test_voprosy22 = 0;
                }

                if($request->has('otvet_23')){
                    foreach($request->otvet_23 as $one23)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_23;
                            $request['otvet_id']=$one23;
                            Test_controls_variants::create($request->all());
                        }
                    $status23 = Test_otvety::where('id', $request->otvet_23)->first();
                    $status23 = $status23->status_otveta;

                    if ($status23 > 0) {
                        $test_voprosy23 = Test_voprosy::where('id', $request->vopros_23)->first();
                        $test_voprosy23 = $test_voprosy23->ball;
                    }else{$test_voprosy23 = 0;}
                }
                else{
                    $status23 = 0;
                    $test_voprosy23 = 0;
                }

                if($request->has('otvet_24')){
                    foreach($request->otvet_24 as $one24)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_24;
                            $request['otvet_id']=$one24;
                            Test_controls_variants::create($request->all());
                        }
                    $status24 = Test_otvety::where('id', $request->otvet_24)->first();
                    $status24 = $status24->status_otveta;

                    if ($status24 > 0) {
                        $test_voprosy24 = Test_voprosy::where('id', $request->vopros_24)->first();
                        $test_voprosy24 = $test_voprosy24->ball;
                    }else{$test_voprosy24 = 0;}
                }
                else{
                    $status24 = 0;
                    $test_voprosy24 = 0;
                }

                if($request->has('otvet_25')){
                    foreach($request->otvet_25 as $one25)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_25;
                            $request['otvet_id']=$one25;
                            Test_controls_variants::create($request->all());
                        }
                    $status25 = Test_otvety::where('id', $request->otvet_25)->first();
                    $status25 = $status25->status_otveta;

                    if ($status25 > 0) {
                        $test_voprosy25 = Test_voprosy::where('id', $request->vopros_25)->first();
                        $test_voprosy25 = $test_voprosy25->ball;
                    }else{$test_voprosy25 = 0;}
                }
                else{
                    $status25 = 0;
                    $test_voprosy25 = 0;
                }

                if($request->has('otvet_26')){
                    foreach($request->otvet_26 as $one26)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_26;
                            $request['otvet_id']=$one26;
                            Test_controls_variants::create($request->all());
                        }
                    $status26 = Test_otvety::where('id', $request->otvet_26)->first();
                    $status26 = $status26->status_otveta;

                    if ($status26 > 0) {
                        $test_voprosy26 = Test_voprosy::where('id', $request->vopros_26)->first();
                        $test_voprosy26 = $test_voprosy26->ball;
                    }else{$test_voprosy26 = 0;}
                }
                else{
                    $status26 = 0;
                    $test_voprosy26 = 0;
                }

                if($request->has('otvet_27')){
                    foreach($request->otvet_27 as $one27)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_27;
                            $request['otvet_id']=$one27;
                            Test_controls_variants::create($request->all());
                        }
                    $status27 = Test_otvety::where('id', $request->otvet_27)->first();
                    $status27 = $status27->status_otveta;

                    if ($status27 > 0) {
                        $test_voprosy27 = Test_voprosy::where('id', $request->vopros_27)->first();
                        $test_voprosy27 = $test_voprosy27->ball;
                    }else{$test_voprosy27 = 0;}
                }
                else{
                    $status27 = 0;
                    $test_voprosy27 = 0;
                }

                if($request->has('otvet_28')){
                    foreach($request->otvet_28 as $one28)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_28;
                            $request['otvet_id']=$one28;
                            Test_controls_variants::create($request->all());
                        }
                    $status28 = Test_otvety::where('id', $request->otvet_28)->first();
                    $status28 = $status28->status_otveta;

                    if ($status28 > 0) {
                        $test_voprosy28 = Test_voprosy::where('id', $request->vopros_28)->first();
                        $test_voprosy28 = $test_voprosy28->ball;
                    }else{$test_voprosy28 = 0;}
                }
                else{
                    $status28 = 0;
                    $test_voprosy28 = 0;
                }

                if($request->has('otvet_29')){
                    foreach($request->otvet_29 as $one29)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_29;
                            $request['otvet_id']=$one29;
                            Test_controls_variants::create($request->all());
                        }
                    $status29 = Test_otvety::where('id', $request->otvet_29)->first();
                    $status29 = $status29->status_otveta;

                    if ($status29 > 0) {
                        $test_voprosy29 = Test_voprosy::where('id', $request->vopros_29)->first();
                        $test_voprosy29 = $test_voprosy29->ball;
                    }else{$test_voprosy29 = 0;}
                }
                else{
                    $status29 = 0;
                    $test_voprosy29 = 0;
                }

                if($request->has('otvet_30')){
                    foreach($request->otvet_30 as $one30)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_30;
                            $request['otvet_id']=$one30;
                            Test_controls_variants::create($request->all());
                        }
                    $status30 = Test_otvety::where('id', $request->otvet_30)->first();
                    $status30 = $status30->status_otveta;

                    if ($status30 > 0) {
                        $test_voprosy30 = Test_voprosy::where('id', $request->vopros_30)->first();
                        $test_voprosy30 = $test_voprosy30->ball;
                    }else{$test_voprosy30 = 0;}
                }
                else{
                    $status30 = 0;
                    $test_voprosy30 = 0;
                }

                if($request->has('otvet_31')){
                    foreach($request->otvet_31 as $one31)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_31;
                            $request['otvet_id']=$one31;
                            Test_controls_variants::create($request->all());
                        }
                    $status31 = Test_otvety::where('id', $request->otvet_31)->first();
                    $status31 = $status31->status_otveta;

                    if ($status31 > 0) {
                        $test_voprosy31 = Test_voprosy::where('id', $request->vopros_31)->first();
                        $test_voprosy31 = $test_voprosy31->ball;
                    }else{$test_voprosy31 = 0;}
                }
                else{
                    $status31 = 0;
                    $test_voprosy31 = 0;
                }

                if($request->has('otvet_32')){
                    foreach($request->otvet_32 as $one32)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_32;
                            $request['otvet_id']=$one32;
                            Test_controls_variants::create($request->all());
                        }
                    $status32 = Test_otvety::where('id', $request->otvet_32)->first();
                    $status32 = $status32->status_otveta;
                
                    if ($status32 > 0) {
                        $test_voprosy32 = Test_voprosy::where('id', $request->vopros_32)->first();
                        $test_voprosy32 = $test_voprosy32->ball;
                    }else{$test_voprosy32 = 0;}
                }
                else{
                    $status32 = 0;
                    $test_voprosy32 = 0;
                }

                if($request->has('otvet_33')){
                    foreach($request->otvet_33 as $one33)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_33;
                            $request['otvet_id']=$one33;
                            Test_controls_variants::create($request->all());
                        }
                    $status33 = Test_otvety::where('id', $request->otvet_33)->first();
                    $status33 = $status33->status_otveta;
                
                    if ($status33 > 0) {
                        $test_voprosy33 = Test_voprosy::where('id', $request->vopros_33)->first();
                        $test_voprosy33 = $test_voprosy33->ball;
                    }else{$test_voprosy33 = 0;}
                }
                else{
                    $status33 = 0;
                    $test_voprosy33 = 0;
                }

                if($request->has('otvet_34')){
                    foreach($request->otvet_34 as $one34)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_34;
                            $request['otvet_id']=$one34;
                            Test_controls_variants::create($request->all());
                        }
                    $status34 = Test_otvety::where('id', $request->otvet_34)->first();
                    $status34 = $status34->status_otveta;
                
                    if ($status34 > 0) {
                        $test_voprosy34 = Test_voprosy::where('id', $request->vopros_34)->first();
                        $test_voprosy34 = $test_voprosy34->ball;
                    }else{$test_voprosy34 = 0;}
                }
                else{
                    $status34 = 0;
                    $test_voprosy34 = 0;
                }

                if($request->has('otvet_35')){
                    foreach($request->otvet_35 as $one35)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_35;
                            $request['otvet_id']=$one35;
                            Test_controls_variants::create($request->all());
                        }
                    $status35 = Test_otvety::where('id', $request->otvet_35)->first();
                    $status35 = $status35->status_otveta;
                
                    if ($status35 > 0) {
                        $test_voprosy35 = Test_voprosy::where('id', $request->vopros_35)->first();
                        $test_voprosy35 = $test_voprosy35->ball;
                    }else{$test_voprosy35 = 0;}
                }
                else{
                    $status35 = 0;
                    $test_voprosy35 = 0;
                }

                if($request->has('otvet_36')){
                    foreach($request->otvet_36 as $one36)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_36;
                            $request['otvet_id']=$one36;
                            Test_controls_variants::create($request->all());
                        }
                    $status36 = Test_otvety::where('id', $request->otvet_36)->first();
                    $status36 = $status36->status_otveta;
                
                    if ($status36 > 0) {
                        $test_voprosy36 = Test_voprosy::where('id', $request->vopros_36)->first();
                        $test_voprosy36 = $test_voprosy36->ball;
                    }else{$test_voprosy36 = 0;}
                }
                else{
                    $status36 = 0;
                    $test_voprosy36 = 0;
                }

                if($request->has('otvet_37')){
                    foreach($request->otvet_37 as $one37)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_37;
                            $request['otvet_id']=$one37;
                            Test_controls_variants::create($request->all());
                        }
                    $status37 = Test_otvety::where('id', $request->otvet_37)->first();
                    $status37 = $status37->status_otveta;
                
                    if ($status37 > 0) {
                        $test_voprosy37 = Test_voprosy::where('id', $request->vopros_37)->first();
                        $test_voprosy37 = $test_voprosy37->ball;
                    }else{$test_voprosy37 = 0;}
                }
                else{
                    $status37 = 0;
                    $test_voprosy37 = 0;
                }

                if($request->has('otvet_38')){
                    foreach($request->otvet_38 as $one38)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_38;
                            $request['otvet_id']=$one38;
                            Test_controls_variants::create($request->all());
                        }
                    $status38 = Test_otvety::where('id', $request->otvet_38)->first();
                    $status38 = $status38->status_otveta;
                
                    if ($status38 > 0) {
                        $test_voprosy38 = Test_voprosy::where('id', $request->vopros_38)->first();
                        $test_voprosy38 = $test_voprosy38->ball;
                    }else{$test_voprosy38 = 0;}
                }
                else{
                    $status38 = 0;
                    $test_voprosy38 = 0;
                }

                if($request->has('otvet_39')){
                    foreach($request->otvet_39 as $one39)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_39;
                            $request['otvet_id']=$one39;
                            Test_controls_variants::create($request->all());
                        }
                    $status39 = Test_otvety::where('id', $request->otvet_39)->first();
                    $status39 = $status39->status_otveta;
                
                    if ($status39 > 0) {
                        $test_voprosy39 = Test_voprosy::where('id', $request->vopros_39)->first();
                        $test_voprosy39 = $test_voprosy39->ball;
                    }else{$test_voprosy39 = 0;}
                }
                else{
                    $status39 = 0;
                    $test_voprosy39 = 0;
                }

                if($request->has('otvet_40')){
                    foreach($request->otvet_40 as $one40)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_40;
                            $request['otvet_id']=$one40;
                            Test_controls_variants::create($request->all());
                        }
                    $status40 = Test_otvety::where('id', $request->otvet_40)->first();
                    $status40 = $status40->status_otveta;
                
                    if ($status40 > 0) {
                        $test_voprosy40 = Test_voprosy::where('id', $request->vopros_40)->first();
                        $test_voprosy40 = $test_voprosy40->ball;
                    }else{$test_voprosy40 = 0;}
                }
                else{
                    $status40 = 0;
                    $test_voprosy40 = 0;
                }

                if($request->has('otvet_41')){
                    foreach($request->otvet_41 as $one41)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_41;
                            $request['otvet_id']=$one41;
                            Test_controls_variants::create($request->all());
                        }
                    $status41 = Test_otvety::where('id', $request->otvet_41)->first();
                    $status41 = $status41->status_otveta;
                
                    if ($status41 > 0) {
                        $test_voprosy41 = Test_voprosy::where('id', $request->vopros_41)->first();
                        $test_voprosy41 = $test_voprosy41->ball;
                    }else{$test_voprosy41 = 0;}
                }
                else{
                    $status41 = 0;
                    $test_voprosy41 = 0;
                }

                if($request->has('otvet_42')){
                    foreach($request->otvet_42 as $one42)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_42;
                            $request['otvet_id']=$one42;
                            Test_controls_variants::create($request->all());
                        }
                    $status42 = Test_otvety::where('id', $request->otvet_42)->first();
                    $status42 = $status42->status_otveta;
                
                    if ($status42 > 0) {
                        $test_voprosy42 = Test_voprosy::where('id', $request->vopros_42)->first();
                        $test_voprosy42 = $test_voprosy42->ball;
                    }else{$test_voprosy42 = 0;}
                }
                else{
                    $status42 = 0;
                    $test_voprosy42 = 0;
                }

                if($request->has('otvet_43')){
                    foreach($request->otvet_43 as $one43)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_43;
                            $request['otvet_id']=$one43;
                            Test_controls_variants::create($request->all());
                        }
                    $status43 = Test_otvety::where('id', $request->otvet_43)->first();
                    $status43 = $status43->status_otveta;
                
                    if ($status43 > 0) {
                        $test_voprosy43 = Test_voprosy::where('id', $request->vopros_43)->first();
                        $test_voprosy43 = $test_voprosy43->ball;
                    }else{$test_voprosy43 = 0;}
                }
                else{
                    $status43 = 0;
                    $test_voprosy43 = 0;
                }

                if($request->has('otvet_44')){
                    foreach($request->otvet_44 as $one44)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_44;
                            $request['otvet_id']=$one44;
                            Test_controls_variants::create($request->all());
                        }
                    $status44 = Test_otvety::where('id', $request->otvet_44)->first();
                    $status44 = $status44->status_otveta;
                
                    if ($status44 > 0) {
                        $test_voprosy44 = Test_voprosy::where('id', $request->vopros_44)->first();
                        $test_voprosy44 = $test_voprosy44->ball;
                    }else{$test_voprosy44 = 0;}
                }
                else{
                    $status44 = 0;
                    $test_voprosy44 = 0;
                }

                if($request->has('otvet_45')){
                    foreach($request->otvet_45 as $one45)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_45;
                            $request['otvet_id']=$one45;
                            Test_controls_variants::create($request->all());
                        }
                    $status45 = Test_otvety::where('id', $request->otvet_45)->first();
                    $status45 = $status45->status_otveta;
                
                    if ($status45 > 0) {
                        $test_voprosy45 = Test_voprosy::where('id', $request->vopros_45)->first();
                        $test_voprosy45 = $test_voprosy45->ball;
                    }else{$test_voprosy45 = 0;}
                }
                else{
                    $status45 = 0;
                    $test_voprosy45 = 0;
                }

                if($request->has('otvet_46')){
                    foreach($request->otvet_46 as $one46)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_46;
                            $request['otvet_id']=$one46;
                            Test_controls_variants::create($request->all());
                        }
                    $status46 = Test_otvety::where('id', $request->otvet_46)->first();
                    $status46 = $status46->status_otveta;
                
                    if ($status46 > 0) {
                        $test_voprosy46 = Test_voprosy::where('id', $request->vopros_46)->first();
                        $test_voprosy46 = $test_voprosy46->ball;
                    }else{$test_voprosy46 = 0;}
                }
                else{
                    $status46 = 0;
                    $test_voprosy46 = 0;
                }

                if($request->has('otvet_47')){
                    foreach($request->otvet_47 as $one47)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_47;
                            $request['otvet_id']=$one47;
                            Test_controls_variants::create($request->all());
                        }
                    $status47 = Test_otvety::where('id', $request->otvet_47)->first();
                    $status47 = $status47->status_otveta;
                
                    if ($status47 > 0) {
                        $test_voprosy47 = Test_voprosy::where('id', $request->vopros_47)->first();
                        $test_voprosy47 = $test_voprosy47->ball;
                    }else{$test_voprosy47 = 0;}
                }
                else{
                    $status47 = 0;
                    $test_voprosy47 = 0;
                }

                if($request->has('otvet_48')){
                    foreach($request->otvet_48 as $one48)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_48;
                            $request['otvet_id']=$one48;
                            Test_controls_variants::create($request->all());
                        }
                    $status48 = Test_otvety::where('id', $request->otvet_48)->first();
                    $status48 = $status48->status_otveta;
                
                    if ($status48 > 0) {
                        $test_voprosy48 = Test_voprosy::where('id', $request->vopros_48)->first();
                        $test_voprosy48 = $test_voprosy48->ball;
                    }else{$test_voprosy48 = 0;}
                }
                else{
                    $status48 = 0;
                    $test_voprosy48 = 0;
                }

                if($request->has('otvet_49')){
                    foreach($request->otvet_49 as $one49)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_49;
                            $request['otvet_id']=$one49;
                            Test_controls_variants::create($request->all());
                        }
                    $status49 = Test_otvety::where('id', $request->otvet_49)->first();
                    $status49 = $status49->status_otveta;
                
                    if ($status49 > 0) {
                        $test_voprosy49 = Test_voprosy::where('id', $request->vopros_49)->first();
                        $test_voprosy49 = $test_voprosy49->ball;
                    }else{$test_voprosy49 = 0;}
                }
                else{
                    $status49 = 0;
                    $test_voprosy49 = 0;
                }

                if($request->has('otvet_50')){
                    foreach($request->otvet_50 as $one50)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_50;
                            $request['otvet_id']=$one50;
                            Test_controls_variants::create($request->all());
                        }
                    $status50 = Test_otvety::where('id', $request->otvet_50)->first();
                    $status50 = $status50->status_otveta;
                
                    if ($status50 > 0) {
                        $test_voprosy50 = Test_voprosy::where('id', $request->vopros_50)->first();
                        $test_voprosy50 = $test_voprosy50->ball;
                    }else{$test_voprosy50 = 0;}
                }
                else{
                    $status50 = 0;
                    $test_voprosy50 = 0;
                }

                if($request->has('otvet_51')){
                    foreach($request->otvet_51 as $one51)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_51;
                            $request['otvet_id']=$one51;
                            Test_controls_variants::create($request->all());
                        }
                    $status51 = Test_otvety::where('id', $request->otvet_51)->first();
                    $status51 = $status51->status_otveta;
                
                    if ($status51 > 0) {
                        $test_voprosy51 = Test_voprosy::where('id', $request->vopros_51)->first();
                        $test_voprosy51 = $test_voprosy51->ball;
                    }else{$test_voprosy51 = 0;}
                }
                else{
                    $status51 = 0;
                    $test_voprosy51 = 0;
                }

                if($request->has('otvet_52')){
                    foreach($request->otvet_52 as $one52)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_52;
                            $request['otvet_id']=$one52;
                            Test_controls_variants::create($request->all());
                        }
                    $status52 = Test_otvety::where('id', $request->otvet_52)->first();
                    $status52 = $status52->status_otveta;
                
                    if ($status52 > 0) {
                        $test_voprosy52 = Test_voprosy::where('id', $request->vopros_52)->first();
                        $test_voprosy52 = $test_voprosy52->ball;
                    }else{$test_voprosy52 = 0;}
                }
                else{
                    $status52 = 0;
                    $test_voprosy52 = 0;
                }

                if($request->has('otvet_53')){
                    foreach($request->otvet_53 as $one53)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_53;
                            $request['otvet_id']=$one53;
                            Test_controls_variants::create($request->all());
                        }
                    $status53 = Test_otvety::where('id', $request->otvet_53)->first();
                    $status53 = $status53->status_otveta;
                
                    if ($status53 > 0) {
                        $test_voprosy53 = Test_voprosy::where('id', $request->vopros_53)->first();
                        $test_voprosy53 = $test_voprosy53->ball;
                    }else{$test_voprosy53 = 0;}
                }
                else{
                    $status53 = 0;
                    $test_voprosy53 = 0;
                }

                if($request->has('otvet_54')){
                    foreach($request->otvet_54 as $one54)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_54;
                            $request['otvet_id']=$one54;
                            Test_controls_variants::create($request->all());
                        }
                    $status54 = Test_otvety::where('id', $request->otvet_54)->first();
                    $status54 = $status54->status_otveta;
                
                    if ($status54 > 0) {
                        $test_voprosy54 = Test_voprosy::where('id', $request->vopros_54)->first();
                        $test_voprosy54 = $test_voprosy54->ball;
                    }else{$test_voprosy54 = 0;}
                }
                else{
                    $status54 = 0;
                    $test_voprosy54 = 0;
                }

                if($request->has('otvet_55')){
                    foreach($request->otvet_55 as $one55)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_55;
                            $request['otvet_id']=$one55;
                            Test_controls_variants::create($request->all());
                        }
                    $status55 = Test_otvety::where('id', $request->otvet_55)->first();
                    $status55 = $status55->status_otveta;
                
                    if ($status55 > 0) {
                        $test_voprosy55 = Test_voprosy::where('id', $request->vopros_55)->first();
                        $test_voprosy55 = $test_voprosy55->ball;
                    }else{$test_voprosy55 = 0;}
                }
                else{
                    $status55 = 0;
                    $test_voprosy55 = 0;
                }

                if($request->has('otvet_56')){
                    foreach($request->otvet_56 as $one56)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_56;
                            $request['otvet_id']=$one56;
                            Test_controls_variants::create($request->all());
                        }
                    $status56 = Test_otvety::where('id', $request->otvet_56)->first();
                    $status56 = $status56->status_otveta;
                
                    if ($status56 > 0) {
                        $test_voprosy56 = Test_voprosy::where('id', $request->vopros_56)->first();
                        $test_voprosy56 = $test_voprosy56->ball;
                    }else{$test_voprosy56 = 0;}
                }
                else{
                    $status56 = 0;
                    $test_voprosy56 = 0;
                }

                if($request->has('otvet_57')){
                    foreach($request->otvet_57 as $one57)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_57;
                            $request['otvet_id']=$one57;
                            Test_controls_variants::create($request->all());
                        }
                    $status57 = Test_otvety::where('id', $request->otvet_57)->first();
                    $status57 = $status57->status_otveta;
                
                    if ($status57 > 0) {
                        $test_voprosy57 = Test_voprosy::where('id', $request->vopros_57)->first();
                        $test_voprosy57 = $test_voprosy57->ball;
                    }else{$test_voprosy57 = 0;}
                }
                else{
                    $status57 = 0;
                    $test_voprosy57 = 0;
                }

                if($request->has('otvet_58')){
                    foreach($request->otvet_58 as $one58)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_58;
                            $request['otvet_id']=$one58;
                            Test_controls_variants::create($request->all());
                        }
                    $status58 = Test_otvety::where('id', $request->otvet_58)->first();
                    $status58 = $status58->status_otveta;
                
                    if ($status58 > 0) {
                        $test_voprosy58 = Test_voprosy::where('id', $request->vopros_58)->first();
                        $test_voprosy58 = $test_voprosy58->ball;
                    }else{$test_voprosy58 = 0;}
                }
                else{
                    $status58 = 0;
                    $test_voprosy58 = 0;
                }

                if($request->has('otvet_59')){
                    foreach($request->otvet_59 as $one59)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_59;
                            $request['otvet_id']=$one59;
                            Test_controls_variants::create($request->all());
                        }
                    $status59 = Test_otvety::where('id', $request->otvet_59)->first();
                    $status59 = $status59->status_otveta;
                
                    if ($status59 > 0) {
                        $test_voprosy59 = Test_voprosy::where('id', $request->vopros_59)->first();
                        $test_voprosy59 = $test_voprosy59->ball;
                    }else{$test_voprosy59 = 0;}
                }
                else{
                    $status59 = 0;
                    $test_voprosy59 = 0;
                }

                if($request->has('otvet_60')){
                    foreach($request->otvet_60 as $one60)
                        {
                            $request['test_controls_id']=$test_controls_id;
                            $request['vopros_id']=$request->vopros_60;
                            $request['otvet_id']=$one60;
                            Test_controls_variants::create($request->all());
                        }
                    $status60 = Test_otvety::where('id', $request->otvet_60)->first();
                    $status60 = $status60->status_otveta;
                
                    if ($status60 > 0) {
                        $test_voprosy60 = Test_voprosy::where('id', $request->vopros_60)->first();
                        $test_voprosy60 = $test_voprosy60->ball;
                    }else{$test_voprosy60 = 0;}
                }
                else{
                    $status60 = 0;
                    $test_voprosy60 = 0;
                }

                $kol_pravilnyh_otvetov = $status1 + $status2 + $status3 + $status4 + $status5 + $status6 + $status7 + $status8 + $status9 + $status10 + $status11 + $status12 + $status13 + $status14 + $status15 + $status16 + $status17 + $status18 + $status19 + $status20 + $status21 + $status22 + $status23 + $status24 + $status25 + $status26 + $status27 + $status28 + $status29 + $status30 + $status31 + $status32 + $status33 + $status34 + $status35 + $status36 + $status37 + $status38 + $status39 + $status40 + $status41 + $status42 + $status43 + $status44 + $status45 + $status46 + $status47 + $status48 + $status49 + $status50 + $status51 + $status52 + $status53 + $status54 + $status55 + $status56 + $status57 + $status58 + $status59 + $status60;
                $kol_ballov_usera = $test_voprosy1 + $test_voprosy2 + $test_voprosy3 + $test_voprosy4 + $test_voprosy5 + $test_voprosy6 + $test_voprosy7 + $test_voprosy8 + $test_voprosy9 + $test_voprosy10 + $test_voprosy11 + $test_voprosy12 + $test_voprosy13 + $test_voprosy14 + $test_voprosy15 + $test_voprosy16 + $test_voprosy17 + $test_voprosy18 + $test_voprosy19 + $test_voprosy20 + $test_voprosy21 + $test_voprosy22 + $test_voprosy23 + $test_voprosy24 + $test_voprosy25 + $test_voprosy26 + $test_voprosy27 + $test_voprosy28 + $test_voprosy29 + $test_voprosy30 + $test_voprosy31 + $test_voprosy32 + $test_voprosy33 + $test_voprosy34 + $test_voprosy35 + $test_voprosy36 + $test_voprosy37 + $test_voprosy38 + $test_voprosy39 + $test_voprosy40 + $test_voprosy41 + $test_voprosy42 + $test_voprosy43 + $test_voprosy44 + $test_voprosy45 + $test_voprosy46 + $test_voprosy47 + $test_voprosy48 + $test_voprosy49 + $test_voprosy50 + $test_voprosy51 + $test_voprosy52 + $test_voprosy53 + $test_voprosy54 + $test_voprosy55 + $test_voprosy56 + $test_voprosy57 + $test_voprosy58 + $test_voprosy59 + $test_voprosy60;

                Test_controls::where('id', $test_controls_id)->update([
                    'kol_voprosov' => $tests->test_voprosy_count,
                    'test_summa_ballov' => $summa_ballov,
                    'kol_pravilnyh_otvetov' => $kol_pravilnyh_otvetov,
                    'kol_ballov_usera' => $kol_ballov_usera,
                    'time' => 0,
                ]);
                return redirect()->route('result_test_one', [$test_id, $test_controls_id])->withSuccess('Сиздин жыйынтык');
            }else{
                return redirect()->route('opentest', [$test_id, $test_controls_id])->withSuccess('Убакыт бүттү! Жетишпей калдыңыз');
            }
        }
    }


    public function ort_result_test_one($subdomain, $id, $test_controls_id, $for_action)
    {
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $test_controls_one = Test_controls::where('id', $test_controls_id)->where('user_id', \Auth::user()->id)->first();
        $test_controls_variants = Test_controls_variants::where('test_controls_id', $test_controls_one->id)->get();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_voprosy = Test_voprosy::where('test_id', $id)->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();
        $test_podcategory = Test_podcategory::where('id', $tests->test_podcategory_id)->first();
        $test_category = Test_category::where('id', $tests->test_category_id)->first();

        return view('ort.testy_play_resultat', [
            'tests' => $tests,
            'test_controls_one' => $test_controls_one,
            'test_controls_variants' => $test_controls_variants,
            'summa_ballov' => $summa_ballov,
            'test_voprosy' => $test_voprosy,
            'test_otvety' => $test_otvety,
            'test_podcategory' => $test_podcategory,
            'test_category' => $test_category,
            'for_action' => $for_action,
        ]);
        
    }

    public function result_test_one($id, $test_controls_id)
    {
        $tests = Test::where('id', $id)->withCount('test_voprosy')->first();
        $test_controls_one = Test_controls::where('id', $test_controls_id)->where('user_id', \Auth::user()->id)->first();
        $test_controls_variants = Test_controls_variants::where('test_controls_id', $test_controls_one->id)->get();
        $summa_ballov = Test_voprosy::where('test_id', $id)->sum('ball');
        $test_voprosy = Test_voprosy::where('test_id', $id)->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();

        return view('pajes.testy_play_resultat', [
            'tests' => $tests,
            'test_controls_one' => $test_controls_one,
            'test_controls_variants' => $test_controls_variants,
            'summa_ballov' => $summa_ballov,
            'test_voprosy' => $test_voprosy,
            'test_otvety' => $test_otvety,
        ]);
        
    }

    public function moderator_tests_index($for_action)
    {
        $tests = Test::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->withCount('test_voprosy', 'tests_kupit')->orderBy('created_at', 'desc')->get();
        $kol = Test::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->count();

        $gods = Gods::orderBy('god')->get();
        $mounths = Mounths::orderBy('mounth')->get();
        $days = Days::orderBy('day')->get();
        $hours = Hours::orderBy('hour')->get();
        $minutes = Minutes::orderBy('minute')->get();
      
       return view('moderator/testy_ort', [
        'tests' => $tests,
        'kol' => $kol,
        'gods' => $gods,
        'mounths' => $mounths,
        'days' => $days,
        'hours' => $hours,
        'minutes' => $minutes,
        'for_action' => $for_action
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


    public function moderator_tests_create($for_action)
    {
        $test_categories = Test_category::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
        $test_podcategories = Test_podcategory::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
        $partnerka = Vidy_partnerkas::get();

        return view('moderator/testy_create', [
            'test_categories' => $test_categories,
            'test_podcategories' => $test_podcategories,
            'languages' => $languages,
            'partnerka' => $partnerka,
            'for_action' => $for_action
        ]);
    }

    public function moderator_kurs_urok_tests_create($kurs_id, $urok_id)
    {
        $urok = Uroky::where('id', $urok_id)->first();
        $for_action = $urok_id + 100000;
        $podcategory = Podcategory::where('id', $kurs_id)->first();

        return view('moderator/urok_testy_create', [
            'urok' => $urok,
            'for_action' => $for_action,
            'podcategory' => $podcategory,
        ]);
    }

    public function moderator_tests_findProductName($id)
    {
        $states = Test_podcategory::where('test_category_id',$id)->pluck("title", "id");
        return json_encode($states);

    }

    public function moderator_tests_store(Request $request, $for_action)
    {
        /**$request->validate([
            'title' => 'required|string',
            'opisanie' => 'required|string',
            'price' => 'numeric',
            'test_category_id' => 'required|numeric',
            'test_podcategory_id' => 'required|numeric',
            'language' => 'required|numeric',
            'rebate_imag' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
            'popytki' => 'numeric',
            'prodoljitelnost' => 'numeric',
        ]);*/
        $ratio = 16/9;
        $user_id = \Auth::user()->id;
        if($request->hasFile('rebate_imag')){
            $file0=$request->file('rebate_imag');
            $file_extension0 = $file0->getClientOriginalExtension();
            $destinationPath = 'storage/testy/images/thumbnail/';
            $ogImage = Image::make($file0);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().'.'.$file_extension0;            
            $thImage->save($destinationPath . $thImagename);
            }else{
                $thImagename = NULL;
            }

            

            $test = new Test();
            $test->user_id = \Auth::user()->id;
            if($request->has('title')) {$test->title = $request->title;}else{$test->title = NULL;}
            if($request->has('opisanie')) {$test->opisanie = $request->opisanie;}else{$test->opisanie = NULL;}
            if($request->has('test_category_id')) {$test->test_category_id = $request->test_category_id;}else{$test->test_category_id = NULL;}
            if($request->has('test_podcategory_id')) {$test->test_podcategory_id = $request->test_podcategory_id;}else{$test->test_podcategory_id = NULL;}
            if($request->has('language')) {$test->language = $request->language;}else{$test->language = NULL;}
            if($request->has('price')) {$test->price = $request->price * 100;}else{$test->price = 0;}
            $test->img = $thImagename;
            $test->kol_popytkov = $request->popytki;
            $test->time = $request->prodoljitelnost * 60;
            $test->pokaz_otvetov = 0;
            if ($for_action > 100000) {$test->dop_category = NULL;}else{$test->dop_category = $for_action;}
            $test->save();

            if($request->has('vopros_testa1'))
            {
                $request->validate(['vopros_testa1' => 'string','ball1' => 'numeric',]);
                if($request->hasFile('rebate_image1')){
                    $request->validate(['rebate_image1' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file1=$request->file('rebate_image1');
                    $file_extension1 = $file1->getClientOriginalExtension();
                    $fileName1=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension1;
                    $file1->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName1);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa1;
                if($request->hasFile('rebate_image1')){$test_vopros->img_voprosa = $fileName1;}
                $test_vopros->ball = $request->ball1;
                $test_vopros->save();

                $radio1 = $request->variant_radio1;
                $text1 = $request->variant_text1;
                foreach($text1 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text1[$key];
                    $request['status_otveta']=$radio1[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image1')){
                    $request->validate(['rebate_image1' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file1=$request->file('rebate_image1');
                    $file_extension1 = $file1->getClientOriginalExtension();
                    $fileName1=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension1;
                    $file1->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName1);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName1;
                    $test_vopros->ball = $request->ball1;
                    $test_vopros->save();

                    $radio1 = $request->variant_radio1;
                    $text1 = $request->variant_text1;
                    foreach($text1 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text1[$key];
                        $request['status_otveta']=$radio1[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa2'))
            {
                $request->validate(['vopros_testa2' => 'string','ball2' => 'numeric',]);
                if($request->hasFile('rebate_image2')){
                    $request->validate(['rebate_image2' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file2=$request->file('rebate_image2');
                    $file_extension2 = $file2->getClientOriginalExtension();
                    $fileName2=$user_id.'2'.uniqid().rand(1, 1000).time().'.'. $file_extension2;
                    $file2->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName2);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa2;
                if($request->hasFile('rebate_image2')){$test_vopros->img_voprosa = $fileName2;}
                $test_vopros->ball = $request->ball2;
                $test_vopros->save();

                $radio2 = $request->variant_radio2;
                $text2 = $request->variant_text2;
                foreach($text2 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text2[$key];
                    $request['status_otveta']=$radio2[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image2')){
                    $request->validate(['rebate_image2' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file2=$request->file('rebate_image2');
                    $file_extension2 = $file2->getClientOriginalExtension();
                    $fileName2=$user_id.'2'.uniqid().rand(1, 1000).time().'.'. $file_extension2;
                    $file2->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName2);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName2;
                    $test_vopros->ball = $request->ball2;
                    $test_vopros->save();

                    $radio2 = $request->variant_radio2;
                    $text2 = $request->variant_text2;
                    foreach($text2 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text2[$key];
                        $request['status_otveta']=$radio2[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa3'))
            {
                $request->validate(['vopros_testa3' => 'string','ball3' => 'numeric',]);
                if($request->hasFile('rebate_image3')){
                    $request->validate(['rebate_image3' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file3=$request->file('rebate_image3');
                    $file_extension3 = $file3->getClientOriginalExtension();
                    $fileName3=$user_id.'3'.uniqid().rand(1, 1000).time().'.'. $file_extension3;
                    $file3->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName3);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa3;
                if($request->hasFile('rebate_image3')){$test_vopros->img_voprosa = $fileName3;}
                $test_vopros->ball = $request->ball3;
                $test_vopros->save();

                $radio3 = $request->variant_radio3;
                $text3 = $request->variant_text3;
                foreach($text3 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text3[$key];
                    $request['status_otveta']=$radio3[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image3')){
                    $request->validate(['rebate_image3' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file3=$request->file('rebate_image3');
                    $file_extension3 = $file3->getClientOriginalExtension();
                    $fileName3=$user_id.'3'.uniqid().rand(1, 1000).time().'.'. $file_extension3;
                    $file3->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName3);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName3;
                    $test_vopros->ball = $request->ball3;
                    $test_vopros->save();

                    $radio3 = $request->variant_radio3;
                    $text3 = $request->variant_text3;
                    foreach($text3 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text3[$key];
                        $request['status_otveta']=$radio3[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa4'))
            {
                $request->validate(['vopros_testa4' => 'string','ball4' => 'numeric',]);
                if($request->hasFile('rebate_image4')){
                    $request->validate(['rebate_image4' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file4=$request->file('rebate_image4');
                    $file_extension4 = $file4->getClientOriginalExtension();
                    $fileName4=$user_id.'4'.uniqid().rand(1, 1000).time().'.'. $file_extension4;
                    $file4->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName4);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa4;
                if($request->hasFile('rebate_image4')){$test_vopros->img_voprosa = $fileName4;}
                $test_vopros->ball = $request->ball4;
                $test_vopros->save();

                $radio4 = $request->variant_radio4;
                $text4 = $request->variant_text4;
                foreach($text4 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text4[$key];
                    $request['status_otveta']=$radio4[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image4')){
                    $request->validate(['rebate_image4' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file4=$request->file('rebate_image4');
                    $file_extension4 = $file4->getClientOriginalExtension();
                    $fileName4=$user_id.'4'.uniqid().rand(1, 1000).time().'.'. $file_extension4;
                    $file4->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName4);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName4;
                    $test_vopros->ball = $request->ball4;
                    $test_vopros->save();

                    $radio4 = $request->variant_radio4;
                    $text4 = $request->variant_text4;
                    foreach($text4 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text4[$key];
                        $request['status_otveta']=$radio4[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa5'))
            {
                $request->validate(['vopros_testa5' => 'string','ball5' => 'numeric',]);
                if($request->hasFile('rebate_image5')){
                    $request->validate(['rebate_image5' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file5=$request->file('rebate_image5');
                    $file_extension5 = $file5->getClientOriginalExtension();
                    $fileName5=$user_id.'5'.uniqid().rand(1, 1000).time().'.'. $file_extension5;
                    $file5->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName5);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa5;
                if($request->hasFile('rebate_image5')){$test_vopros->img_voprosa = $fileName5;}
                $test_vopros->ball = $request->ball5;
                $test_vopros->save();

                $radio5 = $request->variant_radio5;
                $text5 = $request->variant_text5;
                foreach($text5 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text5[$key];
                    $request['status_otveta']=$radio5[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image5')){
                    $request->validate(['rebate_image5' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file5=$request->file('rebate_image5');
                    $file_extension5 = $file5->getClientOriginalExtension();
                    $fileName5=$user_id.'5'.uniqid().rand(1, 1000).time().'.'. $file_extension5;
                    $file5->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName5);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName5;
                    $test_vopros->ball = $request->ball5;
                    $test_vopros->save();

                    $radio5 = $request->variant_radio5;
                    $text5 = $request->variant_text5;
                    foreach($text5 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text5[$key];
                        $request['status_otveta']=$radio5[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa6'))
            {
                $request->validate(['vopros_testa6' => 'string','ball6' => 'numeric',]);
                if($request->hasFile('rebate_image6')){
                    $request->validate(['rebate_image6' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file6=$request->file('rebate_image6');
                    $file_extension6 = $file6->getClientOriginalExtension();
                    $fileName6=$user_id.'6'.uniqid().rand(1, 1000).time().'.'. $file_extension6;
                    $file6->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName6);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa6;
                if($request->hasFile('rebate_image6')){$test_vopros->img_voprosa = $fileName6;}
                $test_vopros->ball = $request->ball6;
                $test_vopros->save();

                $radio6 = $request->variant_radio6;
                $text6 = $request->variant_text6;
                foreach($text6 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text6[$key];
                    $request['status_otveta']=$radio6[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image6')){
                    $request->validate(['rebate_image6' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file6=$request->file('rebate_image6');
                    $file_extension6 = $file6->getClientOriginalExtension();
                    $fileName6=$user_id.'6'.uniqid().rand(1, 1000).time().'.'. $file_extension6;
                    $file6->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName6);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName6;
                    $test_vopros->ball = $request->ball6;
                    $test_vopros->save();

                    $radio6 = $request->variant_radio6;
                    $text6 = $request->variant_text6;
                    foreach($text6 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text6[$key];
                        $request['status_otveta']=$radio6[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa7'))
            {
                $request->validate(['vopros_testa7' => 'string','ball7' => 'numeric',]);
                if($request->hasFile('rebate_image7')){
                    $request->validate(['rebate_image7' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file7=$request->file('rebate_image7');
                    $file_extension7 = $file7->getClientOriginalExtension();
                    $fileName7=$user_id.'7'.uniqid().rand(1, 1000).time().'.'. $file_extension7;
                    $file7->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName7);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa7;
                if($request->hasFile('rebate_image7')){$test_vopros->img_voprosa = $fileName7;}
                $test_vopros->ball = $request->ball7;
                $test_vopros->save();

                $radio7 = $request->variant_radio7;
                $text7 = $request->variant_text7;
                foreach($text7 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text7[$key];
                    $request['status_otveta']=$radio7[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image7')){
                    $request->validate(['rebate_image7' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file7=$request->file('rebate_image7');
                    $file_extension7 = $file7->getClientOriginalExtension();
                    $fileName7=$user_id.'7'.uniqid().rand(1, 1000).time().'.'. $file_extension7;
                    $file7->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName7);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName7;
                    $test_vopros->ball = $request->ball7;
                    $test_vopros->save();

                    $radio7 = $request->variant_radio7;
                    $text7 = $request->variant_text7;
                    foreach($text7 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text7[$key];
                        $request['status_otveta']=$radio7[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa8'))
            {
                $request->validate(['vopros_testa8' => 'string','ball8' => 'numeric',]);
                if($request->hasFile('rebate_image8')){
                    $request->validate(['rebate_image8' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file8=$request->file('rebate_image8');
                    $file_extension8 = $file8->getClientOriginalExtension();
                    $fileName8=$user_id.'8'.uniqid().rand(1, 1000).time().'.'. $file_extension8;
                    $file8->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName8);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa8;
                if($request->hasFile('rebate_image8')){$test_vopros->img_voprosa = $fileName8;}
                $test_vopros->ball = $request->ball8;
                $test_vopros->save();

                $radio8 = $request->variant_radio8;
                $text8 = $request->variant_text8;
                foreach($text8 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text8[$key];
                    $request['status_otveta']=$radio8[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image8')){
                    $request->validate(['rebate_image8' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file8=$request->file('rebate_image8');
                    $file_extension8 = $file8->getClientOriginalExtension();
                    $fileName8=$user_id.'8'.uniqid().rand(1, 1000).time().'.'. $file_extension8;
                    $file8->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName8);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName8;
                    $test_vopros->ball = $request->ball8;
                    $test_vopros->save();

                    $radio8 = $request->variant_radio8;
                    $text8 = $request->variant_text8;
                    foreach($text8 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text8[$key];
                        $request['status_otveta']=$radio8[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa9'))
            {
                $request->validate(['vopros_testa9' => 'string','ball2' => 'numeric',]);
                if($request->hasFile('rebate_image9')){
                    $request->validate(['rebate_image9' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file9=$request->file('rebate_image9');
                    $file_extension9 = $file2->getClientOriginalExtension();
                    $fileName9=$user_id.'9'.uniqid().rand(1, 1000).time().'.'. $file_extension9;
                    $file9->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName9);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa9;
                if($request->hasFile('rebate_image9')){$test_vopros->img_voprosa = $fileName9;}
                $test_vopros->ball = $request->ball9;
                $test_vopros->save();

                $radio9 = $request->variant_radio9;
                $text9 = $request->variant_text9;
                foreach($text9 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text9[$key];
                    $request['status_otveta']=$radio9[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image9')){
                    $request->validate(['rebate_image9' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file9=$request->file('rebate_image9');
                    $file_extension9 = $file9->getClientOriginalExtension();
                    $fileName9=$user_id.'9'.uniqid().rand(1, 1000).time().'.'. $file_extension9;
                    $file9->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName9);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName9;
                    $test_vopros->ball = $request->ball9;
                    $test_vopros->save();

                    $radio9 = $request->variant_radio9;
                    $text9 = $request->variant_text9;
                    foreach($text9 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text9[$key];
                        $request['status_otveta']=$radio9[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa10'))
            {
                $request->validate(['vopros_testa10' => 'string','ball10' => 'numeric',]);
                if($request->hasFile('rebate_image10')){
                    $request->validate(['rebate_image10' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file10=$request->file('rebate_image10');
                    $file_extension10 = $file10->getClientOriginalExtension();
                    $fileName10=$user_id.'10'.uniqid().rand(1, 1000).time().'.'. $file_extension10;
                    $file10->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName10);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa10;
                if($request->hasFile('rebate_image10')){$test_vopros->img_voprosa = $fileName10;}
                $test_vopros->ball = $request->ball10;
                $test_vopros->save();

                $radio10 = $request->variant_radio10;
                $text10 = $request->variant_text10;
                foreach($text10 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text10[$key];
                    $request['status_otveta']=$radio10[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image10')){
                    $request->validate(['rebate_image10' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file10=$request->file('rebate_image2');
                    $file_extension10 = $file10->getClientOriginalExtension();
                    $fileName10=$user_id.'10'.uniqid().rand(1, 1000).time().'.'. $file_extension10;
                    $file10->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName10);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName10;
                    $test_vopros->ball = $request->ball10;
                    $test_vopros->save();

                    $radio10 = $request->variant_radio10;
                    $text10 = $request->variant_text10;
                    foreach($text10 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text10[$key];
                        $request['status_otveta']=$radio10[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa11'))
            {
                $request->validate(['vopros_testa11' => 'string','ball11' => 'numeric',]);
                if($request->hasFile('rebate_image11')){
                    $request->validate(['rebate_image11' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file11=$request->file('rebate_image11');
                    $file_extension11 = $file11->getClientOriginalExtension();
                    $fileName11=$user_id.'11'.uniqid().rand(1, 1000).time().'.'. $file_extension11;
                    $file11->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName11);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa11;
                if($request->hasFile('rebate_image11')){$test_vopros->img_voprosa = $fileName11;}
                $test_vopros->ball = $request->ball11;
                $test_vopros->save();

                $radio11 = $request->variant_radio11;
                $text11 = $request->variant_text11;
                foreach($text11 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text11[$key];
                    $request['status_otveta']=$radio11[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image11')){
                    $request->validate(['rebate_image11' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file11=$request->file('rebate_image1');
                    $file_extension11 = $file11->getClientOriginalExtension();
                    $fileName11=$user_id.'11'.uniqid().rand(1, 1000).time().'.'. $file_extension11;
                    $file11->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName11);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName11;
                    $test_vopros->ball = $request->ball11;
                    $test_vopros->save();

                    $radio11 = $request->variant_radio11;
                    $text11 = $request->variant_text11;
                    foreach($text1 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text11[$key];
                        $request['status_otveta']=$radio11[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }


            if($request->has('vopros_testa12'))
            {
                $request->validate(['vopros_testa12' => 'string','ball1' => 'numeric',]);
                if($request->hasFile('rebate_image12')){
                    $request->validate(['rebate_image12' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file12=$request->file('rebate_image12');
                    $file_extension12 = $file12->getClientOriginalExtension();
                    $fileName12=$user_id.'12'.uniqid().rand(1, 1000).time().'.'. $file_extension12;
                    $file12->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName12);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa12;
                if($request->hasFile('rebate_image12')){$test_vopros->img_voprosa = $fileName12;}
                $test_vopros->ball = $request->ball12;
                $test_vopros->save();

                $radio12 = $request->variant_radio12;
                $text12 = $request->variant_text12;
                foreach($text12 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text12[$key];
                    $request['status_otveta']=$radio12[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image12')){
                    $request->validate(['rebate_image12' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file12=$request->file('rebate_image12');
                    $file_extension12 = $file12->getClientOriginalExtension();
                    $fileName12=$user_id.'12'.uniqid().rand(1, 1000).time().'.'. $file_extension12;
                    $file12->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName12);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName12;
                    $test_vopros->ball = $request->ball12;
                    $test_vopros->save();

                    $radio12 = $request->variant_radio12;
                    $text12 = $request->variant_text12;
                    foreach($text12 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text12[$key];
                        $request['status_otveta']=$radio12[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa14'))
            {
                $request->validate(['vopros_testa14' => 'string','ball14' => 'numeric',]);
                if($request->hasFile('rebate_image1')){
                    $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file14=$request->file('rebate_image14');
                    $file_extension14 = $file14->getClientOriginalExtension();
                    $fileName14=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension14;
                    $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa14;
                if($request->hasFile('rebate_image14')){$test_vopros->img_voprosa = $fileName14;}
                $test_vopros->ball = $request->ball14;
                $test_vopros->save();

                $radio14 = $request->variant_radio14;
                $text14 = $request->variant_text14;
                foreach($text14 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text14[$key];
                    $request['status_otveta']=$radio14[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image14')){
                    $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file14=$request->file('rebate_image14');
                    $file_extension14 = $file14->getClientOriginalExtension();
                    $fileName14=$user_id.'14'.uniqid().rand(1, 1000).time().'.'. $file_extension14;
                    $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName14;
                    $test_vopros->ball = $request->ball14;
                    $test_vopros->save();

                    $radio14 = $request->variant_radio14;
                    $text14 = $request->variant_text14;
                    foreach($text14 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text14[$key];
                        $request['status_otveta']=$radio14[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa14'))
            {
                $request->validate(['vopros_testa14' => 'string','ball14' => 'numeric',]);
                if($request->hasFile('rebate_image14')){
                    $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file14=$request->file('rebate_image14');
                    $file_extension14 = $file14->getClientOriginalExtension();
                    $fileName14=$user_id.'14'.uniqid().rand(1, 1000).time().'.'. $file_extension14;
                    $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa14;
                if($request->hasFile('rebate_image14')){$test_vopros->img_voprosa = $fileName14;}
                $test_vopros->ball = $request->ball14;
                $test_vopros->save();

                $radio14 = $request->variant_radio14;
                $text14 = $request->variant_text14;
                foreach($text14 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text14[$key];
                    $request['status_otveta']=$radio14[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image14')){
                    $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file14=$request->file('rebate_image14');
                    $file_extension14 = $file14->getClientOriginalExtension();
                    $fileName14=$user_id.'14'.uniqid().rand(1, 1000).time().'.'. $file_extension14;
                    $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName14;
                    $test_vopros->ball = $request->ball14;
                    $test_vopros->save();

                    $radio14 = $request->variant_radio14;
                    $text14 = $request->variant_text14;
                    foreach($text14 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text14[$key];
                        $request['status_otveta']=$radio14[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }


            if($request->has('vopros_testa15'))
            {
                $request->validate(['vopros_testa15' => 'string','ball15' => 'numeric',]);
                if($request->hasFile('rebate_image15')){
                    $request->validate(['rebate_image15' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file15=$request->file('rebate_image15');
                    $file_extension15 = $file15->getClientOriginalExtension();
                    $fileName15=$user_id.'15'.uniqid().rand(1, 1000).time().'.'. $file_extension15;
                    $file15->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName15);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa15;
                if($request->hasFile('rebate_image15')){$test_vopros->img_voprosa = $fileName15;}
                $test_vopros->ball = $request->ball15;
                $test_vopros->save();

                $radio15 = $request->variant_radio15;
                $text15 = $request->variant_text15;
                foreach($text15 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text15[$key];
                    $request['status_otveta']=$radio15[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image15')){
                    $request->validate(['rebate_image15' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file15=$request->file('rebate_image15');
                    $file_extension15 = $file15->getClientOriginalExtension();
                    $fileName15=$user_id.'15'.uniqid().rand(1, 1000).time().'.'. $file_extension15;
                    $file15->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName15);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName15;
                    $test_vopros->ball = $request->ball15;
                    $test_vopros->save();

                    $radio15 = $request->variant_radio15;
                    $text15 = $request->variant_text15;
                    foreach($text15 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text15[$key];
                        $request['status_otveta']=$radio15[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa16'))
            {
                $request->validate(['vopros_testa16' => 'string','ball16' => 'numeric',]);
                if($request->hasFile('rebate_image16')){
                    $request->validate(['rebate_image16' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file16=$request->file('rebate_image16');
                    $file_extension16 = $file16->getClientOriginalExtension();
                    $fileName16=$user_id.'16'.uniqid().rand(1, 1000).time().'.'. $file_extension16;
                    $file16->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName16);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa16;
                if($request->hasFile('rebate_image16')){$test_vopros->img_voprosa = $fileName16;}
                $test_vopros->ball = $request->ball16;
                $test_vopros->save();

                $radio16 = $request->variant_radio16;
                $text16 = $request->variant_text16;
                foreach($text16 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text16[$key];
                    $request['status_otveta']=$radio16[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image16')){
                    $request->validate(['rebate_image16' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file16=$request->file('rebate_image16');
                    $file_extension16 = $file16->getClientOriginalExtension();
                    $fileName16=$user_id.'16'.uniqid().rand(1, 1000).time().'.'. $file_extension16;
                    $file16->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName16);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName16;
                    $test_vopros->ball = $request->ball16;
                    $test_vopros->save();

                    $radio16 = $request->variant_radio16;
                    $text16 = $request->variant_text16;
                    foreach($text16 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text16[$key];
                        $request['status_otveta']=$radio16[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa17'))
            {
                $request->validate(['vopros_testa17' => 'string','ball17' => 'numeric',]);
                if($request->hasFile('rebate_image17')){
                    $request->validate(['rebate_image17' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file17=$request->file('rebate_image17');
                    $file_extension17 = $file17->getClientOriginalExtension();
                    $fileName17=$user_id.'17'.uniqid().rand(1, 1000).time().'.'. $file_extension17;
                    $file17->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName17);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa17;
                if($request->hasFile('rebate_image17')){$test_vopros->img_voprosa = $fileName17;}
                $test_vopros->ball = $request->ball17;
                $test_vopros->save();

                $radio17 = $request->variant_radio17;
                $text17 = $request->variant_text17;
                foreach($text17 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text17[$key];
                    $request['status_otveta']=$radio17[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image17')){
                    $request->validate(['rebate_image17' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file17=$request->file('rebate_image17');
                    $file_extension17 = $file17->getClientOriginalExtension();
                    $fileName17=$user_id.'17'.uniqid().rand(1, 1000).time().'.'. $file_extension17;
                    $file17->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName17);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName17;
                    $test_vopros->ball = $request->ball17;
                    $test_vopros->save();

                    $radio17 = $request->variant_radio17;
                    $text17 = $request->variant_text17;
                    foreach($text17 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text17[$key];
                        $request['status_otveta']=$radio17[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa18'))
            {
                $request->validate(['vopros_testa18' => 'string','ball18' => 'numeric',]);
                if($request->hasFile('rebate_image18')){
                    $request->validate(['rebate_image18' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file18=$request->file('rebate_image18');
                    $file_extension18 = $file18->getClientOriginalExtension();
                    $fileName18=$user_id.'18'.uniqid().rand(1, 1000).time().'.'. $file_extension18;
                    $file18->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName18);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa18;
                if($request->hasFile('rebate_image18')){$test_vopros->img_voprosa = $fileName18;}
                $test_vopros->ball = $request->ball18;
                $test_vopros->save();

                $radio18 = $request->variant_radio18;
                $text18 = $request->variant_text18;
                foreach($text18 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text18[$key];
                    $request['status_otveta']=$radio18[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image18')){
                    $request->validate(['rebate_image18' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file18=$request->file('rebate_image18');
                    $file_extension18 = $file18->getClientOriginalExtension();
                    $fileName18=$user_id.'18'.uniqid().rand(1, 1000).time().'.'. $file_extension18;
                    $file18->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName18);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName18;
                    $test_vopros->ball = $request->ball18;
                    $test_vopros->save();

                    $radio18 = $request->variant_radio18;
                    $text18 = $request->variant_text18;
                    foreach($text18 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text18[$key];
                        $request['status_otveta']=$radio18[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa19'))
            {
                $request->validate(['vopros_testa19' => 'string','ball19' => 'numeric',]);
                if($request->hasFile('rebate_image19')){
                    $request->validate(['rebate_image19' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file19=$request->file('rebate_image19');
                    $file_extension19 = $file19->getClientOriginalExtension();
                    $fileName19=$user_id.'19'.uniqid().rand(1, 1000).time().'.'. $file_extension19;
                    $file19->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName19);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa19;
                if($request->hasFile('rebate_image19')){$test_vopros->img_voprosa = $fileName19;}
                $test_vopros->ball = $request->ball19;
                $test_vopros->save();

                $radio19 = $request->variant_radio19;
                $text19 = $request->variant_text19;
                foreach($text19 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text19[$key];
                    $request['status_otveta']=$radio19[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image19')){
                    $request->validate(['rebate_image19' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file19=$request->file('rebate_image19');
                    $file_extension19 = $file19->getClientOriginalExtension();
                    $fileName19=$user_id.'19'.uniqid().rand(1, 1000).time().'.'. $file_extension19;
                    $file19->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName19);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName19;
                    $test_vopros->ball = $request->ball19;
                    $test_vopros->save();

                    $radio19 = $request->variant_radio19;
                    $text19 = $request->variant_text19;
                    foreach($text19 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text19[$key];
                        $request['status_otveta']=$radio19[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa20'))
            {
                $request->validate(['vopros_testa20' => 'string','ball20' => 'numeric',]);
                if($request->hasFile('rebate_image20')){
                    $request->validate(['rebate_image20' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file20=$request->file('rebate_image20');
                    $file_extension20 = $file20->getClientOriginalExtension();
                    $fileName20=$user_id.'20'.uniqid().rand(1, 1000).time().'.'. $file_extension20;
                    $file20->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName20);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa20;
                if($request->hasFile('rebate_image20')){$test_vopros->img_voprosa = $fileName20;}
                $test_vopros->ball = $request->ball20;
                $test_vopros->save();

                $radio20 = $request->variant_radio20;
                $text20 = $request->variant_text20;
                foreach($text20 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text20[$key];
                    $request['status_otveta']=$radio20[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image20')){
                    $request->validate(['rebate_image20' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file20=$request->file('rebate_image20');
                    $file_extension20 = $file20->getClientOriginalExtension();
                    $fileName20=$user_id.'20'.uniqid().rand(1, 1000).time().'.'. $file_extension20;
                    $file20->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName20);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName20;
                    $test_vopros->ball = $request->ball20;
                    $test_vopros->save();

                    $radio20 = $request->variant_radio20;
                    $text20 = $request->variant_text20;
                    foreach($text20 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text20[$key];
                        $request['status_otveta']=$radio20[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa21'))
            {
                $request->validate(['vopros_testa21' => 'string','ball21' => 'numeric',]);
                if($request->hasFile('rebate_image21')){
                    $request->validate(['rebate_image21' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file21=$request->file('rebate_image21');
                    $file_extension21 = $file21->getClientOriginalExtension();
                    $fileName21=$user_id.'21'.uniqid().rand(1, 1000).time().'.'. $file_extension21;
                    $file21->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName21);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa21;
                if($request->hasFile('rebate_image21')){$test_vopros->img_voprosa = $fileName21;}
                $test_vopros->ball = $request->ball21;
                $test_vopros->save();

                $radio21 = $request->variant_radio21;
                $text21 = $request->variant_text21;
                foreach($text21 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text21[$key];
                    $request['status_otveta']=$radio21[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image21')){
                    $request->validate(['rebate_image21' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file21=$request->file('rebate_image21');
                    $file_extension21 = $file21->getClientOriginalExtension();
                    $fileName21=$user_id.'21'.uniqid().rand(1, 1000).time().'.'. $file_extension21;
                    $file21->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName21);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName21;
                    $test_vopros->ball = $request->ball21;
                    $test_vopros->save();

                    $radio21 = $request->variant_radio21;
                    $text21 = $request->variant_text21;
                    foreach($text21 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text21[$key];
                        $request['status_otveta']=$radio21[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa22'))
            {
                $request->validate(['vopros_testa22' => 'string','ball22' => 'numeric',]);
                if($request->hasFile('rebate_image22')){
                    $request->validate(['rebate_image22' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file22=$request->file('rebate_image22');
                    $file_extension22 = $file22->getClientOriginalExtension();
                    $fileName22=$user_id.'22'.uniqid().rand(1, 1000).time().'.'. $file_extension22;
                    $file22->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName22);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa22;
                if($request->hasFile('rebate_image22')){$test_vopros->img_voprosa = $fileName22;}
                $test_vopros->ball = $request->ball22;
                $test_vopros->save();

                $radio22 = $request->variant_radio22;
                $text22 = $request->variant_text22;
                foreach($text22 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text22[$key];
                    $request['status_otveta']=$radio22[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image22')){
                    $request->validate(['rebate_image22' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file22=$request->file('rebate_image22');
                    $file_extension22 = $file22->getClientOriginalExtension();
                    $fileName22=$user_id.'22'.uniqid().rand(1, 1000).time().'.'. $file_extension22;
                    $file22->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName22);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName22;
                    $test_vopros->ball = $request->ball22;
                    $test_vopros->save();

                    $radio22 = $request->variant_radio22;
                    $text22 = $request->variant_text22;
                    foreach($text22 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text22[$key];
                        $request['status_otveta']=$radio22[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa24'))
            {
                $request->validate(['vopros_testa24' => 'string','ball24' => 'numeric',]);
                if($request->hasFile('rebate_image24')){
                    $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file24=$request->file('rebate_image24');
                    $file_extension24 = $file24->getClientOriginalExtension();
                    $fileName24=$user_id.'24'.uniqid().rand(1, 1000).time().'.'. $file_extension24;
                    $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa24;
                if($request->hasFile('rebate_image24')){$test_vopros->img_voprosa = $fileName24;}
                $test_vopros->ball = $request->ball24;
                $test_vopros->save();

                $radio24 = $request->variant_radio24;
                $text24 = $request->variant_text24;
                foreach($text24 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text24[$key];
                    $request['status_otveta']=$radio24[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image24')){
                    $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file24=$request->file('rebate_image24');
                    $file_extension24 = $file24->getClientOriginalExtension();
                    $fileName24=$user_id.'24'.uniqid().rand(1, 1000).time().'.'. $file_extension24;
                    $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName24;
                    $test_vopros->ball = $request->ball24;
                    $test_vopros->save();

                    $radio24 = $request->variant_radio24;
                    $text24 = $request->variant_text24;
                    foreach($text24 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text24[$key];
                        $request['status_otveta']=$radio24[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa24'))
            {
                $request->validate(['vopros_testa24' => 'string','ball24' => 'numeric',]);
                if($request->hasFile('rebate_image24')){
                    $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file24=$request->file('rebate_image24');
                    $file_extension24 = $file24->getClientOriginalExtension();
                    $fileName24=$user_id.'24'.uniqid().rand(1, 1000).time().'.'. $file_extension24;
                    $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa24;
                if($request->hasFile('rebate_image24')){$test_vopros->img_voprosa = $fileName24;}
                $test_vopros->ball = $request->ball24;
                $test_vopros->save();

                $radio24 = $request->variant_radio24;
                $text24 = $request->variant_text24;
                foreach($text24 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text24[$key];
                    $request['status_otveta']=$radio24[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image24')){
                    $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file24=$request->file('rebate_image24');
                    $file_extension24 = $file24->getClientOriginalExtension();
                    $fileName24=$user_id.'24'.uniqid().rand(1, 1000).time().'.'. $file_extension24;
                    $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName24;
                    $test_vopros->ball = $request->ball24;
                    $test_vopros->save();

                    $radio24 = $request->variant_radio24;
                    $text24 = $request->variant_text24;
                    foreach($text24 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text24[$key];
                        $request['status_otveta']=$radio24[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa25'))
            {
                $request->validate(['vopros_testa25' => 'string','ball25' => 'numeric',]);
                if($request->hasFile('rebate_image25')){
                    $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file2=$request->file('rebate_image25');
                    $file_extension25 = $file25->getClientOriginalExtension();
                    $fileName25=$user_id.'25'.uniqid().rand(1, 1000).time().'.'. $file_extension25;
                    $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa25;
                if($request->hasFile('rebate_image25')){$test_vopros->img_voprosa = $fileName25;}
                $test_vopros->ball = $request->ball25;
                $test_vopros->save();

                $radio25 = $request->variant_radio25;
                $text25 = $request->variant_text25;
                foreach($text25 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text25[$key];
                    $request['status_otveta']=$radio25[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image25')){
                    $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file25=$request->file('rebate_image25');
                    $file_extension25 = $file25->getClientOriginalExtension();
                    $fileName25=$user_id.'25'.uniqid().rand(1, 1000).time().'.'. $file_extension25;
                    $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName25;
                    $test_vopros->ball = $request->ball25;
                    $test_vopros->save();

                    $radio25 = $request->variant_radio25;
                    $text25 = $request->variant_text25;
                    foreach($text25 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text25[$key];
                        $request['status_otveta']=$radio25[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa25'))
            {
                $request->validate(['vopros_testa25' => 'string','ball25' => 'numeric',]);
                if($request->hasFile('rebate_image25')){
                    $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file25=$request->file('rebate_image25');
                    $file_extension25 = $file25->getClientOriginalExtension();
                    $fileName25=$user_id.'25'.uniqid().rand(1, 1000).time().'.'. $file_extension25;
                    $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa25;
                if($request->hasFile('rebate_image25')){$test_vopros->img_voprosa = $fileName25;}
                $test_vopros->ball = $request->ball25;
                $test_vopros->save();

                $radio25 = $request->variant_radio25;
                $text25 = $request->variant_text25;
                foreach($text25 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text25[$key];
                    $request['status_otveta']=$radio25[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image25')){
                    $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file25=$request->file('rebate_image25');
                    $file_extension25 = $file25->getClientOriginalExtension();
                    $fileName25=$user_id.'25'.uniqid().rand(1, 1000).time().'.'. $file_extension25;
                    $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName25;
                    $test_vopros->ball = $request->ball25;
                    $test_vopros->save();

                    $radio25 = $request->variant_radio25;
                    $text25 = $request->variant_text25;
                    foreach($text25 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text25[$key];
                        $request['status_otveta']=$radio25[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa26'))
            {
                $request->validate(['vopros_testa26' => 'string','ball26' => 'numeric',]);
                if($request->hasFile('rebate_image26')){
                    $request->validate(['rebate_image26' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file26=$request->file('rebate_image26');
                    $file_extension26 = $file26->getClientOriginalExtension();
                    $fileName26=$user_id.'26'.uniqid().rand(1, 1000).time().'.'. $file_extension26;
                    $file26->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName26);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa26;
                if($request->hasFile('rebate_image26')){$test_vopros->img_voprosa = $fileName26;}
                $test_vopros->ball = $request->ball26;
                $test_vopros->save();

                $radio26 = $request->variant_radio26;
                $text26 = $request->variant_text26;
                foreach($text26 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text26[$key];
                    $request['status_otveta']=$radio26[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image26')){
                    $request->validate(['rebate_image26' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file26=$request->file('rebate_image26');
                    $file_extension26 = $file26->getClientOriginalExtension();
                    $fileName26=$user_id.'26'.uniqid().rand(1, 1000).time().'.'. $file_extension26;
                    $file26->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName26);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName26;
                    $test_vopros->ball = $request->ball26;
                    $test_vopros->save();

                    $radio26 = $request->variant_radio26;
                    $text26 = $request->variant_text26;
                    foreach($text26 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text26[$key];
                        $request['status_otveta']=$radio26[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa27'))
            {
                $request->validate(['vopros_testa27' => 'string','ball27' => 'numeric',]);
                if($request->hasFile('rebate_image27')){
                    $request->validate(['rebate_image27' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file27=$request->file('rebate_image27');
                    $file_extension27 = $file27->getClientOriginalExtension();
                    $fileName27=$user_id.'27'.uniqid().rand(1, 1000).time().'.'. $file_extension27;
                    $file27->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName27);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa27;
                if($request->hasFile('rebate_image27')){$test_vopros->img_voprosa = $fileName27;}
                $test_vopros->ball = $request->ball27;
                $test_vopros->save();

                $radio27 = $request->variant_radio27;
                $text27 = $request->variant_text27;
                foreach($text27 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text27[$key];
                    $request['status_otveta']=$radio27[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image27')){
                    $request->validate(['rebate_image27' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file27=$request->file('rebate_image27');
                    $file_extension27 = $file27->getClientOriginalExtension();
                    $fileName27=$user_id.'27'.uniqid().rand(1, 1000).time().'.'. $file_extension27;
                    $file27->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName27);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName27;
                    $test_vopros->ball = $request->ball27;
                    $test_vopros->save();

                    $radio27 = $request->variant_radio27;
                    $text27 = $request->variant_text27;
                    foreach($text27 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text27[$key];
                        $request['status_otveta']=$radio27[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa28'))
            {
                $request->validate(['vopros_testa28' => 'string','ball28' => 'numeric',]);
                if($request->hasFile('rebate_image28')){
                    $request->validate(['rebate_image28' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file28=$request->file('rebate_image28');
                    $file_extension28 = $file28->getClientOriginalExtension();
                    $fileName28=$user_id.'28'.uniqid().rand(1, 1000).time().'.'. $file_extension28;
                    $file28->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName28);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa28;
                if($request->hasFile('rebate_image28')){$test_vopros->img_voprosa = $fileName28;}
                $test_vopros->ball = $request->ball28;
                $test_vopros->save();

                $radio28 = $request->variant_radio28;
                $text28 = $request->variant_text28;
                foreach($text28 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text28[$key];
                    $request['status_otveta']=$radio28[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image28')){
                    $request->validate(['rebate_image28' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file28=$request->file('rebate_image28');
                    $file_extension28 = $file28->getClientOriginalExtension();
                    $fileName28=$user_id.'28'.uniqid().rand(1, 1000).time().'.'. $file_extension28;
                    $file28->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName28);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName28;
                    $test_vopros->ball = $request->ball28;
                    $test_vopros->save();

                    $radio28 = $request->variant_radio28;
                    $text28 = $request->variant_text28;
                    foreach($text28 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text28[$key];
                        $request['status_otveta']=$radio28[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa29'))
            {
                $request->validate(['vopros_testa29' => 'string','ball29' => 'numeric',]);
                if($request->hasFile('rebate_image29')){
                    $request->validate(['rebate_image29' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file29=$request->file('rebate_image29');
                    $file_extension29 = $file29->getClientOriginalExtension();
                    $fileName29=$user_id.'29'.uniqid().rand(1, 1000).time().'.'. $file_extension29;
                    $file29->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName29);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa29;
                if($request->hasFile('rebate_image29')){$test_vopros->img_voprosa = $fileName29;}
                $test_vopros->ball = $request->ball29;
                $test_vopros->save();

                $radio29 = $request->variant_radio29;
                $text29 = $request->variant_text29;
                foreach($text29 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text29[$key];
                    $request['status_otveta']=$radio29[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image29')){
                    $request->validate(['rebate_image29' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file29=$request->file('rebate_image29');
                    $file_extension29 = $file29->getClientOriginalExtension();
                    $fileName29=$user_id.'29'.uniqid().rand(1, 1000).time().'.'. $file_extension29;
                    $file29->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName29);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName29;
                    $test_vopros->ball = $request->ball29;
                    $test_vopros->save();

                    $radio29 = $request->variant_radio29;
                    $text29 = $request->variant_text29;
                    foreach($text29 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text29[$key];
                        $request['status_otveta']=$radio29[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if($request->has('vopros_testa40'))
            {
                $request->validate(['vopros_testa40' => 'string','ball40' => 'numeric',]);
                if($request->hasFile('rebate_image40')){
                    $request->validate(['rebate_image40' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file40=$request->file('rebate_image40');
                    $file_extension40 = $file40->getClientOriginalExtension();
                    $fileName40=$user_id.'40'.uniqid().rand(1, 1000).time().'.'. $file_extension40;
                    $file40->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName40);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $test->id;
                $test_vopros->text_voprosa = $request->vopros_testa40;
                if($request->hasFile('rebate_image40')){$test_vopros->img_voprosa = $fileName40;}
                $test_vopros->ball = $request->ball40;
                $test_vopros->save();

                $radio40 = $request->variant_radio40;
                $text40 = $request->variant_text40;
                foreach($text40 as $key => $value)
                {
                    $request['test_voprosy_id']=$test_vopros->id;
                    $request['test_id']=$test->id;
                    $request['test_otvety']=$text40[$key];
                    $request['status_otveta']=$radio40[$key];
                    Test_otvety::create($request->all());
                }
            }
            else{
                if($request->hasFile('rebate_image40')){
                    $request->validate(['rebate_image40' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file40=$request->file('rebate_image40');
                    $file_extension40 = $file40->getClientOriginalExtension();
                    $fileName40=$user_id.'40'.uniqid().rand(1, 1000).time().'.'. $file_extension40;
                    $file40->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName40);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $test->id;
                    $test_vopros->img_voprosa = $fileName40;
                    $test_vopros->ball = $request->ball40;
                    $test_vopros->save();

                    $radio40 = $request->variant_radio40;
                    $text40 = $request->variant_text40;
                    foreach($text40 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$test->id;
                        $request['test_otvety']=$text40[$key];
                        $request['status_otveta']=$radio40[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }

            if ($for_action > 100000) {
                $urok_id = $for_action - 100000;
                $uroky = Uroky::where('id', $urok_id)->first();
                DB::table('urokies')->where('id', $urok_id)->update([
                    'test_id' => $test->id,
                ]);
                return redirect()->route('moderator_kurs_urok_index', $uroky->podcat_id)->withSuccess('Ваш тест успешно добавлена!');
            }else{
                return redirect()->route('moderator_tests_index', ['for_action' => $for_action])->withSuccess('Ваш тест успешно добавлена!');
            }
            
    }

    public function moderator_testy_update_partnerka1(Request $request, Test $test, $id)
    {

        $request->validate([
            'partnerka1' => 'required|numeric',
        ]);
        $test = Test::where('id', $id)->first();
        $test = DB::table('tests')->where('id', $id)->update([
            'partnerka' => $request->partnerka1,
        ]);
        
        return redirect()->back()->withSuccess('Поздравляем, тест участвует в партнерской программе.');
    }

    public function moderator_testy_update_partnerka2(Request $request, Test $test, $id)
    {

        $request->validate([
            'partnerka2' => 'required|numeric',
        ]);
        $test = Test::where('id', $id)->first();
        $test = DB::table('tests')->where('id', $id)->update([
            'partnerka' => $request->partnerka2,
        ]);
        
        return redirect()->back()->withSuccess2('Теперь тест не участвует в партнерской программе.');
    }

    public function moderator_testy_update_status1(Request $request, Test $test, $id)
    {
        $test_voprosy = Test_voprosy::where('test_id', $id)->count();

        if ($test_voprosy > 0){
            $request->validate([
            'status' => 'required|numeric',
            ]);
            $test = Test::where('id', $id)->first();
            $test = DB::table('tests')->where('id', $id)->update([
                'status' => $request->status,
            ]);
            
            return redirect()->back()->withSuccess('Поздравляем, тест стал активным.');
        }
        else{
            return redirect()->back()->withSuccess2('Сначала добавьте хотя бы один вопрос теста!');
        }
    }

        
    public function moderator_testy_update_status2(Request $request, Test $test, $id)
    {

        $request->validate([
            'status2' => 'required|numeric',
        ]);
        $test = Test::where('id', $id)->first();
        $test = DB::table('tests')->where('id', $id)->update([
            'status' => $request->status2,
        ]);
        
        return redirect()->back()->withSuccess2('Тест стал не активным.');
    }

    public function moderator_testy_update_price(Request $request, Test $test, $id)
    {

        $request->validate([
            'price2' => 'required|numeric',
        ]);
        $price_mat = $request->price2 * 100;
        $test = Test::where('id', $id)->first();
        $test = DB::table('tests')->where('id', $id)->update([
            'price' => $price_mat,
        ]);
        
        return redirect()->back()->withSuccess('Цена теста успешно обновлена.');
    }


    public function moderator_testy_update_pokaz_otvetov1(Request $request, Test $test, $id)
    {
        $request->validate([
            'day' => 'required|numeric',
            'hour' => 'required|numeric',
            'minute' => 'required|numeric',
        ]);

        $day = $request->day * 86400;
        $hour = $request->hour * 3600;
        $minute = $request->minute * 60;

        $pokaz_otvetov = $day + $hour + $minute;

        DB::table('tests')->where('id', $id)->update([
            'pokaz_otvetov' => $pokaz_otvetov,
        ]);

        if ($pokaz_otvetov != 0) {
            return redirect()->back()->withSuccess('Правильные ответы будут показаны через определенное время');
        }else{
            return redirect()->back()->withSuccess('Правильные ответы будут показаны сразу после сдачи теста');
        }
    }

    public function moderator_testy_update_pokaz_otvetov2(Request $request, Test $test, $id)
    {
        $srok_dostupa = 0;
        DB::table('tests')->where('id', $id)->update([
            'pokaz_otvetov' => NULL,
        ]);
        
        return redirect()->back()->withSuccess('Правильные ответы будут скрыты');
    }


    public function moderator_testy_update_srok_dostup1(Request $request, Test $test, $id)
    {

        $request->validate([
            'god' => 'required|numeric',
            'mounth' => 'required|numeric',
            'day' => 'required|numeric',
            'hour' => 'required|numeric',
            'minute' => 'required|numeric',
        ]);

        $god = $request->god * 31536000;
        $mounth = $request->mounth * 2592000;
        $day = $request->day * 86400;
        $hour = $request->hour * 3600;
        $minute = $request->minute * 60;

        $srok_dostupa = $god + $mounth + $day + $hour + $minute;

        DB::table('tests')->where('id', $id)->update([
            'srok_dostupa' => $srok_dostupa,
        ]);

        if ($srok_dostupa > 0) {
            return redirect()->back()->withSuccess('Срок доступа изменена на определенное время.');
        }else{
            return redirect()->back()->withSuccess('Срок доступа изменена на бессрочное время.');
        }
    }

    public function moderator_testy_update_srok_dostup2(Request $request, Test $test, $id)
    {
        $srok_dostupa = 0;
        DB::table('tests')->where('id', $id)->update([
            'srok_dostupa' => $srok_dostupa,
        ]);
        
        return redirect()->back()->withSuccess('Срок доступа изменена на бессрочное время.');
    }

    

    public function moderator_tests_edit($for_action, $id)
    {
        $test_categories = Test_category::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
        $test_podcategories = Test_podcategory::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
        $partnerka = Vidy_partnerkas::get();
        $test = Test::where('id', $id)->withCount('test_voprosy')->first();
        $test_voprosy = Test_voprosy::where('test_id', $id)->orderBy('created_at', 'asc')->get();
        $test_otvety = Test_otvety::where('test_id', $id)->get();

        return view('moderator/testy_edit', [
            'test_categories' => $test_categories,
            'test_podcategories' => $test_podcategories,
            'users' => $users,
            'languages' => $languages,
            'partnerka' => $partnerka,
            'test' => $test,
            'test_voprosy' => $test_voprosy,
            'test_otvety' => $test_otvety,
            'for_action' => $for_action,
        ]);
    }

   


    public function moderator_kurs_urok_tests_edit($kurs_id, $urok_id)
    {
        $urok = Uroky::where('id', $urok_id)->first();
        $test = Test::where('id', $urok->test_id)->withCount('test_voprosy')->first();
        $test_voprosy = Test_voprosy::where('test_id', $urok->test_id)->orderBy('updated_at', 'DESC')->get();
        $test_otvety = Test_otvety::where('test_id', $urok->test_id)->get();
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        $for_action = $urok_id + 100000;

        return view('moderator/urok_testy_edit', [
            'test' => $test,
            'test_voprosy' => $test_voprosy,
            'test_otvety' => $test_otvety,
            'for_action' => $for_action,
            'podcategory' => $podcategory,
            'urok' => $urok,
        ]);
    }


    public function moderator_tests_update(Request $request, $for_action, $id )
    {
        $ratio = 16/9;
        $user_id = \Auth::user()->id;
        $id_test = $id;
        if($request->hasFile('rebate_imag')){
            $test = Test::where('id', $id)->first();
            unlink('storage/testy/images/thumbnail/'.$test->img);

            $file0=$request->file('rebate_imag');
            $file_extension0 = $file0->getClientOriginalExtension();
            $destinationPath = 'storage/testy/images/thumbnail/';
            $ogImage = Image::make($file0);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().'.'.$file_extension0;            
            $thImage->save($destinationPath . $thImagename);

            $test = DB::table('tests')->where('id', $id)->update([
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'test_category_id' => $request->test_category_id,
                'test_podcategory_id' => $request->test_podcategory_id,
                'language' => $request->language,
                'price' => $request->price * 100,
                'img' => $thImagename,
                'kol_popytkov' => $request->popytki,
                'time' => $request->prodoljitelnost * 60,
            ]);
        }else{

            if ($request->has('test_category_id')) {$cat1_id = $request->test_category_id;}else{$cat1_id = NULL;}
            if ($request->has('test_podcategory_id')) {$podcat1_id = $request->test_podcategory_id;}else{$podcat1_id = NULL;}
            if ($request->has('language')) {$language1_id = $request->language;}else{$language1_id = NULL;}
            if ($request->has('price')) {$price1_id = $request->price * 100;}else{$price1_id = 0;}


            $test = DB::table('tests')->where('id', $id)->update([
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'test_category_id' => $cat1_id,
                'test_podcategory_id' => $podcat1_id,
                'language' => $language1_id,
                'price' => $price1_id,
                'kol_popytkov' => $request->popytki,
                'time' => $request->prodoljitelnost * 60,
            ]);
        }

        if($request->delet_vopros != null){
            $delet = Test_voprosy::where('id', $request->delet_vopros)->get();
            foreach($delet as $delet)
                {
                    if($delet->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$delet->img_voprosa);
                    }
                    $delet->delete();
                }
        }
        

        if($request->for_edit1 == 1){
            if($request->hasFile('rebate_image1')){
                $test_vopros_img1 = Test_voprosy::where('id', $request->for_id1)->first();
                if($test_vopros_img1->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img1->img_voprosa);
                }
                $request->validate(['rebate_image1' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file1=$request->file('rebate_image1');
                $file_extension1 = $file1->getClientOriginalExtension();
                $fileName1=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension1;
                $file1->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName1);

                if($request->has('vopros_testa1')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                        'text_voprosa' => $request->vopros_testa1,
                        'img_voprosa' => $fileName1,
                        'ball' => $request->ball1,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName1,
                        'ball' => $request->ball1,
                    ]);
                }
                $test_otvety1 = Test_otvety::where('test_voprosy_id', $request->for_id1)->get();
                foreach($test_otvety1 as $test_otvety01)
                {
                    $test_otvety01->delete();
                }
                $radio1 = $request->variant_radio1;
                $text1 = $request->variant_text1;
                if($text1 != null){
                    foreach($text1 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id1;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text1[$key];
                        $request['status_otveta']=$radio1[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img1 == 1){
                    if($request->has('vopros_testa1')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                            'text_voprosa' => $request->vopros_testa1,
                            'ball' => $request->ball1,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball1,
                        ]);
                    }
                }
                if($request->for_img1 == 2){
                    $test_vopros_img1 = Test_voprosy::where('id', $request->for_id1)->first();
                    if($test_vopros_img1->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img1->img_voprosa);
                    }
                    if($request->has('vopros_testa1')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                            'text_voprosa' => $request->vopros_testa1,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball1,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball1,
                        ]);
                    }
                }  
                if($request->for_img1 == 0){
                    if($request->has('vopros_testa1')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                            'text_voprosa' => $request->vopros_testa1,
                            'ball' => $request->ball1,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id1)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball1,
                        ]);
                    }
                } 
                $test_otvety1 = Test_otvety::where('test_voprosy_id', $request->for_id1)->get();
                foreach($test_otvety1 as $test_otvety01)
                {
                    $test_otvety01->delete();
                }
                $radio1 = $request->variant_radio1;
                $text1 = $request->variant_text1;
                if($text1 != null){
                    foreach($text1 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id1;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text1[$key];
                        $request['status_otveta']=$radio1[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa1')){
                $request->validate(['vopros_testa1' => 'string','ball1' => 'numeric',]);
                if($request->hasFile('rebate_image1')){
                    $request->validate(['rebate_image1' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file1=$request->file('rebate_image1');
                    $file_extension1 = $file1->getClientOriginalExtension();
                    $fileName1=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension1;
                    $file1->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName1);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa1;
                if($request->hasFile('rebate_image1')){$test_vopros->img_voprosa = $fileName1;}
                $test_vopros->ball = $request->ball1;
                $test_vopros->save();

                $radio1 = $request->variant_radio1;
                $text1 = $request->variant_text1;
                if($text1 != null){
                    foreach($text1 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text1[$key];
                        $request['status_otveta']=$radio1[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image1')){
                    $request->validate(['rebate_image1' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file1=$request->file('rebate_image1');
                    $file_extension1 = $file1->getClientOriginalExtension();
                    $fileName1=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension1;
                    $file1->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName1);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName1;
                    $test_vopros->ball = $request->ball1;
                    $test_vopros->save();

                    $radio1 = $request->variant_radio1;
                    $text1 = $request->variant_text1;
                    if($text1 != null){
                        foreach($text1 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text1[$key];
                            $request['status_otveta']=$radio1[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit2 == 1){
            if($request->hasFile('rebate_image2')){
                $test_vopros_img2 = Test_voprosy::where('id', $request->for_id2)->first();
                if($test_vopros_img2->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img2->img_voprosa);
                }
                $request->validate(['rebate_image2' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file2=$request->file('rebate_image2');
                $file_extension2 = $file2->getClientOriginalExtension();
                $fileName2=$user_id.'2'.uniqid().rand(1, 1000).time().'.'. $file_extension2;
                $file2->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName2);

                if($request->has('vopros_testa2')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                        'text_voprosa' => $request->vopros_testa2,
                        'img_voprosa' => $fileName2,
                        'ball' => $request->ball2,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName2,
                        'ball' => $request->ball2,
                    ]);
                }
                $test_otvety2 = Test_otvety::where('test_voprosy_id', $request->for_id2)->get();
                foreach($test_otvety2 as $test_otvety02)
                {
                    $test_otvety02->delete();
                }
                $radio2 = $request->variant_radio2;
                $text2 = $request->variant_text2;
                if($text2 != null){
                    foreach($text2 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id2;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text2[$key];
                        $request['status_otveta']=$radio2[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img2 == 1){
                    if($request->has('vopros_testa2')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                            'text_voprosa' => $request->vopros_testa2,
                            'ball' => $request->ball2,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball2,
                        ]);
                    }
                }
                if($request->for_img2 == 2){
                    $test_vopros_img2 = Test_voprosy::where('id', $request->for_id2)->first();
                    if($test_vopros_img2->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img2->img_voprosa);
                    }
                    if($request->has('vopros_testa2')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                            'text_voprosa' => $request->vopros_testa2,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball2,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball2,
                        ]);
                    }
                }  
                if($request->for_img2 == 0){
                    if($request->has('vopros_testa2')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                            'text_voprosa' => $request->vopros_testa2,
                            'ball' => $request->ball2,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id2)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball2,
                        ]);
                    }
                }
                $test_otvety2 = Test_otvety::where('test_voprosy_id', $request->for_id2)->get();
                foreach($test_otvety2 as $test_otvety02)
                {
                    $test_otvety02->delete();
                }
                $radio2 = $request->variant_radio2;
                $text2 = $request->variant_text2;
                if($text2 != null){
                    foreach($text2 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id2;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text2[$key];
                        $request['status_otveta']=$radio2[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa2')){
                $request->validate(['vopros_testa2' => 'string','ball2' => 'numeric',]);
                if($request->hasFile('rebate_image2')){
                    $request->validate(['rebate_image2' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file2=$request->file('rebate_image2');
                    $file_extension2 = $file2->getClientOriginalExtension();
                    $fileName2=$user_id.'2'.uniqid().rand(1, 1000).time().'.'. $file_extension2;
                    $file2->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName2);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa2;
                if($request->hasFile('rebate_image2')){$test_vopros->img_voprosa = $fileName2;}
                $test_vopros->ball = $request->ball2;
                $test_vopros->save();

                $radio2 = $request->variant_radio2;
                $text2 = $request->variant_text2;
                if($text2 != null){
                    foreach($text2 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text2[$key];
                        $request['status_otveta']=$radio2[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image2')){
                    $request->validate(['rebate_image2' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file2=$request->file('rebate_image1');
                    $file_extension2 = $file2->getClientOriginalExtension();
                    $fileName2=$user_id.'2'.uniqid().rand(1, 1000).time().'.'. $file_extension2;
                    $file2->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName2);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName2;
                    $test_vopros->ball = $request->ball2;
                    $test_vopros->save();

                    $radio2 = $request->variant_radio2;
                    $text2 = $request->variant_text2;
                    if($text2 != null){
                        foreach($text2 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text2[$key];
                            $request['status_otveta']=$radio2[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit3 == 1){
            if($request->hasFile('rebate_image3')){
                $test_vopros_img3 = Test_voprosy::where('id', $request->for_id3)->first();
                if($test_vopros_img3->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img3->img_voprosa);
                }
                $request->validate(['rebate_image3' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file3=$request->file('rebate_image3');
                $file_extension3 = $file3->getClientOriginalExtension();
                $fileName3=$user_id.'3'.uniqid().rand(1, 1000).time().'.'. $file_extension3;
                $file3->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName3);

                if($request->has('vopros_testa3')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                        'text_voprosa' => $request->vopros_testa3,
                        'img_voprosa' => $fileName3,
                        'ball' => $request->ball3,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName3,
                        'ball' => $request->ball3,
                    ]);
                }
                $test_otvety3 = Test_otvety::where('test_voprosy_id', $request->for_id3)->get();
                foreach($test_otvety3 as $test_otvety03)
                {
                    $test_otvety03->delete();
                }
                $radio3 = $request->variant_radio3;
                $text3 = $request->variant_text3;
                if($text3 != null){
                    foreach($text3 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id3;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text3[$key];
                        $request['status_otveta']=$radio3[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img3 == 1){
                    if($request->has('vopros_testa3')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                            'text_voprosa' => $request->vopros_testa3,
                            'ball' => $request->ball3,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball3,
                        ]);
                    }
                }
                if($request->for_img3 == 2){
                    $test_vopros_img3 = Test_voprosy::where('id', $request->for_id3)->first();
                    if($test_vopros_img3->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img3->img_voprosa);
                    }
                    if($request->has('vopros_testa3')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                            'text_voprosa' => $request->vopros_testa3,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball3,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball3,
                        ]);
                    }
                }  
                if($request->for_img3 == 0){
                    if($request->has('vopros_testa3')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                            'text_voprosa' => $request->vopros_testa3,
                            'ball' => $request->ball3,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id3)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball3,
                        ]);
                    }
                } 
                $test_otvety3 = Test_otvety::where('test_voprosy_id', $request->for_id3)->get();
                foreach($test_otvety3 as $test_otvety03)
                {
                    $test_otvety03->delete();
                }
                $radio3 = $request->variant_radio3;
                $text3 = $request->variant_text3;
                if($text3 != null){
                    foreach($text3 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id3;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text3[$key];
                        $request['status_otveta']=$radio3[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa3')){
                $request->validate(['vopros_testa3' => 'string','ball3' => 'numeric',]);
                if($request->hasFile('rebate_image3')){
                    $request->validate(['rebate_image3' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file3=$request->file('rebate_image3');
                    $file_extension3 = $file3->getClientOriginalExtension();
                    $fileName3=$user_id.'3'.uniqid().rand(1, 1000).time().'.'. $file_extension3;
                    $file3->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName3);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa3;
                if($request->hasFile('rebate_image3')){$test_vopros->img_voprosa = $fileName3;}
                $test_vopros->ball = $request->ball3;
                $test_vopros->save();

                $radio3 = $request->variant_radio3;
                $text3 = $request->variant_text3;
                if($text3 != null){
                    foreach($text3 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text3[$key];
                        $request['status_otveta']=$radio3[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image3')){
                    $request->validate(['rebate_image3' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file3=$request->file('rebate_image3');
                    $file_extension3 = $file3->getClientOriginalExtension();
                    $fileName3=$user_id.'3'.uniqid().rand(1, 1000).time().'.'. $file_extension3;
                    $file3->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName3);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName3;
                    $test_vopros->ball = $request->ball3;
                    $test_vopros->save();

                    $radio3 = $request->variant_radio3;
                    $text3 = $request->variant_text3;
                    if($text3 != null){
                        foreach($text3 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text3[$key];
                            $request['status_otveta']=$radio3[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }


        if($request->for_edit4 == 1){
            if($request->hasFile('rebate_image4')){
                $test_vopros_img4 = Test_voprosy::where('id', $request->for_id4)->first();
                if($test_vopros_img4->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img4->img_voprosa);
                }
                $request->validate(['rebate_image4' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file4=$request->file('rebate_image4');
                $file_extension4 = $file4->getClientOriginalExtension();
                $fileName4=$user_id.'4'.uniqid().rand(1, 1000).time().'.'. $file_extension4;
                $file4->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName4);

                if($request->has('vopros_testa4')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                        'text_voprosa' => $request->vopros_testa4,
                        'img_voprosa' => $fileName4,
                        'ball' => $request->ball4,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName4,
                        'ball' => $request->ball4,
                    ]);
                }
                $test_otvety4 = Test_otvety::where('test_voprosy_id', $request->for_id4)->get();
                foreach($test_otvety4 as $test_otvety04)
                {
                    $test_otvety04->delete();
                }
                $radio4 = $request->variant_radio4;
                $text4 = $request->variant_text4;
                if($text4 != null){
                    foreach($text4 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id4;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text4[$key];
                        $request['status_otveta']=$radio4[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img4 == 1){
                    if($request->has('vopros_testa4')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                            'text_voprosa' => $request->vopros_testa4,
                            'ball' => $request->ball4,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball4,
                        ]);
                    }
                }
                if($request->for_img4 == 2){
                    $test_vopros_img4 = Test_voprosy::where('id', $request->for_id4)->first();
                    if($test_vopros_img4->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img4->img_voprosa);
                    }
                    if($request->has('vopros_testa4')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                            'text_voprosa' => $request->vopros_testa4,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball4,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball4,
                        ]);
                    }
                }  
                if($request->for_img4 == 0){
                    if($request->has('vopros_testa4')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                            'text_voprosa' => $request->vopros_testa4,
                            'ball' => $request->ball4,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id4)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball4,
                        ]);
                    }
                } 
                $test_otvety4 = Test_otvety::where('test_voprosy_id', $request->for_id4)->get();
                foreach($test_otvety4 as $test_otvety04)
                {
                    $test_otvety04->delete();
                }
                $radio4 = $request->variant_radio4;
                $text4 = $request->variant_text4;
                if($text4 != null){
                    foreach($text4 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id4;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text4[$key];
                        $request['status_otveta']=$radio4[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa4')){
                $request->validate(['vopros_testa4' => 'string','ball4' => 'numeric',]);
                if($request->hasFile('rebate_image4')){
                    $request->validate(['rebate_image4' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file4=$request->file('rebate_image4');
                    $file_extension4 = $file4->getClientOriginalExtension();
                    $fileName4=$user_id.'4'.uniqid().rand(1, 1000).time().'.'. $file_extension4;
                    $file4->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName4);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa4;
                if($request->hasFile('rebate_image4')){$test_vopros->img_voprosa = $fileName4;}
                $test_vopros->ball = $request->ball4;
                $test_vopros->save();

                $radio4 = $request->variant_radio4;
                $text4 = $request->variant_text4;
                if($text4 != null){
                    foreach($text4 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text4[$key];
                        $request['status_otveta']=$radio4[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image4')){
                    $request->validate(['rebate_image4' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file4=$request->file('rebate_image4');
                    $file_extension4 = $file4->getClientOriginalExtension();
                    $fileName4=$user_id.'4'.uniqid().rand(1, 1000).time().'.'. $file_extension4;
                    $file4->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName4);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName4;
                    $test_vopros->ball = $request->ball4;
                    $test_vopros->save();

                    $radio4 = $request->variant_radio4;
                    $text4 = $request->variant_text4;
                    if($text4 != null){
                        foreach($text4 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text4[$key];
                            $request['status_otveta']=$radio4[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }


        if($request->for_edit5 == 1){
            if($request->hasFile('rebate_image5')){
                $test_vopros_img5 = Test_voprosy::where('id', $request->for_id5)->first();
                if($test_vopros_img5->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img5->img_voprosa);
                }
                $request->validate(['rebate_image5' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file5=$request->file('rebate_image5');
                $file_extension5 = $file5->getClientOriginalExtension();
                $fileName5=$user_id.'5'.uniqid().rand(1, 1000).time().'.'. $file_extension5;
                $file5->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName5);

                if($request->has('vopros_testa5')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                        'text_voprosa' => $request->vopros_testa5,
                        'img_voprosa' => $fileName5,
                        'ball' => $request->ball5,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName5,
                        'ball' => $request->ball5,
                    ]);
                }
                $test_otvety5 = Test_otvety::where('test_voprosy_id', $request->for_id5)->get();
                foreach($test_otvety5 as $test_otvety05)
                {
                    $test_otvety05->delete();
                }
                $radio5 = $request->variant_radio5;
                $text5 = $request->variant_text5;
                if($text5 != null){
                    foreach($text5 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id5;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text5[$key];
                        $request['status_otveta']=$radio5[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img5 == 1){
                    if($request->has('vopros_testa5')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                            'text_voprosa' => $request->vopros_testa5,
                            'ball' => $request->ball5,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball5,
                        ]);
                    }
                }
                if($request->for_img5 == 2){
                    $test_vopros_img5 = Test_voprosy::where('id', $request->for_id5)->first();
                    if($test_vopros_img5->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img5->img_voprosa);
                    }
                    if($request->has('vopros_testa5')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                            'text_voprosa' => $request->vopros_testa5,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball5,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball5,
                        ]);
                    }
                }  
                if($request->for_img5 == 0){
                    if($request->has('vopros_testa5')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                            'text_voprosa' => $request->vopros_testa5,
                            'ball' => $request->ball5,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id5)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball5,
                        ]);
                    }
                } 
                $test_otvety5 = Test_otvety::where('test_voprosy_id', $request->for_id5)->get();
                foreach($test_otvety5 as $test_otvety05)
                {
                    $test_otvety05->delete();
                }
                $radio5 = $request->variant_radio5;
                $text5 = $request->variant_text5;
                if($text5 != null){
                    foreach($text5 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id5;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text5[$key];
                        $request['status_otveta']=$radio5[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa5')){
                $request->validate(['vopros_testa5' => 'string','ball5' => 'numeric',]);
                if($request->hasFile('rebate_image5')){
                    $request->validate(['rebate_image5' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file5=$request->file('rebate_image5');
                    $file_extension5 = $file5->getClientOriginalExtension();
                    $fileName5=$user_id.'5'.uniqid().rand(1, 1000).time().'.'. $file_extension5;
                    $file5->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName5);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa5;
                if($request->hasFile('rebate_image5')){$test_vopros->img_voprosa = $fileName5;}
                $test_vopros->ball = $request->ball5;
                $test_vopros->save();

                $radio5 = $request->variant_radio5;
                $text5 = $request->variant_text5;
                if($text5 != null){
                    foreach($text5 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text5[$key];
                        $request['status_otveta']=$radio5[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image5')){
                    $request->validate(['rebate_image5' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file5=$request->file('rebate_image5');
                    $file_extension5 = $file5->getClientOriginalExtension();
                    $fileName5=$user_id.'5'.uniqid().rand(1, 1000).time().'.'. $file_extension5;
                    $file5->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName5);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName5;
                    $test_vopros->ball = $request->ball5;
                    $test_vopros->save();

                    $radio5 = $request->variant_radio5;
                    $text5 = $request->variant_text5;
                    if($text5 != null){
                        foreach($text5 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text5[$key];
                            $request['status_otveta']=$radio5[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit6 == 1){
            if($request->hasFile('rebate_image6')){
                $test_vopros_img6 = Test_voprosy::where('id', $request->for_id6)->first();
                if($test_vopros_img6->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img6->img_voprosa);
                }
                $request->validate(['rebate_image6' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file6=$request->file('rebate_image6');
                $file_extension6 = $file6->getClientOriginalExtension();
                $fileName6=$user_id.'6'.uniqid().rand(1, 1000).time().'.'. $file_extension6;
                $file6->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName6);

                if($request->has('vopros_testa6')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                        'text_voprosa' => $request->vopros_testa6,
                        'img_voprosa' => $fileName6,
                        'ball' => $request->ball6,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName6,
                        'ball' => $request->ball6,
                    ]);
                }
                $test_otvety6 = Test_otvety::where('test_voprosy_id', $request->for_id6)->get();
                foreach($test_otvety6 as $test_otvety06)
                {
                    $test_otvety06->delete();
                }
                $radio6 = $request->variant_radio6;
                $text6 = $request->variant_text6;
                if($text6 != null){
                    foreach($text6 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id6;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text6[$key];
                        $request['status_otveta']=$radio6[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img6 == 1){
                    if($request->has('vopros_testa6')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                            'text_voprosa' => $request->vopros_testa6,
                            'ball' => $request->ball6,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball6,
                        ]);
                    }
                }
                if($request->for_img6 == 2){
                    $test_vopros_img6 = Test_voprosy::where('id', $request->for_id6)->first();
                    if($test_vopros_img6->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img6->img_voprosa);
                    }
                    if($request->has('vopros_testa6')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                            'text_voprosa' => $request->vopros_testa6,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball6,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball6,
                        ]);
                    }
                }  
                if($request->for_img6 == 0){
                    if($request->has('vopros_testa6')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                            'text_voprosa' => $request->vopros_testa6,
                            'ball' => $request->ball6,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id6)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball6,
                        ]);
                    }
                } 
                $test_otvety6 = Test_otvety::where('test_voprosy_id', $request->for_id6)->get();
                foreach($test_otvety6 as $test_otvety06)
                {
                    $test_otvety06->delete();
                }
                $radio6 = $request->variant_radio6;
                $text6 = $request->variant_text6;
                if($text6 != null){
                    foreach($text6 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id6;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text6[$key];
                        $request['status_otveta']=$radio6[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa6')){
                $request->validate(['vopros_testa6' => 'string','ball6' => 'numeric',]);
                if($request->hasFile('rebate_image6')){
                    $request->validate(['rebate_image6' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file6=$request->file('rebate_image6');
                    $file_extension6 = $file6->getClientOriginalExtension();
                    $fileName6=$user_id.'6'.uniqid().rand(1, 1000).time().'.'. $file_extension6;
                    $file6->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName6);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa6;
                if($request->hasFile('rebate_image6')){$test_vopros->img_voprosa = $fileName6;}
                $test_vopros->ball = $request->ball6;
                $test_vopros->save();

                $radio6 = $request->variant_radio6;
                $text6 = $request->variant_text6;
                if($text6 != null){
                    foreach($text6 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text6[$key];
                        $request['status_otveta']=$radio6[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image6')){
                    $request->validate(['rebate_image6' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file6=$request->file('rebate_image6');
                    $file_extension6 = $file6->getClientOriginalExtension();
                    $fileName6=$user_id.'6'.uniqid().rand(1, 1000).time().'.'. $file_extension6;
                    $file6->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName6);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName6;
                    $test_vopros->ball = $request->ball6;
                    $test_vopros->save();

                    $radio6 = $request->variant_radio6;
                    $text6 = $request->variant_text6;
                    if($text6 != null){
                        foreach($text6 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text6[$key];
                            $request['status_otveta']=$radio6[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit7 == 1){
            if($request->hasFile('rebate_image7')){
                $test_vopros_img7 = Test_voprosy::where('id', $request->for_id7)->first();
                if($test_vopros_img7->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img7->img_voprosa);
                }
                $request->validate(['rebate_image7' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file7=$request->file('rebate_image7');
                $file_extension7 = $file7->getClientOriginalExtension();
                $fileName7=$user_id.'7'.uniqid().rand(1, 1000).time().'.'. $file_extension7;
                $file7->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName7);

                if($request->has('vopros_testa7')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                        'text_voprosa' => $request->vopros_testa7,
                        'img_voprosa' => $fileName7,
                        'ball' => $request->ball7,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName7,
                        'ball' => $request->ball7,
                    ]);
                }
                $test_otvety7 = Test_otvety::where('test_voprosy_id', $request->for_id7)->get();
                foreach($test_otvety7 as $test_otvety07)
                {
                    $test_otvety07->delete();
                }
                $radio7 = $request->variant_radio7;
                $text7 = $request->variant_text7;
                if($text7 != null){
                    foreach($text7 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id7;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text7[$key];
                        $request['status_otveta']=$radio7[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img7 == 1){
                    if($request->has('vopros_testa7')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                            'text_voprosa' => $request->vopros_testa7,
                            'ball' => $request->ball7,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball7,
                        ]);
                    }
                }
                if($request->for_img7 == 2){
                    $test_vopros_img7 = Test_voprosy::where('id', $request->for_id7)->first();
                    if($test_vopros_img7->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img7->img_voprosa);
                    }
                    if($request->has('vopros_testa7')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                            'text_voprosa' => $request->vopros_testa7,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball7,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball7,
                        ]);
                    }
                }  
                if($request->for_img7 == 0){
                    if($request->has('vopros_testa7')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                            'text_voprosa' => $request->vopros_testa7,
                            'ball' => $request->ball7,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id7)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball7,
                        ]);
                    }
                } 
                $test_otvety7 = Test_otvety::where('test_voprosy_id', $request->for_id7)->get();
                foreach($test_otvety7 as $test_otvety07)
                {
                    $test_otvety07->delete();
                }
                $radio7 = $request->variant_radio7;
                $text7 = $request->variant_text7;
                if($text7 != null){
                    foreach($text7 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id7;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text7[$key];
                        $request['status_otveta']=$radio7[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa7')){
                $request->validate(['vopros_testa7' => 'string','ball7' => 'numeric',]);
                if($request->hasFile('rebate_image7')){
                    $request->validate(['rebate_image7' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file7=$request->file('rebate_image7');
                    $file_extension7 = $file7->getClientOriginalExtension();
                    $fileName7=$user_id.'7'.uniqid().rand(1, 1000).time().'.'. $file_extension7;
                    $file7->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName7);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa7;
                if($request->hasFile('rebate_image7')){$test_vopros->img_voprosa = $fileName7;}
                $test_vopros->ball = $request->ball7;
                $test_vopros->save();

                $radio7 = $request->variant_radio7;
                $text7 = $request->variant_text7;
                if($text7 != null){
                    foreach($text7 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text7[$key];
                        $request['status_otveta']=$radio7[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image7')){
                    $request->validate(['rebate_image7' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file7=$request->file('rebate_image7');
                    $file_extension7 = $file7->getClientOriginalExtension();
                    $fileName7=$user_id.'7'.uniqid().rand(1, 1000).time().'.'. $file_extension7;
                    $file7->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName7);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName7;
                    $test_vopros->ball = $request->ball7;
                    $test_vopros->save();

                    $radio7 = $request->variant_radio7;
                    $text7 = $request->variant_text7;
                    if($text7 != null){
                        foreach($text7 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text7[$key];
                            $request['status_otveta']=$radio7[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit8 == 1){
            if($request->hasFile('rebate_image8')){
                $test_vopros_img8 = Test_voprosy::where('id', $request->for_id8)->first();
                if($test_vopros_img8->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img8->img_voprosa);
                }
                $request->validate(['rebate_image8' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file8=$request->file('rebate_image8');
                $file_extension8 = $file8->getClientOriginalExtension();
                $fileName8=$user_id.'8'.uniqid().rand(1, 1000).time().'.'. $file_extension8;
                $file8->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName8);

                if($request->has('vopros_testa8')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                        'text_voprosa' => $request->vopros_testa8,
                        'img_voprosa' => $fileName8,
                        'ball' => $request->ball8,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName8,
                        'ball' => $request->ball8,
                    ]);
                }
                $test_otvety8 = Test_otvety::where('test_voprosy_id', $request->for_id8)->get();
                foreach($test_otvety8 as $test_otvety08)
                {
                    $test_otvety08->delete();
                }
                $radio8 = $request->variant_radio8;
                $text8 = $request->variant_text8;
                if($text8 != null){
                    foreach($text8 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id8;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text8[$key];
                        $request['status_otveta']=$radio8[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img8 == 1){
                    if($request->has('vopros_testa8')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                            'text_voprosa' => $request->vopros_testa8,
                            'ball' => $request->ball8,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball8,
                        ]);
                    }
                }
                if($request->for_img8 == 2){
                    $test_vopros_img8 = Test_voprosy::where('id', $request->for_id8)->first();
                    if($test_vopros_img8->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img8->img_voprosa);
                    }
                    if($request->has('vopros_testa8')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                            'text_voprosa' => $request->vopros_testa8,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball8,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball8,
                        ]);
                    }
                }  
                if($request->for_img8 == 0){
                    if($request->has('vopros_testa8')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                            'text_voprosa' => $request->vopros_testa8,
                            'ball' => $request->ball8,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id8)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball8,
                        ]);
                    }
                } 
                $test_otvety8 = Test_otvety::where('test_voprosy_id', $request->for_id8)->get();
                foreach($test_otvety8 as $test_otvety08)
                {
                    $test_otvety08->delete();
                }
                $radio8 = $request->variant_radio8;
                $text8 = $request->variant_text8;
                if($text8 != null){
                    foreach($text8 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id8;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text8[$key];
                        $request['status_otveta']=$radio8[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa8')){
                $request->validate(['vopros_testa8' => 'string','ball8' => 'numeric',]);
                if($request->hasFile('rebate_image8')){
                    $request->validate(['rebate_image8' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file8=$request->file('rebate_image8');
                    $file_extension8 = $file8->getClientOriginalExtension();
                    $fileName8=$user_id.'8'.uniqid().rand(1, 1000).time().'.'. $file_extension8;
                    $file8->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName8);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa8;
                if($request->hasFile('rebate_image8')){$test_vopros->img_voprosa = $fileName8;}
                $test_vopros->ball = $request->ball8;
                $test_vopros->save();

                $radio8 = $request->variant_radio8;
                $text8 = $request->variant_text8;
                if($text8 != null){
                    foreach($text8 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text8[$key];
                        $request['status_otveta']=$radio8[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image8')){
                    $request->validate(['rebate_image8' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file8=$request->file('rebate_image8');
                    $file_extension8 = $file8->getClientOriginalExtension();
                    $fileName8=$user_id.'8'.uniqid().rand(1, 1000).time().'.'. $file_extension8;
                    $file8->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName8);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName8;
                    $test_vopros->ball = $request->ball8;
                    $test_vopros->save();

                    $radio8 = $request->variant_radio8;
                    $text8 = $request->variant_text8;
                    if($text8 != null){
                        foreach($text8 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text8[$key];
                            $request['status_otveta']=$radio8[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit9 == 1){
            if($request->hasFile('rebate_image9')){
                $test_vopros_img9 = Test_voprosy::where('id', $request->for_id9)->first();
                if($test_vopros_img9->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img9->img_voprosa);
                }
                $request->validate(['rebate_image9' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file9=$request->file('rebate_image9');
                $file_extension9 = $file9->getClientOriginalExtension();
                $fileName9=$user_id.'9'.uniqid().rand(1, 1000).time().'.'. $file_extension9;
                $file9->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName9);

                if($request->has('vopros_testa9')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                        'text_voprosa' => $request->vopros_testa9,
                        'img_voprosa' => $fileName9,
                        'ball' => $request->ball9,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName9,
                        'ball' => $request->ball9,
                    ]);
                }
                $test_otvety9 = Test_otvety::where('test_voprosy_id', $request->for_id9)->get();
                foreach($test_otvety9 as $test_otvety09)
                {
                    $test_otvety09->delete();
                }
                $radio9 = $request->variant_radio9;
                $text9 = $request->variant_text9;
                if($text9 != null){
                    foreach($text9 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id9;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text9[$key];
                        $request['status_otveta']=$radio9[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img9 == 1){
                    if($request->has('vopros_testa9')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                            'text_voprosa' => $request->vopros_testa9,
                            'ball' => $request->ball9,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball9,
                        ]);
                    }
                }
                if($request->for_img9 == 2){
                    $test_vopros_img9 = Test_voprosy::where('id', $request->for_id9)->first();
                    if($test_vopros_img9->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img9->img_voprosa);
                    }
                    if($request->has('vopros_testa9')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                            'text_voprosa' => $request->vopros_testa9,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball9,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball9,
                        ]);
                    }
                }  
                if($request->for_img9 == 0){
                    if($request->has('vopros_testa9')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                            'text_voprosa' => $request->vopros_testa9,
                            'ball' => $request->ball9,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id9)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball9,
                        ]);
                    }
                } 
                $test_otvety9 = Test_otvety::where('test_voprosy_id', $request->for_id9)->get();
                foreach($test_otvety9 as $test_otvety09)
                {
                    $test_otvety09->delete();
                }
                $radio9 = $request->variant_radio9;
                $text9 = $request->variant_text9;
                if($text9 != null){
                    foreach($text9 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id9;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text9[$key];
                        $request['status_otveta']=$radio9[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa9')){
                $request->validate(['vopros_testa9' => 'string','ball9' => 'numeric',]);
                if($request->hasFile('rebate_image9')){
                    $request->validate(['rebate_image9' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file9=$request->file('rebate_image9');
                    $file_extension9 = $file9->getClientOriginalExtension();
                    $fileName9=$user_id.'9'.uniqid().rand(1, 1000).time().'.'. $file_extension9;
                    $file9->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName9);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa9;
                if($request->hasFile('rebate_image9')){$test_vopros->img_voprosa = $fileName9;}
                $test_vopros->ball = $request->ball9;
                $test_vopros->save();

                $radio9 = $request->variant_radio9;
                $text9 = $request->variant_text9;
                if($text9 != null){
                    foreach($text9 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text9[$key];
                        $request['status_otveta']=$radio9[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image9')){
                    $request->validate(['rebate_image9' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file9=$request->file('rebate_image9');
                    $file_extension9 = $file9->getClientOriginalExtension();
                    $fileName9=$user_id.'9'.uniqid().rand(1, 1000).time().'.'. $file_extension9;
                    $file9->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName9);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName9;
                    $test_vopros->ball = $request->ball9;
                    $test_vopros->save();

                    $radio9 = $request->variant_radio9;
                    $text9 = $request->variant_text9;
                    if($text9 != null){
                        foreach($text9 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text9[$key];
                            $request['status_otveta']=$radio9[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit10 == 1){
            if($request->hasFile('rebate_image10')){
                $test_vopros_img10 = Test_voprosy::where('id', $request->for_id10)->first();
                if($test_vopros_img10->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img10->img_voprosa);
                }
                $request->validate(['rebate_image10' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file10=$request->file('rebate_image10');
                $file_extension10 = $file10->getClientOriginalExtension();
                $fileName10=$user_id.'10'.uniqid().rand(1, 1000).time().'.'. $file_extension10;
                $file10->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName10);

                if($request->has('vopros_testa10')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                        'text_voprosa' => $request->vopros_testa10,
                        'img_voprosa' => $fileName10,
                        'ball' => $request->ball10,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName10,
                        'ball' => $request->ball10,
                    ]);
                }
                $test_otvety10 = Test_otvety::where('test_voprosy_id', $request->for_id10)->get();
                foreach($test_otvety10 as $test_otvety010)
                {
                    $test_otvety010->delete();
                }
                $radio10 = $request->variant_radio10;
                $text10 = $request->variant_text10;
                if($text10 != null){
                    foreach($text10 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id10;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text10[$key];
                        $request['status_otveta']=$radio10[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img10 == 1){
                    if($request->has('vopros_testa10')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                            'text_voprosa' => $request->vopros_testa10,
                            'ball' => $request->ball10,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball10,
                        ]);
                    }
                }
                if($request->for_img10 == 2){
                    $test_vopros_img10 = Test_voprosy::where('id', $request->for_id10)->first();
                    if($test_vopros_img10->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img10->img_voprosa);
                    }
                    if($request->has('vopros_testa10')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                            'text_voprosa' => $request->vopros_testa10,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball10,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball10,
                        ]);
                    }
                }  
                if($request->for_img10 == 0){
                    if($request->has('vopros_testa10')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                            'text_voprosa' => $request->vopros_testa10,
                            'ball' => $request->ball10,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id10)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball10,
                        ]);
                    }
                } 
                $test_otvety10 = Test_otvety::where('test_voprosy_id', $request->for_id10)->get();
                foreach($test_otvety10 as $test_otvety010)
                {
                    $test_otvety010->delete();
                }
                $radio10 = $request->variant_radio10;
                $text10 = $request->variant_text10;
                if($text10 != null){
                    foreach($text10 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id10;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text10[$key];
                        $request['status_otveta']=$radio10[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa10')){
                $request->validate(['vopros_testa10' => 'string','ball10' => 'numeric',]);
                if($request->hasFile('rebate_image10')){
                    $request->validate(['rebate_image10' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file10=$request->file('rebate_image10');
                    $file_extension10 = $file10->getClientOriginalExtension();
                    $fileName10=$user_id.'10'.uniqid().rand(1, 1000).time().'.'. $file_extension10;
                    $file10->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName10);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa10;
                if($request->hasFile('rebate_image10')){$test_vopros->img_voprosa = $fileName10;}
                $test_vopros->ball = $request->ball10;
                $test_vopros->save();

                $radio10 = $request->variant_radio10;
                $text10 = $request->variant_text10;
                if($text10 != null){
                    foreach($text10 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text10[$key];
                        $request['status_otveta']=$radio10[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image10')){
                    $request->validate(['rebate_image10' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file10=$request->file('rebate_image10');
                    $file_extension10 = $file10->getClientOriginalExtension();
                    $fileName10=$user_id.'10'.uniqid().rand(1, 1000).time().'.'. $file_extension10;
                    $file10->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName10);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName10;
                    $test_vopros->ball = $request->ball10;
                    $test_vopros->save();

                    $radio10 = $request->variant_radio10;
                    $text10 = $request->variant_text10;
                    if($text10 != null){
                        foreach($text10 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text10[$key];
                            $request['status_otveta']=$radio10[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit11 == 1){
            if($request->hasFile('rebate_image11')){
                $test_vopros_img11 = Test_voprosy::where('id', $request->for_id11)->first();
                if($test_vopros_img11->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img11->img_voprosa);
                }
                $request->validate(['rebate_image11' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file11=$request->file('rebate_image11');
                $file_extension11 = $file11->getClientOriginalExtension();
                $fileName11=$user_id.'11'.uniqid().rand(1, 1100).time().'.'. $file_extension11;
                $file11->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName11);

                if($request->has('vopros_testa11')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                        'text_voprosa' => $request->vopros_testa11,
                        'img_voprosa' => $fileName11,
                        'ball' => $request->ball11,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName11,
                        'ball' => $request->ball11,
                    ]);
                }
                $test_otvety11 = Test_otvety::where('test_voprosy_id', $request->for_id11)->get();
                foreach($test_otvety11 as $test_otvety011)
                {
                    $test_otvety011->delete();
                }
                $radio11 = $request->variant_radio11;
                $text11 = $request->variant_text11;
                if($text11 != null){
                    foreach($text11 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id11;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text11[$key];
                        $request['status_otveta']=$radio11[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img11 == 1){
                    if($request->has('vopros_testa11')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                            'text_voprosa' => $request->vopros_testa11,
                            'ball' => $request->ball11,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball11,
                        ]);
                    }
                }
                if($request->for_img11 == 2){
                    $test_vopros_img11 = Test_voprosy::where('id', $request->for_id11)->first();
                    if($test_vopros_img11->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img11->img_voprosa);
                    }
                    if($request->has('vopros_testa11')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                            'text_voprosa' => $request->vopros_testa11,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball11,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball11,
                        ]);
                    }
                }  
                if($request->for_img11 == 0){
                    if($request->has('vopros_testa11')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                            'text_voprosa' => $request->vopros_testa11,
                            'ball' => $request->ball11,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id11)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball11,
                        ]);
                    }
                } 
                $test_otvety11 = Test_otvety::where('test_voprosy_id', $request->for_id11)->get();
                foreach($test_otvety11 as $test_otvety011)
                {
                    $test_otvety011->delete();
                }
                $radio11 = $request->variant_radio11;
                $text11 = $request->variant_text11;
                if($text11 != null){
                    foreach($text11 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id11;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text11[$key];
                        $request['status_otveta']=$radio11[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa11')){
                $request->validate(['vopros_testa11' => 'string','ball11' => 'numeric',]);
                if($request->hasFile('rebate_image11')){
                    $request->validate(['rebate_image11' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file11=$request->file('rebate_image11');
                    $file_extension11 = $file11->getClientOriginalExtension();
                    $fileName11=$user_id.'11'.uniqid().rand(1, 1100).time().'.'. $file_extension11;
                    $file11->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName11);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa11;
                if($request->hasFile('rebate_image11')){$test_vopros->img_voprosa = $fileName11;}
                $test_vopros->ball = $request->ball11;
                $test_vopros->save();

                $radio11 = $request->variant_radio11;
                $text11 = $request->variant_text11;
                if($text11 != null){
                    foreach($text11 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text11[$key];
                        $request['status_otveta']=$radio11[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image11')){
                    $request->validate(['rebate_image11' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file11=$request->file('rebate_image11');
                    $file_extension11 = $file11->getClientOriginalExtension();
                    $fileName11=$user_id.'11'.uniqid().rand(1, 1100).time().'.'. $file_extension11;
                    $file11->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName11);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName11;
                    $test_vopros->ball = $request->ball11;
                    $test_vopros->save();

                    $radio11 = $request->variant_radio11;
                    $text11 = $request->variant_text11;
                    if($text11 != null){
                        foreach($text11 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text11[$key];
                            $request['status_otveta']=$radio11[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit12 == 1){
            if($request->hasFile('rebate_image12')){
                $test_vopros_img12 = Test_voprosy::where('id', $request->for_id12)->first();
                if($test_vopros_img12->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img12->img_voprosa);
                }
                $request->validate(['rebate_image12' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file12=$request->file('rebate_image12');
                $file_extension12 = $file12->getClientOriginalExtension();
                $fileName12=$user_id.'12'.uniqid().rand(1, 1200).time().'.'. $file_extension12;
                $file12->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName12);

                if($request->has('vopros_testa12')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                        'text_voprosa' => $request->vopros_testa12,
                        'img_voprosa' => $fileName12,
                        'ball' => $request->ball12,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName12,
                        'ball' => $request->ball12,
                    ]);
                }
                $test_otvety12 = Test_otvety::where('test_voprosy_id', $request->for_id12)->get();
                foreach($test_otvety12 as $test_otvety012)
                {
                    $test_otvety012->delete();
                }
                $radio12 = $request->variant_radio12;
                $text12 = $request->variant_text12;
                if($text12 != null){
                    foreach($text12 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id12;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text12[$key];
                        $request['status_otveta']=$radio12[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img12 == 1){
                    if($request->has('vopros_testa12')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                            'text_voprosa' => $request->vopros_testa12,
                            'ball' => $request->ball12,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball12,
                        ]);
                    }
                }
                if($request->for_img12 == 2){
                    $test_vopros_img12 = Test_voprosy::where('id', $request->for_id12)->first();
                    if($test_vopros_img12->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img12->img_voprosa);
                    }
                    if($request->has('vopros_testa12')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                            'text_voprosa' => $request->vopros_testa12,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball12,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball12,
                        ]);
                    }
                }  
                if($request->for_img12 == 0){
                    if($request->has('vopros_testa12')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                            'text_voprosa' => $request->vopros_testa12,
                            'ball' => $request->ball12,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id12)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball12,
                        ]);
                    }
                } 
                $test_otvety12 = Test_otvety::where('test_voprosy_id', $request->for_id12)->get();
                foreach($test_otvety12 as $test_otvety012)
                {
                    $test_otvety012->delete();
                }
                $radio12 = $request->variant_radio12;
                $text12 = $request->variant_text12;
                if($text12 != null){
                    foreach($text12 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id12;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text12[$key];
                        $request['status_otveta']=$radio12[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa12')){
                $request->validate(['vopros_testa12' => 'string','ball12' => 'numeric',]);
                if($request->hasFile('rebate_image12')){
                    $request->validate(['rebate_image12' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file12=$request->file('rebate_image12');
                    $file_extension12 = $file12->getClientOriginalExtension();
                    $fileName12=$user_id.'12'.uniqid().rand(1, 1200).time().'.'. $file_extension12;
                    $file12->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName12);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa12;
                if($request->hasFile('rebate_image12')){$test_vopros->img_voprosa = $fileName12;}
                $test_vopros->ball = $request->ball12;
                $test_vopros->save();

                $radio12 = $request->variant_radio12;
                $text12 = $request->variant_text12;
                if($text12 != null){
                    foreach($text12 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text12[$key];
                        $request['status_otveta']=$radio12[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image12')){
                    $request->validate(['rebate_image12' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file12=$request->file('rebate_image12');
                    $file_extension12 = $file12->getClientOriginalExtension();
                    $fileName12=$user_id.'12'.uniqid().rand(1, 1200).time().'.'. $file_extension12;
                    $file12->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName12);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName12;
                    $test_vopros->ball = $request->ball12;
                    $test_vopros->save();

                    $radio12 = $request->variant_radio12;
                    $text12 = $request->variant_text12;
                    if($text12 != null){
                        foreach($text12 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text12[$key];
                            $request['status_otveta']=$radio12[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit13 == 1){
            if($request->hasFile('rebate_image13')){
                $test_vopros_img13 = Test_voprosy::where('id', $request->for_id13)->first();
                if($test_vopros_img13->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img13->img_voprosa);
                }
                $request->validate(['rebate_image13' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file13=$request->file('rebate_image13');
                $file_extension13 = $file13->getClientOriginalExtension();
                $fileName13=$user_id.'13'.uniqid().rand(1, 1300).time().'.'. $file_extension13;
                $file13->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName13);

                if($request->has('vopros_testa13')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                        'text_voprosa' => $request->vopros_testa13,
                        'img_voprosa' => $fileName13,
                        'ball' => $request->ball13,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName13,
                        'ball' => $request->ball13,
                    ]);
                }
                $test_otvety13 = Test_otvety::where('test_voprosy_id', $request->for_id13)->get();
                foreach($test_otvety13 as $test_otvety013)
                {
                    $test_otvety013->delete();
                }
                $radio13 = $request->variant_radio13;
                $text13 = $request->variant_text13;
                if($text13 != null){
                    foreach($text13 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id13;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text13[$key];
                        $request['status_otveta']=$radio13[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img13 == 1){
                    if($request->has('vopros_testa13')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                            'text_voprosa' => $request->vopros_testa13,
                            'ball' => $request->ball13,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball13,
                        ]);
                    }
                }
                if($request->for_img13 == 2){
                    $test_vopros_img13 = Test_voprosy::where('id', $request->for_id13)->first();
                    if($test_vopros_img13->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img13->img_voprosa);
                    }
                    if($request->has('vopros_testa13')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                            'text_voprosa' => $request->vopros_testa13,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball13,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball13,
                        ]);
                    }
                }  
                if($request->for_img13 == 0){
                    if($request->has('vopros_testa13')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                            'text_voprosa' => $request->vopros_testa13,
                            'ball' => $request->ball13,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id13)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball13,
                        ]);
                    }
                } 
                $test_otvety13 = Test_otvety::where('test_voprosy_id', $request->for_id13)->get();
                foreach($test_otvety13 as $test_otvety013)
                {
                    $test_otvety013->delete();
                }
                $radio13 = $request->variant_radio13;
                $text13 = $request->variant_text13;
                if($text13 != null){
                    foreach($text13 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id13;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text13[$key];
                        $request['status_otveta']=$radio13[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa13')){
                $request->validate(['vopros_testa13' => 'string','ball13' => 'numeric',]);
                if($request->hasFile('rebate_image13')){
                    $request->validate(['rebate_image13' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file13=$request->file('rebate_image13');
                    $file_extension13 = $file13->getClientOriginalExtension();
                    $fileName13=$user_id.'13'.uniqid().rand(1, 1300).time().'.'. $file_extension13;
                    $file13->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName13);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa13;
                if($request->hasFile('rebate_image13')){$test_vopros->img_voprosa = $fileName13;}
                $test_vopros->ball = $request->ball13;
                $test_vopros->save();

                $radio13 = $request->variant_radio13;
                $text13 = $request->variant_text13;
                if($text13 != null){
                    foreach($text13 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text13[$key];
                        $request['status_otveta']=$radio13[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image13')){
                    $request->validate(['rebate_image13' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file13=$request->file('rebate_image13');
                    $file_extension13 = $file13->getClientOriginalExtension();
                    $fileName13=$user_id.'13'.uniqid().rand(1, 1300).time().'.'. $file_extension13;
                    $file13->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName13);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName13;
                    $test_vopros->ball = $request->ball13;
                    $test_vopros->save();

                    $radio13 = $request->variant_radio13;
                    $text13 = $request->variant_text13;
                    if($text13 != null){
                        foreach($text13 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text13[$key];
                            $request['status_otveta']=$radio13[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit14 == 1){
            if($request->hasFile('rebate_image14')){
                $test_vopros_img14 = Test_voprosy::where('id', $request->for_id14)->first();
                if($test_vopros_img14->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img14->img_voprosa);
                }
                $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file14=$request->file('rebate_image14');
                $file_extension14 = $file14->getClientOriginalExtension();
                $fileName14=$user_id.'14'.uniqid().rand(1, 1400).time().'.'. $file_extension14;
                $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);

                if($request->has('vopros_testa14')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                        'text_voprosa' => $request->vopros_testa14,
                        'img_voprosa' => $fileName14,
                        'ball' => $request->ball14,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName14,
                        'ball' => $request->ball14,
                    ]);
                }
                $test_otvety14 = Test_otvety::where('test_voprosy_id', $request->for_id14)->get();
                foreach($test_otvety14 as $test_otvety014)
                {
                    $test_otvety014->delete();
                }
                $radio14 = $request->variant_radio14;
                $text14 = $request->variant_text14;
                if($text14 != null){
                    foreach($text14 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id14;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text14[$key];
                        $request['status_otveta']=$radio14[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img14 == 1){
                    if($request->has('vopros_testa14')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                            'text_voprosa' => $request->vopros_testa14,
                            'ball' => $request->ball14,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball14,
                        ]);
                    }
                }
                if($request->for_img14 == 2){
                    $test_vopros_img14 = Test_voprosy::where('id', $request->for_id14)->first();
                    if($test_vopros_img14->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img14->img_voprosa);
                    }
                    if($request->has('vopros_testa14')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                            'text_voprosa' => $request->vopros_testa14,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball14,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball14,
                        ]);
                    }
                }  
                if($request->for_img14 == 0){
                    if($request->has('vopros_testa14')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                            'text_voprosa' => $request->vopros_testa14,
                            'ball' => $request->ball14,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id14)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball14,
                        ]);
                    }
                } 
                $test_otvety14 = Test_otvety::where('test_voprosy_id', $request->for_id14)->get();
                foreach($test_otvety14 as $test_otvety014)
                {
                    $test_otvety014->delete();
                }
                $radio14 = $request->variant_radio14;
                $text14 = $request->variant_text14;
                if($text14 != null){
                    foreach($text14 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id14;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text14[$key];
                        $request['status_otveta']=$radio14[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa14')){
                $request->validate(['vopros_testa14' => 'string','ball14' => 'numeric',]);
                if($request->hasFile('rebate_image14')){
                    $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file14=$request->file('rebate_image14');
                    $file_extension14 = $file14->getClientOriginalExtension();
                    $fileName14=$user_id.'14'.uniqid().rand(1, 1400).time().'.'. $file_extension14;
                    $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa14;
                if($request->hasFile('rebate_image14')){$test_vopros->img_voprosa = $fileName14;}
                $test_vopros->ball = $request->ball14;
                $test_vopros->save();

                $radio14 = $request->variant_radio14;
                $text14 = $request->variant_text14;
                if($text14 != null){
                    foreach($text14 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text14[$key];
                        $request['status_otveta']=$radio14[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image14')){
                    $request->validate(['rebate_image14' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file14=$request->file('rebate_image14');
                    $file_extension14 = $file14->getClientOriginalExtension();
                    $fileName14=$user_id.'14'.uniqid().rand(1, 1400).time().'.'. $file_extension14;
                    $file14->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName14);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName14;
                    $test_vopros->ball = $request->ball14;
                    $test_vopros->save();

                    $radio14 = $request->variant_radio14;
                    $text14 = $request->variant_text14;
                    if($text14 != null){
                        foreach($text14 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text14[$key];
                            $request['status_otveta']=$radio14[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit15 == 1){
            if($request->hasFile('rebate_image15')){
                $test_vopros_img15 = Test_voprosy::where('id', $request->for_id15)->first();
                if($test_vopros_img15->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img15->img_voprosa);
                }
                $request->validate(['rebate_image15' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file15=$request->file('rebate_image15');
                $file_extension15 = $file15->getClientOriginalExtension();
                $fileName15=$user_id.'15'.uniqid().rand(1, 1500).time().'.'. $file_extension15;
                $file15->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName15);

                if($request->has('vopros_testa15')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                        'text_voprosa' => $request->vopros_testa15,
                        'img_voprosa' => $fileName15,
                        'ball' => $request->ball15,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName15,
                        'ball' => $request->ball15,
                    ]);
                }
                $test_otvety15 = Test_otvety::where('test_voprosy_id', $request->for_id15)->get();
                foreach($test_otvety15 as $test_otvety015)
                {
                    $test_otvety015->delete();
                }
                $radio15 = $request->variant_radio15;
                $text15 = $request->variant_text15;
                if($text15 != null){
                    foreach($text15 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id15;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text15[$key];
                        $request['status_otveta']=$radio15[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img15 == 1){
                    if($request->has('vopros_testa15')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                            'text_voprosa' => $request->vopros_testa15,
                            'ball' => $request->ball15,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball15,
                        ]);
                    }
                }
                if($request->for_img15 == 2){
                    $test_vopros_img15 = Test_voprosy::where('id', $request->for_id15)->first();
                    if($test_vopros_img15->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img15->img_voprosa);
                    }
                    if($request->has('vopros_testa15')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                            'text_voprosa' => $request->vopros_testa15,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball15,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball15,
                        ]);
                    }
                }  
                if($request->for_img15 == 0){
                    if($request->has('vopros_testa15')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                            'text_voprosa' => $request->vopros_testa15,
                            'ball' => $request->ball15,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id15)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball15,
                        ]);
                    }
                } 
                $test_otvety15 = Test_otvety::where('test_voprosy_id', $request->for_id15)->get();
                foreach($test_otvety15 as $test_otvety015)
                {
                    $test_otvety015->delete();
                }
                $radio15 = $request->variant_radio15;
                $text15 = $request->variant_text15;
                if($text15 != null){
                    foreach($text15 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id15;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text15[$key];
                        $request['status_otveta']=$radio15[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa15')){
                $request->validate(['vopros_testa15' => 'string','ball15' => 'numeric',]);
                if($request->hasFile('rebate_image15')){
                    $request->validate(['rebate_image15' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file15=$request->file('rebate_image15');
                    $file_extension15 = $file15->getClientOriginalExtension();
                    $fileName15=$user_id.'15'.uniqid().rand(1, 1500).time().'.'. $file_extension15;
                    $file15->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName15);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa15;
                if($request->hasFile('rebate_image15')){$test_vopros->img_voprosa = $fileName15;}
                $test_vopros->ball = $request->ball15;
                $test_vopros->save();

                $radio15 = $request->variant_radio15;
                $text15 = $request->variant_text15;
                if($text15 != null){
                    foreach($text15 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text15[$key];
                        $request['status_otveta']=$radio15[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image15')){
                    $request->validate(['rebate_image15' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file15=$request->file('rebate_image15');
                    $file_extension15 = $file15->getClientOriginalExtension();
                    $fileName15=$user_id.'15'.uniqid().rand(1, 1500).time().'.'. $file_extension15;
                    $file15->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName15);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName15;
                    $test_vopros->ball = $request->ball15;
                    $test_vopros->save();

                    $radio15 = $request->variant_radio15;
                    $text15 = $request->variant_text15;
                    if($text15 != null){
                        foreach($text15 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text15[$key];
                            $request['status_otveta']=$radio15[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit16 == 1){
            if($request->hasFile('rebate_image16')){
                $test_vopros_img16 = Test_voprosy::where('id', $request->for_id16)->first();
                if($test_vopros_img16->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img16->img_voprosa);
                }
                $request->validate(['rebate_image16' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file16=$request->file('rebate_image16');
                $file_extension16 = $file16->getClientOriginalExtension();
                $fileName16=$user_id.'16'.uniqid().rand(1, 1600).time().'.'. $file_extension16;
                $file16->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName16);

                if($request->has('vopros_testa16')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                        'text_voprosa' => $request->vopros_testa16,
                        'img_voprosa' => $fileName16,
                        'ball' => $request->ball16,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName16,
                        'ball' => $request->ball16,
                    ]);
                }
                $test_otvety16 = Test_otvety::where('test_voprosy_id', $request->for_id16)->get();
                foreach($test_otvety16 as $test_otvety016)
                {
                    $test_otvety016->delete();
                }
                $radio16 = $request->variant_radio16;
                $text16 = $request->variant_text16;
                if($text16 != null){
                    foreach($text16 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id16;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text16[$key];
                        $request['status_otveta']=$radio16[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img16 == 1){
                    if($request->has('vopros_testa16')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                            'text_voprosa' => $request->vopros_testa16,
                            'ball' => $request->ball16,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball16,
                        ]);
                    }
                }
                if($request->for_img16 == 2){
                    $test_vopros_img16 = Test_voprosy::where('id', $request->for_id16)->first();
                    if($test_vopros_img16->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img16->img_voprosa);
                    }
                    if($request->has('vopros_testa16')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                            'text_voprosa' => $request->vopros_testa16,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball16,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball16,
                        ]);
                    }
                }  
                if($request->for_img16 == 0){
                    if($request->has('vopros_testa16')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                            'text_voprosa' => $request->vopros_testa16,
                            'ball' => $request->ball16,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id16)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball16,
                        ]);
                    }
                } 
                $test_otvety16 = Test_otvety::where('test_voprosy_id', $request->for_id16)->get();
                foreach($test_otvety16 as $test_otvety016)
                {
                    $test_otvety016->delete();
                }
                $radio16 = $request->variant_radio16;
                $text16 = $request->variant_text16;
                if($text16 != null){
                    foreach($text16 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id16;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text16[$key];
                        $request['status_otveta']=$radio16[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa16')){
                $request->validate(['vopros_testa16' => 'string','ball16' => 'numeric',]);
                if($request->hasFile('rebate_image16')){
                    $request->validate(['rebate_image16' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file16=$request->file('rebate_image16');
                    $file_extension16 = $file16->getClientOriginalExtension();
                    $fileName16=$user_id.'16'.uniqid().rand(1, 1600).time().'.'. $file_extension16;
                    $file16->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName16);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa16;
                if($request->hasFile('rebate_image16')){$test_vopros->img_voprosa = $fileName16;}
                $test_vopros->ball = $request->ball16;
                $test_vopros->save();

                $radio16 = $request->variant_radio16;
                $text16 = $request->variant_text16;
                if($text16 != null){
                    foreach($text16 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text16[$key];
                        $request['status_otveta']=$radio16[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image16')){
                    $request->validate(['rebate_image16' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file16=$request->file('rebate_image16');
                    $file_extension16 = $file16->getClientOriginalExtension();
                    $fileName16=$user_id.'16'.uniqid().rand(1, 1600).time().'.'. $file_extension16;
                    $file16->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName16);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName16;
                    $test_vopros->ball = $request->ball16;
                    $test_vopros->save();

                    $radio16 = $request->variant_radio16;
                    $text16 = $request->variant_text16;
                    if($text16 != null){
                        foreach($text16 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text16[$key];
                            $request['status_otveta']=$radio16[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit17 == 1){
            if($request->hasFile('rebate_image17')){
                $test_vopros_img17 = Test_voprosy::where('id', $request->for_id17)->first();
                if($test_vopros_img17->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img17->img_voprosa);
                }
                $request->validate(['rebate_image17' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file17=$request->file('rebate_image17');
                $file_extension17 = $file17->getClientOriginalExtension();
                $fileName17=$user_id.'17'.uniqid().rand(1, 1700).time().'.'. $file_extension17;
                $file17->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName17);

                if($request->has('vopros_testa17')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                        'text_voprosa' => $request->vopros_testa17,
                        'img_voprosa' => $fileName17,
                        'ball' => $request->ball17,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName17,
                        'ball' => $request->ball17,
                    ]);
                }
                $test_otvety17 = Test_otvety::where('test_voprosy_id', $request->for_id17)->get();
                foreach($test_otvety17 as $test_otvety017)
                {
                    $test_otvety017->delete();
                }
                $radio17 = $request->variant_radio17;
                $text17 = $request->variant_text17;
                if($text17 != null){
                    foreach($text17 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id17;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text17[$key];
                        $request['status_otveta']=$radio17[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img17 == 1){
                    if($request->has('vopros_testa17')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                            'text_voprosa' => $request->vopros_testa17,
                            'ball' => $request->ball17,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball17,
                        ]);
                    }
                }
                if($request->for_img17 == 2){
                    $test_vopros_img17 = Test_voprosy::where('id', $request->for_id17)->first();
                    if($test_vopros_img17->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img17->img_voprosa);
                    }
                    if($request->has('vopros_testa17')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                            'text_voprosa' => $request->vopros_testa17,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball17,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball17,
                        ]);
                    }
                }  
                if($request->for_img17 == 0){
                    if($request->has('vopros_testa17')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                            'text_voprosa' => $request->vopros_testa17,
                            'ball' => $request->ball17,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id17)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball17,
                        ]);
                    }
                } 
                $test_otvety17 = Test_otvety::where('test_voprosy_id', $request->for_id17)->get();
                foreach($test_otvety17 as $test_otvety017)
                {
                    $test_otvety017->delete();
                }
                $radio17 = $request->variant_radio17;
                $text17 = $request->variant_text17;
                if($text17 != null){
                    foreach($text17 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id17;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text17[$key];
                        $request['status_otveta']=$radio17[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa17')){
                $request->validate(['vopros_testa17' => 'string','ball17' => 'numeric',]);
                if($request->hasFile('rebate_image17')){
                    $request->validate(['rebate_image17' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file17=$request->file('rebate_image17');
                    $file_extension17 = $file17->getClientOriginalExtension();
                    $fileName17=$user_id.'17'.uniqid().rand(1, 1700).time().'.'. $file_extension17;
                    $file17->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName17);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa17;
                if($request->hasFile('rebate_image17')){$test_vopros->img_voprosa = $fileName17;}
                $test_vopros->ball = $request->ball17;
                $test_vopros->save();

                $radio17 = $request->variant_radio17;
                $text17 = $request->variant_text17;
                if($text17 != null){
                    foreach($text17 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text17[$key];
                        $request['status_otveta']=$radio17[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image17')){
                    $request->validate(['rebate_image17' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file17=$request->file('rebate_image17');
                    $file_extension17 = $file17->getClientOriginalExtension();
                    $fileName17=$user_id.'17'.uniqid().rand(1, 1700).time().'.'. $file_extension17;
                    $file17->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName17);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName17;
                    $test_vopros->ball = $request->ball17;
                    $test_vopros->save();

                    $radio17 = $request->variant_radio17;
                    $text17 = $request->variant_text17;
                    if($text17 != null){
                        foreach($text17 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text17[$key];
                            $request['status_otveta']=$radio17[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit18 == 1){
            if($request->hasFile('rebate_image18')){
                $test_vopros_img18 = Test_voprosy::where('id', $request->for_id18)->first();
                if($test_vopros_img18->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img18->img_voprosa);
                }
                $request->validate(['rebate_image18' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file18=$request->file('rebate_image18');
                $file_extension18 = $file18->getClientOriginalExtension();
                $fileName18=$user_id.'18'.uniqid().rand(1, 1800).time().'.'. $file_extension18;
                $file18->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName18);

                if($request->has('vopros_testa18')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                        'text_voprosa' => $request->vopros_testa18,
                        'img_voprosa' => $fileName18,
                        'ball' => $request->ball18,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName18,
                        'ball' => $request->ball18,
                    ]);
                }
                $test_otvety18 = Test_otvety::where('test_voprosy_id', $request->for_id18)->get();
                foreach($test_otvety18 as $test_otvety018)
                {
                    $test_otvety018->delete();
                }
                $radio18 = $request->variant_radio18;
                $text18 = $request->variant_text18;
                if($text18 != null){
                    foreach($text18 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id18;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text18[$key];
                        $request['status_otveta']=$radio18[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img18 == 1){
                    if($request->has('vopros_testa18')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                            'text_voprosa' => $request->vopros_testa18,
                            'ball' => $request->ball18,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball18,
                        ]);
                    }
                }
                if($request->for_img18 == 2){
                    $test_vopros_img18 = Test_voprosy::where('id', $request->for_id18)->first();
                    if($test_vopros_img18->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img18->img_voprosa);
                    }
                    if($request->has('vopros_testa18')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                            'text_voprosa' => $request->vopros_testa18,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball18,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball18,
                        ]);
                    }
                }  
                if($request->for_img18 == 0){
                    if($request->has('vopros_testa18')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                            'text_voprosa' => $request->vopros_testa18,
                            'ball' => $request->ball18,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id18)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball18,
                        ]);
                    }
                } 
                $test_otvety18 = Test_otvety::where('test_voprosy_id', $request->for_id18)->get();
                foreach($test_otvety18 as $test_otvety018)
                {
                    $test_otvety018->delete();
                }
                $radio18 = $request->variant_radio18;
                $text18 = $request->variant_text18;
                if($text18 != null){
                    foreach($text18 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id18;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text18[$key];
                        $request['status_otveta']=$radio18[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa18')){
                $request->validate(['vopros_testa18' => 'string','ball18' => 'numeric',]);
                if($request->hasFile('rebate_image18')){
                    $request->validate(['rebate_image18' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file18=$request->file('rebate_image18');
                    $file_extension18 = $file18->getClientOriginalExtension();
                    $fileName18=$user_id.'18'.uniqid().rand(1, 1800).time().'.'. $file_extension18;
                    $file18->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName18);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa18;
                if($request->hasFile('rebate_image18')){$test_vopros->img_voprosa = $fileName18;}
                $test_vopros->ball = $request->ball18;
                $test_vopros->save();

                $radio18 = $request->variant_radio18;
                $text18 = $request->variant_text18;
                if($text18 != null){
                    foreach($text18 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text18[$key];
                        $request['status_otveta']=$radio18[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image18')){
                    $request->validate(['rebate_image18' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file18=$request->file('rebate_image18');
                    $file_extension18 = $file18->getClientOriginalExtension();
                    $fileName18=$user_id.'18'.uniqid().rand(1, 1800).time().'.'. $file_extension18;
                    $file18->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName18);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName18;
                    $test_vopros->ball = $request->ball18;
                    $test_vopros->save();

                    $radio18 = $request->variant_radio18;
                    $text18 = $request->variant_text18;
                    if($text18 != null){
                        foreach($text18 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text18[$key];
                            $request['status_otveta']=$radio18[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit19 == 1){
            if($request->hasFile('rebate_image19')){
                $test_vopros_img19 = Test_voprosy::where('id', $request->for_id19)->first();
                if($test_vopros_img19->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img19->img_voprosa);
                }
                $request->validate(['rebate_image19' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file19=$request->file('rebate_image19');
                $file_extension19 = $file19->getClientOriginalExtension();
                $fileName19=$user_id.'19'.uniqid().rand(1, 1900).time().'.'. $file_extension19;
                $file19->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName19);

                if($request->has('vopros_testa19')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                        'text_voprosa' => $request->vopros_testa19,
                        'img_voprosa' => $fileName19,
                        'ball' => $request->ball19,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName19,
                        'ball' => $request->ball19,
                    ]);
                }
                $test_otvety19 = Test_otvety::where('test_voprosy_id', $request->for_id19)->get();
                foreach($test_otvety19 as $test_otvety019)
                {
                    $test_otvety019->delete();
                }
                $radio19 = $request->variant_radio19;
                $text19 = $request->variant_text19;
                if($text19 != null){
                    foreach($text19 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id19;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text19[$key];
                        $request['status_otveta']=$radio19[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img19 == 1){
                    if($request->has('vopros_testa19')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                            'text_voprosa' => $request->vopros_testa19,
                            'ball' => $request->ball19,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball19,
                        ]);
                    }
                }
                if($request->for_img19 == 2){
                    $test_vopros_img19 = Test_voprosy::where('id', $request->for_id19)->first();
                    if($test_vopros_img19->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img19->img_voprosa);
                    }
                    if($request->has('vopros_testa19')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                            'text_voprosa' => $request->vopros_testa19,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball19,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball19,
                        ]);
                    }
                }  
                if($request->for_img19 == 0){
                    if($request->has('vopros_testa19')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                            'text_voprosa' => $request->vopros_testa19,
                            'ball' => $request->ball19,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id19)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball19,
                        ]);
                    }
                } 
                $test_otvety19 = Test_otvety::where('test_voprosy_id', $request->for_id19)->get();
                foreach($test_otvety19 as $test_otvety019)
                {
                    $test_otvety019->delete();
                }
                $radio19 = $request->variant_radio19;
                $text19 = $request->variant_text19;
                if($text19 != null){
                    foreach($text19 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id19;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text19[$key];
                        $request['status_otveta']=$radio19[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa19')){
                $request->validate(['vopros_testa19' => 'string','ball19' => 'numeric',]);
                if($request->hasFile('rebate_image19')){
                    $request->validate(['rebate_image19' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file19=$request->file('rebate_image19');
                    $file_extension19 = $file19->getClientOriginalExtension();
                    $fileName19=$user_id.'19'.uniqid().rand(1, 1900).time().'.'. $file_extension19;
                    $file19->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName19);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa19;
                if($request->hasFile('rebate_image19')){$test_vopros->img_voprosa = $fileName19;}
                $test_vopros->ball = $request->ball19;
                $test_vopros->save();

                $radio19 = $request->variant_radio19;
                $text19 = $request->variant_text19;
                if($text19 != null){
                    foreach($text19 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text19[$key];
                        $request['status_otveta']=$radio19[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image19')){
                    $request->validate(['rebate_image19' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file19=$request->file('rebate_image19');
                    $file_extension19 = $file19->getClientOriginalExtension();
                    $fileName19=$user_id.'19'.uniqid().rand(1, 1900).time().'.'. $file_extension19;
                    $file19->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName19);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName19;
                    $test_vopros->ball = $request->ball19;
                    $test_vopros->save();

                    $radio19 = $request->variant_radio19;
                    $text19 = $request->variant_text19;
                    if($text19 != null){
                        foreach($text19 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text19[$key];
                            $request['status_otveta']=$radio19[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit20 == 1){
            if($request->hasFile('rebate_image20')){
                $test_vopros_img20 = Test_voprosy::where('id', $request->for_id20)->first();
                if($test_vopros_img20->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img20->img_voprosa);
                }
                $request->validate(['rebate_image20' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file20=$request->file('rebate_image20');
                $file_extension20 = $file20->getClientOriginalExtension();
                $fileName20=$user_id.'20'.uniqid().rand(1, 2000).time().'.'. $file_extension20;
                $file20->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName20);

                if($request->has('vopros_testa20')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                        'text_voprosa' => $request->vopros_testa20,
                        'img_voprosa' => $fileName20,
                        'ball' => $request->ball20,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName20,
                        'ball' => $request->ball20,
                    ]);
                }
                $test_otvety20 = Test_otvety::where('test_voprosy_id', $request->for_id20)->get();
                foreach($test_otvety20 as $test_otvety020)
                {
                    $test_otvety020->delete();
                }
                $radio20 = $request->variant_radio20;
                $text20 = $request->variant_text20;
                if($text20 != null){
                    foreach($text20 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id20;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text20[$key];
                        $request['status_otveta']=$radio20[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img20 == 1){
                    if($request->has('vopros_testa20')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                            'text_voprosa' => $request->vopros_testa20,
                            'ball' => $request->ball20,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball20,
                        ]);
                    }
                }
                if($request->for_img20 == 2){
                    $test_vopros_img20 = Test_voprosy::where('id', $request->for_id20)->first();
                    if($test_vopros_img20->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img20->img_voprosa);
                    }
                    if($request->has('vopros_testa20')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                            'text_voprosa' => $request->vopros_testa20,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball20,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball20,
                        ]);
                    }
                }  
                if($request->for_img20 == 0){
                    if($request->has('vopros_testa20')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                            'text_voprosa' => $request->vopros_testa20,
                            'ball' => $request->ball20,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id20)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball20,
                        ]);
                    }
                } 
                $test_otvety20 = Test_otvety::where('test_voprosy_id', $request->for_id20)->get();
                foreach($test_otvety20 as $test_otvety020)
                {
                    $test_otvety020->delete();
                }
                $radio20 = $request->variant_radio20;
                $text20 = $request->variant_text20;
                if($text20 != null){
                    foreach($text20 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id20;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text20[$key];
                        $request['status_otveta']=$radio20[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa20')){
                $request->validate(['vopros_testa20' => 'string','ball20' => 'numeric',]);
                if($request->hasFile('rebate_image20')){
                    $request->validate(['rebate_image20' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file20=$request->file('rebate_image20');
                    $file_extension20 = $file20->getClientOriginalExtension();
                    $fileName20=$user_id.'20'.uniqid().rand(1, 2000).time().'.'. $file_extension20;
                    $file20->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName20);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa20;
                if($request->hasFile('rebate_image20')){$test_vopros->img_voprosa = $fileName20;}
                $test_vopros->ball = $request->ball20;
                $test_vopros->save();

                $radio20 = $request->variant_radio20;
                $text20 = $request->variant_text20;
                if($text20 != null){
                    foreach($text20 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text20[$key];
                        $request['status_otveta']=$radio20[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image20')){
                    $request->validate(['rebate_image20' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file20=$request->file('rebate_image20');
                    $file_extension20 = $file20->getClientOriginalExtension();
                    $fileName20=$user_id.'20'.uniqid().rand(1, 2000).time().'.'. $file_extension20;
                    $file20->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName20);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName20;
                    $test_vopros->ball = $request->ball20;
                    $test_vopros->save();

                    $radio20 = $request->variant_radio20;
                    $text20 = $request->variant_text20;
                    if($text20 != null){
                        foreach($text20 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text20[$key];
                            $request['status_otveta']=$radio20[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit21 == 1){
            if($request->hasFile('rebate_image21')){
                $test_vopros_img21 = Test_voprosy::where('id', $request->for_id21)->first();
                if($test_vopros_img21->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img21->img_voprosa);
                }
                $request->validate(['rebate_image21' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file21=$request->file('rebate_image21');
                $file_extension21 = $file21->getClientOriginalExtension();
                $fileName21=$user_id.'21'.uniqid().rand(1, 2100).time().'.'. $file_extension21;
                $file21->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName21);

                if($request->has('vopros_testa21')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                        'text_voprosa' => $request->vopros_testa21,
                        'img_voprosa' => $fileName21,
                        'ball' => $request->ball21,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName21,
                        'ball' => $request->ball21,
                    ]);
                }
                $test_otvety21 = Test_otvety::where('test_voprosy_id', $request->for_id21)->get();
                foreach($test_otvety21 as $test_otvety021)
                {
                    $test_otvety021->delete();
                }
                $radio21 = $request->variant_radio21;
                $text21 = $request->variant_text21;
                if($text21 != null){
                    foreach($text21 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id21;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text21[$key];
                        $request['status_otveta']=$radio21[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img21 == 1){
                    if($request->has('vopros_testa21')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                            'text_voprosa' => $request->vopros_testa21,
                            'ball' => $request->ball21,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball21,
                        ]);
                    }
                }
                if($request->for_img21 == 2){
                    $test_vopros_img21 = Test_voprosy::where('id', $request->for_id21)->first();
                    if($test_vopros_img21->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img21->img_voprosa);
                    }
                    if($request->has('vopros_testa21')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                            'text_voprosa' => $request->vopros_testa21,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball21,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball21,
                        ]);
                    }
                }  
                if($request->for_img21 == 0){
                    if($request->has('vopros_testa21')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                            'text_voprosa' => $request->vopros_testa21,
                            'ball' => $request->ball21,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id21)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball21,
                        ]);
                    }
                } 
                $test_otvety21 = Test_otvety::where('test_voprosy_id', $request->for_id21)->get();
                foreach($test_otvety21 as $test_otvety021)
                {
                    $test_otvety021->delete();
                }
                $radio21 = $request->variant_radio21;
                $text21 = $request->variant_text21;
                if($text21 != null){
                    foreach($text21 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id21;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text21[$key];
                        $request['status_otveta']=$radio21[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa21')){
                $request->validate(['vopros_testa21' => 'string','ball21' => 'numeric',]);
                if($request->hasFile('rebate_image21')){
                    $request->validate(['rebate_image21' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file21=$request->file('rebate_image21');
                    $file_extension21 = $file21->getClientOriginalExtension();
                    $fileName21=$user_id.'21'.uniqid().rand(1, 2100).time().'.'. $file_extension21;
                    $file21->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName21);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa21;
                if($request->hasFile('rebate_image21')){$test_vopros->img_voprosa = $fileName21;}
                $test_vopros->ball = $request->ball21;
                $test_vopros->save();

                $radio21 = $request->variant_radio21;
                $text21 = $request->variant_text21;
                if($text21 != null){
                    foreach($text21 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text21[$key];
                        $request['status_otveta']=$radio21[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image21')){
                    $request->validate(['rebate_image21' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file21=$request->file('rebate_image21');
                    $file_extension21 = $file21->getClientOriginalExtension();
                    $fileName21=$user_id.'21'.uniqid().rand(1, 2100).time().'.'. $file_extension21;
                    $file21->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName21);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName21;
                    $test_vopros->ball = $request->ball21;
                    $test_vopros->save();

                    $radio21 = $request->variant_radio21;
                    $text21 = $request->variant_text21;
                    if($text21 != null){
                        foreach($text21 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text21[$key];
                            $request['status_otveta']=$radio21[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit22 == 1){
            if($request->hasFile('rebate_image22')){
                $test_vopros_img22 = Test_voprosy::where('id', $request->for_id22)->first();
                if($test_vopros_img22->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img22->img_voprosa);
                }
                $request->validate(['rebate_image22' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file22=$request->file('rebate_image22');
                $file_extension22 = $file22->getClientOriginalExtension();
                $fileName22=$user_id.'22'.uniqid().rand(1, 2200).time().'.'. $file_extension22;
                $file22->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName22);

                if($request->has('vopros_testa22')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                        'text_voprosa' => $request->vopros_testa22,
                        'img_voprosa' => $fileName22,
                        'ball' => $request->ball22,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName22,
                        'ball' => $request->ball22,
                    ]);
                }
                $test_otvety22 = Test_otvety::where('test_voprosy_id', $request->for_id22)->get();
                foreach($test_otvety22 as $test_otvety022)
                {
                    $test_otvety022->delete();
                }
                $radio22 = $request->variant_radio22;
                $text22 = $request->variant_text22;
                if($text22 != null){
                    foreach($text22 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id22;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text22[$key];
                        $request['status_otveta']=$radio22[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img22 == 1){
                    if($request->has('vopros_testa22')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                            'text_voprosa' => $request->vopros_testa22,
                            'ball' => $request->ball22,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball22,
                        ]);
                    }
                }
                if($request->for_img22 == 2){
                    $test_vopros_img22 = Test_voprosy::where('id', $request->for_id22)->first();
                    if($test_vopros_img22->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img22->img_voprosa);
                    }
                    if($request->has('vopros_testa22')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                            'text_voprosa' => $request->vopros_testa22,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball22,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball22,
                        ]);
                    }
                }  
                if($request->for_img22 == 0){
                    if($request->has('vopros_testa22')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                            'text_voprosa' => $request->vopros_testa22,
                            'ball' => $request->ball22,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id22)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball22,
                        ]);
                    }
                } 
                $test_otvety22 = Test_otvety::where('test_voprosy_id', $request->for_id22)->get();
                foreach($test_otvety22 as $test_otvety022)
                {
                    $test_otvety022->delete();
                }
                $radio22 = $request->variant_radio22;
                $text22 = $request->variant_text22;
                if($text22 != null){
                    foreach($text22 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id22;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text22[$key];
                        $request['status_otveta']=$radio22[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa22')){
                $request->validate(['vopros_testa22' => 'string','ball22' => 'numeric',]);
                if($request->hasFile('rebate_image22')){
                    $request->validate(['rebate_image22' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file22=$request->file('rebate_image22');
                    $file_extension22 = $file22->getClientOriginalExtension();
                    $fileName22=$user_id.'22'.uniqid().rand(1, 2200).time().'.'. $file_extension22;
                    $file22->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName22);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa22;
                if($request->hasFile('rebate_image22')){$test_vopros->img_voprosa = $fileName22;}
                $test_vopros->ball = $request->ball22;
                $test_vopros->save();

                $radio22 = $request->variant_radio22;
                $text22 = $request->variant_text22;
                if($text22 != null){
                    foreach($text22 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text22[$key];
                        $request['status_otveta']=$radio22[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image22')){
                    $request->validate(['rebate_image22' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file22=$request->file('rebate_image22');
                    $file_extension22 = $file22->getClientOriginalExtension();
                    $fileName22=$user_id.'22'.uniqid().rand(1, 2200).time().'.'. $file_extension22;
                    $file22->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName22);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName22;
                    $test_vopros->ball = $request->ball22;
                    $test_vopros->save();

                    $radio22 = $request->variant_radio22;
                    $text22 = $request->variant_text22;
                    if($text22 != null){
                        foreach($text22 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text22[$key];
                            $request['status_otveta']=$radio22[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit23 == 1){
            if($request->hasFile('rebate_image23')){
                $test_vopros_img23 = Test_voprosy::where('id', $request->for_id23)->first();
                if($test_vopros_img23->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img23->img_voprosa);
                }
                $request->validate(['rebate_image23' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file23=$request->file('rebate_image23');
                $file_extension23 = $file23->getClientOriginalExtension();
                $fileName23=$user_id.'23'.uniqid().rand(1, 2300).time().'.'. $file_extension23;
                $file23->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName23);

                if($request->has('vopros_testa23')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                        'text_voprosa' => $request->vopros_testa23,
                        'img_voprosa' => $fileName23,
                        'ball' => $request->ball23,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName23,
                        'ball' => $request->ball23,
                    ]);
                }
                $test_otvety23 = Test_otvety::where('test_voprosy_id', $request->for_id23)->get();
                foreach($test_otvety23 as $test_otvety023)
                {
                    $test_otvety023->delete();
                }
                $radio23 = $request->variant_radio23;
                $text23 = $request->variant_text23;
                if($text23 != null){
                    foreach($text23 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id23;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text23[$key];
                        $request['status_otveta']=$radio23[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img23 == 1){
                    if($request->has('vopros_testa23')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                            'text_voprosa' => $request->vopros_testa23,
                            'ball' => $request->ball23,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball23,
                        ]);
                    }
                }
                if($request->for_img23 == 2){
                    $test_vopros_img23 = Test_voprosy::where('id', $request->for_id23)->first();
                    if($test_vopros_img23->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img23->img_voprosa);
                    }
                    if($request->has('vopros_testa23')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                            'text_voprosa' => $request->vopros_testa23,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball23,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball23,
                        ]);
                    }
                }  
                if($request->for_img23 == 0){
                    if($request->has('vopros_testa23')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                            'text_voprosa' => $request->vopros_testa23,
                            'ball' => $request->ball23,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id23)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball23,
                        ]);
                    }
                } 
                $test_otvety23 = Test_otvety::where('test_voprosy_id', $request->for_id23)->get();
                foreach($test_otvety23 as $test_otvety023)
                {
                    $test_otvety023->delete();
                }
                $radio23 = $request->variant_radio23;
                $text23 = $request->variant_text23;
                if($text23 != null){
                    foreach($text23 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id23;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text23[$key];
                        $request['status_otveta']=$radio23[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa23')){
                $request->validate(['vopros_testa23' => 'string','ball23' => 'numeric',]);
                if($request->hasFile('rebate_image23')){
                    $request->validate(['rebate_image23' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file23=$request->file('rebate_image23');
                    $file_extension23 = $file23->getClientOriginalExtension();
                    $fileName23=$user_id.'23'.uniqid().rand(1, 2300).time().'.'. $file_extension23;
                    $file23->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName23);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa23;
                if($request->hasFile('rebate_image23')){$test_vopros->img_voprosa = $fileName23;}
                $test_vopros->ball = $request->ball23;
                $test_vopros->save();

                $radio23 = $request->variant_radio23;
                $text23 = $request->variant_text23;
                if($text23 != null){
                    foreach($text23 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text23[$key];
                        $request['status_otveta']=$radio23[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image23')){
                    $request->validate(['rebate_image23' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file23=$request->file('rebate_image23');
                    $file_extension23 = $file23->getClientOriginalExtension();
                    $fileName23=$user_id.'23'.uniqid().rand(1, 2300).time().'.'. $file_extension23;
                    $file23->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName23);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName23;
                    $test_vopros->ball = $request->ball23;
                    $test_vopros->save();

                    $radio23 = $request->variant_radio23;
                    $text23 = $request->variant_text23;
                    if($text23 != null){
                        foreach($text23 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text23[$key];
                            $request['status_otveta']=$radio23[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit24 == 1){
            if($request->hasFile('rebate_image24')){
                $test_vopros_img24 = Test_voprosy::where('id', $request->for_id24)->first();
                if($test_vopros_img24->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img24->img_voprosa);
                }
                $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file24=$request->file('rebate_image24');
                $file_extension24 = $file24->getClientOriginalExtension();
                $fileName24=$user_id.'24'.uniqid().rand(1, 2400).time().'.'. $file_extension24;
                $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);

                if($request->has('vopros_testa24')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                        'text_voprosa' => $request->vopros_testa24,
                        'img_voprosa' => $fileName24,
                        'ball' => $request->ball24,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName24,
                        'ball' => $request->ball24,
                    ]);
                }
                $test_otvety24 = Test_otvety::where('test_voprosy_id', $request->for_id24)->get();
                foreach($test_otvety24 as $test_otvety024)
                {
                    $test_otvety024->delete();
                }
                $radio24 = $request->variant_radio24;
                $text24 = $request->variant_text24;
                if($text24 != null){
                    foreach($text24 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id24;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text24[$key];
                        $request['status_otveta']=$radio24[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img24 == 1){
                    if($request->has('vopros_testa24')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                            'text_voprosa' => $request->vopros_testa24,
                            'ball' => $request->ball24,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball24,
                        ]);
                    }
                }
                if($request->for_img24 == 2){
                    $test_vopros_img24 = Test_voprosy::where('id', $request->for_id24)->first();
                    if($test_vopros_img24->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img24->img_voprosa);
                    }
                    if($request->has('vopros_testa24')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                            'text_voprosa' => $request->vopros_testa24,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball24,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball24,
                        ]);
                    }
                }  
                if($request->for_img24 == 0){
                    if($request->has('vopros_testa24')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                            'text_voprosa' => $request->vopros_testa24,
                            'ball' => $request->ball24,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id24)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball24,
                        ]);
                    }
                } 
                $test_otvety24 = Test_otvety::where('test_voprosy_id', $request->for_id24)->get();
                foreach($test_otvety24 as $test_otvety024)
                {
                    $test_otvety024->delete();
                }
                $radio24 = $request->variant_radio24;
                $text24 = $request->variant_text24;
                if($text24 != null){
                    foreach($text24 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id24;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text24[$key];
                        $request['status_otveta']=$radio24[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa24')){
                $request->validate(['vopros_testa24' => 'string','ball24' => 'numeric',]);
                if($request->hasFile('rebate_image24')){
                    $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file24=$request->file('rebate_image24');
                    $file_extension24 = $file24->getClientOriginalExtension();
                    $fileName24=$user_id.'24'.uniqid().rand(1, 2400).time().'.'. $file_extension24;
                    $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa24;
                if($request->hasFile('rebate_image24')){$test_vopros->img_voprosa = $fileName24;}
                $test_vopros->ball = $request->ball24;
                $test_vopros->save();

                $radio24 = $request->variant_radio24;
                $text24 = $request->variant_text24;
                if($text24 != null){
                    foreach($text24 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text24[$key];
                        $request['status_otveta']=$radio24[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image24')){
                    $request->validate(['rebate_image24' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file24=$request->file('rebate_image24');
                    $file_extension24 = $file24->getClientOriginalExtension();
                    $fileName24=$user_id.'24'.uniqid().rand(1, 2400).time().'.'. $file_extension24;
                    $file24->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName24);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName24;
                    $test_vopros->ball = $request->ball24;
                    $test_vopros->save();

                    $radio24 = $request->variant_radio24;
                    $text24 = $request->variant_text24;
                    if($text24 != null){
                        foreach($text24 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text24[$key];
                            $request['status_otveta']=$radio24[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit25 == 1){
            if($request->hasFile('rebate_image25')){
                $test_vopros_img25 = Test_voprosy::where('id', $request->for_id25)->first();
                if($test_vopros_img25->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img25->img_voprosa);
                }
                $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file25=$request->file('rebate_image25');
                $file_extension25 = $file25->getClientOriginalExtension();
                $fileName25=$user_id.'25'.uniqid().rand(1, 2500).time().'.'. $file_extension25;
                $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);

                if($request->has('vopros_testa25')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                        'text_voprosa' => $request->vopros_testa25,
                        'img_voprosa' => $fileName25,
                        'ball' => $request->ball25,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName25,
                        'ball' => $request->ball25,
                    ]);
                }
                $test_otvety25 = Test_otvety::where('test_voprosy_id', $request->for_id25)->get();
                foreach($test_otvety25 as $test_otvety025)
                {
                    $test_otvety025->delete();
                }
                $radio25 = $request->variant_radio25;
                $text25 = $request->variant_text25;
                if($text25 != null){
                    foreach($text25 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id25;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text25[$key];
                        $request['status_otveta']=$radio25[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img25 == 1){
                    if($request->has('vopros_testa25')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                            'text_voprosa' => $request->vopros_testa25,
                            'ball' => $request->ball25,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball25,
                        ]);
                    }
                }
                if($request->for_img25 == 2){
                    $test_vopros_img25 = Test_voprosy::where('id', $request->for_id25)->first();
                    if($test_vopros_img25->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img25->img_voprosa);
                    }
                    if($request->has('vopros_testa25')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                            'text_voprosa' => $request->vopros_testa25,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball25,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball25,
                        ]);
                    }
                }  
                if($request->for_img25 == 0){
                    if($request->has('vopros_testa25')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                            'text_voprosa' => $request->vopros_testa25,
                            'ball' => $request->ball25,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id25)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball25,
                        ]);
                    }
                } 
                $test_otvety25 = Test_otvety::where('test_voprosy_id', $request->for_id25)->get();
                foreach($test_otvety25 as $test_otvety025)
                {
                    $test_otvety025->delete();
                }
                $radio25 = $request->variant_radio25;
                $text25 = $request->variant_text25;
                if($text25 != null){
                    foreach($text25 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id25;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text25[$key];
                        $request['status_otveta']=$radio25[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa25')){
                $request->validate(['vopros_testa25' => 'string','ball25' => 'numeric',]);
                if($request->hasFile('rebate_image25')){
                    $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file25=$request->file('rebate_image25');
                    $file_extension25 = $file25->getClientOriginalExtension();
                    $fileName25=$user_id.'25'.uniqid().rand(1, 2500).time().'.'. $file_extension25;
                    $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa25;
                if($request->hasFile('rebate_image25')){$test_vopros->img_voprosa = $fileName25;}
                $test_vopros->ball = $request->ball25;
                $test_vopros->save();

                $radio25 = $request->variant_radio25;
                $text25 = $request->variant_text25;
                if($text25 != null){
                    foreach($text25 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text25[$key];
                        $request['status_otveta']=$radio25[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image25')){
                    $request->validate(['rebate_image25' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file25=$request->file('rebate_image25');
                    $file_extension25 = $file25->getClientOriginalExtension();
                    $fileName25=$user_id.'25'.uniqid().rand(1, 2500).time().'.'. $file_extension25;
                    $file25->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName25);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName25;
                    $test_vopros->ball = $request->ball25;
                    $test_vopros->save();

                    $radio25 = $request->variant_radio25;
                    $text25 = $request->variant_text25;
                    if($text25 != null){
                        foreach($text25 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text25[$key];
                            $request['status_otveta']=$radio25[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }


        if($request->for_edit26 == 1){
            if($request->hasFile('rebate_image26')){
                $test_vopros_img26 = Test_voprosy::where('id', $request->for_id26)->first();
                if($test_vopros_img26->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img26->img_voprosa);
                }
                $request->validate(['rebate_image26' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file26=$request->file('rebate_image26');
                $file_extension26 = $file26->getClientOriginalExtension();
                $fileName26=$user_id.'26'.uniqid().rand(1, 2600).time().'.'. $file_extension26;
                $file26->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName26);

                if($request->has('vopros_testa26')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                        'text_voprosa' => $request->vopros_testa26,
                        'img_voprosa' => $fileName26,
                        'ball' => $request->ball26,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName26,
                        'ball' => $request->ball26,
                    ]);
                }
                $test_otvety26 = Test_otvety::where('test_voprosy_id', $request->for_id26)->get();
                foreach($test_otvety26 as $test_otvety026)
                {
                    $test_otvety026->delete();
                }
                $radio26 = $request->variant_radio26;
                $text26 = $request->variant_text26;
                if($text26 != null){
                    foreach($text26 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id26;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text26[$key];
                        $request['status_otveta']=$radio26[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img26 == 1){
                    if($request->has('vopros_testa26')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                            'text_voprosa' => $request->vopros_testa26,
                            'ball' => $request->ball26,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball26,
                        ]);
                    }
                }
                if($request->for_img26 == 2){
                    $test_vopros_img26 = Test_voprosy::where('id', $request->for_id26)->first();
                    if($test_vopros_img26->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img26->img_voprosa);
                    }
                    if($request->has('vopros_testa26')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                            'text_voprosa' => $request->vopros_testa26,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball26,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball26,
                        ]);
                    }
                }  
                if($request->for_img26 == 0){
                    if($request->has('vopros_testa26')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                            'text_voprosa' => $request->vopros_testa26,
                            'ball' => $request->ball26,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id26)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball26,
                        ]);
                    }
                } 
                $test_otvety26 = Test_otvety::where('test_voprosy_id', $request->for_id26)->get();
                foreach($test_otvety26 as $test_otvety026)
                {
                    $test_otvety026->delete();
                }
                $radio26 = $request->variant_radio26;
                $text26 = $request->variant_text26;
                if($text26 != null){
                    foreach($text26 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id26;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text26[$key];
                        $request['status_otveta']=$radio26[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa26')){
                $request->validate(['vopros_testa26' => 'string','ball26' => 'numeric',]);
                if($request->hasFile('rebate_image26')){
                    $request->validate(['rebate_image26' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file26=$request->file('rebate_image26');
                    $file_extension26 = $file26->getClientOriginalExtension();
                    $fileName26=$user_id.'26'.uniqid().rand(1, 2600).time().'.'. $file_extension26;
                    $file26->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName26);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa26;
                if($request->hasFile('rebate_image26')){$test_vopros->img_voprosa = $fileName26;}
                $test_vopros->ball = $request->ball26;
                $test_vopros->save();

                $radio26 = $request->variant_radio26;
                $text26 = $request->variant_text26;
                if($text26 != null){
                    foreach($text26 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text26[$key];
                        $request['status_otveta']=$radio26[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image26')){
                    $request->validate(['rebate_image26' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file26=$request->file('rebate_image26');
                    $file_extension26 = $file26->getClientOriginalExtension();
                    $fileName26=$user_id.'26'.uniqid().rand(1, 2600).time().'.'. $file_extension26;
                    $file26->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName26);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName26;
                    $test_vopros->ball = $request->ball26;
                    $test_vopros->save();

                    $radio26 = $request->variant_radio26;
                    $text26 = $request->variant_text26;
                    if($text26 != null){
                        foreach($text26 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text26[$key];
                            $request['status_otveta']=$radio26[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit27 == 1){
            if($request->hasFile('rebate_image27')){
                $test_vopros_img27 = Test_voprosy::where('id', $request->for_id27)->first();
                if($test_vopros_img27->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img27->img_voprosa);
                }
                $request->validate(['rebate_image27' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file27=$request->file('rebate_image27');
                $file_extension27 = $file27->getClientOriginalExtension();
                $fileName27=$user_id.'27'.uniqid().rand(1, 2700).time().'.'. $file_extension27;
                $file27->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName27);

                if($request->has('vopros_testa27')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                        'text_voprosa' => $request->vopros_testa27,
                        'img_voprosa' => $fileName27,
                        'ball' => $request->ball27,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName27,
                        'ball' => $request->ball27,
                    ]);
                }
                $test_otvety27 = Test_otvety::where('test_voprosy_id', $request->for_id27)->get();
                foreach($test_otvety27 as $test_otvety027)
                {
                    $test_otvety027->delete();
                }
                $radio27 = $request->variant_radio27;
                $text27 = $request->variant_text27;
                if($text27 != null){
                    foreach($text27 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id27;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text27[$key];
                        $request['status_otveta']=$radio27[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img27 == 1){
                    if($request->has('vopros_testa27')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                            'text_voprosa' => $request->vopros_testa27,
                            'ball' => $request->ball27,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball27,
                        ]);
                    }
                }
                if($request->for_img27 == 2){
                    $test_vopros_img27 = Test_voprosy::where('id', $request->for_id27)->first();
                    if($test_vopros_img27->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img27->img_voprosa);
                    }
                    if($request->has('vopros_testa27')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                            'text_voprosa' => $request->vopros_testa27,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball27,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball27,
                        ]);
                    }
                }  
                if($request->for_img27 == 0){
                    if($request->has('vopros_testa27')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                            'text_voprosa' => $request->vopros_testa27,
                            'ball' => $request->ball27,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id27)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball27,
                        ]);
                    }
                } 
                $test_otvety27 = Test_otvety::where('test_voprosy_id', $request->for_id27)->get();
                foreach($test_otvety27 as $test_otvety027)
                {
                    $test_otvety027->delete();
                }
                $radio27 = $request->variant_radio27;
                $text27 = $request->variant_text27;
                if($text27 != null){
                    foreach($text27 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id27;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text27[$key];
                        $request['status_otveta']=$radio27[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa27')){
                $request->validate(['vopros_testa27' => 'string','ball27' => 'numeric',]);
                if($request->hasFile('rebate_image27')){
                    $request->validate(['rebate_image27' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file27=$request->file('rebate_image27');
                    $file_extension27 = $file27->getClientOriginalExtension();
                    $fileName27=$user_id.'27'.uniqid().rand(1, 2700).time().'.'. $file_extension27;
                    $file27->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName27);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa27;
                if($request->hasFile('rebate_image27')){$test_vopros->img_voprosa = $fileName27;}
                $test_vopros->ball = $request->ball27;
                $test_vopros->save();

                $radio27 = $request->variant_radio27;
                $text27 = $request->variant_text27;
                if($text27 != null){
                    foreach($text27 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text27[$key];
                        $request['status_otveta']=$radio27[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image27')){
                    $request->validate(['rebate_image27' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file27=$request->file('rebate_image27');
                    $file_extension27 = $file27->getClientOriginalExtension();
                    $fileName27=$user_id.'27'.uniqid().rand(1, 2700).time().'.'. $file_extension27;
                    $file27->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName27);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName27;
                    $test_vopros->ball = $request->ball27;
                    $test_vopros->save();

                    $radio27 = $request->variant_radio27;
                    $text27 = $request->variant_text27;
                    if($text27 != null){
                        foreach($text27 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text27[$key];
                            $request['status_otveta']=$radio27[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit28 == 1){
            if($request->hasFile('rebate_image28')){
                $test_vopros_img28 = Test_voprosy::where('id', $request->for_id28)->first();
                if($test_vopros_img28->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img28->img_voprosa);
                }
                $request->validate(['rebate_image28' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file28=$request->file('rebate_image28');
                $file_extension28 = $file28->getClientOriginalExtension();
                $fileName28=$user_id.'28'.uniqid().rand(1, 2800).time().'.'. $file_extension28;
                $file28->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName28);

                if($request->has('vopros_testa28')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                        'text_voprosa' => $request->vopros_testa28,
                        'img_voprosa' => $fileName28,
                        'ball' => $request->ball28,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName28,
                        'ball' => $request->ball28,
                    ]);
                }
                $test_otvety28 = Test_otvety::where('test_voprosy_id', $request->for_id28)->get();
                foreach($test_otvety28 as $test_otvety028)
                {
                    $test_otvety028->delete();
                }
                $radio28 = $request->variant_radio28;
                $text28 = $request->variant_text28;
                if($text28 != null){
                    foreach($text28 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id28;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text28[$key];
                        $request['status_otveta']=$radio28[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img28 == 1){
                    if($request->has('vopros_testa28')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                            'text_voprosa' => $request->vopros_testa28,
                            'ball' => $request->ball28,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball28,
                        ]);
                    }
                }
                if($request->for_img28 == 2){
                    $test_vopros_img28 = Test_voprosy::where('id', $request->for_id28)->first();
                    if($test_vopros_img28->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img28->img_voprosa);
                    }
                    if($request->has('vopros_testa28')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                            'text_voprosa' => $request->vopros_testa28,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball28,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball28,
                        ]);
                    }
                }  
                if($request->for_img28 == 0){
                    if($request->has('vopros_testa28')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                            'text_voprosa' => $request->vopros_testa28,
                            'ball' => $request->ball28,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id28)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball28,
                        ]);
                    }
                } 
                $test_otvety28 = Test_otvety::where('test_voprosy_id', $request->for_id28)->get();
                foreach($test_otvety28 as $test_otvety028)
                {
                    $test_otvety028->delete();
                }
                $radio28 = $request->variant_radio28;
                $text28 = $request->variant_text28;
                if($text28 != null){
                    foreach($text28 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id28;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text28[$key];
                        $request['status_otveta']=$radio28[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa28')){
                $request->validate(['vopros_testa28' => 'string','ball28' => 'numeric',]);
                if($request->hasFile('rebate_image28')){
                    $request->validate(['rebate_image28' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file28=$request->file('rebate_image28');
                    $file_extension28 = $file28->getClientOriginalExtension();
                    $fileName28=$user_id.'28'.uniqid().rand(1, 2800).time().'.'. $file_extension28;
                    $file28->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName28);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa28;
                if($request->hasFile('rebate_image28')){$test_vopros->img_voprosa = $fileName28;}
                $test_vopros->ball = $request->ball28;
                $test_vopros->save();

                $radio28 = $request->variant_radio28;
                $text28 = $request->variant_text28;
                if($text28 != null){
                    foreach($text28 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text28[$key];
                        $request['status_otveta']=$radio28[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image28')){
                    $request->validate(['rebate_image28' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file28=$request->file('rebate_image28');
                    $file_extension28 = $file28->getClientOriginalExtension();
                    $fileName28=$user_id.'28'.uniqid().rand(1, 2800).time().'.'. $file_extension28;
                    $file28->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName28);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName28;
                    $test_vopros->ball = $request->ball28;
                    $test_vopros->save();

                    $radio28 = $request->variant_radio28;
                    $text28 = $request->variant_text28;
                    if($text28 != null){
                        foreach($text28 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text28[$key];
                            $request['status_otveta']=$radio28[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit29 == 1){
            if($request->hasFile('rebate_image29')){
                $test_vopros_img29 = Test_voprosy::where('id', $request->for_id29)->first();
                if($test_vopros_img29->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img29->img_voprosa);
                }
                $request->validate(['rebate_image29' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file29=$request->file('rebate_image29');
                $file_extension29 = $file29->getClientOriginalExtension();
                $fileName29=$user_id.'29'.uniqid().rand(1, 2900).time().'.'. $file_extension29;
                $file29->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName29);

                if($request->has('vopros_testa29')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                        'text_voprosa' => $request->vopros_testa29,
                        'img_voprosa' => $fileName29,
                        'ball' => $request->ball29,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName29,
                        'ball' => $request->ball29,
                    ]);
                }
                $test_otvety29 = Test_otvety::where('test_voprosy_id', $request->for_id29)->get();
                foreach($test_otvety29 as $test_otvety029)
                {
                    $test_otvety029->delete();
                }
                $radio29 = $request->variant_radio29;
                $text29 = $request->variant_text29;
                if($text29 != null){
                    foreach($text29 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id29;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text29[$key];
                        $request['status_otveta']=$radio29[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img29 == 1){
                    if($request->has('vopros_testa29')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                            'text_voprosa' => $request->vopros_testa29,
                            'ball' => $request->ball29,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball29,
                        ]);
                    }
                }
                if($request->for_img29 == 2){
                    $test_vopros_img29 = Test_voprosy::where('id', $request->for_id29)->first();
                    if($test_vopros_img29->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img29->img_voprosa);
                    }
                    if($request->has('vopros_testa29')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                            'text_voprosa' => $request->vopros_testa29,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball29,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball29,
                        ]);
                    }
                }  
                if($request->for_img29 == 0){
                    if($request->has('vopros_testa29')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                            'text_voprosa' => $request->vopros_testa29,
                            'ball' => $request->ball29,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id29)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball29,
                        ]);
                    }
                } 
                $test_otvety29 = Test_otvety::where('test_voprosy_id', $request->for_id29)->get();
                foreach($test_otvety29 as $test_otvety029)
                {
                    $test_otvety029->delete();
                }
                $radio29 = $request->variant_radio29;
                $text29 = $request->variant_text29;
                if($text29 != null){
                    foreach($text29 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id29;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text29[$key];
                        $request['status_otveta']=$radio29[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa29')){
                $request->validate(['vopros_testa29' => 'string','ball29' => 'numeric',]);
                if($request->hasFile('rebate_image29')){
                    $request->validate(['rebate_image29' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file29=$request->file('rebate_image29');
                    $file_extension29 = $file29->getClientOriginalExtension();
                    $fileName29=$user_id.'29'.uniqid().rand(1, 2900).time().'.'. $file_extension29;
                    $file29->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName29);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa29;
                if($request->hasFile('rebate_image29')){$test_vopros->img_voprosa = $fileName29;}
                $test_vopros->ball = $request->ball29;
                $test_vopros->save();

                $radio29 = $request->variant_radio29;
                $text29 = $request->variant_text29;
                if($text29 != null){
                    foreach($text29 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text29[$key];
                        $request['status_otveta']=$radio29[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image29')){
                    $request->validate(['rebate_image29' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file29=$request->file('rebate_image29');
                    $file_extension29 = $file29->getClientOriginalExtension();
                    $fileName29=$user_id.'29'.uniqid().rand(1, 2900).time().'.'. $file_extension29;
                    $file29->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName29);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName29;
                    $test_vopros->ball = $request->ball29;
                    $test_vopros->save();

                    $radio29 = $request->variant_radio29;
                    $text29 = $request->variant_text29;
                    if($text29 != null){
                        foreach($text29 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text29[$key];
                            $request['status_otveta']=$radio29[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }

        if($request->for_edit30 == 1){
            if($request->hasFile('rebate_image30')){
                $test_vopros_img30 = Test_voprosy::where('id', $request->for_id30)->first();
                if($test_vopros_img30->img_voprosa != null){
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img30->img_voprosa);
                }
                $request->validate(['rebate_image30' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file30=$request->file('rebate_image30');
                $file_extension30 = $file30->getClientOriginalExtension();
                $fileName30=$user_id.'30'.uniqid().rand(1, 3000).time().'.'. $file_extension30;
                $file30->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName30);

                if($request->has('vopros_testa30')){
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                        'text_voprosa' => $request->vopros_testa30,
                        'img_voprosa' => $fileName30,
                        'ball' => $request->ball30,
                    ]);
                }else{
                    $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                        'text_voprosa' => NULL,
                        'img_voprosa' => $fileName30,
                        'ball' => $request->ball30,
                    ]);
                }
                $test_otvety30 = Test_otvety::where('test_voprosy_id', $request->for_id30)->get();
                foreach($test_otvety30 as $test_otvety030)
                {
                    $test_otvety030->delete();
                }
                $radio30 = $request->variant_radio30;
                $text30 = $request->variant_text30;
                if($text30 != null){
                    foreach($text30 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id30;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text30[$key];
                        $request['status_otveta']=$radio30[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }else{
                if($request->for_img30 == 1){
                    if($request->has('vopros_testa30')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                            'text_voprosa' => $request->vopros_testa30,
                            'ball' => $request->ball30,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball30,
                        ]);
                    }
                }
                if($request->for_img30 == 2){
                    $test_vopros_img30 = Test_voprosy::where('id', $request->for_id30)->first();
                    if($test_vopros_img30->img_voprosa != null){
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros_img30->img_voprosa);
                    }
                    if($request->has('vopros_testa30')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                            'text_voprosa' => $request->vopros_testa30,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball30,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                            'text_voprosa' => NULL,
                            'img_voprosa' => NULL,
                            'ball' => $request->ball30,
                        ]);
                    }
                }  
                if($request->for_img30 == 0){
                    if($request->has('vopros_testa30')){
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                            'text_voprosa' => $request->vopros_testa30,
                            'ball' => $request->ball30,
                        ]);
                    }else{
                        $test_voprosy = DB::table('test_voprosies')->where('id', $request->for_id30)->update([
                            'text_voprosa' => NULL,
                            'ball' => $request->ball30,
                        ]);
                    }
                } 
                $test_otvety30 = Test_otvety::where('test_voprosy_id', $request->for_id30)->get();
                foreach($test_otvety30 as $test_otvety030)
                {
                    $test_otvety030->delete();
                }
                $radio30 = $request->variant_radio30;
                $text30 = $request->variant_text30;
                if($text30 != null){
                    foreach($text30 as $key => $value)
                    {
                        $request['test_voprosy_id']=$request->for_id30;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text30[$key];
                        $request['status_otveta']=$radio30[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
        }else{
            // novyi vopros
            if($request->has('vopros_testa30')){
                $request->validate(['vopros_testa30' => 'string','ball30' => 'numeric',]);
                if($request->hasFile('rebate_image30')){
                    $request->validate(['rebate_image30' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file30=$request->file('rebate_image30');
                    $file_extension30 = $file30->getClientOriginalExtension();
                    $fileName30=$user_id.'30'.uniqid().rand(1, 3000).time().'.'. $file_extension30;
                    $file30->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName30);
                }
                $test_vopros = new Test_voprosy();
                $test_vopros->test_id = $id;
                $test_vopros->text_voprosa = $request->vopros_testa30;
                if($request->hasFile('rebate_image30')){$test_vopros->img_voprosa = $fileName30;}
                $test_vopros->ball = $request->ball30;
                $test_vopros->save();

                $radio30 = $request->variant_radio30;
                $text30 = $request->variant_text30;
                if($text30 != null){
                    foreach($text30 as $key => $value)
                    {
                        $request['test_voprosy_id']=$test_vopros->id;
                        $request['test_id']=$id_test;
                        $request['test_otvety']=$text30[$key];
                        $request['status_otveta']=$radio30[$key];
                        Test_otvety::create($request->all());
                    }
                }
            }
            else{
                if($request->hasFile('rebate_image30')){
                    $request->validate(['rebate_image30' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                    $file30=$request->file('rebate_image30');
                    $file_extension30 = $file30->getClientOriginalExtension();
                    $fileName30=$user_id.'30'.uniqid().rand(1, 3000).time().'.'. $file_extension30;
                    $file30->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName30);

                    $test_vopros = new Test_voprosy();
                    $test_vopros->test_id = $id;
                    $test_vopros->img_voprosa = $fileName30;
                    $test_vopros->ball = $request->ball30;
                    $test_vopros->save();

                    $radio30 = $request->variant_radio30;
                    $text30 = $request->variant_text30;
                    if($text30 != null){
                        foreach($text30 as $key => $value)
                        {
                            $request['test_voprosy_id']=$test_vopros->id;
                            $request['test_id']=$id_test;
                            $request['test_otvety']=$text30[$key];
                            $request['status_otveta']=$radio30[$key];
                            Test_otvety::create($request->all());
                        }
                    }
                }
            }
        }
       

        if ($for_action > 100000) {
            $urok_id = $for_action - 100000;
            $uroky = Uroky::where('id', $urok_id)->first();
            return redirect()->route('moderator_kurs_urok_index', $uroky->podcat_id)->withSuccess('Ваш тест успешно обновлена!');
        }else{
            return redirect()->route('moderator_tests_index', ['for_action' => $for_action])->withSuccess('Ваш тест успешно обновлена!');
        }
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
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

    

    public function moderator_tests_destroy(Test $test, $id)
    {
        $test_kupit = Tests_kupit::where('test_id', $id)->count();
        if ($test_kupit > 0) {
            return redirect()->back()->withSuccess('Тестти сатып алгандар бар. Тестти өз алдынча өчүрө албайсыз, администратор менен байланышыңыз же статусун өзгөртүп коюңуз.');
        }else{
            $test = Test::where('id', $id)->first();
            $test_voprosy = Test_voprosy::where('test_id', $id)->get();
            foreach($test_voprosy as $test_vopros){
                if ($test_vopros->img_voprosa != null) {
                    unlink('storage/testy/images/imgvoprosa/'.$test_vopros->img_voprosa);
                }
            }
            if ($test->img != null) {
                unlink('storage/testy/images/thumbnail/'.$test->img);
            }
            $test->delete();
            return redirect()->back()->withSuccess('Тест өчүрүлдү!');
        }
    }


    public function moderator_kurs_urok_tests_destroy(Test $test, $kurs_id, $urok_id, $test_id)
    {
        $test_kupit = Tests_kupit::where('test_id', $test_id)->count();
        if ($test_kupit > 0) {
            DB::table('urokies')->where('id', $urok_id)->update([
                'test_id' => NULL,
            ]);
            return redirect()->back()->withSuccess('Так как тест уже куплено, тест был изъят!');
        }else{
            $uroky_count = Uroky::where('podcat_id', $kurs_id)->where('test_id', $test_id)->count();
            if ($uroky_count > 1) {
                DB::table('urokies')->where('id', $urok_id)->update([
                    'test_id' => NULL,
                ]);
                return redirect()->back()->withSuccess('Так как тест используется в других уроках, тест был изъят!');
            }else{
                $test = Test::where('id', $test_id)->first();
                $test_voprosy = Test_voprosy::where('test_id', $test_id)->get();
                foreach($test_voprosy as $test_vopros){
                    if ($test_vopros->img_voprosa != null) {
                        unlink('storage/testy/images/imgvoprosa/'.$test_vopros->img_voprosa);
                    }
                }
                DB::table('urokies')->where('id', $urok_id)->update([
                        'test_id' => NULL,
                    ]);
                if ($test->img != null) {
                    unlink('storage/testy/images/thumbnail/'.$test->img);
                }
                $test->delete();
                return redirect()->back()->withSuccess('Тест өчүрүлдү!');
            }
        }
    }
}