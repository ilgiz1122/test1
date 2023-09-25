<?php

namespace App\Http\Controllers;

use App\Models\Vitrina;
use App\Models\Vitrina_img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vitrina_category;
use App\Models\Vitrina_podcategory;
use App\Models\User; // добавлена для связи с подкатегориями
use App\Models\language; // добавлена для связи с подкатегориями
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use App\Models\Vitrina_dop_info;

class VitrinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vitrina($for_action)
    {
        $vitrinas = Vitrina::where('status_moderator', 1)->where('dop_category', $for_action)->orderBy('created_at', 'desc')->paginate(12);
        $vitrinaimgs = Vitrina_img::get();

        foreach($vitrinas as $vitrina){
            DB::table('vitrinas')->where('id', $vitrina->id)->increment('view', 1);
        }

        return view('pajes.vitrina', [
        'vitrinas' => $vitrinas,
        'vitrinaimgs' => $vitrinaimgs,
        'for_action' => $for_action,
       ]);
    }

    public function vitrina_one($for_action, $vitrina_id)
    {
        //DB::table('vitrinas')->where('id', $vitrina_id)->increment('view', 1);
        $vitrina = Vitrina::where('id', $vitrina_id)->where('status_moderator', 1)->where('dop_category', $for_action)->first();
        $vitrinaimgs = Vitrina_img::where('vitrina_id', $vitrina_id)->get();
        $vitrina_dop_infos = Vitrina_dop_info::where('vitrina_id', $vitrina_id)->get();


        return view('pajes.vitrina_one', [
        'vitrina' => $vitrina,
        'vitrinaimgs' => $vitrinaimgs,
        'vitrina_dop_infos' => $vitrina_dop_infos,
        'for_action' => $for_action,
       ]);
    }

 


    public function moderator_vitrina_index($for_action)
    {
        $vitrinas = Vitrina::where('user_id', \Auth::user()->id)->where('dop_category', $for_action)->orderBy('created_at', 'desc')->get();
        $vitrinaimgs = Vitrina_img::where('user_id', \Auth::user()->id)->get();

       return view('moderator.vitrina', [
        'vitrinas' => $vitrinas,
        'vitrinaimgs' => $vitrinaimgs,
        'for_action' => $for_action,
       ]);
    }

    public function moderator_vitrina_create($for_action)
    {
        $vitrina_category = Vitrina_category::where('dop_category', $for_action)->orderBy('created_at', 'desc')->get();
        $languages = DB::table('languages')->get();

       return view('moderator.vitrina_create', [
        'vitrina_category' => $vitrina_category,
        'for_action' => $for_action,
        'languages' => $languages,
       ]);
    }

    public function moderator_vitrina_poluchenie_podcategorii($id)
    {
        $states = Vitrina_podcategory::where('vitrina_category_id',$id)->pluck("title", "id");
        return json_encode($states);

    }

    public function moderator_vitrina_deleteimage($id)
    {
        $vitrina = Vitrina_img::find($id);
        $vitrina_img_count = Vitrina_img::where('vitrina_id', $vitrina->vitrina_id)->count();
        if ($vitrina_img_count > 1) {
            unlink('storage/vitrina/img1/'.$vitrina->img1);
            unlink('storage/vitrina/img2/'.$vitrina->img2);

                if($vitrina->delete()){
                    return response()->json(true);
                }
                else{
                    return response()->json(false);
                }
        }else{
            return redirect()->back()->withSuccess('Акыркы сүрөттү өчүрүүгө болбойт!');
            //return response()->json(false)->withSuccess('Акыркы сүрөттү өчүрүүгө болбойт!');
        }
    }

    public function moderator_vitrina_deletefile($id)
    {
            $vitrina = Vitrina::find($id);
            unlink('storage/vitrina/demofile/'.$vitrina->demofile);

            DB::table('vitrinas')->where('id', $id)->update([
                'demofile' => NULL,
            ]);
            return response()->json(true);
    }


    public function moderator_vitrina_store(Request $request, $for_action)
    {
        $request->validate([
            'title' => 'required',
            'opisanie' => 'required',
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
        if($request->hasFile('demofile')){
            $request->validate([
                'demofile' => 'required|file|mimes:pptx,ppt,pptm,potx,potm,ppsx,ppsm,pps,pdf,docx,docm,doc,dotx,dotm,rtf,xlsx,xlsm,xls,xlsb,xltx,xltm,rar,zip,7z,tar,jpeg,png,jpg,gif,tiff,webp|max:30720',
            ]);
            $file=$request->file('demofile');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=$user_id.uniqid().rand(1, 1000).time().'.'. $file_extension;
            $file->move(\public_path('storage/vitrina/demofile/'),$fileName);
        }else{
            $fileName=NULL;
        }
        $ratio = 16/9;
        $destinationPath = 'storage/vitrina/img1/';
        $destinationPath2 = 'storage/vitrina/img2/';

        $price_mat = $request->price * 100;

        $vitrina = new Vitrina([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'vitrina_category_id' => $request->vitrina_category_id,
            'vitrina_podcategory_id' => $request->vitrina_podcategory_id,
            'dop_category' => $for_action,
            'language' => $request->language,
            'price' => $price_mat,
            'status_admin' => 1,
            'demofile' => $fileName,
            'youtube' => $request->youtube,
            'phone_for_zvonok' => $nomer1,
            'phone_for_whatsapp' => $nomer2,
            'telegram' => $request->telegram,
            'type_dostavki' => $request->type_dostavki,
        ]);
        $vitrina->save();


        if($request->has('adres_dostavki'))
        {
            $files2 = $request->adres_dostavki;
            foreach($files2 as $file2)
            {
                $request['vitrina_id'] = $vitrina->id;
                $request['type_info'] = 0;
                $request['info'] = $file2;
                Vitrina_dop_info::create($request->all());
            }
        }

        foreach($request->file('img') as $file2){
            $file_extension2 = $file2->getClientOriginalExtension();
            $ogImage = Image::make($file2);
            $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
            $ogImage->save($destinationPath . $ogImagename);
            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
            $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage->save($destinationPath2 . $thImagename);
            $img = new Vitrina_img([
                'user_id' => \Auth::user()->id,
                'img1' => $ogImagename,
                'img2' => $thImagename,
                'vitrina_id' => $vitrina->id,
            ]);
            $img->save();
        }

        return redirect()->route('moderator_vitrina_index', $for_action)->withSuccess('Реклама ийгиликтүү сакталды');
    }


    public function moderator_vitrina_update(Request $request, $for_action, $id)
    {
        $request->validate([
            'title' => 'required',
            'opisanie' => 'required',
           //'rebate_imag' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);

        $vitrina = Vitrina::where('id', $id)->first();
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
            $telegram = NULL;
        }else{
            $telegram = $request->telegram;
        }


        $user_id = \Auth::user()->id;
        if($request->hasFile('demofile')){
            $request->validate([
                'demofile' => 'required|file|mimes:pptx,ppt,pptm,potx,potm,ppsx,ppsm,pps,pdf,docx,docm,doc,dotx,dotm,rtf,xlsx,xlsm,xls,xlsb,xltx,xltm,rar,zip,7z,tar,jpeg,png,jpg,gif,tiff,webp|max:30720',
            ]);

            if ($vitrina->demofile != null) {
                unlink('storage/vitrina/demofile/'.$vitrina->demofile);
            }
            
            $file=$request->file('demofile');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=$user_id.uniqid().rand(1, 1000).time().'.'. $file_extension;
            $file->move(\public_path('storage/vitrina/demofile/'),$fileName);
        }else{
            $fileName = $vitrina->demofile;
        }

        $ratio = 16/9;
        $destinationPath = 'storage/vitrina/img1/';
        $destinationPath2 = 'storage/vitrina/img2/';

        $price_mat = $request->price * 100;

        DB::table('vitrinas')->where('id', $id)->update([
            'title' => $request->title,
            'opisanie' => $request->opisanie,
            'vitrina_category_id' => $request->vitrina_category_id,
            'vitrina_podcategory_id' => $request->vitrina_podcategory_id,
            'language' => $request->language,
            'price' => $price_mat,
            'demofile' => $fileName,
            'youtube' => $request->youtube,
            'phone_for_zvonok' => $nomer1,
            'phone_for_whatsapp' => $nomer2,
            'telegram' => $request->telegram,
            'type_dostavki' => $request->type_dostavki,
        ]);



        if($request->has('adres_dostavki'))
        {
            $vitrina_dop_info = Vitrina_dop_info::where('vitrina_id', $id)->get();
            foreach($vitrina_dop_info as $info){
                $info->delete();
            }

            $vitrina_dop_info2 = $request->adres_dostavki;
            foreach($vitrina_dop_info2 as $info2)
            {
                $request['vitrina_id'] = $id;
                $request['type_info'] = 0;
                $request['info'] = $info2;
                Vitrina_dop_info::create($request->all());
            }
        }
        if($request->hasFile('img')){
            foreach($request->file('img') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
                $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
                $thImage->save($destinationPath2 . $thImagename);
                $img = new Vitrina_img([
                    'user_id' => \Auth::user()->id,
                    'img1' => $ogImagename,
                    'img2' => $thImagename,
                    'vitrina_id' => $id,
                ]);
                $img->save();
            }
        }

        return redirect()->route('moderator_vitrina_index', $for_action)->withSuccess('Реклама ийгиликтүү өзгөртүлдү');
    }

    public function moderator_vitrina_update_status0($id)
    {
        DB::table('vitrinas')->where('id', $id)->update([
            'status_moderator' => 0,
        ]);
        
        return redirect()->back()->withSuccess2('Реклама стал не активным');
    }

    public function moderator_vitrina_update_status1($id)
    {
        $vitrina = Vitrina::where('id', $id)->first();

        if ($vitrina->phone_for_zvonok != null) {
            DB::table('vitrinas')->where('id', $id)->update([
                'status_moderator' => 1,
            ]);
            return redirect()->back()->withSuccess('Реклама стал активным');
        }else{
            return redirect()->back()->withSuccess2('Сначало введите корректный номер телефона!');
        }

        
    
    }

    public function moderator_vitrina_update_price(Request $request, $id)
    {
        $vitrina = Vitrina::where('id', $id)->first();
        $skidka = $vitrina->price / 100 * 0.9;
        $oldprice = $vitrina->price;
        $new_price = $request->price * 100;
        if ($request->price <= $skidka) {
            DB::table('vitrinas')->where('id', $id)->update([
                'price' => $new_price,
                'oldprice' => $oldprice,
            ]);
        }else{
            DB::table('vitrinas')->where('id', $id)->update([
                'price' => $new_price,
            ]);
        }
        
        return redirect()->back()->withSuccess('Материалдын баасы өзгөрдү');
    
    }


    public function moderator_vitrina_update_phone_for_whatsapp(Request $request, $id)
    {
        $null = NULL;
        $nomer = preg_replace('~[^0-9]+~','', $request->phone_for_whatsapp);

        if (strlen($nomer) < 9) {
            DB::table('vitrinas')->where('id', $id)->update([
                'phone_for_whatsapp' => $null,
            ]);
            return redirect()->back()->withSuccess2('Введите корректный номер телефона!');
        }else{
            DB::table('vitrinas')->where('id', $id)->update([
                'phone_for_whatsapp' => $request->phone_for_whatsapp,
            ]);
            return redirect()->back()->withSuccess('WhatsApp номер изменена');
        }
    }


    public function moderator_vitrina_update_phone_for_zvonok(Request $request, $id)
    {
        $null = NULL;
        $nomer = preg_replace('~[^0-9]+~','', $request->phone_for_zvonok);

        if (strlen($nomer) < 9) {
            DB::table('vitrinas')->where('id', $id)->update([
                'phone_for_zvonok' => $null,
                'status_moderator' => 0,
            ]);
            return redirect()->back()->withSuccess2('Введите корректный номер телефона и только после этого можно активировать рекламу!');
        }else{
            DB::table('vitrinas')->where('id', $id)->update([
                'phone_for_zvonok' => $request->phone_for_zvonok,
            ]);
            return redirect()->back()->withSuccess('Телефон номер изменена');
        }
    }

    public function moderator_vitrina_edit($for_action, $id)
    {
        $vitrina = Vitrina::where('id', $id)->first();
        $vitrinaimgs = Vitrina_img::where('vitrina_id', $id)->get();
        $vitrina_category = Vitrina_category::where('dop_category', $for_action)->orderBy('created_at', 'desc')->get();
        $vitrina_podcategory = Vitrina_podcategory::where('vitrina_category_id', $vitrina->vitrina_category_id)->orderBy('created_at', 'desc')->get();
        $languages = DB::table('languages')->get();
        $vitrina_dop_info = Vitrina_dop_info::where('vitrina_id', $id)->get();

       return view('moderator.vitrina_edit', [
        'vitrina_category' => $vitrina_category,
        'vitrina_podcategory' => $vitrina_podcategory,
        'vitrina' => $vitrina,
        'vitrinaimgs' => $vitrinaimgs,
        'vitrina_dop_info' => $vitrina_dop_info,
        'languages' => $languages,
        'for_action' => $for_action,
       ]);
    }


    public function moderator_vitrina_destroy($id)
    {
        $delete = Vitrina::find($id);
        $vitrinaimgs = Vitrina_img::where('vitrina_id', $id)->get();

        foreach($vitrinaimgs as $img){
            unlink('storage/vitrina/img1/'.$img->img1);
            unlink('storage/vitrina/img2/'.$img->img2);
            $img->delete();
        }
        if ($delete->demofile != null) {
            unlink('storage/vitrina/demofile/'.$delete->demofile);
        }
        
        $delete->delete();

        return redirect()->back()->withSuccess('Реклама была успешно удалена!');
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
     * @param  \App\Models\Vitrina  $vitrina
     * @return \Illuminate\Http\Response
     */
    public function show(Vitrina $vitrina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitrina  $vitrina
     * @return \Illuminate\Http\Response
     */
    public function edit(Vitrina $vitrina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vitrina  $vitrina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vitrina $vitrina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitrina  $vitrina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitrina $vitrina)
    {
        //
    }
}
