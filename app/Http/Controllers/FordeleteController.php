<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materialy;
use App\Models\Kupitmaterialov;
use App\Models\Materialimgy;

class FordeleteController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Materialy::find($id);
        $materialimgs = Materialimgy::where('materialy_id', $id)->get();
        $proverka = Kupitmaterialov::where('materialy_id', $id)->first();
        
        
            if($proverka != null){
                return redirect()->back()->withSuccess('Материал уже куплено. Вы не сможете удалить самостоятельно, свяжитесь с администратором.');
            }else{
            
                

                foreach($materialimgs as $img){
                    unlink('storage/files/images/'.$img->img1);
                    unlink('storage/files/thumbnail/'.$img->img2);
                    $img->delete();
                }
                unlink('storage/files/files/'.$delete->ssylka);
                $delete->delete();

                return redirect()->back()->withSuccess('Материал была успешно удалена!');
            }
        
        
    }
}
