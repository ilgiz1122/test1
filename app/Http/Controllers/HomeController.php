<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // добавлена для связи с категориями
use App\Models\Podcategory;
use App\Models\Kupit; // добавлена для связи с категориями
use App\Models\Materialcategory; // добавлена для связи с категориями
use App\Models\Materialpodcategory; // добавлена для связи с категориями
use App\Models\Test_category;
use App\Models\Test_podcategory;
use App\Models\Banner;
use App\Models\Poputka_taxi_prilojenie_name;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class HomeController extends Controller
{

    public function login2(Request $request)
    {
        

        $user = User::where('email', $request->email)
        ->orWhere('phone', $request->email)
        ->first();

        if ( $user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user, true);
                return redirect('/');
            }else{
                return redirect()->back()->with([
                    'success2' => 'Пароль туура эмес',
                    'email' => $request->email
                ]);
            }
        }else{
            return redirect()->back()->with([
                'success2' => 'Мындай колдонуучу жок',
                'email' => $request->email
            ]);
        }

        
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::withCount('podcategories2', 'kupit')->get();
        $banners = Banner::where('status', 1)->where('for_view_role', 1)->orderBy('updated_at', 'desc')->get();
        $materialcategories = Materialcategory::where('dop_category', 0)->withCount('materialy', 'kupitmaterialov')->get();
        $materialcategories2 = Materialcategory::where('dop_category', 1)->withCount('materialy', 'kupitmaterialov')->get();
        $plan_conspekts = Materialcategory::where('dop_category', 4)->withCount('materialy', 'kupitmaterialov')->get();

        $test_podcategories = Test_category::where('dop_category', 1)->withCount('testy', 'tests_kupit')->get();
        $online_tests = Test_category::where('dop_category', 0)->withCount('testy', 'tests_kupit')->get();

       $count_cat = Materialcategory::where('dop_category', 2)->count();
        if($count_cat > 1){
            $shablons = Materialcategory::where('dop_category', 2)->withCount('materialy', 'kupitmaterialov')->get();
        }else{
            $shablons2 = Materialcategory::where('dop_category', 2)->first();
            if ($shablons2->id) {
                $shablons = Materialpodcategory::where('materialcategory_id', $shablons2->id)->withCount('materialy', 'kupitmaterialov')->get();
            }
        }

        $count_cat2 = Materialcategory::where('dop_category', 3)->count();
        if($count_cat2 > 1){
            $gramotas = Materialcategory::where('dop_category', 3)->withCount('materialy', 'kupitmaterialov')->get();
        }else{
            $gramotas2 = Materialcategory::where('dop_category', 3)->first();
            if ($gramotas2->id) {
                $gramotas = Materialpodcategory::where('materialcategory_id', $gramotas2->id)->withCount('materialy', 'kupitmaterialov')->get();
            }
        }

        return view('welcome', [
            'categories' => $categories,
            'materialcategories' => $materialcategories,
            'materialcategories2' => $materialcategories2,
            'test_podcategories' => $test_podcategories,
            'plan_conspekts' => $plan_conspekts,
            'shablons' => $shablons,
            'gramotas' => $gramotas,
            'banners' => $banners,
            'online_tests' => $online_tests,
        ]);
    }


    public function ort_view1($subdomain)
    {
        if ($subdomain === 'ort') {
            $banners = Banner::where('status', 1)->where('for_view_role', 2)->orderBy('updated_at', 'desc')->get();
        
            return view('ort.ort_view1', [
                'banners' => $banners,
            ]);
        }
        elseif ($subdomain === 'poputka-taxi') {
            $prilojenie_names = Poputka_taxi_prilojenie_name::get();
            return view('poputka_taxi.poputka_taxi__prilojenie_index', [
                'prilojenie_names' => $prilojenie_names,
            ]);
        }
        else {
            $banners = Banner::where('status', 1)->where('for_view_role', 2)->orderBy('updated_at', 'desc')->get();
        
            return view('ort.ort_view1', [
                'banners' => $banners,
            ]);
        }
    }

    public function ort_politika_confidensialnosti($subdomain)
    {
       return view('contact.ort_politika_confidensialnosti');
    }
    
    public function ort_password_reset($subdomain)
    {
       return view('ort.profile.email');
    }
    
    public function ort_register($subdomain)
    {
       return view('ort.profile.register');
    }

    public function ort_login($subdomain)
    {
       return view('ort.profile.login');
    }


    
    public function ort_contact()
    {
       return view('contact.ort_contact');
    }

    public function contact()
    {
       return view('contact.contact');
    }

    public function jardam()
    {
       return view('contact.jardam');
    }



    public function vse_kursy()
    {
        $podcategories = Podcategory::orderBy('created_at', 'desc')->get();
        $categories = Category::where('id', '!=', 21)->withCount('podcategories2', 'kupit', 'podcategories3')->get();
        
       return view('pajes/vse_kursy', [
        'categories' => $categories,
        'podcategories' => $podcategories,
       ]);
    }

    public function vse_testy($for_action)
    {
        if ($for_action == 1) {
            $test_categories = Test_category::where('dop_category', $for_action)->withCount('testy', 'tests_kupit')->get();
            $category = Category::where('id', 21)->withCount('podcategories', 'kupit')->first();

           return view('pajes/vse_testy', [
            'test_categories' => $test_categories,
            'for_action' => $for_action,
            'category' => $category,
           ]);
        }else{
            $test_categories = Test_category::where('dop_category', $for_action)->withCount('testy', 'tests_kupit')->get();

               return view('pajes/vse_testy', [
                'test_categories' => $test_categories,
                'for_action' => $for_action,
               ]);
        }
        
    }



    public function vse_materialy($for_action)
    {
        $count_cat = Materialcategory::where('dop_category', $for_action)->count();
        
        if($count_cat > 1){
            $materialcategories = Materialcategory::where('dop_category', $for_action)->withCount('materialy', 'kupitmaterialov')->get();
            return view('pajes/vse_materialy', [
                'materialcategories' => $materialcategories,
                'for_action' => $for_action,
            ]);
        }else{
            $materialcategories = Materialcategory::where('dop_category', $for_action)->first();
    
           return redirect()->route('materialpodcategory', ['for_action' => $for_action, 'materialcategory' => $materialcategories->id]);
        }
    }
}