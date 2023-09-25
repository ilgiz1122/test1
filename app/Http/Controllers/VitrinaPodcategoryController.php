<?php

namespace App\Http\Controllers;

use App\Models\Vitrina_podcategory;
use App\Models\Vitrina_category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VitrinaPodcategoryController extends Controller
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

    public function vitrina_podcategory($for_action, $id)
    {
        $materialpodcategories = Vitrina_podcategory::where('vitrina_category_id', $id)->orderBy('created_at', 'desc')->get();
        $materialcategories = Vitrina_category::where('id', $id)->first();
      
       return view('admin.vitrina_podcategory.vitrina_index', [
        'materialpodcategories' => $materialpodcategories,
        'materialcategories' => $materialcategories,
        'for_action' => $for_action,
       ]);
    }

    public function vitrina_podcat_create($for_action, $id)
    {
        $materialcategories = Vitrina_category::where('id', $id)->first();

        return view('admin.vitrina_podcategory.vitrina_create', [
            'materialcategories' => $materialcategories,
            'for_action' => $for_action,
        ]);
    }
    
    public function vitrina_podcat_store(Request $request, $for_action, $id)
    {
        $podcategory = new Vitrina_podcategory();
        $podcategory->title = $request->title;
        $podcategory->img = $request->img;
        $podcategory->vitrina_category_id = $request->cat_id;
        $podcategory->save();

        return redirect()->route('vitrina_podcategory', ['for_action' => $for_action, 'id' => $id])->withSuccess('Подкатегория была успешно добавлена!');
    }

    public function vitrina_podcat_edit($for_action, $id)
    {
        $materialcategories = Vitrina_category::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
        $materialpodcategory = Vitrina_podcategory::where('id', $id)->first();

        return view('admin.vitrina_podcategory.vitrina_edit', [
            'materialcategories' => $materialcategories,
            'materialpodcategory' => $materialpodcategory,
            'for_action' => $for_action,
        ]);
    }
   
    public function vitrina_podcat_update(Request $request, $for_action, $id)
    {

        DB::table('vitrina_podcategories')->where('id', $id)->update([
                'title' => $request->title,
                'img' => $request->img,
                'vitrina_category_id' => $request->cat_id,
            ]);

        $for_id = Vitrina_category::where('id', $request->cat_id)->first();

        return redirect()->route('vitrina_podcategory', ['for_action' => $for_action, 'id' => $for_id])->withSuccess('Подкатегория была успешно обновлена!');
    }


    public function vitrina_podcategory_destroy(Vitrina_podcategory $vitrina_podcategory, $for_action, $id)
    {
        $materialpodcategory2 = Vitrina_podcategory::find($id);
       $materialpodcategory2->delete();

        return redirect()->back()->withSuccess('Подкатегория была успешно удалена!');
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
     * @param  \App\Models\Vitrina_podcategory  $vitrina_podcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Vitrina_podcategory $vitrina_podcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitrina_podcategory  $vitrina_podcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Vitrina_podcategory $vitrina_podcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vitrina_podcategory  $vitrina_podcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vitrina_podcategory $vitrina_podcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitrina_podcategory  $vitrina_podcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitrina_podcategory $vitrina_podcategory)
    {
        //
    }
}
