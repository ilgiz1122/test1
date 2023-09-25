<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Uroky;
use Illuminate\Http\Request;
use App\Models\Podcategory; // добавлена для связи с подкатегориями
use App\Models\Category; // добавлена для связи с подкатегориями
use App\Models\User; // добавлена для связи с подкатегориями
use Illuminate\Support\Facades\Hash;
use App\Models\Youtube;
use App\Models\Frame;
use App\Models\Video;
use App\Models\Video_name;
use Illuminate\Support\Facades\DB;
use App\Models\Youtube_ssylke;
use App\Models\Kupit; 
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Path\To\DOMDocument;
use Path\To\DOMXPath;
use App\Models\Zadanie;
use App\Models\Test;
use App\Models\Tests_kupit;
use App\Models\Test_controls;
use App\Models\Test_controls_variants;
use App\Models\Test_voprosy;
use App\Models\Test_otvety;
use App\Models\Zadanieimg;
use App\Models\Zadanie_otvety;
use App\Models\Zadanie_otveties_img;
use App\Models\Progress_prohojdenie_uroka;
use Carbon\Carbon;
 
class UrokyController extends Controller
{
    /**
     * Display a  listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $urokies = Uroky::orderBy('created_at', 'desc')->get();
      
       return view('admin.uroky.index', [
        'urokies' => $urokies,
        
        
       ]);
    }

    public function moderator_kurs_urok_index($id)
    {
        $podcategory = Podcategory::where('id', $id)->first();
        $kol = Uroky::where('podcat_id', $podcategory->id)->count();
        $uroky = Uroky::where('podcat_id', $podcategory->id)->withCount('youtube_ssylke', 'video_name')->orderBy('porydkovyi_nomer')->get();
        $zadanie = Zadanie::where('kurs_id', $id)->get();
        $test = Test::where('user_id', \Auth::user()->id)->select('id', 'title', 'test_category_id')->get();

  
       return view('moderator.kursy_uroki', [
        'podcategory' => $podcategory,
        'kol' => $kol,
        'uroky' => $uroky,
        'zadanie' => $zadanie,
        'test' => $test,
       ]);
    }


    public function moderator_kurs_urok_youtube_control_status($urok_id, $type)
    {
        if ($type == 0) {
            DB::table('urokies')->where('id', $urok_id)->update([
                'youtube_control_status' => 0,
            ]);
        }
        if ($type == 1) {
            DB::table('urokies')->where('id', $urok_id)->update([
                'youtube_control_status' => 1,
            ]);
        }
        if ($type == 2) {
            DB::table('urokies')->where('id', $urok_id)->update([
                'youtube_control_status' => 2,
            ]);
        }
            
            //return response()->json(true);
            return redirect()->back();
    }


    public function moderator_kurs_dostijenie_studentov($kurs_id, $grup_number)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        $kol = Uroky::where('podcat_id', $podcategory->id)->count();
        $uroky = Uroky::where('podcat_id', $podcategory->id)->withCount('youtube_ssylke', 'video_name')->orderBy('porydkovyi_nomer')->get();
        $zadanie = Zadanie::where('kurs_id', $kurs_id)->get();
        $test = Test::where('user_id', \Auth::user()->id)->get();
        if ($grup_number == 10000001) {
            $kupits = Kupit::where('kurs_id', $kurs_id)->where('grup_number', 10000001)->get();
        }else{
            $kupits = Kupit::where('kurs_id', $kurs_id)->where('grup_number', $grup_number)->get();
        }
        $progress = Progress_prohojdenie_uroka::where('kurs_id', $kurs_id)->get();
        $test_controls = Test_controls::get();
        $zadanie_otvety = Zadanie_otvety::get();
  
       return view('moderator.kursy_dostijenie_studentov', [
        'podcategory' => $podcategory,
        'kol' => $kol,
        'uroky' => $uroky,
        'zadanie' => $zadanie,
        'test' => $test,
        'kupits' => $kupits,
        'progress' => $progress,
        'test_controls' => $test_controls,
        'zadanie_otvety' => $zadanie_otvety,
        'grup_number' => $grup_number,
       ]);
    }

    public function moderator_kurs_dostijenie_studentov2($kurs_id, $kupit_id) 
    {
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        $kol = Uroky::where('podcat_id', $podcategory->id)->count();
        $uroky = Uroky::where('podcat_id', $podcategory->id)->withCount('youtube_ssylke', 'video_name')->orderBy('porydkovyi_nomer')->get();
        $zadanie = Zadanie::where('kurs_id', $kurs_id)->get();
        $zadanie00 = Zadanie::where('kurs_id', $kurs_id)->select('id')->get();
        
        if ($zadanie != null) {
            $zadanie_img = Zadanieimg::where('zadanie_id', [$zadanie00])->get();
        }else{
            $zadanie_img = NULL;
        }

        $test = Test::where('user_id', \Auth::user()->id)->withCount('test_voprosy')->get();
        $kupit = Kupit::where('id', $kupit_id)->first();
        $progress = Progress_prohojdenie_uroka::where('kurs_id', $kurs_id)->where('user_id', $kupit->user_id)->get();
        $test_controls = Test_controls::where('user_id', $kupit->user_id)->get();
        $zadanie_otvety = Zadanie_otvety::where('user_id', $kupit->user_id)->where('kupit_id', $kupit_id)->get();
        $summa_ballov = Test_voprosy::get();
        $zadanie_otvety_imgs = Zadanie_otveties_img::get();

        $kupits = Kupit::where('kurs_id', $kurs_id)->where('grup_number', $kupit->grup_number)->get();
        
       return view('moderator.kursy_dostijenie_studentov2', [
        'podcategory' => $podcategory,
        'kol' => $kol,
        'uroky' => $uroky,
        'zadanie' => $zadanie,
        'zadanie_img' => $zadanie_img,
        'test' => $test,
        'kupit' => $kupit,
        'kupits' => $kupits,
        'progress' => $progress,
        'test_controls' => $test_controls,
        'zadanie_otvety' => $zadanie_otvety,
        'summa_ballov' => $summa_ballov,
        'zadanie_otvety_imgs' => $zadanie_otvety_imgs,
       ]);
    }


    public function moderator_kurs_dostijenie_studentov_gruppa22($kurs_id)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        $kupits = Kupit::where('kurs_id', $kurs_id)->select('id', 'grup_number', 'created_at', 'user_id')->get();
  
       return view('moderator.kursy_dostijenie_studentov_gruppa', [
        'podcategory' => $podcategory,
        'kupits' => $kupits,
       ]);
    }

    public function moderator_kursy_dostijenie_studentov_plus_gruppa($kurs_id)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->first();

        $col = $podcategory->col_grup + 1;

        DB::table('podcategories')->where('id', $kurs_id)->update([
            'col_grup' => $col,           
        ]);
  
        return redirect()->back()->withSuccess('Жаңы группа кошулду');
    }

    public function moderator_kursy_dostijenie_studentov_minus_gruppa($kurs_id)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        if ($podcategory->user_id == \Auth::user()->id) {
            $kupits = Kupit::where('kurs_id', $kurs_id)->where('grup_number', $podcategory->col_grup)->count();

            if ($kupits > 0) {
                return redirect()->back()->withSuccess2('Группаны өчүрүүгө болбойт!');
            }else{
                $col = $podcategory->col_grup - 1;
                DB::table('podcategories')->where('id', $kurs_id)->update([
                    'col_grup' => $col,           
                ]);
                return redirect()->back()->withSuccess('Группа өчүрүлдү');
            }
        }else {
            return redirect()->back()->withSuccess2('Бул сиздин курс эмес!');
        }
    }

    public function moderator_kursy_dostijenie_studentov_perevod_gruppa(Request $request, $kurs_id)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->first();

        if($request->has('for_kupit_id'))
        {
            $files2 = $request->for_kupit_id;
            foreach($files2 as $file2)
            {
                DB::table('kupits')->where('id', $file2)->update([
                    'grup_number' => $request->for_grup_number,           
                ]);
            }
            return redirect()->back()->withSuccess('Өзгөртүлдү');
        }else{
            return redirect()->back()->withSuccess2('Бир да студент тандалган эмес');
        }
        
    }
    
    
    public function moderator_kurs_dostijenie_studentov2_dostupnye_moduly_plus($kupit_id, $modul_number)
    {
        $kupit = Kupit::where('id', $kupit_id)->first();

        $kupit_dostupnye_moduly_array = explode(',', $kupit->dostupnye_moduly);
        foreach ($kupit_dostupnye_moduly_array as $kupit_dostupnye_moduly_arra){
            $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
            if (intval($kupit_dostupnye_moduly_arra) == $modul_number) {
                break;
                $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
            }
        }

        if($kupit_dostupnye_moduly_array1 == $modul_number){
            $myArr = explode(',', $kupit->dostupnye_moduly);
            foreach($myArr as $key => $item){
                if ($item == $modul_number){
                  unset($myArr[$key]);
                }
            }
            $str = implode(",", $myArr);
            DB::table('kupits')->where('id', $kupit_id)->update([
                'dostupnye_moduly' => $str,           
            ]);
        }else{
            $ghgh = $kupit->dostupnye_moduly.','.$modul_number;
            DB::table('kupits')->where('id', $kupit_id)->update([
                'dostupnye_moduly' => $ghgh,           
            ]);
        }
        return response()->json(true);
    }

    public function kurs_zadanie_otvet_comment(Request $request, $zadanie_otvet_id)
    {
        $zadanie_otvety = Zadanie_otvety::where('id', $zadanie_otvet_id)->first();
        if ($request->ball === 'aaa') {
            $request->ball = NULL;
        }
        if($request->has('text')){
            Zadanie_otvety::where('id', $zadanie_otvet_id)->update([
                'comment' => $request->text,
                'ball' => $request->ball,
            ]);
        }else{
            Zadanie_otvety::where('id', $zadanie_otvet_id)->update([
                'ball' => $request->ball,
            ]);
        }
        Progress_prohojdenie_uroka::where('user_id', $zadanie_otvety->user_id)->where('urok_id', $zadanie_otvety->urok_id)->update([
                    'status_vypol_zadanii' => $request->status,
                ]);
        return redirect()->back()->withSuccess('Комментарий к заданию отправлено.');
    }

    public function kurs_zadanie_otvet_comment2(Request $request, $zadanie_otvet_id)
    {
        $zadanie_otvety = Zadanie_otvety::where('id', $zadanie_otvet_id)->first();
        if ($request->ball === 'aaa') {
            $request->ball = NULL;
        }
        if($request->has('text')){
            Zadanie_otvety::where('id', $zadanie_otvet_id)->update([
                'comment' => $request->text,
                'ball' => $request->ball,
            ]);
        }else{
            Zadanie_otvety::where('id', $zadanie_otvet_id)->update([
                'ball' => $request->ball,
            ]);
        }
        Progress_prohojdenie_uroka::where('user_id', $zadanie_otvety->user_id)->where('urok_id', $zadanie_otvety->urok_id)->update([
                    'status_vypol_zadanii' => $request->status,
                ]);
        return response()->json(true);
    }

    public function kurs_zadanie_otvet_download($id)
    {
        $zadanie_otvety = Zadanie_otvety::where('id', $id)->first();
        return response()->download(public_path('storage/kursy/zadanie/files/otvety/'.$zadanie_otvety->file));
    }

    public function delete_user_otvet_file($zadanie_otvet_id)
    {
        $zadanie_otvety = Zadanie_otvety::find($zadanie_otvet_id);

        unlink('storage/kursy/zadanie/files/otvety/'.$zadanie_otvety->file);

        Zadanie_otvety::where('id', $zadanie_otvet_id)->update([
            'file' => NULL,
        ]);
        if($zadanie_otvety->update()){
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }

    public function delete_user_otvet_imgs($zadanie_otvet_id)
    {
        $zadanie_otvety_imgs = Zadanie_otveties_img::where('zadanie_otveties_id', $zadanie_otvet_id)->get();

        foreach($zadanie_otvety_imgs as $zadanie_otvety_img){
            unlink('storage/kursy/zadanie/images/otvety/'.$zadanie_otvety_img->img);
            $zadanie_otvety_img->delete();
        } 
        

        return response()->json(true);
    }

    public function showurok2($podcat_id, $id)
    {
        return redirect()->route('urokpaje', ['podcat_id'=>$podcat_id, 'id'=>$id]);
    }


    public function otpravit_zadanie_k_avtoru_kursa_update(Request $request, $zadanie_otvet_id)
    {
        $zadanie_otvety = Zadanie_otvety::where('id', $zadanie_otvet_id)->first();
        $user_id = \Auth::user()->id;
        $destinationPath = 'storage/kursy/zadanie/images/otvety/';

        if($request->hasFile('file')){
            unlink('storage/kursy/zadanie/files/otvety/'.$zadanie_otvety->file);
            $file=$request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().$user_id.uniqid().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/zadanie/files/otvety/'),$fileName);


            DB::table('zadanie_otveties')->where('id', $zadanie_otvet_id)->update([
                    'text' => $request->text,
                    'file' => $fileName,
                    'created_at' => date("Y-m-d H:i:s"),
                ]);
        }else{
            DB::table('zadanie_otveties')->where('id', $zadanie_otvet_id)->update([
                    'text' => $request->text,
                    'created_at' => date("Y-m-d H:i:s"),
                ]);
        }

        if ($request->hasFile('img')) {

            $zadanie_otvety_imgs = Zadanie_otveties_img::where('zadanie_otveties_id', $zadanie_otvet_id)->get();

            if ($zadanie_otvety_imgs != null) {
                foreach($zadanie_otvety_imgs as $zadanie_otvety_img){
                    unlink('storage/kursy/zadanie/images/otvety/'.$zadanie_otvety_img->img);
                    $zadanie_otvety_img->delete();
                } 
            }

            foreach($request->file('img') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $img = new Zadanie_otveties_img([
                    'img' => $ogImagename,
                    'zadanie_otveties_id' => $zadanie_otvety->id,
                ]);
                $img->save();
            }  
        }
        Progress_prohojdenie_uroka::where('user_id', $zadanie_otvety->user_id)->where('urok_id', $zadanie_otvety->urok_id)->update([
                    'status_vypol_zadanii' => 0,
                ]);
        return redirect()->back()->withSuccess('Ваша задание изменено.');
    }

    public function otpravit_zadanie_k_avtoru_kursa(Request $request, $urok_id, $zadanie_id, $kupit_id)
    {
        $user_id = \Auth::user()->id;
        $destinationPath = 'storage/kursy/zadanie/images/otvety/';

        if($request->hasFile('file')){

            $file=$request->file('file');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().$user_id.uniqid().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/zadanie/files/otvety/'),$fileName);

            $zadanie_otvety = new Zadanie_otvety();
            $zadanie_otvety->user_id = $user_id;
            $zadanie_otvety->urok_id = $urok_id;
            $zadanie_otvety->zadanie_id = $zadanie_id;
            $zadanie_otvety->kupit_id = $kupit_id;
            $zadanie_otvety->text = $request->text;
            $zadanie_otvety->file = $fileName;
            $zadanie_otvety->save();
        }else{
            $zadanie_otvety = new Zadanie_otvety();
            $zadanie_otvety->user_id = $user_id;
            $zadanie_otvety->urok_id = $urok_id;
            $zadanie_otvety->zadanie_id = $zadanie_id;
            $zadanie_otvety->kupit_id = $kupit_id;
            $zadanie_otvety->text = $request->text;
            $zadanie_otvety->save();
        }

        if ($request->file('img') != null) {
            foreach($request->file('img') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $img = new Zadanie_otveties_img([
                    'img' => $ogImagename,
                    'zadanie_otveties_id' => $zadanie_otvety->id,
                ]);
                $img->save();
            }  
        }
        return redirect()->back()->withSuccess('Ваша задание отправлено к автору курса.');
    }

    public function showurok($podcat_id, $id)
    {        
        $urokies = Uroky::where('id', $id)->first();
        $podcat_id02 = $podcat_id;
        $podcategory = Podcategory::where('id', $podcat_id)->first();
        $category = Category::where('id', $podcategory->cat_id)->first();

        $video = Video::where('uroky_id', $id)->get();
        $video_name = Video_name::where('uroky_id', $id)->get();
        $youtube = Youtube::where('uroky_id', $id)->get();
        $youtube_ssylke = Youtube_ssylke::where('uroky_id', $id)->get();
        $frames = Frame::where('uroky_id', $id)->get();

        $zadanie = Zadanie::where('urok_id', $id)->first();
        if ($zadanie) {
            $zadanie_img = Zadanieimg::where('zadanie_id', $zadanie->id)->get();
        }else{
            $zadanie_img = NULL;
        }
        

        $count = Video::where('uroky_id', $id)->count();
        $count2 = Youtube::where('uroky_id', $id)->count();
        $count3 = $count + $count2;

        $tests = Test::where('id', $urokies->test_id)->withCount('test_voprosy')->first();
        $summa_ballov = Test_voprosy::where('test_id', $urokies->test_id)->sum('ball');
        
        $test_controls_many = Test_controls::where('test_id', $urokies->test_id)->where('kol_ballov_usera', '>', 'test_summa_ballov / 2')->orderBy('kol_ballov_usera', 'desc')->take(50)->get();
        
        
        
        //
        if (\Auth::user()){
            if (\Auth::user()->id == $podcategory->user_id) {
                return view('pajes.urokpaje', [
                   'urokies' => $urokies,
                    'video' => $video,
                    'video_name' => $video_name,
                    'youtube' => $youtube,
                    'youtube_ssylke' => $youtube_ssylke,   
                    'count3' => $count3, 
                    'frames' => $frames, 
                    'tests' => $tests,
                    'summa_ballov' => $summa_ballov,
                    'test_controls_many' => $test_controls_many,
                    'podcat_id02' => $podcat_id02,
                    'zadanie' => $zadanie,
                    'zadanie_img' => $zadanie_img,
                    'category' => $category,
                    'podcategory' => $podcategory,
                ]);
            }else{
                $kupits = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$podcat_id)->first();
                $test_controls_one = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $urokies->test_id)->orderBy('created_at', 'desc')->get();
                $proverka = Test_controls::where('user_id', \Auth::user()->id)->where('test_id', $urokies->test_id)->max('popytka');
                
                if($kupits != null){
                    if ($zadanie) {
                        $zadanie_otvety = Zadanie_otvety::where('user_id', \Auth::user()->id)->where('zadanie_id', $zadanie->id)->where('kupit_id', $kupits->id)->first();
                    }else{
                        $zadanie_otvety = NULL;
                    }
                    
                    $progress = Progress_prohojdenie_uroka::where('user_id', \Auth::user()->id)->where('urok_id', $id)->where('kupit_id', $kupits->id)->first();
                    if ($progress != null) {
                        // code...
                    }else{
                        $progress1 = new Progress_prohojdenie_uroka();
                        $progress1->user_id = \Auth::user()->id;
                        $progress1->urok_id = $id;
                        $progress1->kurs_id = $podcat_id;
                        $progress1->kupit_id = $kupits->id;
                        $progress1->save();
                        $progress = Progress_prohojdenie_uroka::where('user_id', \Auth::user()->id)->where('urok_id', $id)->first();
                    }
                    if ($zadanie_otvety != null) {
                        $zadanie_otvety_img = Zadanie_otveties_img::where('zadanie_otveties_id', $zadanie_otvety->id)->get();
                    }else{
                        $zadanie_otvety_img = NULL;
                    }
                    if($urokies->status == 0){
                        return view('pajes.urokpaje', [
                           'urokies' => $urokies,
                            'video' => $video,
                            'video_name' => $video_name,
                            'youtube' => $youtube,
                            'youtube_ssylke' => $youtube_ssylke,   
                            'count3' => $count3, 
                            'frames' => $frames, 
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_controls_one' => $test_controls_one,
                            'test_controls_many' => $test_controls_many,
                            'proverka' => $proverka,
                            'podcat_id02' => $podcat_id02,
                            'zadanie' => $zadanie,
                            'zadanie_img' => $zadanie_img,
                            'zadanie_otvety' => $zadanie_otvety,
                            'zadanie_otvety_img' => $zadanie_otvety_img,
                            'progress' => $progress,
                            'kupits' => $kupits,
                            'category' => $category,
                            'podcategory' => $podcategory,
                        ]);
                    }else{
                        if ($podcategory->otuu_ykmasy == 0) {
                            return view('pajes.urokpaje', [
                               'urokies' => $urokies,
                                'video' => $video,
                                'video_name' => $video_name,
                                'youtube' => $youtube,
                                'youtube_ssylke' => $youtube_ssylke,   
                                'count3' => $count3, 
                                'frames' => $frames, 
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_controls_one' => $test_controls_one,
                                'test_controls_many' => $test_controls_many,
                                'proverka' => $proverka,
                                'podcat_id02' => $podcat_id02,
                                'zadanie' => $zadanie,
                                'zadanie_img' => $zadanie_img,
                                'zadanie_otvety' => $zadanie_otvety,
                                'zadanie_otvety_img' => $zadanie_otvety_img,
                                'progress' => $progress,
                                'kupits' => $kupits,
                                'category' => $category,
                                'podcategory' => $podcategory,
                            ]);
                        }else{
                            $kupit_dostupnye_moduly_array = explode(',', $kupits->dostupnye_moduly);
                            foreach ($kupit_dostupnye_moduly_array as $kupit_dostupnye_moduly_arra){
                                $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                if (intval($kupit_dostupnye_moduly_arra) == $urokies->modul_number) {
                                    break;
                                    $kupit_dostupnye_moduly_array1 = $kupit_dostupnye_moduly_arra;
                                }
                            }
                            if ($podcategory->otuu_ykmasy == 1) {
                                if($kupit_dostupnye_moduly_array1 == $urokies->modul_number){
                                    return view('pajes.urokpaje', [
                                       'urokies' => $urokies,
                                        'video' => $video,
                                        'video_name' => $video_name,
                                        'youtube' => $youtube,
                                        'youtube_ssylke' => $youtube_ssylke,   
                                        'count3' => $count3, 
                                        'frames' => $frames, 
                                        'tests' => $tests,
                                        'summa_ballov' => $summa_ballov,
                                        'test_controls_one' => $test_controls_one,
                                        'test_controls_many' => $test_controls_many,
                                        'proverka' => $proverka,
                                        'podcat_id02' => $podcat_id02,
                                        'zadanie' => $zadanie,
                                        'zadanie_img' => $zadanie_img,
                                        'zadanie_otvety' => $zadanie_otvety,
                                        'zadanie_otvety_img' => $zadanie_otvety_img,
                                        'progress' => $progress,
                                        'kupits' => $kupits,
                                        'category' => $category,
                                        'podcategory' => $podcategory,
                                    ]);
                                }else{
                                    return redirect()->back()->withSuccess2('Модулду ачуу үчүн автор уруксат берүүсү керек');
                                }
                            }
                            if ($podcategory->otuu_ykmasy == 2) {
                                if ($urokies->modul_number == 1) {
                                    return view('pajes.urokpaje', [
                                       'urokies' => $urokies,
                                        'video' => $video,
                                        'video_name' => $video_name,
                                        'youtube' => $youtube,
                                        'youtube_ssylke' => $youtube_ssylke,   
                                        'count3' => $count3, 
                                        'frames' => $frames, 
                                        'tests' => $tests,
                                        'summa_ballov' => $summa_ballov,
                                        'test_controls_one' => $test_controls_one,
                                        'test_controls_many' => $test_controls_many,
                                        'proverka' => $proverka,
                                        'podcat_id02' => $podcat_id02,
                                        'zadanie' => $zadanie,
                                        'zadanie_img' => $zadanie_img,
                                        'zadanie_otvety' => $zadanie_otvety,
                                        'zadanie_otvety_img' => $zadanie_otvety_img,
                                        'progress' => $progress,
                                        'kupits' => $kupits,
                                        'category' => $category,
                                        'podcategory' => $podcategory,
                                    ]);
                                }else{
                                    if($kupit_dostupnye_moduly_array1 == $urokies->modul_number){
                                        return view('pajes.urokpaje', [
                                           'urokies' => $urokies,
                                            'video' => $video,
                                            'video_name' => $video_name,
                                            'youtube' => $youtube,
                                            'youtube_ssylke' => $youtube_ssylke,   
                                            'count3' => $count3, 
                                            'frames' => $frames, 
                                            'tests' => $tests,
                                            'summa_ballov' => $summa_ballov,
                                            'test_controls_one' => $test_controls_one,
                                            'test_controls_many' => $test_controls_many,
                                            'proverka' => $proverka,
                                            'podcat_id02' => $podcat_id02,
                                            'zadanie' => $zadanie,
                                            'zadanie_img' => $zadanie_img,
                                            'zadanie_otvety' => $zadanie_otvety,
                                            'zadanie_otvety_img' => $zadanie_otvety_img,
                                            'progress' => $progress,
                                            'kupits' => $kupits,
                                            'category' => $category,
                                            'podcategory' => $podcategory,
                                        ]);
                                    }else{
                                        return redirect()->back()->withSuccess2('Модулду ачуу үчүн автор уруксат берүүсү керек');
                                    }
                                }
                            }
                        } 
                    }
                                   
                }else{
                    if ($podcategory->price != 0) {
                        if($urokies->status != 1){
                            return view('pajes.urokpaje', [
                               'urokies' => $urokies,
                                'video' => $video,
                                'video_name' => $video_name,
                                'youtube' => $youtube,
                                'youtube_ssylke' => $youtube_ssylke,   
                                'count3' => $count3, 
                                'frames' => $frames, 
                                'tests' => $tests,
                                'summa_ballov' => $summa_ballov,
                                'test_controls_one' => $test_controls_one,
                                'test_controls_many' => $test_controls_many,
                                'proverka' => $proverka,
                                'podcat_id02' => $podcat_id02,
                                'zadanie' => $zadanie,
                                'zadanie_img' => $zadanie_img,
                                'kupits' => $kupits,
                                'category' => $category,
                                'podcategory' => $podcategory,
                            ]);
                        }else{
                            return redirect()->back()->withSuccess2('Сначала оформите подписку (купите)!');
                        }
                    }else{
                        return view('pajes.urokpaje', [
                           'urokies' => $urokies,
                            'video' => $video,
                            'video_name' => $video_name,
                            'youtube' => $youtube,
                            'youtube_ssylke' => $youtube_ssylke,   
                            'count3' => $count3, 
                            'frames' => $frames, 
                            'tests' => $tests,
                            'summa_ballov' => $summa_ballov,
                            'test_controls_one' => $test_controls_one,
                            'test_controls_many' => $test_controls_many,
                            'proverka' => $proverka,
                            'podcat_id02' => $podcat_id02,
                            'zadanie' => $zadanie,
                            'zadanie_img' => $zadanie_img,
                            'kupits' => $kupits,
                            'category' => $category,
                            'podcategory' => $podcategory,
                        ]);
                    }
                }
            }
        }else{
            if ($podcategory->price != 0) {
                if($urokies->status != 1){
                    return view('pajes.urokpaje', [
                       'urokies' => $urokies,
                        'video' => $video,
                        'video_name' => $video_name,
                        'youtube' => $youtube,
                        'youtube_ssylke' => $youtube_ssylke,   
                        'count3' => $count3, 
                        'frames' => $frames, 
                        'tests' => $tests,
                        'summa_ballov' => $summa_ballov,
                        'test_controls_many' => $test_controls_many,
                        'podcat_id02' => $podcat_id02,
                        'zadanie' => $zadanie,
                        'zadanie_img' => $zadanie_img,
                        'category' => $category,
                        'podcategory' => $podcategory,
                    ]);
                }else{
                    return redirect()->back()->withSuccess2('Сначала оформите подписку (купите)!');
                }
            }else{
                return view('pajes.urokpaje', [
                   'urokies' => $urokies,
                    'video' => $video,
                    'video_name' => $video_name,
                    'youtube' => $youtube,
                    'youtube_ssylke' => $youtube_ssylke,   
                    'count3' => $count3, 
                    'frames' => $frames, 
                    'tests' => $tests,
                    'summa_ballov' => $summa_ballov,
                    'test_controls_many' => $test_controls_many,
                    'podcat_id02' => $podcat_id02,
                    'zadanie' => $zadanie,
                    'zadanie_img' => $zadanie_img,
                    'category' => $category,
                    'podcategory' => $podcategory,
                ]);
            }
        }
    }


    public function kurs_download($id)
    {
        $urokies = Uroky::where('id', $id)->first();
        return response()->download(public_path('storage/kursy/files/'.$urokies->ssylka));
    }

    public function kurs_zadanie_download($id)
    {
        $zadanie = Zadanie::where('id', $id)->first();
        return response()->download(public_path('storage/kursy/zadanie/files/'.$zadanie->file));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $podcategories = Podcategory::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        

        return view('admin.uroky.create', [
            'categories' => $categories,
            'podcategories' => $podcategories,
            'users' => $users
        ]);
    }


    public function moderator_kurs_urok_create($id)
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        $podcategory = Podcategory::where('id', $id)->withCount('uroky', 'kupit')->first();

        return view('moderator/kursy_uroki_create', [
            'users' => $users,
            'podcategory' => $podcategory,
        ]);
    }

    public function upload(Request $request)
    {
        $path =  public_path().'storage/kursy/';
        $file = $request->file('file');
        $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
        $img = Image::make($file);
        $img->save($path . $filename);
    }


    public function moderator_kurs_urok_store(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string',
            'status' => 'required|numeric',
        ]);
        if($request->hasFile('for_download'))
        {
            $request->validate([
                'for_download' => 'required|mimes:jpeg,png,jpg,gif,tiff,webp,pptx,ppt,pptm,potx,potm,ppsx,ppsm,pps,pdf,docx,docm,doc,dotx,dotm,rtf,xlsx,xlsm,xls,xlsb,xltx,xltm,rar,zip,7z,tar|max:20480',
            ]);
        }
       /* if($request->hasFile('video_name'))
        {
            $request->validate([
                'video_title' => 'required|string',
                'video_name' => 'required|mimes:mp4,mpg,mpeg,wmv,mov,avi,ogg,qt|max:92160',
            ]);
        }
        if($request->has('youtube_video_title'))
        {
            $this->validate($request, [
               'youtube_video_title' => 'required',
                'youtube_video_ssylka' => 'string',  

                'youtube_video_title.*' => 'string',
                'youtube_video_ssylka.*' => 'string', 
            ]);
        }*/

        


        $podcategory = Podcategory::where('id', $id)->first();
        $kol_urokov = Uroky::where('podcat_id', $id)->count();
        $num_uroka = $kol_urokov + 1;
        if($request->hasFile('for_download')){

            $file=$request->file('for_download');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/files/'),$fileName);

            $uroky = new Uroky();
            $uroky->user_id = \Auth::user()->id;
            $uroky->title = $request->title;
            $uroky->podcat_id = $podcategory->id;
            $uroky->status = $request->status;
            $uroky->ssylka = $fileName;
            $uroky->porydkovyi_nomer = $num_uroka;
            $uroky->modul_number = $podcategory->col_modulei;

            if ($request->has('text_uroka')){
                if($request->text_uroka != null){
                    $storage = "storage/kursy/content_images";            
                    $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHtml($request->text_uroka, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                    libxml_clear_errors();
                    $images = $dom->getElementsByTagName('img');
                    foreach($images as $img){
                        $src = $img->getAttribute('src');
                        if(preg_match('/data:image/',$src)){
                            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                            $mimetype = $groups['mime'];
                            $fileNameContent = uniqid();
                            $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                            $filepath = ("$storage/$fileNameContentRand.$mimetype");
                            $image=Image::make($src)
                                ->encode($mimetype,100)
                                ->save(public_path($filepath));
                            
                            $new_src = asset($filepath);
                            $img->removeAttribute('src');
                            $img->setAttribute('src', $new_src);
                        } // <!--endif
                    } // <!--endforeach$uroky->text = utf8_decode($dom->saveHTML());
                     
                     $uroky->text = $request->text_uroka;
                }
                else
                {
                    $uroky->text = NULL;
                }
            }
            
            $uroky->save();


            if($request->hasfile('video_name'))
            {
                foreach($request->file('video_name') as $file111)
                {
                    $fileNames=date("Y-m-d").time().rand(1,100).'.'.$file111->getClientOriginalExtension();
                    $file111->move(\public_path('storage/kursy/videos/'),$fileNames); 

                    $aas= new Video_name();
                    $aas->user_id = \Auth::user()->id;
                    $aas->uroky_id = $uroky->id;
                    $aas->video_name = $fileNames;
                    $aas->save();
                }

                if($request->has('video_title'))
                {
                    $files2 = $request->video_title;
                    foreach($files2 as $file2)
                    {
                        $request['uroky_id'] = $uroky->id;
                        $request['video_title'] = $file2;
                       
                        Video::create($request->all());
                    }
                }
            }


            if($request->has('youtube_video_title'))
            {
                $files22 = $request->youtube_video_title;
                $files222 = $request->youtube_video_ssylka;
                
                foreach($files22 as $file22)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['youtube_video_title']=$file22;
               
                    Youtube::create($request->all());
                }

                foreach($files222 as $file222)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['youtube_video_ssylka']=$file222;
                   
                    Youtube_ssylke::create($request->all());
                }
            }

            /**if($request->has('frame_title'))
            {
                $files_frame_title = $request->frame_title;
                $files_frame = $request->frame;
                
                foreach($files_frame_title as $frame_title)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['title']=$frame_title;
                    $request['frame']=$frame_title;
               
                    Frame::create($request->all());
                }
            }*/

            if($request->has('frame_title'))
            {
                $frame_title = $request->frame_title;
                $frame = $request->frame;
                
                foreach($frame_title as $key => $value)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['title']=$frame_title[$key];
                    $request['frame']=$frame[$key];
               
                    Frame::create($request->all());
                }
            }
        }
        else{

            $uroky = new Uroky();
            $uroky->user_id = \Auth::user()->id;
            $uroky->title = $request->title;
            $uroky->podcat_id = $podcategory->id;
            $uroky->status = $request->status;
            $uroky->porydkovyi_nomer = $num_uroka;
            $uroky->modul_number = $podcategory->col_modulei;

            if ($request->has('text_uroka')){
                if($request->text_uroka != null){
                    $storage = "storage/kursy/content_images";            
                    $dom = new \DOMDocument();
                    libxml_use_internal_errors(true);
                    $dom->loadHtml($request->text_uroka, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                    libxml_clear_errors();
                    $images = $dom->getElementsByTagName('img');
                    foreach($images as $img){
                        $src = $img->getAttribute('src');
                        if(preg_match('/data:image/',$src)){
                            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                            $mimetype = $groups['mime'];
                            $fileNameContent = uniqid();
                            $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                            $filepath = ("$storage/$fileNameContentRand.$mimetype");
                            $image=Image::make($src)
                                ->encode($mimetype,100)
                                ->save(public_path($filepath));
                            
                            $new_src = asset($filepath);
                            $img->removeAttribute('src');
                            $img->setAttribute('src', $new_src);
                        } // <!--endif
                    } // <!--endforeach$uroky->text = utf8_decode($dom->saveHTML());
                     
                     $uroky->text = $request->text_uroka;
                }
                else
                {
                    $uroky->text = NULL;
                }
            }
            $uroky->save();


            if($request->hasfile('video_name'))
            {
                foreach($request->file('video_name') as $file111)
                {
                    $fileNames=date("Y-m-d").time().rand(1,100).'.'.$file111->getClientOriginalExtension();
                    $file111->move(\public_path('storage/kursy/videos/'),$fileNames); 

                    $aas= new Video_name();
                    $aas->user_id = \Auth::user()->id;
                    $aas->uroky_id = $uroky->id;
                    $aas->video_name = $fileNames;
                    $aas->save();
                }

                if($request->has('video_title'))
                {
                    $files2 = $request->video_title;
                    foreach($files2 as $file2)
                    {
                        $request['uroky_id'] = $uroky->id;
                        $request['video_title'] = $file2;
                       
                        Video::create($request->all());
                    }
                }
            }


            if($request->has('youtube_video_title'))
            {
                $files22 = $request->youtube_video_title;
                $files222 = $request->youtube_video_ssylka;
                
                foreach($files22 as $file22)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['youtube_video_title']=$file22;
               
                    Youtube::create($request->all());
                }

                foreach($files222 as $file222)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['youtube_video_ssylka']=$file222;
                   
                    Youtube_ssylke::create($request->all());
                }
            }

            if($request->has('frame_title'))
            {
                $frame_title = $request->frame_title;
                $frame = $request->frame;
                
                foreach($frame_title as $key => $value)
                {
                    $request['uroky_id']=$uroky->id;
                    $request['title']=$frame_title[$key];
                    $request['frame']=$frame[$key];
               
                    Frame::create($request->all());
                }
            }
            
        } 
        return redirect()->route('moderator_kurs_urok_index', $podcategory['id'])->withSuccess('Ваш урок успешно добавлена!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uroky = new Uroky();
        $uroky->user_id = \Auth::user()->id;
        $uroky->title = $request->title;
        $uroky->podcat_id = $request->podcat_id;
        $uroky->ssylka = $request->ssylka;
        $uroky->text = $request->text;
        $uroky->img = $request->img;
        $uroky->opisanie = $request->opisanie;
        $uroky->status = $request->status;
        
        $uroky->save();

        return redirect('admin_panel/uroky')->withSuccess('Урок была успешно добавлена!');
    }

    /**$comment->author_id = \Auth::user()->id;
     * Display the specified resource.
     *
     * @param  \App\Models\Uroky  $uroky
     * @return \Illuminate\Http\Response
     */
    public function show(Uroky $uroky)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uroky  $uroky
     * @return \Illuminate\Http\Response
     */
    public function edit(Uroky $uroky)
    {
        $podcategories = Podcategory::orderBy('created_at', 'DESC')->get();

        return view('admin.uroky.edit', [
            'podcategories' => $podcategories,
            'urokies' => $uroky,
            
        ]);
    }

    public function moderator_kurs_urok_edit(Uroky $uroky, $podcad_id, $id)
    {
        $urok = Uroky::where('id', $id)->first();
        $podcategory = Podcategory::where('id', $podcad_id)->withCount('uroky', 'kupit')->first();
        $video = Video::where('uroky_id', $id)->get();
        $video_name = Video_name::where('uroky_id', $id)->get();
        $youtube = Youtube::where('uroky_id', $id)->get();
        $youtube_ssylke = Youtube_ssylke::where('uroky_id', $id)->get();
        $frames = Frame::where('uroky_id', $id)->get();

        $count_frame = Frame::where('uroky_id', $id)->count();
        $count = Video::where('uroky_id', $id)->count();
        $count2 = Youtube::where('uroky_id', $id)->count();
        $count3 = $count + $count2;

        return view('moderator/kursy_uroki_edit', [
            'urok' => $urok,
            'podcategory' => $podcategory,
            'video' => $video,
            'video_name' => $video_name,
            'youtube' => $youtube,
            'youtube_ssylke' => $youtube_ssylke, 
            'frames' => $frames,  
            'count3' => $count3, 
            'count_frame' => $count_frame,             
        ]);
    }

    public function moderator_kurs_urok_update(Request $request, Uroky $uroky, $podcad_id, $id)
    {

        $request->validate([
            'title' => 'required|string',
            'status' => 'required|numeric',
        ]);
        if($request->hasFile('for_download'))
        {
            $request->validate([
                'for_download' => 'required|mimes:jpeg,png,jpg,gif,tiff,webp,pptx,ppt,pptm,potx,potm,ppsx,ppsm,pps,pdf,docx,docm,doc,dotx,dotm,rtf,xlsx,xlsm,xls,xlsb,xltx,xltm,rar,zip,7z,tar|max:20480',
            ]);
        }
       /* if($request->hasFile('video_name'))
        {
            $request->validate([
                'video_title' => 'required|string',
                'video_name' => 'required|mimes:mp4,mpg,mpeg,wmv,mov,avi,ogg,qt|max:92160',
            ]);
        }
        if($request->has('youtube_video_title'))
        {
            $this->validate($request, [
               'youtube_video_title' => 'required',
                'youtube_video_ssylka' => 'string',  

                'youtube_video_title.*' => 'string',
                'youtube_video_ssylka.*' => 'string', 
            ]);
        }*/

        


        $podcategory = Podcategory::where('id', $podcad_id)->first();
        $uroky = Uroky::where('id', $id)->first();

        if($request->hasFile('for_download1')){

            
                unlink('storage/kursy/files/'.$uroky->ssylka);
                $file=$request->file('for_download1');
                $file_extension = $file->getClientOriginalExtension();
                $fileName=time().'.'. $file_extension;
                $file->move(\public_path('storage/kursy/files/'),$fileName);

                DB::table('urokies')->where('id', $id)->update([
                    'ssylka' => $fileName,
                ]);
        }



        if($request->hasFile('for_download'))
        {
            if($uroky->ssylka != null)
            {
                unlink('storage/kursy/files/'.$uroky->ssylka);
                $file=$request->file('for_download');
                $file_extension = $file->getClientOriginalExtension();
                $fileName=time().'.'. $file_extension;
                $file->move(\public_path('storage/kursy/files/'),$fileName);

                DB::table('urokies')->where('id', $id)->update([
                    'ssylka' => $fileName,
                ]);
            }
            else
            {
                $file=$request->file('for_download');
                $file_extension = $file->getClientOriginalExtension();
                $fileName=time().'.'. $file_extension;
                $file->move(\public_path('storage/kursy/files/'),$fileName);

                DB::table('urokies')->where('id', $id)->update([
                    'ssylka' => $fileName,
                ]);
            }
            
        }


        DB::table('urokies')->where('id', $id)->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);

        if ($request->has('text_uroka')){
            if($request->text_uroka != null){
                $storage = "storage/kursy/content_images";            
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHtml($request->text_uroka, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                libxml_clear_errors();
                $images = $dom->getElementsByTagName('img');

                foreach($images as $key => $value){
                    $src = $images[$key]->getAttribute('src');
                    
                    if(preg_match('/data:image/',$src)){
                        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                        $mimetype = $groups['mime'];
                        $fileNameContent = uniqid();
                        $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                        $filepath = ("$storage/$fileNameContentRand.$mimetype");
                        $image=Image::make($src)
                            ->encode($mimetype,100)
                            ->save(public_path($filepath));
                        
                        $new_src = asset($filepath);
                        $images[$key]->removeAttribute('src');
                        $images[$key]->setAttribute('src', $new_src);
                    }            
                }
                $text333 = $request->text_uroka;
                 DB::table('urokies')->where('id', $id)->update([
                    'text' => $text333,
                ]);
            }
            else
            {
                DB::table('urokies')->where('id', $id)->update([
                    'text' => NULL,
                ]);
            }
        }

        $video_name = Video_name::where('uroky_id', $id)->get();
        if($video_name != null)
        {
            if($request->has('video_test1'))
            {
                if($request->hasFile('video_name1'))
                {
                    $old_video_name = Video_name::where('id', $request->video_test1)->first();
                    unlink('storage/kursy/videos/'.$old_video_name->video_name);

                    $tttr = $request->file('video_name1');
                    $fileNames=date("Y-m-d").time().rand(1,100).'.'.$tttr->getClientOriginalExtension();
                    $tttr->move(\public_path('storage/kursy/videos/'),$fileNames); 

                    DB::table('video_names')->where('video_name', $old_video_name->video_name)->update([
                        'video_name' => $fileNames,
                    ]);  
                }
            }
            else
            {
                $old_video_name = Video_name::where('id', $request->video_test1_1)->first();
                if($old_video_name != null){
                    unlink('storage/kursy/videos/'.$old_video_name->video_name);
                    DB::table('video_names')->where('id', $old_video_name->id)->delete();
                }
            }


            if($request->has('video_test2'))
            {
                if($request->hasFile('video_name2'))
                {
                    $old_video_name = Video_name::where('id', $request->video_test2)->first();
                    unlink('storage/kursy/videos/'.$old_video_name->video_name);

                    $tttr = $request->file('video_name2');
                    $fileNames=date("Y-m-d").time().rand(1,100).'.'.$tttr->getClientOriginalExtension();
                    $tttr->move(\public_path('storage/kursy/videos/'),$fileNames); 

                    DB::table('video_names')->where('video_name', $old_video_name->video_name)->update([
                        'video_name' => $fileNames,
                    ]);
                }
            }
            else
            {
                $old_video_name = Video_name::where('id', $request->video_test1_2)->first();
                if($old_video_name != null){
                    unlink('storage/kursy/videos/'.$old_video_name->video_name);
                    DB::table('video_names')->where('id', $old_video_name->id)->delete();
                }
            }



            if($request->has('video_test3'))
            {
                if($request->hasFile('video_name3'))
                {
                    $old_video_name = Video_name::where('id', $request->video_test3)->first();
                    unlink('storage/kursy/videos/'.$old_video_name->video_name);

                    $tttr = $request->file('video_name3');
                    $fileNames=date("Y-m-d").time().rand(1,100).'.'.$tttr->getClientOriginalExtension();
                    $tttr->move(\public_path('storage/kursy/videos/'),$fileNames); 

                    DB::table('video_names')->where('video_name', $old_video_name->video_name)->update([
                        'video_name' => $fileNames,
                    ]);
                }
            }
            else
            {
                $old_video_name = Video_name::where('id', $request->video_test1_3)->first();
                if($old_video_name != null){
                    unlink('storage/kursy/videos/'.$old_video_name->video_name);
                    DB::table('video_names')->where('id', $old_video_name->id)->delete();
                }
            }
        }

//         

        if($request->has('video_title'))
        {
            $files2 = $request->video_title;

            DB::table('videos')->where('uroky_id', $id)->delete();

            foreach($files2 as $file2)
            {
                $request['uroky_id'] = $uroky->id;
                $request['video_title'] = $file2;
               
                Video::create($request->all());
            }
        }
        else{
            $video_title = Video::where('uroky_id', $id)->get();
                if($video_title != null){
                   
                    DB::table('videos')->where('uroky_id', $id)->delete();
                }
        }
       

        if($request->hasfile('video_name2'))
        {
            foreach($request->file('video_name2') as $file1111)
            {
                $fileNames=date("Y-m-d").time().rand(1,100).'.'.$file1111->getClientOriginalExtension();
                $file1111->move(\public_path('storage/kursy/videos/'),$fileNames); 

                $aas= new Video_name();
                $aas->user_id = \Auth::user()->id;
                $aas->uroky_id = $uroky->id;
                $aas->video_name = $fileNames;
                $aas->save();
            }

            if($request->has('video_title2'))
            {
                $files21 = $request->video_title2;
                foreach($files21 as $file21)
                {
                    $request['uroky_id'] = $uroky->id;
                    $request['video_title'] = $file21;
                   
                    Video::create($request->all());
                }
            }
        }


        if($request->has('youtube_video_title'))
        {
            $files22 = $request->youtube_video_title;

            DB::table('youtubes')->where('uroky_id', $id)->delete();
            
            foreach($files22 as $file22)
            {
                $request['uroky_id']=$uroky->id;
                $request['youtube_video_title']=$file22;
           
                Youtube::create($request->all());
            }
        }
        else
        {
            $youtube_video_title01 = Youtube::where('uroky_id', $id)->get();
            if($youtube_video_title01 != null)
            {
                DB::table('youtubes')->where('uroky_id', $id)->delete();
            }
        }

        if($request->has('youtube_video_ssylka'))
        {
            $files222 = $request->youtube_video_ssylka;

            DB::table('youtube_ssylkes')->where('uroky_id', $id)->delete();

            foreach($files222 as $file222)
            {
                $request['uroky_id']=$uroky->id;
                $request['youtube_video_ssylka']=$file222;
               
                Youtube_ssylke::create($request->all());
            }
        }
        else
        {
            $youtube_video_ssylka01 = Youtube_ssylke::where('uroky_id', $id)->get();
            if($youtube_video_ssylka01 != null)
            {
                DB::table('youtube_ssylkes')->where('uroky_id', $id)->delete();
            }
        }


        if($request->has('youtube_video_title2'))
        {
            $files221 = $request->youtube_video_title2;
            $files2221 = $request->youtube_video_ssylka2;
            
            foreach($files221 as $file221)
            {
                $request['uroky_id']=$uroky->id;
                $request['youtube_video_title']=$file221;
           
                Youtube::create($request->all());
            }

            foreach($files2221 as $file2221)
            {
                $request['uroky_id']=$uroky->id;
                $request['youtube_video_ssylka']=$file2221;
               
                Youtube_ssylke::create($request->all());
            }
        }


        if($request->has('frame_title'))
        {
            $frame_title = $request->frame_title;
            $frame = $request->frame;

            DB::table('frames')->where('uroky_id', $id)->delete();

            foreach($frame_title as $key => $value)
            {
                $request['uroky_id']=$uroky->id;
                $request['title']=$frame_title[$key];
                $request['frame']=$frame[$key];
           
                Frame::create($request->all());
            }
        }
        else
        {
            $frame = Frame::where('uroky_id', $id)->get();
            if($frame != null)
            {
                DB::table('frames')->where('uroky_id', $id)->delete();
            }
        }
            
         
        return redirect()->route('moderator_kurs_urok_index', $podcategory['id'])->withSuccess('Ваш урок успешно обновлена!');
    }



    
    public function moderator_kurs_urok_material_download($urokSsylka, Request $request)
    {
        return response()->download(public_path('storage/kursy/files/'.$urokSsylka));
    }


    public function moderator_kurs_urok_update_status1(Request $request, Uroky $uroky, $podcad_id, $id)
    {
        
        $request->validate([
            'status' => 'required|numeric',
        ]);
        DB::table('urokies')->where('id', $id)->update([
            'status' => $request->status,
        ]);
        
        return redirect()->back()->withSuccess('Урок стал платным.');
    }

    public function moderator_kurs_urok_update_status2(Request $request, Uroky $uroky, $podcad_id, $id)
    {

        $request->validate([
            'status2' => 'required|numeric',
        ]);
        DB::table('urokies')->where('id', $id)->update([
            'status' => $request->status2,
        ]);
        
        return redirect()->back()->withSuccess2('Урок стал бесплатным.');
    }

    public function moderator_kurs_uroki_num_update(Request $request, Uroky $uroky, $podcad_id)
    {

        $i = 1;  
        
        $frame_title = $request->id_uroka;
        $frame = $request->modul_number;


        foreach($frame_title as $key => $value)
        {
            DB::table('urokies')->where('id', $frame_title[$key])->update([
                'porydkovyi_nomer' => $i++,
               'modul_number' => $frame[$key],
            ]);
        }

        return redirect()->back()->withSuccess('Порядок уроков изменена.');
    }

    public function moderator_kurs_urok_tests_vybrate(Request $request, $kurs_id, $urok_id)
    {
        
        DB::table('urokies')->where('id', $urok_id)->update([
            'test_id' => $request->test_id,
        ]);

        return redirect()->back()->withSuccess('Тест выбрано!');
    }

    public function moderator_kurs_urok_tests_izyat(Request $request, $kurs_id, $urok_id)
    {
        
        DB::table('urokies')->where('id', $urok_id)->update([
            'test_id' => NULL,
        ]);

        return redirect()->back()->withSuccess('Тест был изъят!');
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uroky  $uroky
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uroky $uroky)
    {
        $uroky->title = $request->title;
        $uroky->podcat_id = $request->podcat_id;
        $uroky->ssylka = $request->ssylka;
        $uroky->text = $request->text;
        $uroky->img = $request->img;
        $uroky->opisanie = $request->opisanie;
        $uroky->status = $request->status;
        
        $uroky->save();

        return redirect('admin_panel/uroky')->withSuccess('Урок была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uroky  $uroky
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uroky $uroky)
    {
        $uroky->delete();

        return redirect('admin_panel/uroky')->withSuccess('Урок была успешно удалена!');
    }

    public function moderator_kurs_urok_destroy(Uroky $uroky, $podid, $id)
    {
        //$proverka = Kupit::where('kurs_id', $podid)->first();
        $proverka = Podcategory::where('id', $podid)->withCount('kupit')->first();

        if($proverka->kupit_count > 0){

            return redirect()->back()->withSuccess2('Вы не сможете удалить данный урок, так как этот курс уже куплено.');
            
        }else{
            $uroky = Uroky::find($id);
            $video1 = Video::where('uroky_id', $id);
            $video2 = Video_name::where('uroky_id', $id);
            $video3 = Youtube::where('uroky_id', $id);
            $video4 = Youtube_ssylke::where('uroky_id', $id);
            $video5 = Video_name::where('uroky_id', $id)->get();

            if($video2 != null){
                foreach ($video5 as $vid) {
                    unlink('storage/kursy/videos/'.$vid->video_name);
                }
                $video2->delete();
            }
            if($video1 != null){
                $video1->delete();
            }
            if($video3 != null){
                $video3->delete();
            }
            if($video4 != null){
                $video4->delete();
            }
            
            if ($uroky->ssylka != null){
                unlink('storage/kursy/files/'.$uroky->ssylka);
            }


            if($uroky->text != null){
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHtml($uroky->text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                libxml_clear_errors();
                $images = $dom->getElementsByTagName('img');
                foreach($images as $img){
                    $src = $img->getAttribute('src');
                    $path = parse_url($src, PHP_URL_PATH);
                    $path = str_replace('/storage/kursy/content_images/', '', $path);
                    unlink('storage/kursy/content_images/'.$path);
                } // <!--endforeach
            }
            
            $uroky->delete();

            return redirect()->back()->withSuccess('Урок была успешно удалена!');
        }
    }
}