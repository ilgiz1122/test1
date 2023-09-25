<?php

namespace App\Http\Controllers;

use App\Models\Test_category;
use Illuminate\Http\Request;
use App\Models\Test_podcategory;
use Illuminate\Support\Facades\DB;

class TestCategoryController extends Controller
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

    public function ort_negizgi_test($subdomain)
    {
        $test_podcategories = Test_podcategory::where('test_category_id', 5)->withCount('testy', 'tests_kupit')->latest();
        $test_categories = Test_category::where('id', 5)->first();
        $for_action = 1;

       return view('ort/test_podcategory', [
        'test_podcategories' => $test_podcategories->get(),
        'test_categories' => $test_categories,
        'for_action' => $for_action
       ]);
    }

    public function ort_predmettik_test($subdomain)
    {
        $test_podcategories = Test_podcategory::where('test_category_id', 17)->withCount('testy', 'tests_kupit')->latest();
        $test_categories = Test_category::where('id', 17)->first();
        $for_action = 2;

       return view('ort/test_podcategory', [
        'test_podcategories' => $test_podcategories->get(),
        'test_categories' => $test_categories,
        'for_action' => $for_action
       ]);
    }

    public function index2($for_action, $id)
    {
        $test_podcategories = Test_podcategory::withCount('testy', 'tests_kupit')->latest();
        $test_categories = Test_category::where('id', $id)->first();
        
        if ($id) {
            $test_podcategories->where('test_category_id', $id);
        }

       return view('pajes/test_podcategory', [
        'test_podcategories' => $test_podcategories->get(),
        'test_categories' => $test_categories,
        'for_action' => $for_action
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

    public function test_category($for_action)
    {
        $test_categories = Test_category::where('dop_category', $for_action)->withCount('test_podcategory')->get();
       return view('admin.test_category.ort_index', [
        'test_categories' => $test_categories,
        'for_action' => $for_action
       ]);
    }

    public function test_category_create($for_action)
    {
        return view('admin.test_category.ort_create', [
        'for_action' => $for_action
       ]);
    }

    public function test_category_store(Request $request, $for_action)
    {
        $new_category = new Test_category();
        $new_category->title = $request->title;
        $new_category->dop_category = $for_action;
        $new_category->img = $request->img;
        $new_category->save();

        return redirect()->route('test_category', ['for_action' => $for_action])->withSuccess('Категория была успешно добавлена!');
    }

    public function test_category_edit($for_action, $id)
    {
         $test_category = Test_category::where('id', $id)->first();

        return view('admin.test_category.ort_edit', [
            'test_category'=>$test_category,
            'for_action' => $for_action
        ]);
    }

    public function test_category_update(Request $request, $for_action, $id)
    {
        DB::table('test_categories')->where('id', $id)->update([
                'title' => $request->title,
                'img' => $request->img,
            ]);

        return redirect()->route('test_category', ['for_action' => $for_action])->withSuccess('Категория была успешно обновлена!');
    }

    public function test_category_destroy(Test_category $test_category, $for_action, $id)
    {
        $test_category = Test_category::find($id);
        $test_category->delete();

        return redirect()->back()->withSuccess('Категория была успешно удалена!');
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
     * @param  \App\Models\Test_category  $test_category
     * @return \Illuminate\Http\Response
     */
    public function show(Test_category $test_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test_category  $test_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Test_category $test_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test_category  $test_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test_category $test_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test_category  $test_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test_category $test_category)
    {
        //
    }
}