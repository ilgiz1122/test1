<?php

namespace App\Http\Controllers;

use App\Models\Moderator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Podcategory;
use App\Models\Materialy;
use App\Models\Materialimgy;
use App\Models\Kupit;
use App\Models\Test;
use App\Models\Vitrina;
use App\Models\Vitrina_img;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moderator_profile_index_for_moderator()
    {
        $user_id = \Auth::user()->id;
        $moderator = User::where('id', $user_id)->select('id', 'name', 'phone', 'f_fio', 'i_fio', 'o_fio', 'oblast_id', 'raion_shaar_id', 'aiyl_title', 'mektep_title', 'img_600_600')->first();

        $prezentasias = Materialy::where('user_id', $user_id)->where('dop_category', 0)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $plan_konspects = Materialy::where('user_id', $user_id)->where('dop_category', 4)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $test_tek_ishs = Materialy::where('user_id', $user_id)->where('dop_category', 1)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $shablon_prezentasias = Materialy::where('user_id', $user_id)->where('dop_category', 2)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $gramota_sertificats = Materialy::where('user_id', $user_id)->where('dop_category', 3)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $materialimgs = Materialimgy::get();

        $online_tests = Test::where('user_id', $user_id)->where('test_category_id', '!=', null)->where('dop_category', 0)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('tests_kupit_count', 'desc')->take(5)->get();
        $ort_tests = Test::where('user_id', $user_id)->where('test_category_id', '!=', null)->where('dop_category', 1)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('tests_kupit_count', 'desc')->take(5)->get();
        $nct_tests = Test::where('user_id', $user_id)->where('test_category_id', '!=', null)->where('dop_category', 2)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('tests_kupit_count', 'desc')->take(5)->get();

        $vitrinas = Vitrina::where('user_id', $user_id)->where('status_moderator', 1)->where('dop_category', 0)->orderBy('view', 'desc')->take(5)->get();
        $vitrinaimgs = Vitrina_img::get();

        foreach($vitrinas as $vitrina){
            DB::table('vitrinas')->where('id', $vitrina->id)->increment('view', 1);
        }

        $podcategories = Podcategory::where('user_id', $user_id)->where('status', 1)->withCount('uroky', 'kupit')->orderBy('kupit_count', 'desc')->take(5)->get();
        return view('moderator/moderator_profile_index', [
            'moderator' => $moderator,
            'podcategories' => $podcategories,
            'prezentasias' => $prezentasias,
            'plan_konspects' => $plan_konspects,
            'test_tek_ishs' => $test_tek_ishs,
            'shablon_prezentasias' => $shablon_prezentasias,
            'gramota_sertificats' => $gramota_sertificats,
            'materialimgs' => $materialimgs,
            'online_tests' => $online_tests,
            'ort_tests' => $ort_tests,
            'nct_tests' => $nct_tests,
            'vitrinas' => $vitrinas,
            'vitrinaimgs' => $vitrinaimgs,
         ]);
    }

    public function moderatorlor_for_user()
    {
        $moderators = User::where('for_role', 3)->select('id', 'name', 'phone', 'f_fio', 'i_fio', 'o_fio', 'oblast_id', 'raion_shaar_id', 'aiyl_title', 'mektep_title', 'img_600_600')->paginate(15);
        $moderator1s = User::where('for_role', 2)->select('id', 'name', 'phone', 'f_fio', 'i_fio', 'o_fio', 'oblast_id', 'raion_shaar_id', 'aiyl_title', 'mektep_title', 'img_600_600')->paginate(15);
        return view('pajes/moderator_profile_index_for_user', [
            'moderators' => $moderators,
            'moderator1s' => $moderator1s,
         ]);
    }


    public function moderatorlor_for_user_one($user_id)
    {
        $moderator = User::where('id', $user_id)->select('id', 'name', 'phone', 'f_fio', 'i_fio', 'o_fio', 'oblast_id', 'raion_shaar_id', 'aiyl_title', 'mektep_title', 'img_600_600')->first();

        $prezentasias = Materialy::where('user_id', $user_id)->where('dop_category', 0)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $plan_konspects = Materialy::where('user_id', $user_id)->where('dop_category', 4)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $test_tek_ishs = Materialy::where('user_id', $user_id)->where('dop_category', 1)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $shablon_prezentasias = Materialy::where('user_id', $user_id)->where('dop_category', 2)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $gramota_sertificats = Materialy::where('user_id', $user_id)->where('dop_category', 3)->withCount('kupitmaterialov')->orderBy('kupitmaterialov_count', 'desc')->take(5)->get();
        $materialimgs = Materialimgy::get();

        $online_tests = Test::where('user_id', $user_id)->where('test_category_id', '!=', null)->where('dop_category', 0)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('tests_kupit_count', 'desc')->take(5)->get();
        $ort_tests = Test::where('user_id', $user_id)->where('test_category_id', '!=', null)->where('dop_category', 1)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('tests_kupit_count', 'desc')->take(5)->get();
        $nct_tests = Test::where('user_id', $user_id)->where('test_category_id', '!=', null)->where('dop_category', 2)->where('status', 1)->withCount('test_voprosy', 'tests_kupit')->orderBy('tests_kupit_count', 'desc')->take(5)->get();

        $vitrinas = Vitrina::where('user_id', $user_id)->where('status_moderator', 1)->where('dop_category', 0)->orderBy('view', 'desc')->take(5)->get();
        $vitrinaimgs = Vitrina_img::get();

        foreach($vitrinas as $vitrina){
            DB::table('vitrinas')->where('id', $vitrina->id)->increment('view', 1);
        }

        $podcategories = Podcategory::where('user_id', $user_id)->where('status', 1)->withCount('uroky', 'kupit')->orderBy('kupit_count', 'desc')->take(5)->get();
        return view('pajes/moderator_profile_index_for_user_one', [
            'moderator' => $moderator,
            'podcategories' => $podcategories,
            'prezentasias' => $prezentasias,
            'plan_konspects' => $plan_konspects,
            'test_tek_ishs' => $test_tek_ishs,
            'shablon_prezentasias' => $shablon_prezentasias,
            'gramota_sertificats' => $gramota_sertificats,
            'materialimgs' => $materialimgs,
            'online_tests' => $online_tests,
            'ort_tests' => $ort_tests,
            'nct_tests' => $nct_tests,
            'vitrinas' => $vitrinas,
            'vitrinaimgs' => $vitrinaimgs,
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


        $moderators = new Moderator();
        $moderators->user_id = \Auth::user()->id;
        $moderators->user_name = $request->name;
        $moderators->user_phone = $request->phone;
        $moderators->user_email = $request->email;
        $moderators->user_obl = $request->obl;
        $moderators->user_role = $request->role;
        $moderators->save();

        $user = User::where('id', \Auth::user()->id)->first();
        if($user->phone != null){

        }else{
            DB::table('users')->where('id', \Auth::user()->id)->update([
                            'phone' => $request->phone,
                        ]);
        }
        return redirect()->back()->withSuccess('Өтүнүч кабыл алынды. Эки күндүн ичинде карап, жооп беребиз. Биздин чалууну күтүңүз.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moderator  $moderator
     * @return \Illuminate\Http\Response
     */
    public function show(Moderator $moderator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moderator  $moderator
     * @return \Illuminate\Http\Response
     */
    public function edit(Moderator $moderator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moderator  $moderator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moderator $moderator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moderator  $moderator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moderator $moderator)
    {
        //
    }
}