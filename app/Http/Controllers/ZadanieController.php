<?php

namespace App\Http\Controllers;

use App\Models\Zadanie;
use App\Models\Zadanieimg;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Uroky;
use App\Models\Podcategory;

class ZadanieController extends Controller
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

    public function moderator_kurs_urok_zadanie_create($kurs_id, $urok_id)
    {
        $kurs_id = $kurs_id;
        $urok_id = $urok_id;
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        $urok = Uroky::where('id', $urok_id)->first();
        return view('moderator/kursy_uroki_zadanie_create', [
            'kurs_id' => $kurs_id,
            'urok_id' => $urok_id,
            'podcategory' => $podcategory,
            'urok' => $urok,            
        ]);
    }

    public function moderator_kurs_urok_zadanie_store(Request $request, $kurs_id, $urok_id)
    {
        $user_id = \Auth::user()->id;
        $destinationPath = 'storage/kursy/zadanie/images/';

        if($request->hasFile('ssylka')){

            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().$user_id.uniqid().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/zadanie/files/'),$fileName);

            $zadanie = new Zadanie();
            $zadanie->kurs_id = $kurs_id;
            $zadanie->urok_id = $urok_id;
            $zadanie->text = $request->text;
            $zadanie->ball = $request->ball;
            $zadanie->file = $fileName;
            $zadanie->save();
        }else{
            $zadanie = new Zadanie();
            $zadanie->kurs_id = $kurs_id;
            $zadanie->urok_id = $urok_id;
            $zadanie->text = $request->text;
            $zadanie->ball = $request->ball;
            $zadanie->save();
        }

        if ($request->file('rebate_imag') != null) {
            foreach($request->file('rebate_imag') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $img = new Zadanieimg([
                    'img' => $ogImagename,
                    'zadanie_id' => $zadanie->id,
                ]);
                $img->save();
            }  
        }
        return redirect()->route('moderator_kurs_urok_index', $kurs_id)->withSuccess('Задание успешно добавлена!');
    }

    public function moderator_kurs_urok_zadanie_edit($kurs_id, $urok_id)
    {
        $kurs_id = $kurs_id;
        $urok_id = $urok_id;
        $zadanie = Zadanie::where('urok_id', $urok_id)->first();
        $zadanie_img = Zadanieimg::where('zadanie_id', $zadanie->id)->get();
        $podcategory = Podcategory::where('id', $kurs_id)->first();
        $urok = Uroky::where('id', $urok_id)->first();

        return view('moderator/kursy_uroki_zadanie_edit', [
            'kurs_id' => $kurs_id,
            'urok_id' => $urok_id,   
            'zadanie_img' => $zadanie_img,
            'zadanie' => $zadanie,
            'podcategory' => $podcategory,
            'urok' => $urok,                 
        ]);
    }

    public function zadanie_deleteimage($id){
        $zadanie = Zadanieimg::find($id);

        unlink('storage/kursy/zadanie/images/'.$zadanie->img);

            if($zadanie->delete()){
                return response()->json(true);
            }
            else{
                return response()->json(false);
            }
    }

    public function moderator_kurs_urok_zadanie_update(Request $request, $kurs_id, $urok_id, $id)
    {
        $zadanie = Zadanie::where('id', $id)->first();

        $user_id = \Auth::user()->id;
        $destinationPath = 'storage/kursy/zadanie/images/';

        if($request->hasFile('ssylka')){
            if ($zadanie->file != null) {
                unlink('storage/kursy/zadanie/files/'.$zadanie->file);
            }

            

            $file=$request->file('ssylka');
            $file_extension = $file->getClientOriginalExtension();
            $fileName=time().$user_id.uniqid().'.'. $file_extension;
            $file->move(\public_path('storage/kursy/zadanie/files/'),$fileName);

            DB::table('zadanies')->where('id', $id)->update([
                    'text' => $request->text,
                    'ball' => $request->ball,
                    'file' => $fileName,
                ]);
        }else{
            DB::table('zadanies')->where('id', $id)->update([
                    'text' => $request->text,
                    'ball' => $request->ball,
                ]);
        }

        if ($request->file('rebate_imag') != null) {
            foreach($request->file('rebate_imag') as $file2){
                $file_extension2 = $file2->getClientOriginalExtension();
                $ogImage = Image::make($file2);
                $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
                $ogImage->save($destinationPath . $ogImagename);
                $img = new Zadanieimg([
                    'img' => $ogImagename,
                    'zadanie_id' => $zadanie->id,
                ]);
                $img->save();
            }  
        }
        return redirect()->route('moderator_kurs_urok_index', $kurs_id)->withSuccess('Задание успешно обновлена!');
    }

    

    public function moderator_kurs_urok_zadanie_destroy($id)
    {
        $zadanie_imgs = Zadanieimg::where('zadanie_id', $id)->get();

        foreach($zadanie_imgs as $zadanie_img){
            unlink('storage/kursy/zadanie/images/'.$zadanie_img->img);
            $zadanie_img->delete();
        } 


        $zadanie = Zadanie::where('id', $id)->first();
        if($zadanie->file != null){

            unlink('storage/kursy/zadanie/files/'.$zadanie->file);
        }
        $zadanie->delete();

        return redirect()->back()->withSuccess('Задание была успешно удалена!');
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
     * @param  \App\Models\Zadanie  $zadanie
     * @return \Illuminate\Http\Response
     */
    public function show(Zadanie $zadanie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zadanie  $zadanie
     * @return \Illuminate\Http\Response
     */
    public function edit(Zadanie $zadanie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zadanie  $zadanie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zadanie $zadanie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zadanie  $zadanie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zadanie $zadanie)
    {
        //
    }
}
