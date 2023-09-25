<?php

namespace App\Http\Controllers;

use App\Models\Kreative_rezume;
use App\Models\Kreative_rezume_dop_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KreativeRezumeController extends Controller
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

    public function kreative_taalim_resume_frame($id)
    {
        $resume = Kreative_rezume::where('id', $id)->first();
        $resume_dop_info = Kreative_rezume_dop_info::where('kreative_rezume_id', $id)->get();
        return view('kreative_taalim/resume_frame', [
            'resume' => $resume,
            'resume_dop_info' => $resume_dop_info,
        ]);
    }

    public function kreative_taalim_resume_frame2($id)
    {
        $resume = Kreative_rezume::where('id', $id)->first();
        $resume_dop_info = Kreative_rezume_dop_info::where('kreative_rezume_id', $id)->get();
        return view('kreative_taalim/resume_frame2', [
            'resume' => $resume,
            'resume_dop_info' => $resume_dop_info,
        ]);
    }


    public function kreative_taalim_resume()
    {
        $resumes = Kreative_rezume::orderBy('familya', 'asc')->get();
        $resume_dop_info = Kreative_rezume_dop_info::get();
        return view('kreative_taalim/resume_index', [
            'resumes' => $resumes,
            'resume_dop_info' => $resume_dop_info,
        ]);
    }

    public function kreative_taalim_resume_create()
    {
       return view('kreative_taalim/resume_create', [
        
       ]);
    }

    public function kreative_taalim_resume_update(Request $request, $id)
    {
        $resume = Kreative_rezume::where('id', $id)->first();
            if($request->hasFile('img')){
                
                if($resume->img){
                    unlink('storage/kreative/images/mugalim/'.$resume->img);
                }
                
                $request->validate(['img' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file24=$request->file('img');
                $file_extension24 = $file24->getClientOriginalExtension();
                $fileName24=uniqid().rand(1, 2400).time().'.'. $file_extension24;
                $file24->move(\public_path('storage/kreative/images/mugalim/'),$fileName24);
                
                DB::table('kreative_rezumes')->where('id', $id)->update([
                    'familya' => $request->familya,
                    'aty' => $request->aty,
                    'at_aty' => $request->at_aty,
                    'tuulgan_kunu' => $request->tuulgan_kunu,
                    'ui_buloluk_abaly' => $request->ui_buloluk_abaly,
                    'email' => $request->email,
                    'staj' => $request->staj,
                    'azyrky_kyzmaty' => $request->azyrky_kyzmaty,
                    'whatsapp' => $request->whatsapp,
                    'img' => $fileName24,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }else{
                DB::table('kreative_rezumes')->where('id', $id)->update([
                    'familya' => $request->familya,
                    'aty' => $request->aty,
                    'at_aty' => $request->at_aty,
                    'tuulgan_kunu' => $request->tuulgan_kunu,
                    'ui_buloluk_abaly' => $request->ui_buloluk_abaly,
                    'email' => $request->email,
                    'staj' => $request->staj,
                    'azyrky_kyzmaty' => $request->azyrky_kyzmaty,
                    'whatsapp' => $request->whatsapp,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
            
        

        DB::table('kreative_rezume_dop_infos')->where('kreative_rezume_id', $id)->delete();

        if($request->has('bilimi'))
        {
            $files2 = $request->bilimi;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 1;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('tajryiba'))
        {
            $files2 = $request->tajryiba;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 2;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }


        if($request->has('ozgocho_tajryiba'))
        {
            $files2 = $request->ozgocho_tajryiba;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 22;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('gramota_syilyk'))
        {
            $files2 = $request->gramota_syilyk;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 3;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('sertificate_syilyk'))
        {
            $files2 = $request->sertificate_syilyk;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 31;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('naam_syilyk'))
        {
            $files2 = $request->naam_syilyk;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 32;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('emgek'))
        {
            $files2 = $request->emgek;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $id;
                $request['type_info'] = 4;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }


        
        
        if($request->has('y_vidoe2'))
        {
            $files2 = $request->y_vidoe2;
            foreach($files2 as $file2)
            {
                $dlina = strlen($file2);
                if($dlina > 11){
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 6;
                $request['info'] = $file2;
                $request['title']=NULL;
                Kreative_rezume_dop_info::create($request->all());
                }
            }
        }

        if($request->has('ssylka_title'))
        {
            $radio6 = $request->ssylka_title;
            $text6 = $request->ssylka_adress;
            foreach($text6 as $key => $value)
            {
                $request['kreative_rezume_id']=$resume->id;
                $request['type_info']=5;
                $request['info']=$text6[$key];
                $request['title']=$radio6[$key];
                Kreative_rezume_dop_info::create($request->all());
            }
        }
        
        return redirect()->route('kreative_taalim_resume')->withSuccess('Сиздин маалыматтарыңыз оңдолду');
    }

    public function kreative_taalim_resume_store(Request $request)
    {
        if($request->hasFile('img')){
                $request->validate(['img' => 'image|mimes:jpeg,png,jpg,gif,tiff,webp',]);
                $file24=$request->file('img');
                $file_extension24 = $file24->getClientOriginalExtension();
                $fileName24=uniqid().rand(1, 2400).time().'.'. $file_extension24;
                $file24->move(\public_path('storage/kreative/images/mugalim/'),$fileName24);
            }else{
                $fileName24 = NULL;
            }
            
        $resume = new Kreative_rezume();
        $resume->familya = $request->familya;
        $resume->aty = $request->aty;
        $resume->at_aty = $request->at_aty;
        $resume->tuulgan_kunu = $request->tuulgan_kunu;
        $resume->ui_buloluk_abaly = $request->ui_buloluk_abaly;
        $resume->email = $request->email;
        $resume->staj = $request->staj;
        $resume->azyrky_kyzmaty = $request->azyrky_kyzmaty;
        $resume->whatsapp = $request->whatsapp;
        $resume->img = $fileName24;
        $resume->save();


        if($request->has('bilimi'))
        {
            $files2 = $request->bilimi;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 1;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('tajryiba'))
        {
            $files2 = $request->tajryiba;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 2;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }


        if($request->has('ozgocho_tajryiba'))
        {
            $files2 = $request->ozgocho_tajryiba;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 22;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('gramota_syilyk'))
        {
            $files2 = $request->gramota_syilyk;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 3;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('sertificate_syilyk'))
        {
            $files2 = $request->sertificate_syilyk;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 31;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('naam_syilyk'))
        {
            $files2 = $request->naam_syilyk;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 32;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('emgek'))
        {
            $files2 = $request->emgek;
            foreach($files2 as $file2)
            {
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 4;
                $request['info'] = $file2;
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        if($request->has('y_vidoe'))
        {
            $files2 = $request->y_vidoe;
            foreach($files2 as $file2)
            {
                $dlina = strlen($file2);
                if($dlina > 11){
                $request['kreative_rezume_id'] = $resume->id;
                $request['type_info'] = 6;
                $request['info'] = $file2;
                $request['title']=NULL;
                Kreative_rezume_dop_info::create($request->all());
                }
            }
        }

        if($request->has('ssylka_title'))
        {
            $radio6 = $request->ssylka_title;
            $text6 = $request->ssylka_adress;
            foreach($text6 as $key => $value)
            {
                $request['kreative_rezume_id']=$resume->id;
                $request['type_info']=5;
                $request['info']=$text6[$key];
                $request['title']=$radio6[$key];
                Kreative_rezume_dop_info::create($request->all());
            }
        }

        return redirect()->route('kreative_taalim_resume')->withSuccess('Сиздин маалыматтарыңыз ийгиликтүү кошулду');
    }

    public function kreative_taalim_resume_edit($id)
    {
       $resume = Kreative_rezume::where('id', $id)->first();
        $resume_dop_info = Kreative_rezume_dop_info::where('kreative_rezume_id', $id)->get();
        return view('kreative_taalim/resume_edit', [
            'resume' => $resume,
            'resume_dop_info' => $resume_dop_info,
        ]);
    }

    public function kreative_taalim_resume_destroy($id)
    {
        $delete = Kreative_rezume::find($id);
                if($delete->img != null){
                    unlink('storage/kreative/images/mugalim/'.$delete->img);
                }
        $delete->delete();

        return redirect()->back()->withSuccess('Резюме өчүрүлдү');
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
     * @param  \App\Models\Kreative_rezume  $kreative_rezume
     * @return \Illuminate\Http\Response
     */
    public function show(Kreative_rezume $kreative_rezume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kreative_rezume  $kreative_rezume
     * @return \Illuminate\Http\Response
     */
    public function edit(Kreative_rezume $kreative_rezume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kreative_rezume  $kreative_rezume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kreative_rezume $kreative_rezume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kreative_rezume  $kreative_rezume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kreative_rezume $kreative_rezume)
    {
        //
    }
}