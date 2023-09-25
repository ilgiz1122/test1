<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materialy;
use Illuminate\Http\Request;
use App\Models\Materialpodcategory; // добавлена для связи с подкатегориями
use App\Models\Materialcategory; // добавлена для связи с подкатегориями
use App\Models\User; // добавлена для связи с подкатегориями
use App\Models\language; // добавлена для связи с подкатегориями
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Kupitmaterialov;
use App\Models\Podcategory;
use App\Models\Kupit;
use App\Models\Partnerka;
use App\Models\Materialimgy;
use App\Models\User_vyplaty;
use App\Models\Test;
use App\Models\Tests_kupit;


class MaterialyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialies = Materialy::orderBy('created_at', 'desc')->get();
      
       return view('admin.materials.index', [
        'materialies' => $materialies,
        
        
       ]);
    }


    public function index2($for_action, $materialpodcategoryId, Request $request)
    {
        $materialies = Materialy::where('materialpodcategory_id', $materialpodcategoryId)->withCount('kupitmaterialov')->orderBy('created_at', 'desc')->paginate(8);
        $materialimgs = Materialimgy::get();
        $materialpodcategories = Materialpodcategory::where('id', $materialpodcategoryId)->first();
        $materialcategories = Materialcategory::where('id', $materialpodcategories->materialcategory_id)->first();
        $count_cat = Materialcategory::where('dop_category', $for_action)->count();
        if ($materialpodcategoryId) {
            $materialies->where('materialpodcategory_id', $materialpodcategoryId);
        }
        

        return view('pajes/materialy', [
               'materialpodcategories' => $materialpodcategories,
               'materialcategories' => $materialcategories,
               'materialies' => $materialies,
               'materialimgs' => $materialimgs,
               'for_action' => $for_action,
               'count_cat' => $count_cat,
         ]);
    }


    public function index3($for_action, $podcat_id, $materialyId, Request $request)
    {
        $materialies = Materialy::where('id', $materialyId)->first();
        $materialimgs = Materialimgy::where('materialy_id', $materialies->id)->get();
        $materialpodcategories = Materialpodcategory::where('id', $podcat_id)->first();
        $materialcategories = Materialcategory::where('id', $materialpodcategories->materialcategory_id)->first();
        $count_cat = Materialcategory::where('dop_category', $for_action)->count();

        if ($materialies->price != 0) {
            if (\Auth::user()) {
                $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $materialyId)->count();
                $proverka = DB::table('kupitmaterialovs')->where('proverka', \Auth::user()->id.'-'.$materialyId)->first();
                return view('pajes/kupitmaterialov_kupon', [
                    'materialies' => $materialies,
                    'kupitmaterialovs' => $kupitmaterialovs,
                    'proverka' => $proverka,
                    'materialimgs' => $materialimgs,
                     'for_action' => $for_action,
                     'materialpodcategories' => $materialpodcategories,
                   'materialcategories' => $materialcategories,
                   'count_cat' => $count_cat,
                ]);
            }else{
                $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $materialyId)->count();

                return view('pajes/kupitmaterialov_kupon', [
                    'materialies' => $materialies,
                    'kupitmaterialovs' => $kupitmaterialovs,
                    'materialimgs' => $materialimgs,
                     'for_action' => $for_action,
                     'materialpodcategories' => $materialpodcategories,
                   'materialcategories' => $materialcategories,
                   'count_cat' => $count_cat,
                ]);
            }
        }else{
            $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $materialyId)->count();

                return view('pajes/kupitmaterialov_kupon', [
                    'materialies' => $materialies,
                    'kupitmaterialovs' => $kupitmaterialovs,
                    'materialimgs' => $materialimgs,
                     'for_action' => $for_action,
                     'materialpodcategories' => $materialpodcategories,
               'materialcategories' => $materialcategories,
               'count_cat' => $count_cat,
                ]);
        }
    }

    public function index03($materialyId, Request $request)
    {
        $materialies = Materialy::where('id', $materialyId)->first();
        $kupitmaterialovs = Kupitmaterialov::where('materialy_id', $materialyId)->count();
        $proverka = DB::table('kupitmaterialovs')->where('proverka', \Auth::user()->id.'-'.$materialyId)->first();
        return view('pajes/kupitmaterialov_kupon', [
            'materialies' => $materialies,
            'kupitmaterialovs' => $kupitmaterialovs,
            'proverka' => $proverka,
        ]);
    }

    public function index0003($materialyId, Request $request)
    {
        $materialies = Materialy::where('id', $materialyId)->first();


        if ($materialies->price != 0) {
            if(\Auth::user()){
                $kupitmaterialov = DB::table('kupitmaterialovs')->where('proverka', \Auth::user()->id.'-'.$materialyId)->first();
                $one = $materialies->kol_skachek + 1;
                if ($kupitmaterialov != null) {
                   $materialy = DB::table('materialies')->where('id', $materialyId)->update([
                        'kol_skachek' => $one,
                    ]);
                   return response()->download(public_path('storage/files/files/'.$materialies->ssylka));
                }else{
                    return redirect()->route('bay3', $materialyId);               
                }
            }else{
                return redirect()->route('skachatmaterialov2', $materialyId);
            }
        }else{
            DB::table('materialies')->where('id', $materialyId)->increment('kol_skachek', 1);
            return response()->download(public_path('storage/files/files/'.$materialies->ssylka));
        }
    }



    public function index4($kupitmaterialovsId, Request $request)
    {
        $materialies = Materialy::where('ssylka', $kupitmaterialovsId)->first();
        
        return view('pajes/skachatmaterialov', ['materialies' => $materialies,]);
       // return response()->download(public_path('storage/files/files/'.$materialies->ssylka));

        
    }


    public function download02($materialyId)
    {
        $materialies = Materialy::where('id', $materialyId)->first();
        $kupitmaterialov = DB::table('kupitmaterialovs')->where('proverka', \Auth::user()->id.'-'.$materialyId)->first();
        $one = $materialies->kol_skachek + 1;
        $user = \Auth::user()->id * 3 + 3;
        if ($kupitmaterialov != null) {
           $materialy = DB::table('materialies')->where('id', $materialyId)->update([
                'kol_skachek' => $one,
            ]);
            
            $materialpodcategories = Materialpodcategory::where('id', $materialies->materialpodcategory_id)->first();
            $materialcategories = Materialcategory::where('id', $materialies->materialcategory_id)->first();
            
            $materialcategories2 = mb_substr($materialcategories->title, 0, 3);
            $materialpodcategories2 = mb_substr($materialpodcategories->title, 0, 4);
        
           $file= public_path('storage/files/files/'.$materialies->ssylka);
           $headers = array('Content-Type: application/'.$materialies->type,);
           return response()->download($file, $materialcategories2.'_'.$materialpodcategories2.'_'.$materialies->title.'_0'.$user .'_(nonsi.kg)'.'.'.$materialies->type, $headers);

           //return response()->download(public_path('storage/files/files/'.$materialies->ssylka));  materialcategory_id  materialpodcategory_id
        }else{
            return redirect()->route('bay3', $materialyId);               
        }
    }

    public function download($materialySsylka, Request $request)
    {
        
        $materialies = Materialy::where('ssylka', $materialySsylka)->first();
        $kupitmaterialov = DB::table('kupitmaterialovs')->where('proverka', \Auth::user()->id.'-'.$materialies->id)->first();
        $user = \Auth::user()->id * 3 + 3;
        
        $materialpodcategories = Materialpodcategory::where('id', $materialies->materialpodcategory_id)->first();
            $materialcategories = Materialcategory::where('id', $materialies->materialcategory_id)->first();
            
            $materialcategories2 = mb_substr($materialcategories->title, 0, 3);
            $materialpodcategories2 = mb_substr($materialpodcategories->title, 0, 4);

        DB::table('materialies')->where('ssylka', $materialySsylka)->increment('kol_skachek', 1);
            $file= public_path('storage/files/files/'.$materialies->ssylka);
            $headers = array('Content-Type: application/'.$materialies->type,);
            return response()->download($file, $materialcategories2.'_'.$materialpodcategories2.'_'.$materialies->title.'_0'.$user .'_(nonsi.kg)'.'.'.$materialies->type, $headers);

            
   //     if ($kupitmaterialov != null) {
     //       DB::table('materialies')->where('ssylka', $materialySsylka)->increment('kol_skachek', 1);
    //        $file= public_path('storage/files/files/'.$materialies->ssylka);
    //       $headers = array('Content-Type: application/'.$materialies->type,);
   //         return response()->download($file, $materialies->title.'_(nonsi.kg)'.'.'.$materialies->type, $headers);
   //     }else{
    //        return redirect()->back()->withSuccess2('Сатып албай эле көчүрүп алам деп ойлодуң беле ээ!');         
    //    }        
    }



    public function moderator_materials_index($for_action)
    {
        
        $materialies = Materialy::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->withCount('kupitmaterialov')->orderBy('created_at', 'desc')->get();
        
        //$totalsum = Kupitmaterialov::where('materialy_id', \Auth::user()->id)->sum('pribyl');
      
       return view('moderator/materialy', [
        'materialies' => $materialies,
        'for_action' => $for_action,
        ]);
    }

   

    public function moderator_statistika()
    {
        $materialies = Materialy::where('user_id', \Auth::user()->id)->withCount('kupitmaterialov')->orderBy('created_at', 'desc')->get();
        $kupitmaterialov = Kupitmaterialov::where('materialy_user_id', \Auth::user()->id)->get();
      
        $podcategories = Podcategory::where('user_id', \Auth::user()->id)->withCount('kupit', 'uroky', 'video', 'youtube')->orderBy('created_at', 'desc')->get();
        $kolichestvo_prodaj_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->count();
        $sum_pribyl_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->sum('pribyl');
        $kolichestvo_ispolzovanie_kuponov_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->where('promocod', '!=', null)->count();
        $sum_promocod_pribyl_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->where('promocod', '!=', null)->sum('pribyl');
        $kupitkursov = Kupit::where('podcat_user_id', \Auth::user()->id)->get();

        $user_vyplatys = User_vyplaty::where('user_id', \Auth::user()->id)->sum('summa');
        $tests = Test::where('user_id', \Auth::user()->id)->where('dop_category', '!=', null)->withCount('test_voprosy', 'tests_kupit')->orderBy('created_at', 'desc')->get();
        $tests_kupits = Tests_kupit::where('test_autor_id', \Auth::user()->id)->get();

        $partnerka = Partnerka::where('user_id', \Auth::user()->id)->withCount('kupitmaterialov', 'kupit', 'tests_kupit')->get();
        $part = DB::table('partner_pribyls')->where('user_id', \Auth::user()->id)->sum('summa');

       return view('moderator/statistika', [
        'materialies' => $materialies,
        'kupitmaterialov' => $kupitmaterialov,

        'podcategories' => $podcategories,
        'kolichestvo_prodaj_kursov' => $kolichestvo_prodaj_kursov,
        'sum_pribyl_kursov' => $sum_pribyl_kursov,
        'kolichestvo_ispolzovanie_kuponov_kursov' => $kolichestvo_ispolzovanie_kuponov_kursov,
        'sum_promocod_pribyl_kursov' => $sum_promocod_pribyl_kursov,
        'kupitkursov' => $kupitkursov,

        'user_vyplatys' => $user_vyplatys,
        'tests' => $tests,
        'tests_kupits' => $tests_kupits,

        'partnerka' => $partnerka,
        'part' => $part,
        ]);
    }

    public function moderator_panel()
    {
        $materialies = Materialy::where('user_id', \Auth::user()->id)->withCount('kupitmaterialov')->orderBy('created_at', 'desc')->get();
        $kupitmaterialov = Kupitmaterialov::where('materialy_user_id', \Auth::user()->id)->get();
      
        $podcategories = Podcategory::where('user_id', \Auth::user()->id)->withCount('kupit', 'uroky', 'video', 'youtube')->orderBy('created_at', 'desc')->get();
        $kolichestvo_prodaj_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->count();
        $sum_pribyl_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->sum('pribyl');
        $kolichestvo_ispolzovanie_kuponov_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->where('promocod', '!=', null)->count();
        $sum_promocod_pribyl_kursov = Kupit::where('podcat_user_id', \Auth::user()->id)->where('promocod', '!=', null)->sum('pribyl');
        $kupitkursov = Kupit::where('podcat_user_id', \Auth::user()->id)->get();

        $user_vyplatys = User_vyplaty::where('user_id', \Auth::user()->id)->sum('summa');
        $tests = Test::where('user_id', \Auth::user()->id)->where('dop_category', '!=', null)->withCount('test_voprosy', 'tests_kupit')->orderBy('created_at', 'desc')->get();
        $tests_kupits = Tests_kupit::where('test_autor_id', \Auth::user()->id)->get();

        $partnerka = Partnerka::where('user_id', \Auth::user()->id)->withCount('kupitmaterialov', 'kupit', 'tests_kupit')->get();
        $part = DB::table('partner_pribyls')->where('user_id', \Auth::user()->id)->sum('summa');

       return view('moderator/moderator_index', [
        'materialies' => $materialies,
        'kupitmaterialov' => $kupitmaterialov,

        'podcategories' => $podcategories,
        'kolichestvo_prodaj_kursov' => $kolichestvo_prodaj_kursov,
        'sum_pribyl_kursov' => $sum_pribyl_kursov,
        'kolichestvo_ispolzovanie_kuponov_kursov' => $kolichestvo_ispolzovanie_kuponov_kursov,
        'sum_promocod_pribyl_kursov' => $sum_promocod_pribyl_kursov,
        'kupitkursov' => $kupitkursov,

        'user_vyplatys' => $user_vyplatys,
        'tests' => $tests,
        'tests_kupits' => $tests_kupits,

        'partnerka' => $partnerka,
        'part' => $part,
        ]);
    }



    public function moderator_statistika_otdelno($id)
    {
        $materialy = Materialy::where('id', $id)->withCount('kupitmaterialov')->first();
        $kolichestvo_prodaj = Kupitmaterialov::where('materialy_id', $id)->count();
        $sum_pribyl = Kupitmaterialov::where('materialy_id', $id)->sum('pribyl');
        $test = null;
        $kolichestvo_ispolzovanie_kuponov = Kupitmaterialov::where('materialy_id', $id)->where('promocod', $test)->count();
        $sum_promocod_pribyl = Kupitmaterialov::where('materialy_id', $id)->where('promocod', $test)->sum('pribyl');
      
       return view('moderator/statistika_otdelno', [
        'materialy' => $materialy,
        'sum_pribyl' => $sum_pribyl,
        'kolichestvo_prodaj' => $kolichestvo_prodaj,
        'kolichestvo_ispolzovanie_kuponov' => $kolichestvo_ispolzovanie_kuponov,
        'sum_promocod_pribyl' => $sum_promocod_pribyl,
        ]);
    }


    public function moderator_statistika_otdelno_kurs($id)
    {
        $podcategory = Podcategory::where('id', $id)->withCount('kupit', 'uroky', 'video', 'youtube')->first();
        $kolichestvo_prodaj_kurs = Kupit::where('kurs_id', $id)->count();
        $sum_pribyl_kurs = Kupit::where('kurs_id', $id)->sum('pribyl');
        $test = null;
        $kolichestvo_ispolzovanie_kuponov_kurs = Kupit::where('kurs_id', $id)->where('promocod', $test)->count();
        $sum_promocod_pribyl_kurs = Kupit::where('kurs_id', $id)->where('promocod', $test)->sum('pribyl');
      
       return view('moderator/statistika_otdelno_kurs', [
        'podcategory' => $podcategory,
        'sum_pribyl_kurs' => $sum_pribyl_kurs,
        'kolichestvo_prodaj_kurs' => $kolichestvo_prodaj_kurs,
        'kolichestvo_ispolzovanie_kuponov_kurs' => $kolichestvo_ispolzovanie_kuponov_kurs,
        'sum_promocod_pribyl_kurs' => $sum_promocod_pribyl_kurs,
        ]);
    }


    public function moderator_materials_create($for_action)
    {
            $materialcategories = Materialcategory::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
            $count = Materialy::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->where('price', 0)->count();
        
        
        $materialpodcategories = Materialpodcategory::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
       
        return view('moderator/materialy_create', [
            'materialcategories' => $materialcategories,
            'materialpodcategories' => $materialpodcategories,
            'users' => $users,
            'languages' => $languages,
            'count' => $count,
            'for_action' => $for_action,
        ]);
    }





    public function moderator_materials_create_for_primaya_ssylka()
    {
        $materialcategories = Materialcategory::orderBy('created_at', 'DESC')->get();
        $materialpodcategories = Materialpodcategory::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = language::get();
        $count = Materialy::where('user_id', \Auth::user()->id)->where('price', 0)->count();

        return view('moderator/materialy_create_for_primaya_ssylka', [
            'materialcategories' => $materialcategories,
            'materialpodcategories' => $materialpodcategories,
            'users' => $users,
            'languages' => $languages,
            'count' => $count,
        ]);
    }

    public function moderator_materials_findProductName($id)
    {
        $states = Materialpodcategory::where('materialcategory_id',$id)->pluck("title", "id");
        return json_encode($states);

    }



    public function moderator_materials_store(Request $request, $for_action)
    {
        $request->validate([
            'title' => 'required',
            'opisanie' => 'required',
            'ssylka' => 'required|file|mimes:pptx,ppt,pptm,potx,potm,ppsx,ppsm,pps,pdf,docx,docm,doc,dotx,dotm,rtf,xlsx,xlsm,xls,xlsb,xltx,xltm,rar,zip,7z,tar,jpeg,png,jpg,gif,tiff,webp|max:30720',
           //'rebate_imag' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);

     /**   $count = Materialy::where('user_id', \Auth::user()->id)->where('price', 0)->count();
        if($count == 0){
            $request->validate([
                'price2' => 'required|numeric',
            ]);
        }else{
            $request->validate([
                'price2' => 'required|numeric|min:15',
            ]);
        }
        */
        if($request->hasFile('ssylka')){
            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().'.'. $file_extension;
            $file->move(\public_path('storage/files/files/'),$fileName);
        }
        $ratio = 16/9;
        $user_id = \Auth::user()->id;
        $destinationPath = 'storage/files/images/';
        $destinationPath2 = 'storage/files/thumbnail/';

        $price_mat = $request->price2 * 100;
        $materialy = new Materialy([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'materialcategory_id' => $request->materialcategory_id,
            'materialpodcategory_id' => $request->materialpodcategory_id,
            'language' => $request->language,
            'price' => $price_mat,
            'ssylka' => $fileName,
            'size' => $request->data_num,
            'type' => $request->data_num2,
            'dop_category' => $for_action,
        ]);
        $materialy->save();

        foreach($request->file('rebate_imag') as $file2){
            $file_extension2 = $file2->getClientOriginalExtension();
            $ogImage = Image::make($file2);
            $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
            $ogImage->save($destinationPath . $ogImagename);
            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
            $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage->save($destinationPath2 . $thImagename);
            $img = new Materialimgy([
                'img1' => $ogImagename,
                'img2' => $thImagename,
                'materialy_id' => $materialy->id,
            ]);
            $img->save();
        }


        return redirect()->route('moderator_materials_index', $for_action);
    }



    public function moderator_materials_store_for_primaya_ssylka(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'opisanie' => 'required',
            'primaya_ssylka' => 'required|string',
            'type' => 'required',
            'price2' => 'required',
            'rebate_imag' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
            'rebate_imag1' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
            'rebate_imag2' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);

        $ratio = 16/9;

        $destinationPath = 'storage/files/images/';
        $destinationPath2 = 'storage/files/thumbnail/';

        if($request->hasFile('rebate_imag')){
            $file2=$request->file('rebate_imag');
            $file_extension2 = $file2->getClientOriginalExtension();
            
            $ogImage = Image::make($file2);
            $ogImagename=time().'.'.$file_extension2;
            $ogImage->save($destinationPath . $ogImagename);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
            $thImagename=time().time().'.'.$file_extension2;            
            $thImage->save($destinationPath2 . $thImagename);
            }

        if($request->hasFile('rebate_imag1')){
            $file1=$request->file('rebate_imag1');
            $file_extension3 = $file1->getClientOriginalExtension();
            $ogImage1 = Image::make($file1);
            $ogImage1name=time().'.'.time().'.'.$file_extension3;
            $ogImage1->save($destinationPath . $ogImage1name);

            $thImage1=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(480,270);
            $thImage1name=time().'_'.time().'.'.$file_extension3;        
            $thImage1->save($destinationPath2 . $thImage1name);
            }

         if($request->hasFile('rebate_imag2')){
            $file3=$request->file('rebate_imag2');
            $file_extension1 = $file3->getClientOriginalExtension();
            $ogImage2 = Image::make($file3);
            $ogImage2name=time().'-'.time().'.'.$file_extension1;
            $ogImage2->save($destinationPath . $ogImage2name);

            $thImage2=$ogImage2->fit($ogImage2->width(), intval($ogImage2->width() / $ratio))->resize(480,270);
            $thImage2name=time().time().time().'.'.$file_extension1;       
            $thImage2->save($destinationPath2 . $thImage2name);
            }




        $price_mat = $request->price2 * 100;
        $materialy = new Materialy([
                'user_id' => \Auth::user()->id,
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'materialcategory_id' => $request->materialcategory_id,
                'materialpodcategory_id' => $request->materialpodcategory_id,
                'language' => $request->language,
                'price' => $price_mat,
                'size' => 0,
                'type' => $request->type,
                'primaya_ssylka' => $request->primaya_ssylka,
                'img1' => $ogImagename,
                'img2' => $ogImage1name,
                'img3' => $ogImage2name,
                'img1_1' => $thImagename,
                'img2_2' => $thImage1name,
                'img3_3' => $thImage2name,

            ]);
            $materialy->save();
        //$materialy->save();


        return redirect('moderator_panel/materialy')->withSuccess('Ваш материал успешно добавлена!');
    }



    public function moderator_materials_edit($for_action, $id)
    {
        $materialcategories = Materialcategory::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
        
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
        $materialy = Materialy::where('id', $id)->first();
        $materialimgs = Materialimgy::where('materialy_id', $id)->get();
        $materialpodcategories = Materialpodcategory::where('id', $materialy->materialpodcategory_id)->first();
        $count = Materialy::where('user_id', \Auth::user()->id)->where('price', 0)->count();
        
        return view('moderator/materialy_edit', [
            'materialcategories' => $materialcategories,
            'materialpodcategories' => $materialpodcategories,
            'users' => $users,
            'languages' => $languages,
            'materialy' => $materialy,
            'count' => $count,
            'materialimgs' => $materialimgs,
            'for_action' => $for_action,
        ]);
    }


    public function deleteimage($id){
        $materialy = Materialimgy::find($id);

        unlink('storage/files/images/'.$materialy->img1);
        unlink('storage/files/thumbnail/'.$materialy->img2);

            if($materialy->delete()){
                return response()->json(true);
            }
            else{
                return response()->json(false);
            }
    }

    public function moderator_materials_update(Request $request, Materialy $materialy, $for_action, $id)
    {

        $request->validate([
            'title' => 'required',
            'opisanie' => 'required',
            'ssylka' => 'file|mimes:pptx,ppt,pptm,potx,potm,ppsx,ppsm,pps,pdf,docx,docm,doc,dotx,dotm,rtf,xlsx,xlsm,xls,xlsb,xltx,xltm,rar,zip,7z,tar,jpeg,png,jpg,gif,tiff,webp|max:30720',
           //'rebate_imag' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);

        $materialy = Materialy::where('id', $id)->first();

        $user_id = \Auth::user()->id;

        if($request->hasFile('ssylka')){

            unlink('storage/files/files/'.$materialy->ssylka);
                
           
            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=$user_id.time().uniqid().'.'. $file_extension;
            $file->move(\public_path('storage/files/files/'),$fileName);

            $materialy = DB::table('materialies')->where('id', $id)->update([
                'ssylka' => $fileName,
                'size' => $request->data_num,
                'type'=> $request->data_num2,
            ]);
        }
    
        
        if ($request->hasFile('rebate_imag')) {
            $ratio = 16/9;
            $destinationPath = 'storage/files/images/';
            $destinationPath2 = 'storage/files/thumbnail/';

            foreach($request->file('rebate_imag') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
                $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
                $thImage->save($destinationPath2 . $thImagename);
                $img = new Materialimgy([
                    'img1' => $ogImagename,
                    'img2' => $thImagename,
                    'materialy_id' => $materialy->id,
                ]);
                $img->save();
            }
        }
        

        $price_mat = $request->price2 * 100;
        $oldprice_mat = $request->price22 * 100;
        $materialy = DB::table('materialies')->where('id', $id)->update([
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'materialcategory_id' => $request->materialcategory_id,
            'materialpodcategory_id' => $request->materialpodcategory_id,
            'language' => $request->language,
            'price' => $price_mat,
            'oldprice' =>  $oldprice_mat,
        ]);

        return redirect()->route('moderator_materials_index', $for_action)->withSuccess('Ваш материал успешно обновлена!');
    }

    

    public function moderator_materials_edit_for_primaya_ssylka($id)
    {
        $materialcategories = Materialcategory::orderBy('created_at', 'DESC')->get();
        $materialpodcategories = Materialpodcategory::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = language::get();
        $materialy = Materialy::where('id', $id)->first();

        $podcategory = Materialpodcategory::where('id', $materialy->materialpodcategory_id)->first();
        return view('moderator/materialy_edit_for_primaya_ssylka', [
            'materialcategories' => $materialcategories,
            'materialpodcategories' => $materialpodcategories,
            'users' => $users,
            'languages' => $languages,
            'materialy' => $materialy,
            'podcategory' => $podcategory,
        ]);
    }


    public function moderator_materialy_update_partnerka1(Request $request, $id)
    {

        $request->validate([
            'partnerka1' => 'required|numeric',
        ]);

        DB::table('materialies')->where('id', $id)->update([
            'partnerka' => $request->partnerka1,
        ]);
        
        return redirect()->back()->withSuccess('Поздравляем, материал участвует в партнерской программе.');
    }

    public function moderator_materialy_update_partnerka2(Request $request, $id)
    {

        $request->validate([
            'partnerka2' => 'required|numeric',
        ]);

        DB::table('materialies')->where('id', $id)->update([
            'partnerka' => $request->partnerka2,
        ]);
        
        return redirect()->back()->withSuccess2('Теперь материал не участвует в партнерской программе.');
    }

    public function moderator_materialy_update_price(Request $request, $id)
    {

        $request->validate([
            'price' => 'required|numeric',
        ]);

        $newprice = $request->price * 100;

        DB::table('materialies')->where('id', $id)->update([
            'price' => $newprice,
        ]);
        
        return redirect()->back()->withSuccess('Материалдын баасы өзгөрдү');
    }

     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        $materialcategories = Materialcategory::orderBy('created_at', 'DESC')->get();
        $materialpodcategories = Materialpodcategory::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = language::orderBy('created_at', 'DESC')->get();
        

        return view('admin.materials.create', [
            'materialcategories' => $materialcategories,
            'materialpodcategories' => $materialpodcategories,
            'users' => $users,
            'languages' => $languages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'opisanie' => 'required',
            'price2' => 'required',
            'ssylka' => 'required',
            'rebate_imag' => 'required',
            'rebate_imag1' => 'required',
            'rebate_imag2' => 'required',
        ]);
        $ratio = 16/9;
        $originalPath = 'storage/files/images/';
        $thumbnailPath = 'storage/files/thumbnail/';


        if($request->hasFile('ssylka')){
            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().'.'. $file_extension;
            $file->move(\public_path('storage/files/files/'),$fileName);
        }


        if($request->hasFile('rebate_imag')){
            $file2=$request->file('rebate_imag');
            $file_extension2 = $file2->getClientOriginalExtension();
            
            $ogImage = Image::make($file2);
            $ogImagename=$originalPath.time().'.'.$file_extension2;
            $ogImage->save($ogImagename);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
            $thImagename=$thumbnailPath.time().time().'.'.$file_extension2;            
            $thImage->save($thImagename);
        }

        if($request->hasFile('rebate_imag1')){
            $file1=$request->file('rebate_imag1');
            $file_extension3 = $file1->getClientOriginalExtension();
            
            $ogImage1 = Image::make($file1);
            $ogImage1name=$originalPath.time().'.'.$file_extension3;
            $ogImage1->save($ogImage1name);

            $thImage1=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(480,270);
            $thImage1name=$thumbnailPath.time().'_'.time().'.'.$file_extension3;
            $thImage1->save($thImage1name);
        }

        if($request->hasFile('rebate_imag2')){
            $file3=$request->file('rebate_imag2');
            $file_extension3 = $file3->getClientOriginalExtension();
            
            $ogImage2 = Image::make($file3);
            $ogImage2name=$originalPath.time().time().'.'.$file_extension3;
            $ogImage2->save($ogImage2name);

            $thImage2=$ogImage2->fit($ogImage2->width(), intval($ogImage2->width() / $ratio))->resize(480,270);
            $thImage2name=$thumbnailPath.time().time().time().'.'.$file_extension3;
            $thImage2->save($thImage2name);
        }



        $materialy = new Materialy([
                'user_id' => \Auth::user()->id,
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'materialcategory_id' => $request->materialcategory_id,
                'materialpodcategory_id' => $request->materialpodcategory_id,
                'language' => $request->language,
                'price' => $request->price2,
                'ssylka' => $fileName,
                'size' => $request->data_num,
                'type' => $request->data_num2,
                'img1' => $ogImagename,
                'img2' => $ogImage1name,
                'img3' => $ogImage2name,
                'img1_1' => $thImagename,
                'img2_2' => $thImage1name,
                'img3_3' => $thImage2name,

            ]);
            $materialy->save();
        //$materialy->save();


        return redirect('admin_panel/materialy')->withSuccess('Ваш материал успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materialy  $materialy
     * @return \Illuminate\Http\Response
     */
    public function show(Materialy $materialy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materialy  $materialy
     * @return \Illuminate\Http\Response
     */
    public function edit(Materialy $materialy)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materialy  $materialy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materialy $materialy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materialy  $materialy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materialy $materialy)
    {
        
        $materialy->delete();
        return redirect()->back()->withSuccess('Материал была успешно удалена!');
    }
}