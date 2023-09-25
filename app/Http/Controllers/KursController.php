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
use App\Models\Partnerka;
use App\Models\Oblast;
use App\Models\Raion_shaar;
use App\Models\Comment;

use App\Models\Zadanie;
use App\Models\Test;
use App\Models\Tests_kupit;
use App\Models\Test_controls;
use App\Models\Test_controls_variants;
use App\Models\Test_voprosy;
use App\Models\Test_otvety;
use App\Models\Zadanieimg;
use App\Models\Zadanie_otvety;
use App\Models\Zadanie_otveties_img;
use App\Models\Progress_prohojdenie_uroka;

class KursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function otpravit_otzyv_kursa($for_role, $product_id, Request $request)
    {
        $podcategory = Podcategory::where('id', $product_id)->first();
        if ($request->has('oblast')){
            if($request->oblast != null){
                User::where('id', \Auth::user()->id)->update([
                    'oblast_id' => $request->oblast,
                ]);
            }
        }
        if ($request->has('raion_shaar')){
            if($request->raion_shaar != null){
                User::where('id', \Auth::user()->id)->update([
                    'raion_shaar_id' => $request->raion_shaar,
                ]);
            }
        }
        if($podcategory->price > 0){
            $kupits = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$podcategory->id)->first();
            if($kupits != null) {
                $comment = new Comment();
                $comment->user_id = \Auth::user()->id;
                $comment->for_role = 1;
                $comment->product_id = $product_id;
                $comment->product_avtor_id = $podcategory->user_id;
                $comment->text = $request->opisanie;
                $comment->save();
                return redirect()->back()->withSuccess('Сиздин пикир жарыяланды');
            }else{
                return redirect()->back()->withSuccess2('Сиз пикир калтыра албайсыз');
            }
        }else{
            $comment = new Comment();
            $comment->user_id = \Auth::user()->id;
            $comment->for_role = 1;
            $comment->product_id = $product_id;
            $comment->product_avtor_id = $podcategory->user_id;
            $comment->text = $request->opisanie;
            $comment->save();
            return redirect()->back()->withSuccess('Сиздин пикир жарыяланды');
        }        
    }


    public function otpravit_otzyv_kursa_update($comment_id, $product_id, Request $request)
    {
        $podcategory = Podcategory::where('id', $product_id)->first();
        
        if($podcategory->price > 0){
            $kupits = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$podcategory->id)->first();
            if($kupits != null) {
                Comment::where('id', $comment_id)->update([
                    'text' => $request->opisanie,
                ]);
                return redirect()->back()->withSuccess('Сиздин пикир өзгөртүлдү');
            }else{
                return redirect()->back()->withSuccess2('Сиз пикир калтыра албайсыз');
            }
        }else{
            Comment::where('id', $comment_id)->update([
                'text' => $request->opisanie,
            ]);
            return redirect()->back()->withSuccess('Сиздин пикир өзгөртүлдү');
        }        
    }




    public function index($podcategoryId, Request $request)
    {
        $urokies = Uroky::orderBy('porydkovyi_nomer')->latest();
        $podcategories = Podcategory::where('id', $podcategoryId)->first();
        $category = Category::where('id', $podcategories->cat_id)->first();
        $kupit = Kupit::where('kurs_id', $podcategoryId)->count();
        $users = User::where('id', $podcategories->user_id)->first();
        $urok = Uroky::where('podcat_id', $podcategoryId)->count();
        $oblast = Oblast::get();
        $raion_shaar = Raion_shaar::get();
        $comments = Comment::where('product_id', $podcategoryId)->where('status', 1)->get();

        if ($podcategoryId) {
            $urokies->where('podcat_id', $podcategoryId);
        }

        if (\Auth::user()) {
            if (\Auth::user()->id == $podcategories->user_id) {
                return view('pajes/kurs_for_moderator', [
                    'podcategories' => $podcategories,
                    'urokies' => $urokies->get(),
                    'category' => $category,
                    'kupit' => $kupit,
                    'oblast' => $oblast,
                    'raion_shaar' => $raion_shaar,
                    'comments' => $comments,
                ]);
            }else{
                if ($podcategories->price != 0){
                    $kupits = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$podcategoryId)->first();
                    if ($kupits != null) {
                        $zadanie = Zadanie::where('kurs_id', $podcategoryId)->get();
                        $test = Test::where('user_id', \Auth::user()->id)->withCount('test_voprosy')->get();
                        $progress = Progress_prohojdenie_uroka::where('kurs_id', $podcategoryId)->where('user_id', $kupits->user_id)->get();
                        $test_controls = Test_controls::where('user_id', $kupits->user_id)->get();
                        $zadanie_otvety = Zadanie_otvety::where('user_id', $kupits->user_id)->where('kupit_id', $kupits->id)->get();   
                        if($kupits->srok_dostupa != 0){
                            if ((time() - $kupits->time) < $kupits->srok_dostupa){
                                return view('pajes/kurs', [
                                    'kupits' => $kupits,
                                    'podcategories' => $podcategories,
                                    'urokies' => $urokies->get(),
                                    'category' => $category,
                                    'oblast' => $oblast,
                                    'raion_shaar' => $raion_shaar,
                                    'comments' => $comments,
                                    'zadanie' => $zadanie,
                                    'test' => $test,
                                    'progress' => $progress,
                                    'test_controls' => $test_controls,
                                    'zadanie_otvety' => $zadanie_otvety,
                                ]);
                            }else{
                                    return view('pajes/kurs2_kupon', [
                                        'podcategories' => $podcategories,
                                        'urokies' => $urokies->get(),
                                        'kupit' => $kupit,
                                        'users' => $users,
                                        'urok' => $urok,
                                        'category' => $category,
                                        'oblast' => $oblast,
                                        'raion_shaar' => $raion_shaar,
                                        'comments' => $comments,
                                        'zadanie' => $zadanie,
                                        'test' => $test,
                                        'progress' => $progress,
                                        'test_controls' => $test_controls,
                                        'zadanie_otvety' => $zadanie_otvety,
                                    ]);
                            }
                        }else{
                            return view('pajes/kurs', [
                                'kupits' => $kupits,
                                'podcategories' => $podcategories,
                                'urokies' => $urokies->get(),
                                'category' => $category,
                                'oblast' => $oblast,
                                'raion_shaar' => $raion_shaar,
                                'comments' => $comments,
                                'zadanie' => $zadanie,
                                'test' => $test,
                                'progress' => $progress,
                                'test_controls' => $test_controls,
                                'zadanie_otvety' => $zadanie_otvety,
                            ]);
                        }
                    }else{
                            return view('pajes/kurs2_kupon', [
                                'podcategories' => $podcategories,
                                'urokies' => $urokies->get(),
                                'kupit' => $kupit,
                                'users' => $users,
                                'urok' => $urok,
                                'category' => $category,
                                'oblast' => $oblast,
                                'raion_shaar' => $raion_shaar,
                                'comments' => $comments,
                            ]);
                    }
                }else{
                    return view('pajes/kurs', [
                        'podcategories' => $podcategories,
                        'urokies' => $urokies->get(),
                        'category' => $category,
                        'oblast' => $oblast,
                        'raion_shaar' => $raion_shaar,
                        'comments' => $comments,
                    ]);
                }
            }
            
        }else{
            if ($podcategories->price != 0){
                    return view('pajes/kurs2_kupon', [
                        'podcategories' => $podcategories,
                        'urokies' => $urokies->get(),
                        'kupit' => $kupit,
                        'users' => $users,
                        'urok' => $urok,
                        'category' => $category,
                        'oblast' => $oblast,
                        'raion_shaar' => $raion_shaar,
                        'comments' => $comments,
                    ]);
            }else{
                return view('pajes/kurs', [
                    'podcategories' => $podcategories,
                    'urokies' => $urokies->get(),
                    'category' => $category,
                    'oblast' => $oblast,
                    'raion_shaar' => $raion_shaar,
                    'comments' => $comments,
                ]);
            }
        }        
    }



    public function kurs_index_for_moderator($podcategoryId, Request $request)
    {
        $urokies = Uroky::orderBy('porydkovyi_nomer')->latest();
        $podcategories = Podcategory::where('id', $podcategoryId)->first();
        $category = Category::where('id', $podcategories->cat_id)->first();
        $kupit = Kupit::where('kurs_id', $podcategoryId)->count();
        $users = User::where('id', $podcategories->user_id)->first();
        $urok = Uroky::where('podcat_id', $podcategoryId)->count();


        if ($podcategoryId) {
            $urokies->where('podcat_id', $podcategoryId);
        }

        if (\Auth::user()) {
            if (\Auth::user()->id == $podcategories->user_id) {
                return view('pajes/kurs_for_moderator', [
                    'podcategories' => $podcategories,
                    'urokies' => $urokies->get(),
                    'category' => $category,
                    'kupit' => $kupit,
                ]);
            }else{
                return view('pajes/kurs2_kupon', [
                    'podcategories' => $podcategories,
                    'urokies' => $urokies->get(),
                    'kupit' => $kupit,
                    'users' => $users,
                    'urok' => $urok,
                    'category' => $category,
                ]);
            }
        }else{
            return view('pajes/kurs2_kupon', [
                'podcategories' => $podcategories,
                'urokies' => $urokies->get(),
                'kupit' => $kupit,
                'users' => $users,
                'urok' => $urok,
                'category' => $category,
            ]);
        }
    }




    public function kupit_kupon_index($podcatId, $proverkaId)
    {
        $urokies = Uroky::orderBy('porydkovyi_nomer')->latest();
        $podcategories = Podcategory::where('id', $podcatId)->first();
        $category = Category::where('id', $podcategories->cat_id)->first();
        $proverka2 = Partnerka::where('id', $proverkaId)->first();
        $kupits = DB::table('kupits')->where('proverka', \Auth::user()->id.'-'.$podcatId)->first();


        $kupit = Kupit::where('kurs_id', $podcatId)->count();
        $users = User::where('id', $podcategories->user_id)->first();
        $urok = Uroky::where('podcat_id', $podcatId)->count();


        if ($podcatId) {
            $urokies->where('podcat_id', $podcatId);
        }

        return view('pajes/kurs2_kupon_bay', [
            'podcategories' => $podcategories,
            'urokies' => $urokies->get(),
            'kupit' => $kupit,
            'users' => $users,
            'urok' => $urok,
            'proverka2' => $proverka2,
            'category' => $category,
        ])->withSuccess('Куттуктайбыз, сиз 10% арзандатуу алдыңыз');

        
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
