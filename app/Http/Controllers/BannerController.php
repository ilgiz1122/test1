<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banner_index()
    {
        $banners = Banner::orderBy('updated_at', 'desc')->get();
        return view('admin.banner.banner_index', [
        'banners' => $banners
       ]);
    }

    public function banner_create()
    {
        return view('admin.banner.banner_create');
    }

    public function banner_store(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,webp',
        ]);
        $ratio = 16/9;
        $destinationPath = 'storage/banner/';

        $file=$request->file('img');
        $file_extension = $file->getClientOriginalExtension();
        $ogImage = Image::make($file);
        $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
        $thImagename=time().time().'.'.$file_extension;            
        $thImage->save($destinationPath . $thImagename);

        $banner = new Banner();
        
        $banner->user_id = \Auth::user()->id;
        $banner->title = $request->title;
        $banner->opisanie = $request->opisanie;
        $banner->ssylka = $request->ssylka;
        $banner->img = $thImagename;
        $banner->save();

        return redirect('admin_panel/banner')->withSuccess('Реклама была успешно добавлена!');
    }

    public function banner_update_status1(Request $request, $id)
    {

        $request->validate([
            'status1' => 'required|numeric',
        ]);

        DB::table('banners')->where('id', $id)->update([
            'status' => $request->status1,
        ]);
        
        return redirect()->back()->withSuccess('Поздравляем, реклама стал активным.');
    }

    public function banner_update_status2(Request $request, $id)
    {

        $request->validate([
            'status2' => 'required|numeric',
        ]);

        DB::table('banners')->where('id', $id)->update([
            'status' => $request->status2,
        ]);
        
        return redirect()->back()->withSuccess('Реклама стал не активным');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banner_destroy($id)
    {
        $banner = Banner::find($id);
        unlink('storage/banner/'.$banner->img);
        $banner->delete();
        return redirect()->back()->withSuccess('Реклама была успешно удалена!');
    }

    public function banner_edit($id)
    {
        $banner = Banner::where('id', $id)->first();
        return view('admin.banner.banner_edit', [
        'banner' => $banner
       ]);
    }

    public function banner_update(Request $request, $id)
    {
        if($request->hasFile('img')){
            $banner = Banner::find($id);
            unlink('storage/banner/'.$banner->img);

            $ratio = 16/9;
            $destinationPath = 'storage/banner/';

            $file=$request->file('img');
            $file_extension = $file->getClientOriginalExtension();
            $ogImage = Image::make($file);
            $thImage=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(448,252);
            $thImagename=time().time().'.'.$file_extension;            
            $thImage->save($destinationPath . $thImagename);
            DB::table('banners')->where('id', $id)->update([
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'ssylka' => $request->ssylka,
                'img' => $thImagename,
            ]);
        }else{
            DB::table('banners')->where('id', $id)->update([
                'title' => $request->title,
                'opisanie' => $request->opisanie,
                'ssylka' => $request->ssylka,
            ]);
        }
        return redirect('admin_panel/banner')->withSuccess('Реклама была успешно обновлена!');
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
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}