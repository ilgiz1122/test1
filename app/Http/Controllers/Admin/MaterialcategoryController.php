<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materialcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function material_category($for_action)
    {
        $materialcategories = Materialcategory::where('dop_category', $for_action)->withCount('materialpodcategory')->orderBy('created_at', 'desc')->get();
        $kol = Materialcategory::where('dop_category', $for_action)->count();
       return view('admin.materialcategory.prezentasia_index', [
        'materialcategories' => $materialcategories,
        'for_action' => $for_action,
        'kol' => $kol,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materialcategory.create');
    }

    public function material_category_create($for_action)
    {
        return view('admin.materialcategory.prezentasia_create', [
        'for_action' => $for_action,
       ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function material_category_store(Request $request, $for_action)
    {
        $new_materialcategory = new Materialcategory();
        $new_materialcategory->title = $request->title;
        $new_materialcategory->dop_category = $request->dop_category;
        $new_materialcategory->img = $request->img;
        $new_materialcategory->save();
        
        return redirect()->route('material_category', $for_action)->withSuccess('Категория была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materialcategory  $materialcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Materialcategory $materialcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materialcategory  $materialcategory
     * @return \Illuminate\Http\Response
     */
    public function material_category_edit($for_action, $id)
    {
         $materialcategory = Materialcategory::where('id', $id)->first();

        return view('admin.materialcategory.prezentasia_edit', [
            'materialcategory'=>$materialcategory,
            'for_action'=>$for_action
        ]);
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materialcategory  $materialcategory
     * @return \Illuminate\Http\Response
     */
    public function material_category_update(Request $request, $for_action, $id)
    {
        DB::table('materialcategories')->where('id', $id)->update([
                'title' => $request->title,
                'img' => $request->img,
            ]);
        return redirect()->route('material_category', $for_action)->withSuccess('Категория была успешно обновлена!');
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materialcategory  $materialcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materialcategory $materialcategory)
    {
       $materialcategory->delete();

        return redirect('admin_panel/materialcategory')->withSuccess('Категория была успешно удалена!');
    }

    public function material_category_destroy(Materialcategory $materialcategory, $for_action, $id)
    {
        $materialcategory2 = Materialcategory::find($id);
       $materialcategory2->delete();

        return redirect()->route('material_category', $for_action)->withSuccess('Категория была успешно удалена!');
    }

    
}