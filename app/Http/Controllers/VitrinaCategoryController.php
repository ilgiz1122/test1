<?php

namespace App\Http\Controllers;

use App\Models\Vitrina_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VitrinaCategoryController extends Controller
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

    public function vitrina_category($for_action)
    {
        $vitrina_categories = Vitrina_category::where('dop_category', $for_action)->withCount('vitrina_podcategory')->orderBy('created_at', 'desc')->get();
        $kol = Vitrina_category::where('dop_category', $for_action)->count();
       return view('admin.vitrina_category.vitrina_index', [
        'vitrina_categories' => $vitrina_categories,
        'for_action' => $for_action,
        'kol' => $kol,
       ]);
    }

    public function vitrina_category_create($for_action)
    {
        return view('admin.vitrina_category.vitrina_create', [
        'for_action' => $for_action,
       ]);
    }

    public function vitrina_category_store(Request $request, $for_action)
    {
        $new_materialcategory = new Vitrina_category();
        $new_materialcategory->title = $request->title;
        $new_materialcategory->dop_category = $request->dop_category;
        $new_materialcategory->img = $request->img;
        $new_materialcategory->save();
        
        return redirect()->route('vitrina_category', $for_action)->withSuccess('Категория была успешно добавлена!');
    }

    public function vitrina_category_edit($for_action, $id)
    {
         $vitrina_category = Vitrina_category::where('id', $id)->first();

        return view('admin.vitrina_category.vitrina_edit', [
            'vitrina_category'=>$vitrina_category,
            'for_action'=>$for_action
        ]);
    }

    public function vitrina_category_update(Request $request, $for_action, $id)
    {
        DB::table('vitrina_categories')->where('id', $id)->update([
                'title' => $request->title,
                'img' => $request->img,
            ]);
        return redirect()->route('vitrina_category', $for_action)->withSuccess('Категория была успешно обновлена!');
    }


    public function vitrina_category_destroy(Vitrina_category $vitrina_category, $for_action, $id)
    {
        $materialcategory2 = Vitrina_category::find($id);
       $materialcategory2->delete();

        return redirect()->route('vitrina_category', $for_action)->withSuccess('Категория была успешно удалена!');
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
     * @param  \App\Models\Vitrina_category  $vitrina_category
     * @return \Illuminate\Http\Response
     */
    public function show(Vitrina_category $vitrina_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vitrina_category  $vitrina_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Vitrina_category $vitrina_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vitrina_category  $vitrina_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vitrina_category $vitrina_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vitrina_category  $vitrina_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitrina_category $vitrina_category)
    {
        //
    }
}
