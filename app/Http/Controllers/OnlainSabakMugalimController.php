<?php

namespace App\Http\Controllers; 

use App\Models\Onlain_sabak_mugalim;
use App\Models\Onlain_sabak_predmety;
use App\Models\Onlain_sabak_predmet_sabak;
use App\Models\Online_sabak_dni_nedeli;
use App\Models\Onlain_sabak_urok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DateTime;
use App\Models\Online_sabak_urok_youtube;
use App\Models\Online_sabak_urok_test;
use App\Models\Online_sabak_urok_frame;
use App\Models\Test;
use App\Models\Test_voprosy;
use App\Models\Test_otvety;
use App\Models\Test_category;
use App\Models\Test_podcategory;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use App\Models\Tests_kupit;
use App\Models\Test_controls;
use App\Models\Test_controls_variants;
use App\Models\Gods;
use App\Models\Mounths;
use App\Models\Days;
use App\Models\Hours;
use App\Models\Minutes;
use App\Models\Online_sabak_kupit;

class OnlainSabakMugalimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function user_online_sabak_view($subdomain)
    {
        $onlain_sabak_days = Online_sabak_dni_nedeli::where('status', 1)->orderBy('nachalo_uroka')->get();
        return view('online_sabak/for_user/online_sabak_view', [
            'onlain_sabak_days' => $onlain_sabak_days,
        ]);
    }
    

    public function ort_online_sabak_satyp_aluu($subdomain, $onlain_sabak_id, Request $request)
    {
        $onlain_sabak = Onlain_sabak_predmet_sabak::where('status', 1)->where('id', $onlain_sabak_id)->first();
        if ($onlain_sabak != null) {
            $next_month_now_date = date('Y-m-d',strtotime('next month'));
            $onlain_sabak_pokupki_count = Online_sabak_kupit::where('onlain_sabak_id', $onlain_sabak_id)->where('data_okonchanie_dostupa', '>', time())->count();
            if ($onlain_sabak_pokupki_count < $onlain_sabak->col_uchenikov) {
                if ($request->check_price == 0) {
                    if($onlain_sabak->akcia == 1 and $onlain_sabak->akcia_data_okonchanie > time()){
                        $price = $onlain_sabak->akcia_price;
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('next month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }else{
                        $price = $onlain_sabak->price;
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('next month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }
                }elseif ($request->check_price == 1) {
                    $price = $onlain_sabak->price;
                    $data_nachalo_dostupa = time();
                    $data_okonchanie_dostupa = strtotime('next month');
                    $pribyl_avtora = $price * 0.8;
                    $pribyl_systemy = $price * 0.2;
                }elseif ($request->check_price == 2) {
                    if ($onlain_sabak->uch_ai_akcia > 0){
                        $price = round(($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->uch_ai_akcia) * 3);
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('+3 month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }else{
                        $price = $onlain_sabak->price;
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('next month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }
                }elseif ($request->check_price == 3) {
                    if ($onlain_sabak->alty_ai_akcia > 0){
                        $price = round(($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->alty_ai_akcia) * 6);
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('+6 month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }else{
                        $price = $onlain_sabak->price;
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('next month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }
                }elseif ($request->check_price == 4) {
                    if ($onlain_sabak->toguz_ai_akcia > 0){
                        $price = round(($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->toguz_ai_akcia) * 9);
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('+9 month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }else{
                        $price = $onlain_sabak->price;
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('next month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }
                }elseif ($request->check_price == 5) {
                    if ($onlain_sabak->bir_jyl_akcia > 0){
                        $price = round(($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->bir_jyl_akcia) * 12);
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('+12 month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }else{
                        $price = $onlain_sabak->price;
                        $data_nachalo_dostupa = time();
                        $data_okonchanie_dostupa = strtotime('next month');
                        $pribyl_avtora = $price * 0.8;
                        $pribyl_systemy = $price * 0.2;
                    }
                }

                if (\Auth::user()->balance >= $price) {
                    DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $price);
                    DB::table('users')->where('id', $onlain_sabak->user_id)->increment('balance', $pribyl_avtora);
                    DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $pribyl_systemy);

                    $onlain_sabak_pokupki = new Online_sabak_kupit();
                    $onlain_sabak_pokupki->user_id = \Auth::user()->id;
                    $onlain_sabak_pokupki->onlain_sabak_id = $onlain_sabak_id;
                    $onlain_sabak_pokupki->price = $price;
                    $onlain_sabak_pokupki->pribyl_avtora = $pribyl_avtora;
                    $onlain_sabak_pokupki->pribyl_systemy = $pribyl_systemy;
                    $onlain_sabak_pokupki->data_nachalo_dostupa = $data_nachalo_dostupa;
                    $onlain_sabak_pokupki->data_okonchanie_dostupa = $data_okonchanie_dostupa;
                    $onlain_sabak_pokupki->avtor_id = $onlain_sabak->user_id;
                    $onlain_sabak_pokupki->save();

                    return redirect()->back()->withSuccess('Сабакка доступ алдыңыз');
                }else{
                    return redirect()->back()->withFalse('Балансыңыздагы акча каражаты жетишсиз!');
                }

                
            }else{
                return redirect()->back()->withFalse('Бул группада окуучулардын саны толук!');
            }
        }else{
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }
    }

    public function user_online_sabak_one_view($subdomain, $onlain_sabak_id)
    {
        $onlain_sabak = Onlain_sabak_predmet_sabak::where('status', 1)->where('id', $onlain_sabak_id)->first();
        $onlain_sabak_days = Online_sabak_dni_nedeli::where('status', 1)->where('onlain_sabak_predmet_sabak_id', $onlain_sabak_id)->orderBy('nachalo_uroka')->get();
        if (\Auth::user()) {
            $proverka = Online_sabak_kupit::where('user_id', \Auth::user()->id)->where('onlain_sabak_id', $onlain_sabak_id)->where('data_okonchanie_dostupa', '>', time())->first();
        }else{
            $proverka = null;
        }
        $col_pokupok = Online_sabak_kupit::where('onlain_sabak_id', $onlain_sabak_id)->where('data_okonchanie_dostupa', '>', time())->count();
        $events = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $onlain_sabak_id)->orderBy('data_uroka')->get()->groupBy(function($events) {
            return Carbon::parse($events->data_uroka)->format('m'); // А это то-же поле по нему мы и будем группировать
        });
        return view('online_sabak/for_user/online_sabak_view_for_one', [
            'onlain_sabak_days' => $onlain_sabak_days,
            'onlain_sabak' => $onlain_sabak,
            'proverka' => $proverka,
            'events' => $events,
            'col_pokupok' => $col_pokupok,
        ]);
    }

    






    public function ort_moderator_online_test_view()
    {
        $tests = Test::where('user_id', \Auth::user()->id)->where('dop_category', 1)->get();

        return view('online_sabak/for_moderator/ort_test', [
            'tests' => $tests,
        ]);
    }

    public function ort_moderator_online_test_destroy($id)
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
    
    public function ort_moderator_online_test_create()
    {
        $test_categories = Test_category::where('dop_category', 1)->orderBy('created_at', 'DESC')->get();
        $test_podcategories = Test_podcategory::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();

        return view('online_sabak/for_moderator/ort_testy_create', [
            'test_categories' => $test_categories,
            'test_podcategories' => $test_podcategories,
            'languages' => $languages,
        ]);
    }

    
    public function ort_moderator_online_test_edit($test_id)
    {
        $test_categories = Test_category::where('dop_category', 1)->orderBy('created_at', 'DESC')->get();
        $test_podcategories = Test_podcategory::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $test_voprosys = Test_voprosy::where('test_id', $test_id)->get();
            $test_otvetys = Test_otvety::where('test_id', $test_id)->orderBy('id', 'asc')->get();

            $gods = Gods::orderBy('god')->get();
            $mounths = Mounths::orderBy('mounth')->get();
            $days = Days::orderBy('day')->get();
            $hours = Hours::orderBy('hour')->get();
            $minutes = Minutes::orderBy('minute')->get();
            if ($test->redaktor_formul == 0) {
                return view('online_sabak/for_moderator/ort_testy_edit_0', [
                    'test_categories' => $test_categories,
                    'test_podcategories' => $test_podcategories,
                    'languages' => $languages,
                    'test' => $test,
                    'test_voprosys' => $test_voprosys,
                    'test_otvetys' => $test_otvetys,
                    'gods' => $gods,
                    'mounths' => $mounths,
                    'days' => $days,
                    'hours' => $hours,
                    'minutes' => $minutes,
                ]);
            }else{
                return view('online_sabak/for_moderator/ort_testy_edit', [
                    'test_categories' => $test_categories,
                    'test_podcategories' => $test_podcategories,
                    'languages' => $languages,
                    'test' => $test,
                    'test_voprosys' => $test_voprosys,
                    'test_otvetys' => $test_otvetys,
                    'gods' => $gods,
                    'mounths' => $mounths,
                    'days' => $days,
                    'hours' => $hours,
                    'minutes' => $minutes,
                ]);
            }
        }
    }

    
    public function ort_moderator_online_test_store(Request $request)
    {
        $ratio = 16/9;
        if($request->hasFile('rebate_imag')){
            $file0=$request->file('rebate_imag');
            $file_extension0 = $file0->getClientOriginalExtension();
            $destinationPath = 'storage/testy/images/thumbnail/';
            $ogImage = Image::make($file0);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().uniqid().rand(1, 1000).'.'.$file_extension0;            
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
        $test->dop_category = 1;
        $test->save();

        $test_vopros = new Test_voprosy();
        $test_vopros->test_id = $test->id;
        $test_vopros->ball = 1;
        $test_vopros->katar_nomeri = 1;
        $test_vopros->save();

        $test_otvet = new Test_otvety();
        $test_otvet->test_voprosy_id = $test_vopros->id;
        $test_otvet->test_id = $test->id;
        $test_otvet->test_otvety = '<p>А</p>';
        $test_otvet->save();

        $test_otvet = new Test_otvety();
        $test_otvet->test_voprosy_id = $test_vopros->id;
        $test_otvet->test_id = $test->id;
        $test_otvet->test_otvety = '<p>Б</p>';
        $test_otvet->save();

        $test_otvet = new Test_otvety();
        $test_otvet->test_voprosy_id = $test_vopros->id;
        $test_otvet->test_id = $test->id;
        $test_otvet->test_otvety = '<p>В</p>';
        $test_otvet->save();

        $test_otvet = new Test_otvety();
        $test_otvet->test_voprosy_id = $test_vopros->id;
        $test_otvet->test_id = $test->id;
        $test_otvet->test_otvety = '<p>Г</p>';
        $test_otvet->save();
        return redirect()->route('ort_moderator_online_test_edit', $test->id)->withSuccess('Тест кошулду');
    }

    
    public function ort_moderator_online_test_plus_novyi_vopros($test_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $test_vopros_count = Test_voprosy::where('test_id', $test->id)->count();

            $test_vopros = new Test_voprosy();
            $test_vopros->test_id = $test->id;
            $test_vopros->ball = 1;
            $test_vopros->katar_nomeri = $test_vopros_count + 1;
            $test_vopros->save();

            $test_otvet1 = new Test_otvety();
            $test_otvet1->test_voprosy_id = $test_vopros->id;
            $test_otvet1->test_id = $test->id;
            $test_otvet1->test_otvety = '<p>А</p>';
            $test_otvet1->save();

            $test_otvet2 = new Test_otvety();
            $test_otvet2->test_voprosy_id = $test_vopros->id;
            $test_otvet2->test_id = $test->id;
            $test_otvet2->test_otvety = '<p>Б</p>';
            $test_otvet2->save();

            $test_otvet3 = new Test_otvety();
            $test_otvet3->test_voprosy_id = $test_vopros->id;
            $test_otvet3->test_id = $test->id;
            $test_otvet3->test_otvety = '<p>В</p>';
            $test_otvet3->save();

            $test_otvet4 = new Test_otvety();
            $test_otvet4->test_voprosy_id = $test_vopros->id;
            $test_otvet4->test_id = $test->id;
            $test_otvet4->test_otvety = '<p>Г</p>';
            $test_otvet4->save();

            return response()->json([
                'test_vopros_id'=>$test_vopros->id,
                'test_vopros_katar_nomeri'=>$test_vopros->katar_nomeri,
                'test_otvet1_id'=>$test_otvet1->id,
                'test_otvet2_id'=>$test_otvet2->id,
                'test_otvet3_id'=>$test_otvet3->id,
                'test_otvet4_id'=>$test_otvet4->id,
            ]);
        }
    }

    
    public function ort_moderator_online_test_status($test_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($test->status == 0) {
                $status = 1;
            }else{
                $status = 0;
            }
            Test::where('id', $test_id)->update([
                'status' => $status,
            ]);
            return response()->json($status);
        }
    }

    public function ort_moderator_online_test_redaktor_formul($test_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($test->redaktor_formul == 0) {
                $status = 1;
                Test::where('id', $test_id)->update([
                    'redaktor_formul' => $status,
                ]);
            }else{
                $status = 0;
            }
            
            return response()->json($status);
        }
    }

    
    public function ort_moderator_online_test_pokaz_otvetov_1($test_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            Test::where('id', $test_id)->update([
                'pokaz_otvetov' => NULL,
            ]);
            return response()->json(true);
        }
    }

    public function ort_moderator_online_test_pokaz_otvetov_2($test_id, Request $request)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $day = $request->pokaz_otvetov_day * 86400;
            $hour = $request->pokaz_otvetov_hour * 3600;
            $minute = $request->pokaz_otvetov_minute * 60;
            $pokaz_otvetov = $day + $hour + $minute;

            Test::where('id', $test_id)->update([
                'pokaz_otvetov' => $pokaz_otvetov,
            ]);
            return response()->json($pokaz_otvetov);
        }
    }

    public function ort_moderator_online_test_srok_dostupa_1($test_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            Test::where('id', $test_id)->update([
                'srok_dostupa' => 0,
            ]);
            return response()->json(true);
        }
    }

    public function ort_moderator_online_test_srok_dostupa_2($test_id, Request $request)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $god = $request->srok_dostupa_god * 31536000;
            $mounth = $request->srok_dostupa_mounth * 2592000;
            $day = $request->srok_dostupa_day * 86400;
            $hour = $request->srok_dostupa_hour * 3600;
            $minute = $request->srok_dostupa_minute * 60;

            $srok_dostupa = $god + $mounth + $day + $hour + $minute;

            Test::where('id', $test_id)->update([
                'srok_dostupa' => $srok_dostupa,
            ]);
            return response()->json($srok_dostupa);
        }
    }
    
    public function ort_moderator_online_test_vopros_testa_update($test_id, $vopros_testa_id, Request $request)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            Test_voprosy::where('id', $vopros_testa_id)->update([
                'text_voprosa' => $request->vopros_testa,
            ]);
            return response()->json(true);
        }
    }

    
    public function ort_moderator_online_test_vopros_checked($vopros_testa_id, $test_otvety_id)
    {
        $test_otvety = Test_otvety::where('id', $test_otvety_id)->first();
        $test = Test::where('id', $test_otvety->test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($test_otvety->test_otvety != null) {
                Test_otvety::where('id', $test_otvety_id)->update([
                    'status_otveta' => 1,
                ]);
                $test_otvetys = Test_otvety::where('test_voprosy_id', $vopros_testa_id)->where('id', '!=', $test_otvety_id)->get();
                foreach ($test_otvetys as $test_otvety0) {
                    Test_otvety::where('id', $test_otvety0->id)->update([
                        'status_otveta' => 0,
                    ]);
                }
                $status = 0;
            }else{
                $test_otvety_chec = Test_otvety::where('test_voprosy_id', $vopros_testa_id)->where('status_otveta', 1)->first();
                if ($test_otvety_chec != null) {
                    $status = $test_otvety_chec->id;
                }else{
                    $status = 1;
                }
            }
            
            return response()->json($status);
        }
    }

    
    public function ort_moderator_online_test_variant_delet($test_id, $test_otvety_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $test_otvety = Test_otvety::where('id', $test_otvety_id)->first();
            $status = $test_otvety->id;
            $test_otvety->delete();
            return response()->json($status);
        }
    }

    
    public function ort_moderator_online_test_img12_update($test_id, $test_voprosy_id, Request $request)
    {
        $user_id = \Auth::user()->id;
        $file1=$request->file('rebate_image1');
        $file_extension1 = $file1->getClientOriginalExtension();
        $fileName1=$user_id.'1'.uniqid().rand(1, 1000).time().'.'. $file_extension1;
        $file1->move(\public_path('storage/testy/images/imgvoprosa/'),$fileName1);

        $test_vopros = Test_voprosy::where('id', $request->id)->first();
        if ($test_vopros->img_voprosa != null) {
            unlink('storage/testy/images/imgvoprosa/'.$test_vopros->img_voprosa);
        }
        Test_voprosy::where('id', $request->id)->update([
            'img_voprosa' => $fileName1,
        ]);
        return response()->json($request->id);
    }
    
    public function ort_moderator_online_test_img_delet($test_id, $test_voprosy_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $test_vopros = Test_voprosy::where('id', $test_voprosy_id)->first();
            if ($test_vopros->img_voprosa != null) {
                unlink('storage/testy/images/imgvoprosa/'.$test_vopros->img_voprosa);

                Test_voprosy::where('id', $test_voprosy_id)->update([
                    'img_voprosa' => NULL,
                ]);
            }            
            return response()->json(true);
        }
    }
    
    public function ort_moderator_online_test_vopros_delet($test_id, $test_voprosy_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $test_otvetys = Test_otvety::where('test_voprosy_id', $test_voprosy_id)->get();
            foreach ($test_otvetys as $test_otvety) {
                $test_otvety->delete();
            }
            $test_vopros = Test_voprosy::where('id', $test_voprosy_id)->first();
            $nomer = $test_vopros->katar_nomeri;
            $test_vopross8 = Test_voprosy::where('test_id', $test_id)->where('katar_nomeri', '>', $nomer)->get();
            foreach ($test_vopross8 as $test_vopros1) {
                Test_voprosy::where('id', $test_vopros1->id)->update([
                    'katar_nomeri' => $test_vopros1->katar_nomeri - 1,
                ]);
            }
            if ($test_vopros->img_voprosa != null) {
                unlink('storage/testy/images/imgvoprosa/'.$test_vopros->img_voprosa);
            }
            $test_vopros->delete();
            

            return response()->json(true);
        }
    }

    
    public function ort_moderator_online_test_otvet_testa_update($test_id, $test_otvety_id, Request $request)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            Test_otvety::where('id', $test_otvety_id)->update([
                'test_otvety' => $request->variant_text,
            ]);
            return response()->json(true);
        }
    }

    
    public function ort_moderator_online_test_vopros_ball_update($test_id, $vopros_testa_id, Request $request)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            Test_voprosy::where('id', $vopros_testa_id)->update([
                'ball' => $request->vopros_ball,
            ]);
            return response()->json(true);
        }
    }
    
    public function ort_moderator_online_test_pluse_otvet_testa($test_id, $test_voprosy_id)
    {
        $test = Test::where('id', $test_id)->first();
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $test_otvet = new Test_otvety();
            $test_otvet->test_voprosy_id = $test_voprosy_id;
            $test_otvet->test_id = $test_id;
            $test_otvet->save();
            
            return json_encode($test_otvet->id);
        }
    }
    
    public function ort_moderator_online_test_update($test_id, Request $request)
    {
        $test = Test::where('id', $test_id)->first();
        $old_price = $test->oldprice;
        if ($test->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if($request->hasFile('rebate_imag')){
                if ($test->img != null) {
                    unlink('storage/testy/images/thumbnail/'.$test->img);
                }
                $ratio = 16/9;
                $file0=$request->file('rebate_imag');
                $file_extension0 = $file0->getClientOriginalExtension();
                $destinationPath = 'storage/testy/images/thumbnail/';
                $ogImage = Image::make($file0);
    
                $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
                $thImagename=time().uniqid().rand(1, 1000).'.'.$file_extension0;          
                $thImage->save($destinationPath . $thImagename);
    
                $test = DB::table('tests')->where('id', $test_id)->update([
                    'img' => $thImagename,
                ]);
            }
            $test = DB::table('tests')->where('id', $test_id)->update([
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'test_category_id' => $request->test_category_id,
                'test_podcategory_id' => $request->test_podcategory_id,
                'language' => $request->language,
                'price' => $request->price * 100,
                'oldprice' => $old_price,
                'kol_popytkov' => $request->popytki,
                'time' => $request->prodoljitelnost * 60,
            ]);
        }
        return redirect()->route('ort_moderator_online_test_edit', $test_id)->withSuccess('Тест өзгөртүлдү');
    }


    public function moderator_panel_ort()
    {
        $onlain_sabak_mugalim = Onlain_sabak_mugalim::where('user_id', \Auth::user()->id)->first();
        if ($onlain_sabak_mugalim == null) {
            $onlain_sabak_mugalim_new = new Onlain_sabak_mugalim([
                'user_id' => \Auth::user()->id,
            ]);
            $onlain_sabak_mugalim_new->save();
        }
        $onlain_sabak_days1 = Online_sabak_dni_nedeli::where('user_id', \Auth::user()->id)->where('status', 1)->select('nachalo_uroka')->orderBy('nachalo_uroka')->distinct()->get();
        $onlain_sabak_days = Online_sabak_dni_nedeli::where('user_id', \Auth::user()->id)->where('status', 1)->orderBy('nachalo_uroka')->get();
        return view('online_sabak/for_moderator/ort_dashboard', [
            'onlain_sabak_days' => $onlain_sabak_days,
            'onlain_sabak_days1' => $onlain_sabak_days1,
        ]);
    }

    
    public function moderator_panel_online_sabak_delete($online_sabak_id)
    {
        $onlain_sabak_predmet_sabaks = Onlain_sabak_predmet_sabak::where('user_id', \Auth::user()->id)->where('id', $online_sabak_id)->first();
        $online_sabak_uroks = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $onlain_sabak_predmet_sabaks->id)->get();
        $onlain_sabak_pokupki_count = Online_sabak_kupit::where('onlain_sabak_id', $onlain_sabak_predmet_sabaks->id)->count();
        if ($onlain_sabak_pokupki_count > 0) {
            return redirect()->back()->withFalse('Сабакты өчүрүүгө болбойт! Сатып алган окуучулар бар.');
        }else{
            foreach ($online_sabak_uroks as $online_sabak_urok) {
                $online_sabak_urok->delete();
            }
            $onlain_sabak_predmet_sabaks->delete();
            return redirect()->back()->withSuccess('Сабак өчүрүлдү!');
        }
    }

    public function moderator_panel_ort_online_sabak()
    {
        $onlain_sabak_predmety = Onlain_sabak_predmety::where('onlain_sabak_category_id', 1)->get();
        $onlain_sabak_predmet_sabaks = Onlain_sabak_predmet_sabak::where('user_id', \Auth::user()->id)->get();
        return view('online_sabak/for_moderator/online_sabak', [
            'onlain_sabak_predmety' => $onlain_sabak_predmety,
            'onlain_sabak_predmet_sabaks' => $onlain_sabak_predmet_sabaks,
        ]);
    }

    public function ort_moderator_sabak_koshuu(Request $request)
    {
        $onlain_sabak_mugalim = Onlain_sabak_mugalim::where('user_id', \Auth::user()->id)->first();
        $onlain_sabak_predmet_sabaks_max_gruppa = Onlain_sabak_predmet_sabak::where('user_id', \Auth::user()->id)->where('onlain_sabak_predmety_id', $request->sabak_plus)->max('nomer_gruppy');
        $nomer = $onlain_sabak_predmet_sabaks_max_gruppa + 1;
        $onlain_sabak_predmet_sabak_new = new Onlain_sabak_predmet_sabak([
            'user_id' => \Auth::user()->id,
            'onlain_sabak_predmety_id' => $request->sabak_plus,
            'onlain_sabak_mugalim_id' => $onlain_sabak_mugalim->id,
            'price' => 99999999999,
            'nomer_gruppy' => $nomer,
            'dostup_na_pokupku_za_neskolko_mesyacev' => 0,
        ]);
        $onlain_sabak_predmet_sabak_new->save();
        return redirect()->route('moderator_panel_ort_online_sabak')->withSuccess('Сабак кошулду');
    }

    
    public function moderator_panel_online_sabak_edit($online_sabak_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_predmety = Onlain_sabak_predmety::where('onlain_sabak_category_id', 1)->get();
            $onlain_sabak_days = Online_sabak_dni_nedeli::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->get();
            return view('online_sabak/for_moderator/online_sabak_edit', [
                'onlain_sabak_predmety' => $onlain_sabak_predmety,
                'onlain_sabak_predmet_sabak' => $onlain_sabak_predmet_sabak,
                'onlain_sabak_days' => $onlain_sabak_days,
            ]);
        }
    }

    public function ort_moderator_online_sabak_plus_kunu($sabak_id, $kunu, $ubaktysy)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_plus_kunu_new = new Online_sabak_dni_nedeli([
                'onlain_sabak_predmet_sabak_id' => $sabak_id,
                'den_nedeli' => $kunu,
                'nachalo_uroka' => $ubaktysy,
                'okonchanie_uroka' => $ubaktysy,
                'user_id' => \Auth::user()->id,
            ]);
            $onlain_sabak_plus_kunu_new->save();
            $onlain_sabak_urok_maks_data = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $sabak_id)->max('data_uroka');
            $ss_h = (int)date('H', time());
            $ss_i = (int)date('i', time());
            $ss_s = (int)date('s', time());
            $ss_saat = $ss_h * 3600 + $ss_i * 60 + $ss_s;
            $proverka1 = strtotime(date("Y-m-t", $onlain_sabak_urok_maks_data))+$ss_saat;
            if ($proverka1 > time()) {
                $online_sabak_id = $sabak_id;

                $max_date =date('Y',$onlain_sabak_urok_maks_data).'-'.date('m',$onlain_sabak_urok_maks_data).'-'.date('d',$onlain_sabak_urok_maks_data);
                $to_date =date('Y',time()).'-'.date('m',time()).'-'.date('d',time());
                $d1 = new DateTime($max_date);
                $d2 = new DateTime($to_date);
                $interval = $d1->diff($d2);
                $diffInMonths  = $interval->m; //4
                $diffInYears   = $interval->y; //1

                $col_mes = $diffInYears * 12 + $diffInMonths;

                for ($i1 = 0;$i1 <= $col_mes;$i1++){
                    if ($i1 != 0) {
                        $t_time = strtotime('+'.$i1.'month', time());
                        $j_jyl = date("Y", $t_time);
                        $j_ai = date("m", $t_time);
                        $month_now_days = date('t',$t_time);
                        $pervyi_den = 1;
                        $pervaya_data = $j_jyl.'-'.$j_ai.'-'.$pervyi_den;
                        $t_time = strtotime($pervaya_data);

                        if ($kunu == 1) {
                            $kun1_1 = date('d', strtotime('this Monday', $t_time));
                            $j_ai_2 = date('m', strtotime('this Monday', $t_time));
                        }elseif ($kunu == 2) {
                            $kun1_1 = date('d', strtotime('this Tuesday', $t_time));
                            $j_ai_2 = date('m', strtotime('this Tuesday', $t_time));
                        }elseif ($kunu == 3) {
                            $kun1_1 = date('d', strtotime('this Wednesday', $t_time));
                            $j_ai_2 = date('m', strtotime('this Wednesday', $t_time));
                        }elseif ($kunu == 4) {
                            $kun1_1 = date('d', strtotime('this Thursday', $t_time));
                            $j_ai_2 = date('m', strtotime('this Thursday', $t_time));
                        }elseif ($kunu == 5) {
                            $kun1_1 = date('d', strtotime('this Friday', $t_time));
                            $j_ai_2 = date('m', strtotime('this Friday', $t_time));
                        }elseif ($kunu == 6) {
                            $kun1_1 = date('d', strtotime('this Saturday', $t_time));
                            $j_ai_2 = date('m', strtotime('this Saturday', $t_time));
                        }elseif ($kunu == 7) {
                            $kun1_1 = date('d', strtotime('this sunday', $t_time));
                            $j_ai_2 = date('m', strtotime('this sunday', $t_time));
                        }
    
                        for ($i = 1;$i <= $month_now_days;$i++){
                            if ($j_ai_2 == $j_ai) {
                                if ($i == $kun1_1){
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $kunu,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }elseif ($i == $kun1_1 + 7){
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $kunu,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }elseif ($i == $kun1_1 + 14){
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $kunu,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }elseif ($i == $kun1_1 + 21){
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $kunu,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }elseif ($i == $kun1_1 + 28){
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $kunu,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }
                            }
                        }
                    }else{
                        $j_jyl = date("Y", time());
                        $j_ai = date("m", time());
                        $j_kun = date("d", time());
                        $month_now_days = date('t',time());
                        if ($j_kun < $month_now_days) {
                            $ubaktysy2 = (int)date('H', time());
                            if ($ubaktysy > $ubaktysy2) {
                                $t_time = time();
                            }else{
                                $t_time = strtotime('+1 day', time());
                            }

                            if ($kunu == 1) {
                                $kun1_1 = date('d', strtotime('this Monday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Monday', $t_time));
                            }elseif ($kunu == 2) {
                                $kun1_1 = date('d', strtotime('this Tuesday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Tuesday', $t_time));
                            }elseif ($kunu == 3) {
                                $kun1_1 = date('d', strtotime('this Wednesday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Wednesday', $t_time));
                            }elseif ($kunu == 4) {
                                $kun1_1 = date('d', strtotime('this Thursday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Thursday', $t_time));
                            }elseif ($kunu == 5) {
                                $kun1_1 = date('d', strtotime('this Friday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Friday', $t_time));
                            }elseif ($kunu == 6) {
                                $kun1_1 = date('d', strtotime('this Saturday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Saturday', $t_time));
                            }elseif ($kunu == 7) {
                                $kun1_1 = date('d', strtotime('this sunday', $t_time));
                                $j_ai_2 = date('m', strtotime('this sunday', $t_time));
                            }
        
                            for ($i = 1;$i <= $month_now_days;$i++){
                                if ($j_ai_2 == $j_ai) {
                                    if ($i == $kun1_1){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 7){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 14){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 21){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 28){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }
                                }
                            }
                        }else{
                            $ubaktysy2 = (int)date('H', time());
                            if ($ubaktysy > $ubaktysy2) {
                                $t_time = time();
                            }
                            if ($kunu == 1) {
                                $kun1_1 = date('d', strtotime('this Monday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Monday', $t_time));
                            }elseif ($kunu == 2) {
                                $kun1_1 = date('d', strtotime('this Tuesday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Tuesday', $t_time));
                            }elseif ($kunu == 3) {
                                $kun1_1 = date('d', strtotime('this Wednesday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Wednesday', $t_time));
                            }elseif ($kunu == 4) {
                                $kun1_1 = date('d', strtotime('this Thursday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Thursday', $t_time));
                            }elseif ($kunu == 5) {
                                $kun1_1 = date('d', strtotime('this Friday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Friday', $t_time));
                            }elseif ($kunu == 6) {
                                $kun1_1 = date('d', strtotime('this Saturday', $t_time));
                                $j_ai_2 = date('m', strtotime('this Saturday', $t_time));
                            }elseif ($kunu == 7) {
                                $kun1_1 = date('d', strtotime('this sunday', $t_time));
                                $j_ai_2 = date('m', strtotime('this sunday', $t_time));
                            }
        
                            for ($i = 1;$i <= $month_now_days;$i++){
                                if ($j_ai_2 == $j_ai) {
                                    if ($i == $kun1_1){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 7){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 14){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 21){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 28){
                                        $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_plus_kunu_new->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }
                                }
                            }
                        }
                        
                    }
                }
                return redirect()->back()->withSuccess('Күнү жана убактысы белгиленди++');
            }else{
                return redirect()->back()->withSuccess('Күнү жана убактысы белгиленди1');
            }
            return redirect()->back()->withSuccess('Күнү жана убактысы белгиленди');
        }
    }

    public function ort_moderator_online_sabak_minus_kunu($sabak_id, $onlain_sabak_day_id)
    {
        return redirect()->back()->withSuccess('Күнү жана убактысы белгиленди');
    }

    public function ort_moderator_sabak_edit($online_sabak_id, Request $request)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $price = intval( $request->price ) * 100;
            if ($price != $onlain_sabak_predmet_sabak->price) {
                $price = $price;
                if ($onlain_sabak_predmet_sabak->price != 99999999999) {
                    $old_price = $onlain_sabak_predmet_sabak->price;
                }else{
                    $old_price = NULL;
                }
            }else{
                $price = $price;
                $old_price = $onlain_sabak_predmet_sabak->old_price;
            }

            DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                'opisanie' => $request->opisanie,
                'price' => $price,
                'old_price' => $old_price,
            ]);

            if ($price == 0) {
                DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                    'akcia_data_okonchanie' => NULL,
                    'akcia_price' => NULL,
                    'akcia' => 0,
                ]);
            }
            
            return redirect()->back()->withSuccess('Маалымат сакталды');
        }
    }

    public function ort_moderator_sabak_edit_akcia($online_sabak_id, Request $request)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $price = intval( $request->akcia_price ) * 100;
            $procent = $onlain_sabak_predmet_sabak->price * 0.95;
            if ($onlain_sabak_predmet_sabak->price == 99999999999) {
                return redirect()->back()->withFalse_price('Акцияны колдонуу үчүн сабактын баасы 0 сомдон жогору болушу керек!');
            }else{
                if ($price <= $procent) {
                    $price = $price;
                }else{
                    return redirect()->back()->withFalse_price('Жок дегенде 5% ке аз болушу керек!');
                }
            }
            $kun1 = substr($request->data, 8, 2);
            $ai1 = substr($request->data, 5, 2);
            $god1 = substr($request->data, 0, 4);
            $saat1 = substr($request->data, 11, 2);
            $minuta1 = substr($request->data, 14, 2);

            $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.$saat1.':'.$minuta1.':'.'00';
            $data_num = strtotime($data_num3);

            if ($data_num <= time()) {
                return redirect()->back()->withFalse_data('Акциянын бүткөн датасы бүгүнкү датадан кийин болушу керек!');
            }
            DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                'akcia_data_okonchanie' => $data_num,
                'akcia_price' => $price,
            ]);
            return redirect()->back()->withSuccess('Маалымат сакталды');
        }
    }
    
    public function ort_moderator_sabak_edit_akcia_chek($online_sabak_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null) {
                if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie > time()) {
                    if ($onlain_sabak_predmet_sabak->akcia != null) {
                        if ($onlain_sabak_predmet_sabak->price != 99999999999) {
                            if ($onlain_sabak_predmet_sabak->price > 0) {
                                $procent = $onlain_sabak_predmet_sabak->price / 100 * 0.95;
                                if ($onlain_sabak_predmet_sabak->akcia_price / 100 <= $procent) {
                                    if ($onlain_sabak_predmet_sabak->akcia == 0) {
                                        DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                                            'akcia' => 1,
                                        ]);
                                    }else{
                                        DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                                            'akcia' => 0,
                                        ]);
                                    }
                                    return response()->json(true);
                                }else{
                                    return redirect()->back()->withFalse_price('Жок дегенде 5% ке аз болушу керек!');
                                }
                            }else{
                                return redirect()->back()->withFalse_price('Акцияны иштетүү үчүн сабактын баасы 0 сомдон жогору болушу керек!');
                            }
                        }else{
                            return redirect()->back()->withFalse_price('Алгач сабактын баасын коюу керек!');
                        }
                    }else{
                        if ($onlain_sabak_predmet_sabak->price != 99999999999) {
                            if ($onlain_sabak_predmet_sabak->price > 0) {
                                $procent = $onlain_sabak_predmet_sabak->price / 100 * 0.95;
                                if ($onlain_sabak_predmet_sabak->akcia_price / 100 <= $procent) {
                                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                                        'akcia' => 1,
                                    ]);
                                    return response()->json(true);
                                }else{
                                    return redirect()->back()->withFalse_price('Жок дегенде 5% ке аз болушу керек!');
                                }
                            }else{
                                return redirect()->back()->withFalse_price('Акцияны иштетүү үчүн сабактын баасы 0 сомдон жогору болушу керек!');
                            }
                        }else{
                            return redirect()->back()->withFalse_price('Алгач сабактын баасын коюу керек!');
                        }
                    }
                }
            }
        }
    }
    

    public function ort_moderator_sabak_edit_nes_mes_chek($online_sabak_id, $data_id2, Request $request)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($data_id2 == 3) {
                if ($request->uch_ai_akcia > 0) {
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'uch_ai_akcia' => $request->uch_ai_akcia,
                    ]);
                }else{
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'uch_ai_akcia' => NULL,
                    ]);
                }
            }
            if ($data_id2 == 6) {
                if ($request->alty_ai_akcia > 0) {
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'alty_ai_akcia' => $request->alty_ai_akcia,
                    ]);
                }else{
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'alty_ai_akcia' => NULL,
                    ]);
                }
            }
            if ($data_id2 == 9) {
                if ($request->toguz_ai_akcia > 0) {
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'toguz_ai_akcia' => $request->toguz_ai_akcia,
                    ]);
                }else{
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'toguz_ai_akcia' => NULL,
                    ]);
                }
            }
            if ($data_id2 == 12) {
                if ($request->bir_jyl_akcia > 0) {
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'bir_jyl_akcia' => $request->bir_jyl_akcia,
                    ]);
                }else{
                    DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                        'bir_jyl_akcia' => NULL,
                    ]);
                }
            }
            return response()->json(true);
        }
    }

    public function ort_moderator_sabak_edit_nes_mes_chek2($online_sabak_id, $data_id2)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($data_id2 == 3) {
                DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                    'uch_ai_akcia' => NULL,
                ]);
            }
            if ($data_id2 == 6) {
                DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                    'alty_ai_akcia' => NULL,
                ]);
            }
            if ($data_id2 == 9) {
                DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                    'toguz_ai_akcia' => NULL,
                ]);
            }
            if ($data_id2 == 12) {
                DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                    'bir_jyl_akcia' => NULL,
                ]);
            }
            return response()->json(true);
        }
    }

    public function ort_moderator_sabak_edit_chek_status($online_sabak_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($onlain_sabak_predmet_sabak->price != 99999999999) {
                $onlain_sabak_days = Online_sabak_dni_nedeli::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->where('status', 1)->count();
                if ($onlain_sabak_days > 0) {
                    if ($onlain_sabak_predmet_sabak->status == 1) {
                        DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                            'status' => 0,
                        ]);
                    }else{
                        DB::table('onlain_sabak_predmet_sabaks')->where('id', $online_sabak_id)->update([
                            'status' => 1,
                        ]);
                    }
                    return response()->json(true);
                }else{
                    return redirect()->back()->withFalse('Алгач кайсыл күндөрү сабак болоорун белгилөө керек!');
                }
            }else{
                return redirect()->back()->withFalse('Алгач сабактын баасын коюу керек!');
            }
        }
    }


    public function moderator_panel_online_sabak_edit_kunu($online_sabak_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_days1 = Online_sabak_dni_nedeli::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->where('status', 1)->select('nachalo_uroka')->orderBy('nachalo_uroka')->distinct()->get();
            $onlain_sabak_days = Online_sabak_dni_nedeli::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->where('status', 1)->orderBy('nachalo_uroka')->get();
            $onlain_sabak_uroks = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->orderBy('data_uroka')->get();

            $events = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->orderBy('data_uroka')->get()->groupBy(function($events) {
                return Carbon::parse($events->data_uroka)->format('m'); // А это то-же поле по нему мы и будем группировать
            });

            return view('online_sabak/for_moderator/online_sabak_dni_edit', [
                'onlain_sabak_predmet_sabak' => $onlain_sabak_predmet_sabak,
                'onlain_sabak_days' => $onlain_sabak_days,
                'onlain_sabak_days1' => $onlain_sabak_days1,
                'onlain_sabak_uroks' => $onlain_sabak_uroks,
                'events' => $events,
            ]);
        }
    }

    public function ort_moderator_sabak_plus_dni($online_sabak_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_urok_maks_data = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->max('data_uroka');
            

            $onlain_sabak_days = Online_sabak_dni_nedeli::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->get();
            if ($onlain_sabak_urok_maks_data == null) {
                $j_jyl = date("Y", time());
                $j_ai = date("m", time());
                $month_now_days = date('t');

                $plus_ai = time();
            }else{
                if ($onlain_sabak_urok_maks_data > time()) {
                    $col_dney = date('t',$onlain_sabak_urok_maks_data);
                    $f_jyl = date('Y',$onlain_sabak_urok_maks_data);
                    $f_ai = date('m',$onlain_sabak_urok_maks_data);
                    $posled_data = $f_jyl.'-'.$f_ai.'-'.$col_dney;
                    $plus_ai = strtotime('+1 day', strtotime($posled_data));
                    $j_jyl = date("Y", $plus_ai);
                    $j_ai = date("m", $plus_ai);

                    $month_now_days = date('t',$plus_ai);
                }else{
                    $j_jyl = date("Y", time());
                    $j_ai = date("m", time());
                    $month_now_days = date('t');

                    $plus_ai = time();
                }
            }
            foreach ($onlain_sabak_days as $onlain_sabak_day) {
                if ($onlain_sabak_day->den_nedeli == 1) {
                    $kun1_1 = date('d', strtotime('this Monday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this Monday', $plus_ai));
                }elseif ($onlain_sabak_day->den_nedeli == 2) {
                    $kun1_1 = date('d', strtotime('this Tuesday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this Tuesday', $plus_ai));
                }elseif ($onlain_sabak_day->den_nedeli == 3) {
                    $kun1_1 = date('d', strtotime('this Wednesday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this Wednesday', $plus_ai));
                }elseif ($onlain_sabak_day->den_nedeli == 4) {
                    $kun1_1 = date('d', strtotime('this Thursday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this Thursday', $plus_ai));
                }elseif ($onlain_sabak_day->den_nedeli == 5) {
                    $kun1_1 = date('d', strtotime('this Friday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this Friday', $plus_ai));
                }elseif ($onlain_sabak_day->den_nedeli == 6) {
                    $kun1_1 = date('d', strtotime('this Saturday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this Saturday', $plus_ai));
                }elseif ($onlain_sabak_day->den_nedeli == 7) {
                    $kun1_1 = date('d', strtotime('this sunday', $plus_ai));
                    $j_ai_2 = date('m', strtotime('this sunday', $plus_ai));
                }

                for ($i = 1;$i <= $month_now_days;$i++){
                    if ($i == $kun1_1){
                        if ($j_ai_2 == $j_ai) {
                            $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                            $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                'user_id' => \Auth::user()->id,
                                'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                'data_uroka' => $data_k,
                                'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                            ]);
                            $onlain_sabak_urok_new->save();
                        }
                    }elseif ($i == $kun1_1 + 7){
                        if ($j_ai_2 == $j_ai) {
                            $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                            $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                'user_id' => \Auth::user()->id,
                                'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                'data_uroka' => $data_k,
                                'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                            ]);
                            $onlain_sabak_urok_new->save();
                        }
                    }elseif ($i == $kun1_1 + 14){
                        if ($j_ai_2 == $j_ai) {
                            $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                            $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                'user_id' => \Auth::user()->id,
                                'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                'data_uroka' => $data_k,
                                'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                            ]);
                            $onlain_sabak_urok_new->save();
                        }
                    }elseif ($i == $kun1_1 + 21){
                        if ($j_ai_2 == $j_ai) {
                            $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                            $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                'user_id' => \Auth::user()->id,
                                'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                'data_uroka' => $data_k,
                                'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                            ]);
                            $onlain_sabak_urok_new->save();
                        }
                    }elseif ($i == $kun1_1 + 28){
                        if ($j_ai_2 == $j_ai) {
                            $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                            $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                'user_id' => \Auth::user()->id,
                                'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                'data_uroka' => $data_k,
                                'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                            ]);
                            $onlain_sabak_urok_new->save();
                        }
                    }
                }
            }

            if ($onlain_sabak_urok_maks_data == null) {
                $onlain_sabak_urok_col = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->count();
                if ($onlain_sabak_urok_col == 0) {
                    $col_dney = date('t', time());
                    $f_jyl = date('Y', time());
                    $f_ai = date('m', time());
                    $posled_data = $f_jyl.'-'.$f_ai.'-'.$col_dney;
                    $plus_ai = strtotime('+1 day', strtotime($posled_data));
                    $j_jyl = date("Y", $plus_ai);
                    $j_ai = date("m", $plus_ai);

                    $month_now_days = date('t',$plus_ai);

                    foreach ($onlain_sabak_days as $onlain_sabak_day) {
                        if ($onlain_sabak_day->den_nedeli == 1) {
                            $kun1_1 = date('d', strtotime('this Monday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this Monday', $plus_ai));
                        }elseif ($onlain_sabak_day->den_nedeli == 2) {
                            $kun1_1 = date('d', strtotime('this Tuesday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this Tuesday', $plus_ai));
                        }elseif ($onlain_sabak_day->den_nedeli == 3) {
                            $kun1_1 = date('d', strtotime('this Wednesday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this Wednesday', $plus_ai));
                        }elseif ($onlain_sabak_day->den_nedeli == 4) {
                            $kun1_1 = date('d', strtotime('this Thursday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this Thursday', $plus_ai));
                        }elseif ($onlain_sabak_day->den_nedeli == 5) {
                            $kun1_1 = date('d', strtotime('this Friday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this Friday', $plus_ai));
                        }elseif ($onlain_sabak_day->den_nedeli == 6) {
                            $kun1_1 = date('d', strtotime('this Saturday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this Saturday', $plus_ai));
                        }elseif ($onlain_sabak_day->den_nedeli == 7) {
                            $kun1_1 = date('d', strtotime('this sunday', $plus_ai));
                            $j_ai_2 = date('m', strtotime('this sunday', $plus_ai));
                        }
        
                        for ($i = 1;$i <= $month_now_days;$i++){
                            if ($i == $kun1_1){
                                if ($j_ai_2 == $j_ai) {
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }
                            }elseif ($i == $kun1_1 + 7){
                                if ($j_ai_2 == $j_ai) {
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }
                            }elseif ($i == $kun1_1 + 14){
                                if ($j_ai_2 == $j_ai) {
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }
                            }elseif ($i == $kun1_1 + 21){
                                if ($j_ai_2 == $j_ai) {
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }
                            }elseif ($i == $kun1_1 + 28){
                                if ($j_ai_2 == $j_ai) {
                                    $data_k = strtotime($j_jyl.'-'.$j_ai.'-'.$i);
                                    $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                        'user_id' => \Auth::user()->id,
                                        'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                        'data_uroka' => $data_k,
                                        'den_nedeli' => $onlain_sabak_day->den_nedeli,
                                        'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                    ]);
                                    $onlain_sabak_urok_new->save();
                                }
                            }
                        }
                    }
                }
            }
            return redirect()->back()->withSuccess('Күндөр түзүлдү');
        }
    }


    
    public function ort_moderator_online_sabak_dni_izmenit($online_sabak_id, Request $request)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_day_id = $request->onlain_sabak_day_id;
            $onlain_sabak_day = Online_sabak_dni_nedeli::where('id', $onlain_sabak_day_id)->first();
            $onlain_sabak_urok_maks_data = Onlain_sabak_urok::where('onlain_sabak_predmet_sabak_id', $online_sabak_id)->max('data_uroka');
            $ss_h = (int)date('H', time());
            $ss_i = (int)date('i', time());
            $ss_s = (int)date('s', time());
            $ss_saat = $ss_h * 3600 + $ss_i * 60 + $ss_s;
            $proverka1 = strtotime(date("Y-m-t", $onlain_sabak_urok_maks_data))+$ss_saat;
            if ($proverka1 > time()) {
                $time_minus_kun = time() - 86400;
                $onlain_sabak_uroks = Onlain_sabak_urok::where('online_sabak_dni_nedeli_id', $onlain_sabak_day_id)->where('data_uroka', '>', $time_minus_kun)->orderBy('data_uroka')->get();
                $onlain_sabak_uroks_one_max_count = Onlain_sabak_urok::where('online_sabak_dni_nedeli_id', $onlain_sabak_day_id)->where('data_uroka', '>', $time_minus_kun)->max('data_uroka');
                $onlain_sabak_uroks_count = Onlain_sabak_urok::where('online_sabak_dni_nedeli_id', $onlain_sabak_day_id)->where('data_uroka', $onlain_sabak_uroks_one_max_count)->first();
                $onlain_sabak_uroks_one_min_count = Onlain_sabak_urok::where('online_sabak_dni_nedeli_id', $onlain_sabak_day_id)->where('data_uroka', '>', $time_minus_kun)->min('data_uroka');
                $onlain_sabak_uroks_one_min = Onlain_sabak_urok::where('online_sabak_dni_nedeli_id', $onlain_sabak_day_id)->where('data_uroka', $onlain_sabak_uroks_one_min_count)->first();
                foreach ($onlain_sabak_uroks as $onlain_sabak_urok) {
                    if ($request->kunu > $onlain_sabak_urok->den_nedeli) {
                        $raznisa = $request->kunu - $onlain_sabak_urok->den_nedeli;
                        $data_uroka = $onlain_sabak_urok->data_uroka + ($raznisa * 86400);
                    }elseif ($request->kunu < $onlain_sabak_urok->den_nedeli){
                        $raznisa = $onlain_sabak_urok->den_nedeli - $request->kunu;
                        if (($onlain_sabak_uroks_one_min->data_uroka + ($onlain_sabak_day->nachalo_uroka * 3600)) > time()) {
                            $data_uroka = $onlain_sabak_urok->data_uroka - ($raznisa * 86400);
                        }else{
                            $raznisa2 = 7 - $raznisa;
                            $data_uroka = $onlain_sabak_urok->data_uroka + ($raznisa2 * 86400);
                        }
                    }else{
                        $data_uroka = $onlain_sabak_urok->data_uroka;
                    }
                    $j_jyl = date("Y", $onlain_sabak_urok_maks_data);
                    $j_ai = date("m", $onlain_sabak_urok_maks_data);
                    $month_now_days = date('t',$onlain_sabak_urok_maks_data);
                    $pos_data_strtotime = strtotime($j_jyl.'-'.$j_ai.'-'.$month_now_days);
                    if ($data_uroka > $pos_data_strtotime) {
                        $delete = Onlain_sabak_urok::find($onlain_sabak_urok->id);
                        $delete->delete();
                    }else{
                        DB::table('onlain_sabak_uroks')->where('id', $onlain_sabak_urok->id)->update([
                            'data_uroka' => $data_uroka,
                            'den_nedeli' => $request->kunu,
                        ]);
                        if ($onlain_sabak_urok->id == $onlain_sabak_uroks_count->id) {
                            $data_uroka_plus_nedelya = $data_uroka + (7*86400);
                            $data_uroka_plus_nedelya_jyl = date("Y", $data_uroka_plus_nedelya);
                            $data_uroka_plus_nedelya_ai = date("m", $data_uroka_plus_nedelya);
                            $data_uroka_plus_nedelya_days = date('t',$data_uroka_plus_nedelya);
                            $data_uroka_ai = date("m", $data_uroka);
                            if ((int)$data_uroka_ai == (int)$data_uroka_plus_nedelya_ai) {
                                $t_time = $data_uroka + (6*86400);
                                if ($request->kunu == 1) {
                                    $kun1_1 = date('d', strtotime('this Monday', $t_time));
                                }elseif ($request->kunu == 2) {
                                    $kun1_1 = date('d', strtotime('this Tuesday', $t_time));
                                }elseif ($request->kunu == 3) {
                                    $kun1_1 = date('d', strtotime('this Wednesday', $t_time));
                                }elseif ($request->kunu == 4) {
                                    $kun1_1 = date('d', strtotime('this Thursday', $t_time));
                                }elseif ($request->kunu == 5) {
                                    $kun1_1 = date('d', strtotime('this Friday', $t_time));
                                }elseif ($request->kunu == 6) {
                                    $kun1_1 = date('d', strtotime('this Saturday', $t_time));
                                }elseif ($request->kunu == 7) {
                                    $kun1_1 = date('d', strtotime('this sunday', $t_time));
                                }
                
                                for ($i = 1;$i <= $data_uroka_plus_nedelya_days;$i++){
                                    if ($i == $kun1_1){
                                        $data_k = strtotime($data_uroka_plus_nedelya_jyl.'-'.$data_uroka_plus_nedelya_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $request->kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 7){
                                        $data_k = strtotime($data_uroka_plus_nedelya_jyl.'-'.$data_uroka_plus_nedelya_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $request->kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 14){
                                        $data_k = strtotime($data_uroka_plus_nedelya_jyl.'-'.$data_uroka_plus_nedelya_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $request->kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 21){
                                        $data_k = strtotime($data_uroka_plus_nedelya_jyl.'-'.$data_uroka_plus_nedelya_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $request->kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }elseif ($i == $kun1_1 + 28){
                                        $data_k = strtotime($data_uroka_plus_nedelya_jyl.'-'.$data_uroka_plus_nedelya_ai.'-'.$i);
                                        $onlain_sabak_urok_new = new Onlain_sabak_urok([
                                            'user_id' => \Auth::user()->id,
                                            'onlain_sabak_predmet_sabak_id' => $online_sabak_id,
                                            'data_uroka' => $data_k,
                                            'den_nedeli' => $request->kunu,
                                            'online_sabak_dni_nedeli_id' => $onlain_sabak_day->id,
                                        ]);
                                        $onlain_sabak_urok_new->save();
                                    }
                                }
                            }
                        }
                    }
                }
                DB::table('online_sabak_dni_nedelis')->where('id', $onlain_sabak_day_id)->update([
                    'den_nedeli' => $request->kunu,
                    'nachalo_uroka' => $request->ubaktysy,
                    'okonchanie_uroka' => $request->ubaktysy,
                ]);
                return redirect()->back()->withSuccess('Күнү жана убактысы өзгөртүлдү');
            }else{
                DB::table('online_sabak_dni_nedelis')->where('id', $onlain_sabak_day_id)->update([
                    'den_nedeli' => $request->kunu,
                    'nachalo_uroka' => $request->ubaktysy,
                    'okonchanie_uroka' => $request->ubaktysy,
                ]);
                return redirect()->back()->withSuccess('Күнү жана убактысы өзгөртүлдү_');
            }
        }
    }

    public function ort_moderator_online_sabak_dni_udalit($online_sabak_id, $onlain_sabak_day_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_day = Online_sabak_dni_nedeli::where('id', $onlain_sabak_day_id)->first();
            $time_minus_kun = time() - 86300;
            $onlain_sabak_uroks = Onlain_sabak_urok::where('online_sabak_dni_nedeli_id', $onlain_sabak_day_id)->where('data_uroka', '>', $time_minus_kun)->orderBy('data_uroka')->get();
            foreach ($onlain_sabak_uroks as $onlain_sabak_urok) {
                if (($onlain_sabak_urok->data_uroka + ($onlain_sabak_day->nachalo_uroka * 3600)) > time()) {
                    $delete = Onlain_sabak_urok::find($onlain_sabak_urok->id);
                    $delete->delete();
                }
            }
            $onlain_sabak_day->delete();
            return redirect()->back()->withSuccess('Сабактардын жүгүртмөсүнөн өчүрүлдү');
        }
    }

    public function ort_moderator_online_sabak_kunu_edit($online_sabak_id, $online_sabak_kunu_id)
    {
        $onlain_sabak_predmet_sabak = Onlain_sabak_predmet_sabak::where('id', $online_sabak_id)->first();
        if ($onlain_sabak_predmet_sabak->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
            if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
                return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
            }else{
                $urok_youtubes = Online_sabak_urok_youtube::where('onlain_sabak_urok_id', $online_sabak_kunu_id)->get();
                $urok_frames = Online_sabak_urok_frame::where('onlain_sabak_urok_id', $online_sabak_kunu_id)->get();
                return view('online_sabak/for_moderator/online_sabak_urok', [
                    'onlain_sabak_predmet_sabak' => $onlain_sabak_predmet_sabak,
                    'onlain_sabak_urok' => $onlain_sabak_urok,
                    'urok_youtubes' => $urok_youtubes,
                    'urok_frames' => $urok_frames,
                ]);
            }
        }
    }

    public function ort_moderator_online_sabak_edit_chek_pokaz($online_sabak_id, $online_sabak_kunu_id)
    {
        $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
        if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if ($onlain_sabak_urok->pokaz_soderjimoe_do_nachalo_uroka == 1) {
                DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                    'pokaz_soderjimoe_do_nachalo_uroka' => 0,
                ]);
            }else{
                DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                    'pokaz_soderjimoe_do_nachalo_uroka' => 1,
                ]);
            }
            return response()->json(true);
        }
    }
    public function ort_moderator_online_sabak_edit_chek_youtube_1($online_sabak_id, $online_sabak_kunu_id)
    {
        $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
        if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                'youtube_control_status' => 1,
            ]);
            return response()->json(true);
        }
    }
    public function ort_moderator_online_sabak_edit_chek_youtube_0($online_sabak_id, $online_sabak_kunu_id)
    {
        $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
        if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                'youtube_control_status' => 0,
            ]);
            return response()->json(true);
        }
    }
    public function ort_moderator_online_sabak_edit_chek_youtube_2($online_sabak_id, $online_sabak_kunu_id)
    {
        $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
        if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                'youtube_control_status' => 2,
            ]);
            return response()->json(true);
        }
    }

    
    public function ort_moderator_online_sabak_urok_maalymat_update($online_sabak_id, $online_sabak_kunu_id, Request $request)
    {
        $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
        if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                'text' => $request->urok_text,
                'short_title' => $request->short_title,
            ]);
            $urok_youtubes = Online_sabak_urok_youtube::where('onlain_sabak_urok_id', $online_sabak_kunu_id)->get();
            $urok_frames = Online_sabak_urok_frame::where('onlain_sabak_urok_id', $online_sabak_kunu_id)->get();

            foreach ($urok_youtubes as $urok_youtube) {
                $urok_youtube->delete();
            }
            foreach ($urok_frames as $urok_frame) {
                $urok_frame->delete();
            }

            if($request->has('youtube_title')){
                $youtube_title = $request->youtube_title;
                $youtube_link = $request->youtube_link;
                
                foreach($youtube_title as $key => $value){
                    $request['onlain_sabak_urok_id']=$online_sabak_kunu_id;
                    $request['title']=$youtube_title[$key];
                    $request['ssylka']=$youtube_link[$key];
                    Online_sabak_urok_youtube::create($request->all());
                }
            }
            if($request->has('frame_title')){
                $frame_title = $request->frame_title;
                $frame_link = $request->frame_link;
                
                foreach($frame_title as $key => $value){
                    $request['onlain_sabak_urok_id']=$online_sabak_kunu_id;
                    $request['title']=$frame_title[$key];
                    $request['ssylka']=$frame_link[$key];
                    Online_sabak_urok_frame::create($request->all());
                }
            }
            return redirect()->back()->withSuccess('Маалымат сакталды');
        }
    }

    public function ort_moderator_online_sabak_urok_conferens_ssylka_update($online_sabak_id, $online_sabak_kunu_id, Request $request)
    {
        $onlain_sabak_urok = Onlain_sabak_urok::where('id', $online_sabak_kunu_id)->first();
        if ($onlain_sabak_urok->user_id != \Auth::user()->id) {
            return redirect()->back()->withFalse('Алдамчылыкка жол берилбейт!');
        }else{
            if (strlen($request->parol_i_identifikator_na_online_urok) > 2) {
                $parol = $request->parol_i_identifikator_na_online_urok;
            }else{
                $parol = NULL;
            }
            DB::table('onlain_sabak_uroks')->where('id', $online_sabak_kunu_id)->update([
                'ssylka_na_online_urok' => $request->ssylka_na_online_urok,
                'parol_i_identifikator_na_online_urok' => $parol,
                'service_online_uroka' => $request->service_online_uroka,
            ]);
            return redirect()->back()->withSuccess('Маалымат сакталды');
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
     * @param  \App\Models\Onlain_sabak_mugalim  $onlain_sabak_mugalim
     * @return \Illuminate\Http\Response
     */
    public function show(Onlain_sabak_mugalim $onlain_sabak_mugalim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Onlain_sabak_mugalim  $onlain_sabak_mugalim
     * @return \Illuminate\Http\Response
     */
    public function edit(Onlain_sabak_mugalim $onlain_sabak_mugalim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Onlain_sabak_mugalim  $onlain_sabak_mugalim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Onlain_sabak_mugalim $onlain_sabak_mugalim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Onlain_sabak_mugalim  $onlain_sabak_mugalim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Onlain_sabak_mugalim $onlain_sabak_mugalim)
    {
        //
    }
}
