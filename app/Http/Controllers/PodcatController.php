<?php

namespace App\Http\Controllers;

use App\Models\Potcat;
use Illuminate\Http\Request;
use App\Models\Podcategory;
use App\Models\Category; // добавлена для связи с категориями
use App\Models\Kupit; // добавлена для связи с категориями
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PodcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryId)
    {
        $users = User::get();
        $podcategories = Podcategory::latest(); 

        $categories = Category::get();
        $kupits = Kupit::orderBy('created_at', 'desc')->get();

        if ($categoryId) {
            $podcategories->where('cat_id', $categoryId);
        }

       return view('pajes/podcat', [
        'categories' => $categories,
        'podcategories' => $podcategories->get(),
        'kupits' => $kupits,
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
     * @param  \App\Models\Potcat  $potcat
     * @return \Illuminate\Http\Response
     */
    public function show(Potcat $potcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potcat  $potcat
     * @return \Illuminate\Http\Response
     */
    public function edit(Potcat $potcat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Potcat  $potcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Potcat $potcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potcat  $potcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Potcat $potcat)
    {
        //
    }
}
