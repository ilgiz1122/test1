<?php

namespace App\Http\Controllers;

use App\Models\Olimpiada;
use App\Models\Olimpiada_tury;
use App\Models\Klassy;
use App\Models\Predmety;
use App\Models\Oblast;
use App\Models\Raion_shaar;
use App\Models\Moderator_function;
use App\Models\Olimpiada_registrasia;
use Illuminate\Support\Facades\DB;
use App\Models\User; // добавлена для связи с подкатегориями 
use App\Models\language; // добавлена для связи с подкатегориями 
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Test;

class OlimpiadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function olimpiada($locale)
    {
        if (! in_array($locale, ['ru', 'kg', 'en'])) {
            \App::setLocale('kg');
        }
        \App::setLocale($locale);

        $time = strtotime(date("Y-m-d H:i:s"));
        $olimpiadas = Olimpiada::where('status', 1)->withCount('olimpiada_tury2')->orderBy('created_at', 'desc')->paginate(16);
        $olimpiada_tury = Olimpiada_tury::where('status', 1)->where('nachalo_zdachi_tura', '>', $time)->orderBy('tur_number', 'asc')->select('nachalo_zdachi_tura', 'olimpiada_id', 'tur_number')->get()->unique('olimpiada_id');

       return view('olimpiada.index2', [
        'olimpiadas' => $olimpiadas,
        'olimpiada_tury' => $olimpiada_tury,
       ]);
    }

    public function moderator_olimpiada_status1_user($olimpiada_registrasia_user_id)
    {
        DB::table('olimpiada_registrasias')->where('id', $olimpiada_registrasia_user_id)->update([
            'status' => 1,       
        ]);

        return redirect()->back()->withSuccess('Колдонуучу олимпиадага катыша алат');
    }

    public function moderator_olimpiada_status2_user($olimpiada_registrasia_user_id)
    {
        DB::table('olimpiada_registrasias')->where('id', $olimpiada_registrasia_user_id)->update([
            'status' => 0,       
        ]);

        return redirect()->back()->withSuccess2('Колдонуучу олимпиадага катыша албайт!');
    }

    

    public function moderator_olimpiada_plus_user($olimpiada_id, $user_id)
    {

        $role = User::where('id', \Auth::user()->id)->first();

        if ($role->for_role == 3) {
            $moderator_function = Moderator_function::where('user_id', \Auth::user()->id)->first();

            if ($moderator_function->olimpiada_plus_user == 1) {

                $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 1)->where('tur_number', 1)->first();

                DB::table('olimpiada_registrasias')->where('olimpiada_id', $olimpiada_id)->where('user_id', $user_id)->update([
                    'tur_number' => 1,
                    'status' => 1,   
                    'price' => $olimpiada_tury->price,   
                    'price_minus_in_moderator' => 0,          
                ]);

                return redirect()->back()->withSuccess('Колдонуучу олимпиадага ийгиликтүү кошулду');
            }else{
                $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('tur_number', 1)->first();

                $price_moderator = $olimpiada_tury->price * 0.8;
                $price_moderator2 = $olimpiada_tury->price * 0.2;


                DB::table('olimpiada_registrasias')->where('olimpiada_id', $olimpiada_id)->where('user_id', $user_id)->update([
                    'tur_number' => 1,
                    'status' => 1,   
                    'price' => $olimpiada_tury->price,   
                    'price_minus_in_moderator' => $price_moderator,
                ]);

                DB::table('users')->where('id', \Auth::user()->id)->decrement('balance', $price_moderator2);
                DB::table('pribyl_sistems')->where('id', 1)->increment('pribyl', $price_moderator2);

                return redirect()->back()->withSuccess('Колдонуучу олимпиадага ийгиликтүү кошулду');
            }
        }

        elseif ($role->for_role == 2) {
            $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 1)->where('tur_number', 1)->first();

            DB::table('olimpiada_registrasias')->where('olimpiada_id', $olimpiada_id)->where('user_id', $user_id)->update([
                'tur_number' => 1,
                'status' => 1,   
                'price' => $olimpiada_tury->price,   
                'price_minus_in_moderator' => 0,          
            ]);

            return redirect()->back()->withSuccess('Колдонуучу олимпиадага ийгиликтүү кошулду');
        }else{
            return redirect()->back()->withSuccess2('Кууланба!');
        }
    }


    public function admin_olimpiada_moderators()
    {
        $moderators = User::where('for_role', 3)->orderBy('created_at', 'desc')->get();
        $moderators_function = Moderator_function::get();

       return view('admin.olimpiada.olimpiada_moderator_settings', [
        'moderators' => $moderators,
        'moderators_function' => $moderators_function,
       ]);
    }

    public function admin_olimpiada_moderators_plus($user_id)
    {
        $moderator = Moderator_function::where('user_id', $user_id)->first();

        if ($moderator != null) {
            DB::table('moderator_functions')->where('id', $moderator->id)->update([
                'olimpiada_plus_user' => 1,           
            ]);
        }else{
            $moderators_plus = new Moderator_function([
                'user_id' => $user_id,
                'olimpiada_plus_user' => 1,
            ]);
            $moderators_plus->save();
        }

        // default = 0 
        // 1 = олимпиадага катышуучуларды бекер кошо алат
        // 0 = олимпиадага катышуучуларды өзүнун эсебинен кошо алат 

       return redirect()->back()->withSuccess('Бекер кошуу мүмкүнчүлүгүн алды');
    }


    public function admin_olimpiada_moderators_minus($user_id)
    {
        $moderator = Moderator_function::where('user_id', $user_id)->first();

        DB::table('moderator_functions')->where('id', $moderator->id)->update([
                'olimpiada_plus_user' => 0,           
            ]);

        // default = 0 
        // 1 = олимпиадага катышуучуларды бекер кошо алат
        // 0 = олимпиадага катышуучуларды өзүнун эсебинен кошо алат 

       return redirect()->back()->withSuccess('Бекер кошуу мүмкүнчүлүгүнөн айрылды');
    }


    public function moderator_olimpiada_user_zaiavka($olimpiada_id, $oplata)
    {
        if ($oplata == 0) {
            $olimpiada = Olimpiada::where('id', $olimpiada_id)->first();
            $olimpiada_registrasia_users = Olimpiada_registrasia::where('olimpiada_id', $olimpiada_id)->where('price', 0)->orderBy('tur_number', 'asc')->get();
            $olimpiada_registrasia_users_count = Olimpiada_registrasia::where('olimpiada_id', $olimpiada_id)->where('price', '>', 0)->count();
            $moderator_function = Moderator_function::where('user_id', \Auth::user()->id)->first();
            $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('tur_number', 1)->first();


           return view('moderator.olimpiada_user_zaiavka', [
            'olimpiada' => $olimpiada,
            'olimpiada_registrasia_users' => $olimpiada_registrasia_users,
            'olimpiada_registrasia_users_count' => $olimpiada_registrasia_users_count,
            'oplata' => $oplata,
            'moderator_function' => $moderator_function,
            'olimpiada_tury' => $olimpiada_tury,
           ]);
        }

        if ($oplata == 1) {
            $olimpiada = Olimpiada::where('id', $olimpiada_id)->first();
            $olimpiada_registrasia_users = Olimpiada_registrasia::where('olimpiada_id', $olimpiada_id)->where('price', '>', 0)->orderBy('tur_number', 'asc')->get();
            $olimpiada_registrasia_users_count = Olimpiada_registrasia::where('olimpiada_id', $olimpiada_id)->where('price', 0)->count();
            $moderator_function = Moderator_function::where('user_id', \Auth::user()->id)->first();
            $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('tur_number', 1)->first();

           return view('moderator.olimpiada_user_zaiavka', [
            'olimpiada' => $olimpiada,
            'olimpiada_registrasia_users' => $olimpiada_registrasia_users,
            'olimpiada_registrasia_users_count' => $olimpiada_registrasia_users_count,
            'oplata' => $oplata,
            'moderator_function' => $moderator_function,
            'olimpiada_tury' => $olimpiada_tury,
           ]);
        }else{
            return redirect()->back()->withSuccess2('Некорректный запрос');
        }

        
    }

    public function olimpiada_info($olimpiada_id)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('status', 1)->withCount('olimpiada_tury2')->first();
        $olimpiada_tury = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 1)->orderBy('tur_number', 'asc')->get();
        $time_max = Olimpiada_tury::where('olimpiada_id', $olimpiada_id)->where('status', 1)->max('nachalo_zdachi_tura');
        $oblast = Oblast::get();
        $raion_shaar = Raion_shaar::get();
        $tests = Test::where('user_id', $olimpiada->user_id)->select('id', 'time')->get();

        if (\Auth::user()){
            $olimpiada_registrasia = Olimpiada_registrasia::where('user_id', \Auth::user()->id)->where('olimpiada_id', $olimpiada_id)->first();
            return view('pajes.olimpiada_info', [
                'olimpiada' => $olimpiada,
                'olimpiada_tury' => $olimpiada_tury,
                'oblast' => $oblast,
                'raion_shaar' => $raion_shaar,
                'time_max' => $time_max,
                'olimpiada_registrasia' => $olimpiada_registrasia,
                'tests' => $tests,
            ]);
        }else{
            return view('pajes.olimpiada_info', [
                'olimpiada' => $olimpiada,
                'olimpiada_tury' => $olimpiada_tury,
                'oblast' => $oblast,
                'time_max' => $time_max,
                'raion_shaar' => $raion_shaar,
                'tests' => $tests,
            ]);
        }
    }

    public function olimpiada_raion($id)
    {
        $states = Raion_shaar::where('oblast_id',$id)->pluck("title", "id");
        return json_encode($states);
    }

    
    public function olimpiada_registrasia_user(Request $request, $olimpiada_id)
    {
        $request->validate([
            'familia' => 'string',
            'name' => 'string',
            'ochestvo' => 'string',
            'phone' => 'string',
            'oblast' => 'numeric',
            'raion_shaar' => 'numeric',
            'aiyl' => 'string',
            'mektep' => 'string',
            'mugalim' => 'string',
        ]);

        $user_id = \Auth::user()->id;

        if($request->has('phone')) {
            $nomer1 = preg_replace('~[^0-9]+~','', $request->phone);

            if (strlen($nomer1) < 9) {
                return redirect()->back()->withSuccess('Телефон номериңизди туура жазыңыз!');
            }else{
                $nomer1 = $request->phone;
            }

            $nomer2 = '0'.$nomer1;

            DB::table('users')->where('id', \Auth::user()->id)->update([
                'phone' => $nomer2,           
            ]);
        }

            if($request->has('familia')) {
                $familia = $request->familia;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'f_fio' => $familia,           
                ]);
            }

            if($request->has('name')) {
                $name = $request->name;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'i_fio' => $name,           
                ]);
            }

            if($request->has('ochestvo')) {
                $ochestvo = $request->ochestvo;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'o_fio' => $ochestvo,          
                ]);
            }

            if($request->has('oblast')) {
                $oblast = $request->oblast;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'oblast_id' => $oblast,          
                ]);
            }
            
            if($request->has('raion_shaar')) {
                $raion_shaar = $request->raion_shaar;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'raion_shaar_id' => $raion_shaar,          
                ]);
            }

            if($request->has('aiyl')) {
                $aiyl = $request->aiyl;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'aiyl_title' => $aiyl,           
                ]);
            }
            
            if($request->has('mektep')) {
                $mektep = $request->mektep;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'mektep_title' => $mektep,          
                ]);
            }
            
            if($request->has('mugalim')) {
                $mugalim = $request->mugalim;
                DB::table('users')->where('id', \Auth::user()->id)->update([
                    'mugalim_fio' => $mugalim,            
                ]);
            }
        

        $olimpiada_registrasia_user = new Olimpiada_registrasia([
            'user_id' => \Auth::user()->id,
            'olimpiada_id' => $olimpiada_id,
        ]);
        $olimpiada_registrasia_user->save();

        
        return redirect()->back()->withSuccess('Олимпиадага ийгиликтүү катталдыңыз.');
    }






    public function moderator_olimpiada_index()
    {
        $olimpiadas = Olimpiada::where('user_id', \Auth::user()->id)->withCount('olimpiada_tury')->orderBy('created_at', 'desc')->get();

       return view('moderator.olimpiada', [
        'olimpiadas' => $olimpiadas,
       ]);
    }

    public function moderator_olimpiada_create()
    {
        $predmety = Predmety::orderBy('created_at', 'desc')->get();
        $klassy = Klassy::orderBy('created_at', 'desc')->get();
        $languages = DB::table('languages')->get();

       return view('moderator.olimpiada_create', [
        'predmety' => $predmety,
        'klassy' => $klassy,
        'languages' => $languages,
       ]);
    }

    public function moderator_olimpiada_edit($olimpiada_id)
    {
        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();

        $predmety = Predmety::orderBy('created_at', 'desc')->get();
        $klassy = Klassy::orderBy('created_at', 'desc')->get();
        $languages = DB::table('languages')->get();

       return view('moderator.olimpiada_edit', [
        'predmety' => $predmety,
        'klassy' => $klassy,
        'languages' => $languages,
        'olimpiada' => $olimpiada,
       ]);
    }



    public function moderator_olimpiada_update(Request $request, $olimpiada_id)
    {
        $request->validate([
            'nazvanie_organizasii' => 'required|string',
            'title' => 'required|string',
            'opisanie' => 'required|string',
            'predmety' => 'required|numeric',
            'klassy' => 'required|numeric',
            'language' => 'required|numeric',
            'phone_for_zvonok' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);

        $olimpiada = Olimpiada::where('id', $olimpiada_id)->where('user_id', \Auth::user()->id)->first();

        $nomer1 = preg_replace('~[^0-9]+~','', $request->phone_for_zvonok);
        $nomer2 = preg_replace('~[^0-9]+~','', $request->phone_for_whatsapp);

        if (strlen($nomer1) < 9) {
            $nomer1 = NULL;
        }else{
            $nomer1 = $request->phone_for_zvonok;
        }

        if (strlen($nomer2) < 9) {
            $nomer2 = NULL;
        }else{
            $nomer2 = $request->phone_for_whatsapp;
        }

        $user_id = \Auth::user()->id;
        
        $ratio = 16/9;
        $destinationPath = 'storage/olimpiada/images/orgimg/';
        $destinationPath2 = 'storage/olimpiada/images/thumbnail/';

        if($request->hasFile('img')){
            
                unlink('storage/olimpiada/images/orgimg/'.$olimpiada->img);
                unlink('storage/olimpiada/images/thumbnail/'.$olimpiada->img2);

                $file2 = $request->file('img');
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
                $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
                $thImage->save($destinationPath2 . $thImagename);

                DB::table('olimpiadas')->where('id', $olimpiada_id)->update([
                    'nazvanie_orgonizasii' => $request->nazvanie_organizasii,
                    'title' => $request->title,
                    'opisanie' => $request->opisanie,
                    'predmet' => $request->predmety,
                    'klass' => $request->klassy,
                    'language' => $request->language,
                    'img' => $ogImagename,
                    'img2' => $thImagename,
                    'phone_for_zvonok' => $nomer1,
                    'phone_for_whatsapp' => $nomer2,
                    'telegram' => $request->telegram,
                ]);
        }else{
            DB::table('olimpiadas')->where('id', $olimpiada_id)->update([
                    'nazvanie_orgonizasii' => $request->nazvanie_organizasii,
                    'title' => $request->title,
                    'opisanie' => $request->opisanie,
                    'predmet' => $request->predmety,
                    'klass' => $request->klassy,
                    'language' => $request->language,
                    'phone_for_zvonok' => $nomer1,
                    'phone_for_whatsapp' => $nomer2,
                    'telegram' => $request->telegram,
                ]);
        }

        return redirect()->route('moderator_olimpiada_index')->withSuccess('Олимпиада ийгиликтүү өзгөртүлдү');
    }


    public function moderator_olimpiada_store(Request $request)
    {
        $request->validate([
            'nazvanie_organizasii' => 'required|string',
            'title' => 'required|string',
            'opisanie' => 'required|string',
            'predmety' => 'required|numeric',
            'klassy' => 'required|numeric',
            'language' => 'required|numeric',
            'phone_for_zvonok' => 'required|string',
            //'phone_for_whatsapp' => 'string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);

        /**
         

        $data_nachalo_registrasii2 = preg_replace('~[^0-9]+~','', $request->data_nachalo_registrasii);

        $kun1 = substr($data_nachalo_registrasii2, 0, -10);
        $ai1 = substr($data_nachalo_registrasii2, 2, -8);
        $god1 = substr($data_nachalo_registrasii2, 4, -4);
        $saat1 = substr($data_nachalo_registrasii2, 8, 2);
        $minuta1 = substr($data_nachalo_registrasii2, 10, 2);

        $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.$saat1.':'.$minuta1.':'.'00';
        $data_num = strtotime($data_num3);

*/

        $nomer1 = preg_replace('~[^0-9]+~','', $request->phone_for_zvonok);
        $nomer2 = preg_replace('~[^0-9]+~','', $request->phone_for_whatsapp);

        if (strlen($nomer1) < 9) {
            $nomer1 = NULL;
        }else{
            $nomer1 = $request->phone_for_zvonok;
        }

        if (strlen($nomer2) < 9) {
            $nomer2 = NULL;
        }else{
            $nomer2 = $request->phone_for_whatsapp;
        }

        $user_id = \Auth::user()->id;
        
        $ratio = 16/9;
        $destinationPath = 'storage/olimpiada/images/orgimg/';
        $destinationPath2 = 'storage/olimpiada/images/thumbnail/';

            $file2 = $request->file('img');
            $file_extension2 = $file2->getClientOriginalExtension();
            $ogImage = Image::make($file2);
            $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
            $ogImage->save($destinationPath . $ogImagename);
            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
            $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage->save($destinationPath2 . $thImagename);

        $olimpiada = new Olimpiada([
            'user_id' => \Auth::user()->id,
            'nazvanie_orgonizasii' => $request->nazvanie_organizasii,
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'predmet' => $request->predmety,
            'klass' => $request->klassy,
            'language' => $request->language,
            'img' => $ogImagename,
            'img2' => $thImagename,
            'phone_for_zvonok' => $nomer1,
            'phone_for_whatsapp' => $nomer2,
            'telegram' => $request->telegram,
            //'data_nachalo_registrasii' => $data_num,
        ]);
        $olimpiada->save();
        return redirect()->route('moderator_olimpiada_index')->withSuccess('Олимпиада ийгиликтүү сакталды');
    }




    public function moderator_olimpiada_update_phone_for_zvonok(Request $request, $id)
    {
        $null = NULL;
        $nomer = preg_replace('~[^0-9]+~','', $request->phone_for_zvonok);

        if (strlen($nomer) < 9) {
            DB::table('olimpiadas')->where('id', $id)->update([
                'phone_for_zvonok' => $null,
            ]);
            return redirect()->back()->withSuccess2('Введите корректный номер телефона!');
        }else{
            DB::table('olimpiadas')->where('id', $id)->update([
                'phone_for_zvonok' => $request->phone_for_zvonok,
            ]);
            return redirect()->back()->withSuccess('Телефон номер изменена');
        }
    }

    public function moderator_olimpiada_update_phone_for_whatsapp(Request $request, $id)
    {
        $null = NULL;
        $nomer = preg_replace('~[^0-9]+~','', $request->phone_for_whatsapp);

        if (strlen($nomer) < 9) {
            DB::table('olimpiadas')->where('id', $id)->update([
                'phone_for_whatsapp' => $null,
            ]);
            return redirect()->back()->withSuccess2('Введите корректный номер телефона!');
        }else{
            DB::table('olimpiadas')->where('id', $id)->update([
                'phone_for_whatsapp' => $request->phone_for_whatsapp,
            ]);
            return redirect()->back()->withSuccess('WhatsApp номер изменена');
        }
    }



    public function moderator_olimpiada_update_phone_for_telegram(Request $request, $id)
    {
        $null = NULL;
        if (strlen($request->for_telegram) < 5) {
            DB::table('olimpiadas')->where('id', $id)->update([
                'telegram' => $null,
            ]);
            return redirect()->back()->withSuccess2('Минимальная длина - 5 символов!');
        }else{
            DB::table('olimpiadas')->where('id', $id)->update([
                'telegram' => $request->for_telegram,
            ]);
            return redirect()->back()->withSuccess('Имя пользователя изменена');
        }
    }



    public function moderator_olimpiada_update_status0($id)
    {
        DB::table('olimpiadas')->where('id', $id)->update([
            'status' => 0,
        ]);
        
        return redirect()->back()->withSuccess2('Олимпиада стал не активным');
    }

    public function moderator_olimpiada_update_status1($id)
    {
        $olimpiada_tury_count = Olimpiada_tury::where('olimpiada_id', $id)->count();
        $olimpiada_tury_count2 = Olimpiada_tury::where('olimpiada_id', $id)->where('tur_number', 1)->first();



        if ($olimpiada_tury_count > 0) {
            if ($olimpiada_tury_count2 != null) {
                if ($olimpiada_tury_count2->status > 0) {
                    DB::table('olimpiadas')->where('id', $id)->update([
                        'status' => 1,
                    ]);
                    return redirect()->back()->withSuccess('Олимпиада стал активным');
                }else{
                    return redirect()->back()->withSuccess2('Сначало сделайте активным первый тур!');
                }
            }else{
                return redirect()->back()->withSuccess2('Алгач жок дегенде бир турду ачуу керек!');
            }  
        }else{
            return redirect()->back()->withSuccess2('Сначало создайте хотя бы один тур!');
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
     * @param  \App\Models\Olimpiada  $olimpiada
     * @return \Illuminate\Http\Response
     */
    public function show(Olimpiada $olimpiada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olimpiada  $olimpiada
     * @return \Illuminate\Http\Response
     */
    public function edit(Olimpiada $olimpiada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olimpiada  $olimpiada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olimpiada $olimpiada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olimpiada  $olimpiada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Olimpiada $olimpiada)
    {
        //
    }
}
