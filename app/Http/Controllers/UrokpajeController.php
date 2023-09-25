<?php

namespace App\Http\Controllers;

use App\Models\Urokpaje;
use Illuminate\Http\Request;
use App\Models\Podcategory;
use App\Models\Category; // добавлена для связи с категориями
use App\Models\Uroky;
use App\Models\User; // добавлена для связи с подкатегориями

class UrokpajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $urokies = Uroky::where('id', $id)->first()->get();

        return view('pajes.urokpaje', [
            'urokies' => $urokies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\Urokpaje  $urokpaje
     * @return \Illuminate\Http\Response
     */
    public function show(Urokpaje $urokpaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urokpaje  $urokpaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Urokpaje $urokpaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urokpaje  $urokpaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urokpaje $urokpaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urokpaje  $urokpaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urokpaje $urokpaje)
    {
        //
    }
}
