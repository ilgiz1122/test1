<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use Illuminate\Http\Request;
use App\Models\Podcategory;
use App\Models\Category; // добавлена для связи с категориями 
use App\Models\Uroky;
use Illuminate\Support\Facades\DB;
use App\Models\Kupit; // добавлена для связи с категориями
use App\Models\User;

class KursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($podcategoryId, Request $request)
    {
        $urokies = Uroky::latest();
        $podcategories = Podcategory::get();
        $kupits = DB::table('kupits')->where('proverka', $request->proverka)->first();

        if ($podcategoryId) {
            $urokies->where('podcat_id', $podcategoryId);
        }

        if ($kupits != null) {
            return view('pajes/kurs', [
                'podcategories' => $podcategories,
                'urokies' => $urokies->get(),
            ]);
        }else{
            return view('pajes/kurs2', [
                'podcategories' => $podcategories,
                'urokies' => $urokies->get(),
            ]);
        }
    }

    public function index2($id, Request $request)
    {
        $urokies = Uroky::latest();
        $podcategories = Podcategory::get();
        
        if ($id) {
            $urokies->where('podcat_id', $id);
        }
        
        return view('pajes/kurs', [
            'podcategories' => $podcategories,
            'urokies' => $urokies->get(),
        ]);
        
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
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function show(Kurs $kurs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurs $kurs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kurs $kurs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kurs  $kurs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kurs $kurs)
    {
        //
    }
}
