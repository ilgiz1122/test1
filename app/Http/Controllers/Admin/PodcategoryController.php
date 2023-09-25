<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcategory;
use App\Models\Category; // добавлена для связи с категориями
use Illuminate\Http\Request;
use App\Models\Kupit; // добавлена для связи с категориями
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Uroky;
use App\Models\language; // добавлена для связи с подкатегориями
use App\Models\Materialpodcategory; // добавлена для связи с подкатегориями
use App\Models\Materialcategory; // добавлена для связи с подкатегориями

use App\Models\Vidy_partnerkas;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;

use App\Models\Gods;
use App\Models\Mounths;
use App\Models\Days;
use App\Models\Hours;
use App\Models\Minutes;
use App\Models\Moderator_function;
use App\Models\Code_vhoda;

class PodcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcategories = Podcategory::orderBy('created_at', 'desc')->get();
      
       return view('admin.podcategory.index', [
        'podcategories' => $podcategories,
        
        
       ]);
    }

    public function moderator_kurs_index()
    {
        $podcategories = Podcategory::where('user_id', \Auth::user()->id)->withCount('kupit', 'uroky')->orderBy('created_at', 'desc')->get();
        $kol = Podcategory::where('user_id', \Auth::user()->id)->count();
        $gods = Gods::orderBy('god')->get();
        $mounths = Mounths::orderBy('mounth')->get();
        $days = Days::orderBy('day')->get();
        $hours = Hours::orderBy('hour')->get();
        $minutes = Minutes::orderBy('minute')->get();

       return view('moderator.kursy', [
        'podcategories' => $podcategories,
        'kol' => $kol,
        'gods' => $gods,
        'mounths' => $mounths,
        'days' => $days,
        'hours' => $hours,
        'minutes' => $minutes,
       ]);
    }

    public function admin_kurs_moderators_settings()
    {
        $moderators = User::where('for_role', 3)->orderBy('created_at', 'desc')->get();
        $moderators_function = Moderator_function::get();

       return view('admin.kurs.kurs_moderator_settings', [
        'moderators' => $moderators,
        'moderators_function' => $moderators_function,
       ]);
    }

    
    


    public function admin_kurs_moderators_settings_plus($user_id)
    {
        $moderator = Moderator_function::where('user_id', $user_id)->first();

        if ($moderator != null) {
            DB::table('moderator_functions')->where('id', $moderator->id)->update([
                'kurs_plus_code' => 1,           
            ]);
        }else{
            $moderators_plus = new Moderator_function([
                'user_id' => $user_id,
                'kurs_plus_code' => 1,
            ]);
            $moderators_plus->save();
        }

        // default = 0 
        // 1 = Курска коддорду бекер кошо алат
        // 0 = Курска коддорду өзүнун эсебинен кошо алат 
       return redirect()->back()->withSuccess('Бекер кошуу мүмкүнчүлүгүн алды');
    }

    public function admin_kurs_moderators_settings_minus($user_id)
    {
        $moderator = Moderator_function::where('user_id', $user_id)->first();

        DB::table('moderator_functions')->where('id', $moderator->id)->update([
                'kurs_plus_code' => 0,           
            ]);

        // default = 0 
        // 1 = Курска коддорду бекер кошо алат
        // 0 = Курска коддорду өзүнун эсебинен кошо алат 
       return redirect()->back()->withSuccess('Бекер кошуу мүмкүнчүлүгүнөн айрылды');
    }


    public function moderator_kurs_code($kurs_id)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->where('user_id', \Auth::user()->id)->first();

        if ($podcategory != null) {
            $moderator_function = Moderator_function::where('user_id', \Auth::user()->id)->first();
            $code_vhods = Code_vhoda::where('product_id', $kurs_id)->where('type', 1)->orderBy('created_at', 'asc')->get();
            $kupits = Kupit::where('kurs_id', $kurs_id)->orderBy('created_at', 'desc')->get();

            return view('moderator.kurs_code', [
            'podcategory' => $podcategory,
            'code_vhods' => $code_vhods,
            'kupits' => $kupits,
            'moderator_function' => $moderator_function,
           ]); 
        }else{
            return redirect()->back()->withSuccess2('Некорректный запрос');
        }     
    }



    public function kurs_code_proverka($kurs_id, Request $request)
    {
        $proverka = Code_vhoda::where('product_id', $kurs_id)->where('text_coda', $request->code)->first();
        $podcategories = Podcategory::where('id', $kurs_id)->first();
        $com = 0.8;
        $com2 = 0.2;
        $newprice = $podcategories->price * $com;
        $newprice2 = $podcategories->price * $com2;

        if ($podcategories->price > 0) {
            if ($proverka->status == 0) {
                DB::table('code_vhodas')->where('id', $proverka->id)->update([
                    'status' => 2,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'user_id' => \Auth::user()->id,
                    'colichestvo_view' => 1,
                    'product_price' => $podcategories->price,
                    'summa_komissii_sistemy' => $newprice2,
                ]);

                $test = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$kurs_id)->first();
                if($test != null){
                    DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$kurs_id)->update([
                        'proverka' => 0,
                    ]);
                }
                $kupits = new Kupit();
                $kupits->user_id = \Auth::user()->id;
                $kupits->user_name = \Auth::user()->name;
                $kupits->kurs_id = $kurs_id;
                $kupits->kurs_title = $podcategories->title;
                $kupits->price = $podcategories->price;
                $kupits->proverka = \Auth::user()->id.'-'.$kurs_id;
                $kupits->podcat_user_id = $podcategories->user_id;
                $kupits->pribyl = $newprice;
                $kupits->time = time();
                $kupits->srok_dostupa = $podcategories->srok_dostupa;
                $kupits->save();

                return redirect()->route('kurs', $podcategories->id)->withSuccess('Куттуктайбыз, эми сиз көрө аласыз.');
            }

            if ($proverka->status == 1) {
                DB::table('code_vhodas')->where('id', $proverka->id)->update([
                    'status' => 2,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'user_id' => \Auth::user()->id,
                    'colichestvo_view' => 1,
                    'product_price' => $podcategories->price,
                    'summa_komissii_sistemy' => $newprice2,    
                ]);
                
                $test = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$kurs_id)->first();
                if($test != null){
                    DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$kurs_id)->update([
                        'proverka' => 0,
                    ]);
                }
                $kupits = new Kupit();
                $kupits->user_id = \Auth::user()->id;
                $kupits->user_name = \Auth::user()->name;
                $kupits->kurs_id = $kurs_id;
                $kupits->kurs_title = $podcategories->title;
                $kupits->price = $podcategories->price;
                $kupits->proverka = \Auth::user()->id.'-'.$kurs_id;
                $kupits->podcat_user_id = $podcategories->user_id;
                $kupits->pribyl = $newprice;
                $kupits->time = time();
                $kupits->srok_dostupa = $podcategories->srok_dostupa;
                $kupits->save();

                return redirect()->route('kurs', $podcategories->id)->withSuccess('Куттуктайбыз, эми сиз көрө аласыз.');
            }

            if ($proverka->status == 2) {
                return redirect()->back()->withSuccess2('Бул код мурда колдонулган!');
            }
        }else{
            return redirect()->back()->withSuccess('Бул курс бекер');
        }

        

    }



    public function moderator_kurs_code_cheked($kurs_id)
    {
        $code_vhods = Code_vhoda::where('id', $kurs_id)->first();

        DB::table('code_vhodas')->where('id', $kurs_id)->update([
                'status' => 1,           
            ]);
        

        return response()->json(true);
    }


    
    public function moderator_kursy_code_store($kurs_id, Request $request)
    {
        $podcategory = Podcategory::where('id', $kurs_id)->where('user_id', \Auth::user()->id)->first();

        if ($podcategory != null) {
            if(\Auth::user()->for_role == 2){
                $code_count = Code_vhoda::where('product_id', $kurs_id)->count();                
                $kol1 = $request->kol;

                $i = 1;
                while ($i <= $kol1) {
                    $str = 'DFGIJLNQRSUVWZ12345678911112131415161718192212223242526272829DFGIJLNQRSUVWZ';
                    $shuffled = str_shuffle($str);
                    $shuffled = substr($shuffled,1,5);
                    $res1 = $code_count + $i++;
                    $res33 = $podcategory->id;
                    $res2 = $res1.$res33.$shuffled;

                    $request['avtor_id']=\Auth::user()->id;
                    $request['type']=1;
                    $request['text_coda']=$res2;
                    $request['product_id']=$kurs_id;

                    $request['colichestvo_ispolzovanie']=1;
                    $request['product_price']=$podcategory->price;
                    $request['summa_komissii_sistemy']=NULL;
                    Code_vhoda::create($request->all());
                }
                return redirect()->back()->withSuccess('Кошулду');
            }

            if(\Auth::user()->for_role == 3){
                $moderator_function = Moderator_function::where('user_id', \Auth::user()->id)->first();

                if ($moderator_function->kurs_plus_code == 1) {
                    $code_count = Code_vhoda::where('product_id', $kurs_id)->count();                
                    $kol1 = $request->kol;

                    $i = 1;
                    while ($i <= $kol1) {
                        $str = 'DFGIJLNQRSUVWZ12345678911112131415161718192212223242526272829DFGIJLNQRSUVWZ';
                        $shuffled = str_shuffle($str);
                        $shuffled = substr($shuffled,1,5);
                        $res1 = $code_count + $i++;
                        $res33 = $podcategory->id;
                        $res2 = $res1.$res33.$shuffled;

                        $request['avtor_id']=\Auth::user()->id;
                        $request['type']=1;
                        $request['text_coda']=$res2;
                        $request['product_id']=$kurs_id;

                        $request['colichestvo_ispolzovanie']=1;
                        $request['product_price']=$podcategory->price;
                        $request['summa_komissii_sistemy']=NULL;
                        Code_vhoda::create($request->all());
                    }
                    return redirect()->back()->withSuccess('Кошулду');
                }else{
                    return redirect()->back()->withSuccess2('Некорректный запрос');
                }
            }
        }else{
            return redirect()->back()->withSuccess2('Некорректный запрос');
        }     
    }

     public function index2($categoryId)
    {
        $test = 1;
        $podcategories = Podcategory::where('status', $test)->withCount('uroky', 'kupit')->latest();
        $category = Category::where('id', $categoryId)->first();
        $role = 1;
        
        
        if ($categoryId) {
            $podcategories->where('cat_id', $categoryId);
        }

       return view('pajes/podcat', [
        'category' => $category,
        'podcategories' => $podcategories->paginate(16),
        'role' => $role,
       ]);
    }

     public function moderator_user_id_kurs($user_id)
    {
        $test = 1;
        $podcategories = Podcategory::where('user_id', $user_id)->where('status', $test)->withCount('uroky', 'kupit')->paginate(16);
        $moderator = User::where('id', $user_id)->select('id', 'name', 'f_fio', 'i_fio', 'o_fio')->first();
        $role = 2;

       return view('pajes/podcat', [
        'podcategories' => $podcategories,
        'role' => $role,
        'moderator' => $moderator,
       ]);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.podcategory.create', [
            'categories' => $categories
        ]);
    }

    public function moderator_kursy_create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
        $partnerka = Vidy_partnerkas::get();

        return view('moderator/kursy_create', [
            'categories' => $categories,
            'users' => $users,
            'languages' => $languages,
            'partnerka' => $partnerka,
        ]);
    }


    public function moderator_kursy_edit($id)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->get();
        $languages = DB::table('languages')->get();
        $partnerka = Vidy_partnerkas::get();
        $podcategories = Podcategory::where('id', $id)->withCount('kupit', 'uroky')->first();

        return view('moderator/kursy_edit', [
            'categories' => $categories,
            'users' => $users,
            'languages' => $languages,
            'partnerka' => $partnerka,
            'podcategories' => $podcategories,
        ]);
    }

    public function moderator_kursy_store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'price2' => 'required|numeric',
            'materialcategory_id' => 'required|numeric',
            'language' => 'required|numeric',
            'ssylka' => 'mimes:mp4,mpg,mpeg,wmv,mov,avi,ogg,qt|max:30720',
            'rebate_imag' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);
        $ratio = 16/9;
        if($request->hasFile('ssylka')){
            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/reklamnoevideo/'),$fileName);



            if($request->hasFile('rebate_imag')){
            $file2=$request->file('rebate_imag');
            $file_extension2 = $file2->getClientOriginalExtension();
            $destinationPath = 'storage/kursy/images/thumbnail/';
            $ogImage = Image::make($file2);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().time().'.'.$file_extension2;            
            $thImage->save($destinationPath . $thImagename);
            }

            $price_mat = $request->price2 * 100;
            $podcategory = new Podcategory();
            $podcategory->user_id = \Auth::user()->id;
            $podcategory->title = $request->title;
            $podcategory->opisanie = $request->opisanie;
            $podcategory->cat_id = $request->materialcategory_id;
            $podcategory->language = $request->language;
            $podcategory->price = $price_mat;
            $podcategory->img = $thImagename;
            $podcategory->video = $fileName;
            $podcategory->save();
        }
        else{
            if($request->hasFile('rebate_imag')){
            $file2=$request->file('rebate_imag');
            $file_extension2 = $file2->getClientOriginalExtension();
            $destinationPath = 'storage/kursy/images/thumbnail/';
            $ogImage = Image::make($file2);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().time().'.'.$file_extension2;            
            $thImage->save($destinationPath . $thImagename);
            }

            $price_mat = $request->price2 * 100;
            $podcategory = new Podcategory();
            $podcategory->user_id = \Auth::user()->id;
            $podcategory->title = $request->title;
            $podcategory->opisanie = $request->opisanie;
            $podcategory->cat_id = $request->materialcategory_id;
            $podcategory->language = $request->language;
            $podcategory->price = $price_mat;
            $podcategory->img = $thImagename;
            $podcategory->youtube_video = $request->youtube_video;
            $podcategory->save();
        }
        


        return redirect('moderator_panel/kursy')->withSuccess('Ваш курс успешно добавлена!');
    }


    public function moderator_kursy_update(Request $request, Podcategory $podcategory, $id)
    {

        $request->validate([
            'title' => 'required|string',
            'opisanie' => 'required|string',
            'price2' => 'required|numeric',
            'price22' => 'numeric',
            'materialcategory_id' => 'required|numeric',
            'language' => 'required|numeric',
            'ssylka' => 'mimes:mp4,mpg,mpeg,wmv,mov,avi,ogg,qt|max:30720',
            'rebate_imag' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);
        $ratio = 16/9;
        $podcategory = Podcategory::where('id', $id)->first();

        if($request->hasFile('ssylka')){
            if ($podcategory->youtube_video != null){
                DB::table('podcategories')->where('id', $id)->update([
                    'youtube_video' => NULL,
                ]);
            }
            if ($podcategory->video != null){
                unlink('storage/kursy/reklamnoevideo/'.$podcategory->video);
            }

            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/reklamnoevideo/'),$fileName);

            DB::table('podcategories')->where('id', $id)->update([
                'video' => $fileName,
            ]);
        }

        if ($request->has('youtube_video')){
            if ($podcategory->video != null){
                unlink('storage/kursy/reklamnoevideo/'.$podcategory->video);
                DB::table('podcategories')->where('id', $id)->update([
                    'video' => NULL,
                ]);
            }
            DB::table('podcategories')->where('id', $id)->update([
                'youtube_video' => $request->youtube_video,
            ]);
        }


        if($request->hasFile('rebate_imag')){

            unlink('storage/kursy/images/thumbnail/'.$podcategory->img);
            $file2=$request->file('rebate_imag');
            $file_extension2 = $file2->getClientOriginalExtension();
            $destinationPath = 'storage/kursy/images/thumbnail/';
            $ogImage = Image::make($file2);

            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().time().'.'.$file_extension2;            
            $thImage->save($destinationPath . $thImagename);

            DB::table('podcategories')->where('id', $id)->update([
                'img' => $thImagename,
            ]);
        }

        $price_mat = $request->price2 * 100;
        $oldprice_mat = $request->price22 * 100;
        $podcategory = DB::table('podcategories')->where('id', $id)->update([
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'cat_id' => $request->materialcategory_id,
            'language' => $request->language,
            'price' => $price_mat,
            'oldprice' =>  $oldprice_mat,
        ]);
        
        return redirect('moderator_panel/kursy')->withSuccess('Ваш курс успешно обновлена!');
    }

    public function moderator_kursy_update_contact1($kurs_id, Request $request)
    {
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

        if (strlen($request->telegram) < 5) {
            $nomer3 = NULL;
        }else{
            $nomer3 = $request->telegram;
        }

        $podcategory = Podcategory::where('user_id', \Auth::user()->id)->where('id', $kurs_id)->first();

        if ($request->col_modulei < $podcategory->col_modulei) {
            $uroky = Uroky::where('user_id', \Auth::user()->id)->where('podcat_id', $kurs_id)->where('modul_number', '>', $request->col_modulei)->get();
            foreach($uroky as $urok)
            {
                DB::table('urokies')->where('id', $urok->id)->update([
                   'modul_number' => $request->col_modulei,
                ]);
            }
        }

        if($request->otuu_ykmasy == 3){
            if ($podcategory->procent_perehoda != null) {
                DB::table('podcategories')->where('user_id', \Auth::user()->id)->where('id', $kurs_id)->update([
                    'phone_for_zvonok' => $nomer1,
                    'phone_for_whatsapp' => $nomer2,
                    'telegram' => $nomer3,
                    'col_modulei' => $request->col_modulei,
                    'otuu_ykmasy' => $request->otuu_ykmasy,
                ]);
            }else{
                DB::table('podcategories')->where('user_id', \Auth::user()->id)->where('id', $kurs_id)->update([
                    'phone_for_zvonok' => $nomer1,
                    'phone_for_whatsapp' => $nomer2,
                    'telegram' => $nomer3,
                    'col_modulei' => $request->col_modulei,
                    'otuu_ykmasy' => $request->otuu_ykmasy,
                    'procent_perehoda' => 50,
                ]);
            }
        }else{
            DB::table('podcategories')->where('user_id', \Auth::user()->id)->where('id', $kurs_id)->update([
                'phone_for_zvonok' => $nomer1,
                'phone_for_whatsapp' => $nomer2,
                'telegram' => $nomer3,
                'col_modulei' => $request->col_modulei,
                'otuu_ykmasy' => $request->otuu_ykmasy,
                'procent_perehoda' => NULL,
            ]);
        }
       return redirect()->back()->withSuccess('Маалымат өзгөртүлдү');
    }


    public function moderator_kursy_update_status1(Request $request, Podcategory $podcategory, $podcatId, $podcatcatId)
    {
        $urokies = Uroky::where('podcat_id', $podcatId)->count();

        if ($urokies > 0){
            $request->validate([
            'status' => 'required|numeric',
        ]);
        $podcategory = Podcategory::where('id', $podcatId)->first();
        $podcategory = DB::table('podcategories')->where('id', $podcatId)->update([
            'status' => $request->status,
        ]);

        
        DB::table('categories')->where('id', $podcatcatId)->increment('kol_podcategories', 1);
        
        return redirect()->back()->withSuccess('Поздравляем, курс стал активным.');
        }
        else{
            return redirect()->back()->withSuccess2('Сначала добавьте хотя бы один урок!');
        }
    }

        
    public function moderator_kursy_update_status2(Request $request, Podcategory $podcategory, $podcatId, $podcatcatId)
    {

        $request->validate([
            'status2' => 'required|numeric',
        ]);
        $podcategory = Podcategory::where('id', $podcatId)->first();
        $podcategory = DB::table('podcategories')->where('id', $podcatId)->update([
            'status' => $request->status2,
        ]);


        DB::table('categories')->where('id', $podcatcatId)->decrement('kol_podcategories', 1);
        
        return redirect()->back()->withSuccess2('Курс стал не активным.');
    }

    public function moderator_kursy_update_partnerka1(Request $request, Podcategory $podcategory, $id)
    {

        $request->validate([
            'partnerka1' => 'required|numeric',
        ]);
        $podcategory = Podcategory::where('id', $id)->first();
        $podcategory = DB::table('podcategories')->where('id', $id)->update([
            'partnerka' => $request->partnerka1,
        ]);
        
        return redirect()->back()->withSuccess('Поздравляем, курс участвует в партнерской программе.');
    }

    public function moderator_kursy_update_partnerka2(Request $request, Podcategory $podcategory, $id)
    {

        $request->validate([
            'partnerka2' => 'required|numeric',
        ]);
        $podcategory = Podcategory::where('id', $id)->first();
        $podcategory = DB::table('podcategories')->where('id', $id)->update([
            'partnerka' => $request->partnerka2,
        ]);
        
        return redirect()->back()->withSuccess2('Теперь курс не участвует в партнерской программе.');
    }

    public function moderator_kursy_update_srok_dostup1(Request $request, Podcategory $podcategory, $id)
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

        DB::table('podcategories')->where('id', $id)->update([
            'srok_dostupa' => $srok_dostupa,
        ]);
        
        return redirect()->back()->withSuccess('Срок доступа изменена на определенное время.');
    }

    public function moderator_kursy_update_srok_dostup2(Request $request, Podcategory $podcategory, $id)
    {
        $srok_dostupa = 0;
        DB::table('podcategories')->where('id', $id)->update([
            'srok_dostupa' => $srok_dostupa,
        ]);
        
        return redirect()->back()->withSuccess('Срок доступа изменена на бессрочное время.');
    }

    public function moderator_kursy_update_price(Request $request, Podcategory $podcategory, $id)
    {

        $request->validate([
            'price2' => 'required|numeric',
        ]);
        $price_mat = $request->price2 * 100;
        $podcategory = Podcategory::where('id', $id)->first();
        $podcategory = DB::table('podcategories')->where('id', $id)->update([
            'price' => $price_mat,
        ]);
        
        return redirect()->back()->withSuccess('Цена курса успешно обновлена.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $podcategory = new Podcategory();
        $podcategory->user_id = \Auth::user()->id;
        $podcategory->title = $request->title;
        $podcategory->price = $request->price;
        $podcategory->img = $request->img;
        $podcategory->cat_id = $request->cat_id;
        $podcategory->save();

        return redirect('admin_panel/podcategory')->withSuccess('Подкатегория была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Podcategory  $podcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Podcategory $podcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Podcategory  $podcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcategory $podcategory)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.podcategory.edit', [
            'categories' => $categories,
            'podcategory' => $podcategory,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Podcategory  $podcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcategory $podcategory)
    {
        $podcategory->title = $request->title;
        $podcategory->price = $request->price;
        $podcategory->img = $request->img;
        $podcategory->cat_id = $request->cat_id;
        $podcategory->save();

        return redirect('admin_panel/podcategory')->withSuccess('Подкатегория была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Podcategory  $podcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcategory $podcategory)
    {
       $podcategory->delete();

        return redirect('admin_panel/podcategory')->withSuccess('Подкатегория была успешно удалена!');
    }


    public function moderator_kursy_destroy(Podcategory $podcategory, $id)
    {
       $proverka = Kupit::where('kurs_id', $id)->first();
        if($proverka != null){
            return redirect()->back()->withSuccess('Материал уже куплено. Вы не сможете удалить самостоятельно, свяжитесь с администратором.');
        }else{
            $delete = Podcategory::find($id);

            if ($delete->video != null){
                unlink('storage/kursy/reklamnoevideo/'.$delete->video);
            }
            unlink('storage/kursy/images/thumbnail/'.$delete->img);
            $delete->delete();

            return redirect()->back()->withSuccess('Материал была успешно удалена!');
        }
    }
}