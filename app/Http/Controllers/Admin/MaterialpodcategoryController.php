<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materialpodcategory;
use Illuminate\Http\Request;
use App\Models\Materialcategory;
use App\Models\Materialy;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MaterialpodcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialpodcategories = Materialpodcategory::orderBy('created_at', 'desc')->get();
      
       return view('admin.materialpodcategory.index', [
        'materialpodcategories' => $materialpodcategories,
        
        
       ]);
    }

    public function material_podcategory($for_action, $id)
    {
        $materialpodcategories = Materialpodcategory::where('materialcategory_id', $id)->withCount('materialy')->orderBy('created_at', 'desc')->get();
        $materialcategories = Materialcategory::where('id', $id)->first();
      
       return view('admin.materialpodcategory.prezentasia_index', [
        'materialpodcategories' => $materialpodcategories,
        'materialcategories' => $materialcategories,
        'for_action' => $for_action,
       ]);
    }

   


    public function index2($for_action, $materialcategoryId)
    {
        $materialpodcategories = Materialpodcategory::withCount('materialy', 'kupitmaterialov')->latest();
        $materialcategories = Materialcategory::where('id', $materialcategoryId)->first();
        $count_cat = Materialcategory::where('dop_category', $for_action)->count();
        if ($materialcategoryId) {
            $materialpodcategories->where('materialcategory_id', $materialcategoryId);
        }

        return view('pajes/materialpodcategory', [
            'for_action' => $for_action,
            'materialcategories' => $materialcategories,
            'materialpodcategories' => $materialpodcategories->get(),
            'count_cat' => $count_cat,
        ]);
    }

  

    public function material_podcat_create($for_action, $id)
    {
        $materialcategories = Materialcategory::where('id', $id)->first();

        return view('admin.materialpodcategory.prezentasia_create', [
            'materialcategories' => $materialcategories,
            'for_action' => $for_action,
        ]);
    }



    
    public function material_podcat_store(Request $request, $for_action, $id)
    {
        $podcategory = new Materialpodcategory();
        $podcategory->user_id = \Auth::user()->id;
        $podcategory->title = $request->title;
        $podcategory->img = $request->img;
        $podcategory->materialcategory_id = $request->cat_id;
        $podcategory->save();

        return redirect()->route('material_podcategory', ['for_action' => $for_action, 'id' => $id])->withSuccess('Подкатегория была успешно добавлена!');
    }



    public function material_podcat_edit($for_action, $id)
    {
        $materialcategories = Materialcategory::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
        $materialpodcategory = Materialpodcategory::where('id', $id)->first();

        return view('admin.materialpodcategory.prezentasia_edit', [
            'materialcategories' => $materialcategories,
            'materialpodcategory' => $materialpodcategory,
            'for_action' => $for_action,
        ]);
    }

   
    public function material_podcat_update(Request $request, $for_action, $id)
    {

        DB::table('materialpodcategories')->where('id', $id)->update([
                'title' => $request->title,
                'img' => $request->img,
                'materialcategory_id' => $request->cat_id,
            ]);

        $for_id = Materialcategory::where('id', $request->cat_id)->first();


        return redirect()->route('material_podcategory', ['for_action' => $for_action, 'id' => $for_id])->withSuccess('Подкатегория была успешно обновлена!');
    }


    public function material_podcategory_destroy(Materialpodcategory $materialpodcategory, $for_action, $id)
    {
        $materialpodcategory2 = Materialpodcategory::find($id);
       $materialpodcategory2->delete();

        return redirect()->back()->withSuccess('Подкатегория была успешно удалена!');
    }
    
}