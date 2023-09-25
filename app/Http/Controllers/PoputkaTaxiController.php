<?php

namespace App\Http\Controllers;

use App\Models\Poputka_taxi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Poputka_taxi_category;
use App\Models\Poputka_taxi_dop_info_for_taxi;
use App\Models\Poputka_taxi_img;
use App\Models\Poputka_taxi_oblast;
use App\Models\Poputka_taxi_prilojenie_menu;
use App\Models\Poputka_taxi_prilojenie_name;
use App\Models\Poputka_taxi_raion_shaar;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use App\Models\Oblast;
use App\Models\Raion_shaar;


class PoputkaTaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reklama_index_1($subdomain, $ssylka)
    {
        $prilojenie_name = Poputka_taxi_prilojenie_name::where('ssylka', $ssylka)->first();
        $regions1 = explode(",", $prilojenie_name->region_id);
        $regions2 = explode(",", $prilojenie_name->region_id_for_taksi);

        // $menus = Poputka_taxi_prilojenie_menu::where('prilojenie_name_id', $prilojenie_name->id)->where('status', 1)->pluck("poputka_taxi_category_id");
        $categorys = Poputka_taxi_category::where('id','>', '0')->orderBy('katary', 'asc')->get();

        // $reklama = Poputka_taxi::where('')
        $reklams = Poputka_taxi::with('poputka_taxi_img')->where('status', 1)
                    ->whereIn('raion', $regions1)
                    ->orWhereIn('chykkan_raion', $regions2)
                    ->orWhereIn('barchu_raion', $regions2)
                    ->orderBy('created_at', 'desc')
                    ->paginate(12);     
        
        return view('poputka_taxi.poputka_taxi_index', [
            'categorys' => $categorys,
            'prilojenie_name' => $prilojenie_name,
            'reklams' => $reklams,
            'category_id' => 0,
        ]);
    }

    public function reklama_index_2($subdomain, $ssylka, $category_id)
    {
        
        $prilojenie_name = Poputka_taxi_prilojenie_name::where('ssylka', $ssylka)->first();
        $regions1 = explode(",", $prilojenie_name->region_id);

        // $menus = Poputka_taxi_prilojenie_menu::where('prilojenie_name_id', $prilojenie_name->id)->where('status', 1)->pluck("poputka_taxi_category_id");
        $categorys = Poputka_taxi_category::where('id','>', '0')->orderBy('katary', 'asc')->get();

        if ($category_id == 6) {
            $regions2 = explode(",", $prilojenie_name->region_id_for_taksi);
            $reklams = Poputka_taxi::with('poputka_taxi_img')->where('category_id', $category_id)->where('status', 1)
                    ->WhereIn('chykkan_raion', $regions2)
                    ->orWhereIn('barchu_raion', $regions2)
                    ->orderBy('created_at', 'desc')
                    ->paginate(12);  
        }else{
            $reklams = Poputka_taxi::with('poputka_taxi_img')->where('category_id', $category_id)->where('status', 1)
                    ->whereIn('raion', $regions1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(12);  
        }
        return view('poputka_taxi.poputka_taxi_index', [
            'categorys' => $categorys,
            'prilojenie_name' => $prilojenie_name,
            'reklams' => $reklams,
            'category_id' => $category_id,
        ]);
    }


    
    public function poputka_taxi_tirkeme_jonundo($subdomain, $ssylka)
    {
        $prilojenie_name = Poputka_taxi_prilojenie_name::where('ssylka', $ssylka)->first();
   
        
        return view('poputka_taxi.poputka_taxi_tirkeme_jonundo', [
            'prilojenie_name' => $prilojenie_name,
        ]);
    }

    public function poputka_taxi_bashka_aimaktar($subdomain, $ssylka)
    {
        $prilojenie_name = Poputka_taxi_prilojenie_name::where('ssylka', $ssylka)->first();

        $bashka_aimakts = Poputka_taxi_prilojenie_name::get();
            return view('poputka_taxi.poputka_taxi_bashka_aimaktar', [
                'prilojenie_name' => $prilojenie_name,

                'bashka_aimakts' => $bashka_aimakts,
            ]);
    }


    public function popytka_taxi_admin_index($subdomain)
    {
        
        
        return view('poputka_taxi.admin.poputka_taxi_admin_index', [
        
        ]);
    }

    public function popytka_taxi_admin_create($subdomain)
    {
        $oblast_taxis = Poputka_taxi_oblast::where('id', '<', 10)->get();
        $categorys = Poputka_taxi_category::where('id', '!=', 6)->get();
        $oblasts = Oblast::where('id', '<', 10)->get();
        
        return view('poputka_taxi.admin.poputka_taxi_admin_create', [
            'oblast_taxis' => $oblast_taxis,
            'oblasts' => $oblasts,
            'categorys' => $categorys,
        ]);
    }

    
    public function jarya_koshuu($subdomain, $ssylka)
    {
        $prilojenie_name = Poputka_taxi_prilojenie_name::where('ssylka', $ssylka)->first();
        $oblast_taxis = Poputka_taxi_oblast::where('id', '<', 10)->get();
        $categorys = Poputka_taxi_category::where('id', '>', 0)->get();
        $oblasts = Oblast::where('id', '<', 10)->get();
        $taxi_raions = Poputka_taxi_raion_shaar::where('id', '>', 0)->get();
        
        return view('poputka_taxi.poputka_taxi_create', [
            'prilojenie_name' => $prilojenie_name,
            'oblast_taxis' => $oblast_taxis,
            'oblasts' => $oblasts,
            'categorys' => $categorys,
            'taxi_raions' => $taxi_raions,
        ]);
    }

    

    public function popytka_taxi_admin_create_pluse_raion2($subdomain, $oblast_id)
    {
        $states = Poputka_taxi_raion_shaar::where('poputka_taxi_oblasts_id', $oblast_id)->pluck("raion_shaar", "id");
        return json_encode($states);

    }
    public function popytka_taxi_admin_create_pluse_raion($subdomain, $oblast_id)
    {
        $states = Raion_shaar::where('oblast_id', $oblast_id)->pluck("title", "id");
        return json_encode($states);

    }

    public function file_download_2_taxi($subdomain, $id)
    {
        $reklams = Poputka_taxi_img::where('id', $id)->first();
                    
        $materialcategories2 = 'q';
            $materialpodcategories2 = 'w';
            $type = pathinfo($reklams->img_org, PATHINFO_EXTENSION); // png
        
           $file= public_path('storage/reklama/img_org//'.$reklams->img_org);
           $headers = array('Content-Type: application/'.$type,);
           return response()->download($file, $materialcategories2.'_'.$materialpodcategories2.'_'.'_0'.'_(mugalim.edu.kg)'.'.'.$type, $headers);
    }

    
    public function jarya_koshuu_store($subdomain, Request $request, $ssylka)
    {
        $prilojenie_name = Poputka_taxi_prilojenie_name::where('ssylka', $ssylka)->first();
        $user_id = 2;
        $price = $request->price * 100;
        if (\Auth::user()) {
            if (\Auth::user()->id == 2) {
                $status = 1;
            }else{
                $status = 0;
            }
        }else{
            $status = 0;
        }
        if ($request->category_1 != 6) {
            $regions1 = explode(",", $prilojenie_name->region_id);
            $raion1 = $regions1[0];
            $raion = Raion_shaar::where('id', $raion1)->first();

            $reklama = new Poputka_taxi([
                'user_id' => $user_id,
                'status' => $status,
                'price' => $price,
                'category_id' => $request->category_1,
                'oblast' => $raion->oblast_id,
                'raion' => $raion1,
                'text' => $request->maalymat,
                'phone_z' => $request->phone_z1,
                'phone_z2' => $request->phone_z2,
                'phone_w' => $request->phone_w,
                'valuta' =>$request->valuta,
            ]);
            $reklama->save();
        }else{
            $chykkan_aimak = Poputka_taxi_raion_shaar::where('id', $request->chykkan_aimak)->first();
            $barchu_aimak = Poputka_taxi_raion_shaar::where('id', $request->barchu_aimak)->first();

            $reklama = new Poputka_taxi([
                'user_id' => $user_id,
                'status' => $status,
                'price' => $price,
                'category_id' => $request->category_1,
                'text' => $request->maalymat,
                'phone_z' => $request->phone_z1,
                'phone_z2' => $request->phone_z2,
                'phone_w' => $request->phone_w,
                'chykkan_oblast' => $chykkan_aimak->poputka_taxi_oblasts_id,
                'chykkan_raion' => $request->chykkan_aimak,
                'barchu_oblast' => $barchu_aimak->poputka_taxi_oblasts_id,
                'barchu_raion' => $request->barchu_aimak,
                'valuta' =>'1',
            ]);
            $reklama->save();

            $izmen=str_replace('/','.',$request->data);
            $data = strtotime($izmen);
            $dop_info = new Poputka_taxi_dop_info_for_taxi([
                'poputka_taxi_id' => $reklama->id,
                'jolgo_chyguu_datasy' => $data,
            ]);
            $dop_info->save();
        }

        if ($request->hasFile('rebate_image')) {
            $ratio = 16/9;
            $destinationPath1 = 'storage/reklama/img/';
            $destinationPath2 = 'storage/reklama/img_org/';
    
            foreach($request->file('rebate_image') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath2 . $ogImagename);
                $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
                $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
                $thImage->save($destinationPath1 . $thImagename);
                $img = new Poputka_taxi_img([
                    'category_id' => $request->category_1,
                    'poputka_taxi_id' => $reklama->id,
                    'img_org' => $ogImagename,
                    'img' => $thImagename,
                ]);
                $img->save();
            }
        }
        return redirect()->route('reklama_index_1', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka])->withSuccess('Жарнама модератордун кароосуна жөнөтүлдү');
    }

    public function reklama_store($subdomain, Request $request, $dop_role)
    {
        $user_id = \Auth::user()->id;

        $price = intval(substr($request->price,0,-4)) * 100;
        $phone_z = $request->phone_z;
        $phone_w = $request->phone_w;
        $phone_t = $request->phone_t;
        $sait = $request->sait;
        if ($dop_role != 1) {
            $cat = 6;
        }else{
            $cat = $request->category;
        }

        if ($dop_role != 1) {
            $reklama = new Poputka_taxi([
                'user_id' => $user_id,
                'status' => '1',
                'price' => $price,
                'category_id' => $cat,
                'text' => $request->maalymat,
                'phone_z' => $phone_z,
                'phone_w' => $phone_w,
                'phone_t' => $phone_t,
                'chykkan_oblast' => $request->oblast_taxi_1,
                'chykkan_raion' => $request->raion_taxi_1,
                'barchu_oblast' => $request->oblast_taxi_2,
                'barchu_raion' => $request->raion_taxi_2,
            ]);
            $reklama->save();


            $izmen=str_replace('/','.',$request->data);
            $data = strtotime($izmen);
            $dop_info = new Poputka_taxi_dop_info_for_taxi([
                'poputka_taxi_id' => $reklama->id,
                'jolgo_chyguu_datasy' => $data,
            ]);
            $dop_info->save();
        }else{
            $reklama = new Poputka_taxi([
                'user_id' => $user_id,
                'status' => '1',
                'price' => $price,
                'category_id' => $cat,
                'oblast' => $request->oblast,
                'raion' => $request->raion,
                'text' => $request->maalymat,
                'phone_z' => $phone_z,
                'phone_w' => $phone_w,
                'phone_t' => $phone_t,
                'sait' => $sait,
            ]);
            $reklama->save();
        }

        

        if ($request->hasFile('img')) {
            $ratio = 16/9;
            $destinationPath1 = 'storage/reklama/img/';
            $destinationPath2 = 'storage/reklama/img_org/';
    
            foreach($request->file('img') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath2 . $ogImagename);
                $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(480,270);
                $thImagename=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
                $thImage->save($destinationPath1 . $thImagename);
                $img = new Poputka_taxi_img([
                    'category_id' => $cat,
                    'poputka_taxi_id' => $reklama->id,
                    'img_org' => $ogImagename,
                    'img' => $thImagename,
                ]);
                $img->save();
            }
        }
        
        return redirect()->route('popytka_taxi_admin_index', ['subdomain' => 'poputka-taxi'])->withSuccess('Успешно добавлена!');
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
     * @param  \App\Models\Poputka_taxi  $poputka_taxi
     * @return \Illuminate\Http\Response
     */
    public function show(Poputka_taxi $poputka_taxi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poputka_taxi  $poputka_taxi
     * @return \Illuminate\Http\Response
     */
    public function edit(Poputka_taxi $poputka_taxi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poputka_taxi  $poputka_taxi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poputka_taxi $poputka_taxi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poputka_taxi  $poputka_taxi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poputka_taxi $poputka_taxi)
    {
        //
    }
}
