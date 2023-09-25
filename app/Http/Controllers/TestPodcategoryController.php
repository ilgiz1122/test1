<?php

namespace App\Http\Controllers;

use App\Models\Test_podcategory;
use Illuminate\Http\Request;
use App\Models\Test_category;
use Illuminate\Support\Facades\DB;

class TestPodcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test_podcat_index($for_action, $id)
    {
        $test_podcategories = Test_podcategory::where('test_category_id', $id)->withCount('testy')->orderBy('created_at', 'desc')->get();
        $test_categories = Test_category::where('id', $id)->first();
      
       return view('admin.test_podcategory.ort_index', [
        'test_podcategories' => $test_podcategories,
        'test_categories' => $test_categories,
        'for_action' => $for_action
       ]);
    }

    public function test_podcat_create($for_action, $id)
    {
        $test_categories = Test_category::where('id', $id)->first();

        return view('admin.test_podcategory.ort_create', [
            'test_categories' => $test_categories,
            'for_action' => $for_action
        ]);
    }

    public function test_podcat_store(Request $request, $for_action, $id)
    {
        $podcategory = new Test_podcategory();
        $podcategory->title = $request->title;
        $podcategory->img = $request->img;
        $podcategory->test_category_id = $request->cat_id;
        $podcategory->save();

        return redirect()->route('test_podcat_index', ['for_action' => $for_action, 'id' => $id])->withSuccess('Подкатегория была успешно добавлена!');
    }

    public function test_podcat_edit($for_action, $id)
    {
        $test_categories = Test_category::where('dop_category', $for_action)->orderBy('created_at', 'DESC')->get();
        $test_podcategory = Test_podcategory::where('id', $id)->first();

        return view('admin.test_podcategory.ort_edit', [
            'test_categories' => $test_categories,
            'test_podcategory' => $test_podcategory,
            'for_action' => $for_action
        ]);
    }

    public function test_podcat_update(Request $request, $for_action, $id)
    {
        DB::table('test_podcategories')->where('id', $id)->update([
                'title' => $request->title,
                'img' => $request->img,
                'test_category_id' => $request->cat_id,
            ]);
        $for_id = Test_category::where('id', $request->cat_id)->first();
        return redirect()->route('test_podcat_index', ['for_action' => $for_action, 'id' => $for_id->id])->withSuccess('Подкатегория была успешно обновлена!');
    }

    public function test_podcat_destroy(Test_podcategory $test_podcategory, $for_action, $id)
    {
        $test_podcategory = Test_podcategory::find($id);
       $test_podcategory->delete();

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
     * @param  \App\Models\Test_podcategory  $test_podcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Test_podcategory $test_podcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test_podcategory  $test_podcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Test_podcategory $test_podcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test_podcategory  $test_podcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test_podcategory $test_podcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test_podcategory  $test_podcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test_podcategory $test_podcategory)
    {
        //
    }
}