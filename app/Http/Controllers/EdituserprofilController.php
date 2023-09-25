<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partnerka;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Kupitmaterialov;
use App\Models\Oblast;
use App\Models\Raion_shaar;
use App\Models\Popolnenie_balans;
use App\Models\Popolnenie_balans_result;
use Paybox\Pay\Facade as Paybox;

use App\Models\Moderator;
use App\Models\User_vyplaty;


use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;

class EdituserprofilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', \Auth::user()->id)->withCount('kupitmaterialov')->first();
        $role = DB::table('model_has_roles')->where('model_id', \Auth::user()->id)->first();
        $partnerka = Partnerka::where('user_id', \Auth::user()->id)->withCount('kupitmaterialov', 'kupit')->get();
        $part = DB::table('partner_pribyls')->where('user_id', \Auth::user()->id)->sum('summa');

        $variant_vyplaty1 = DB::table('variant_vyplaties')->where('vid', 1)->get();
        $variant_vyplaty2 = DB::table('variant_vyplaties')->where('vid', 2)->get();
        $variant_vyplaty3 = DB::table('variant_vyplaties')->where('vid', 3)->get();
        $variant_vyplaty4 = DB::table('variant_vyplaties')->where('vid', 4)->get();

        $moderator = Moderator::where('user_id', \Auth::user()->id)->count();
        $moderator1 = Moderator::where('user_id', \Auth::user()->id)->where('status', 0)->first();
        $moderator2 = Moderator::where('user_id', \Auth::user()->id)->where('status', 2)->get();
        $moderator3 = Moderator::where('user_id', \Auth::user()->id)->where('status', 1)->count();

        $user_vyplatys = User_vyplaty::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $oblast = Oblast::get();
        $raion_shaar = Raion_shaar::get();

       return view('pajes.user', [
        'users' => $users,
        'model_has_roles' => $role,
        'partnerka' => $partnerka,
        'part' => $part,
        'variant_vyplaty1' => $variant_vyplaty1,
        'variant_vyplaty2' => $variant_vyplaty2,
        'variant_vyplaty3' => $variant_vyplaty3,
        'variant_vyplaty4' => $variant_vyplaty4,
        'moderator' => $moderator,
        'moderator1' => $moderator1,
        'moderator2' => $moderator2,
        'moderator3' => $moderator3,
        'user_vyplatys' => $user_vyplatys,
        'oblast' => $oblast,
        'raion_shaar' => $raion_shaar,
       ]);
    }

    
    public function ort_profile()
    {
        $users = User::where('id', \Auth::user()->id)->withCount('kupitmaterialov')->first();
        $role = DB::table('model_has_roles')->where('model_id', \Auth::user()->id)->first();
        $partnerka = Partnerka::where('user_id', \Auth::user()->id)->withCount('kupitmaterialov', 'kupit')->get();
        $part = DB::table('partner_pribyls')->where('user_id', \Auth::user()->id)->sum('summa');

        $variant_vyplaty1 = DB::table('variant_vyplaties')->where('vid', 1)->get();
        $variant_vyplaty2 = DB::table('variant_vyplaties')->where('vid', 2)->get();
        $variant_vyplaty3 = DB::table('variant_vyplaties')->where('vid', 3)->get();
        $variant_vyplaty4 = DB::table('variant_vyplaties')->where('vid', 4)->get();

        $moderator = Moderator::where('user_id', \Auth::user()->id)->count();
        $moderator1 = Moderator::where('user_id', \Auth::user()->id)->where('status', 0)->first();
        $moderator2 = Moderator::where('user_id', \Auth::user()->id)->where('status', 2)->get();
        $moderator3 = Moderator::where('user_id', \Auth::user()->id)->where('status', 1)->count();

        $user_vyplatys = User_vyplaty::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $oblast = Oblast::get();
        $raion_shaar = Raion_shaar::get();

       return view('ort.profile.user', [
        'users' => $users,
        'model_has_roles' => $role,
        'partnerka' => $partnerka,
        'part' => $part,
        'variant_vyplaty1' => $variant_vyplaty1,
        'variant_vyplaty2' => $variant_vyplaty2,
        'variant_vyplaty3' => $variant_vyplaty3,
        'variant_vyplaty4' => $variant_vyplaty4,
        'moderator' => $moderator,
        'moderator1' => $moderator1,
        'moderator2' => $moderator2,
        'moderator3' => $moderator3,
        'user_vyplatys' => $user_vyplatys,
        'oblast' => $oblast,
        'raion_shaar' => $raion_shaar,
       ]);
    }

    public function zaiavka_balansa_na_som(Request $request)
    {
        $balance = $request->balans_na_som * 100;
        if($balance < \Auth::user()->balance){
            if ($request->nomer_karty != null){
                $schet = $request->nomer_karty;
            }
            if ($request->nomer_telefona != null){
                $schet = $request->nomer_telefona;
            }
            if ($request->nomer_kashelka != null){
                $schet = $request->nomer_kashelka;
            }

            $user_vyplaty = new User_vyplaty();
            $user_vyplaty->user_id = \Auth::user()->id;
            $user_vyplaty->variant = $request->value02;
            $user_vyplaty->schet = $schet;
            $user_vyplaty->summa = $request->balans_na_som * 100;
            $user_vyplaty->save();

            $user = User::where('id', \Auth::user()->id)->first();
            if($user->phone != null){
                return redirect()->back()->withSuccess('Өтүнүч кабыл алынды. Биринчи бошогон адис сиз менен байланышат.');
            }else{
                return redirect()->back()->withSuccess('Өтүнүч кабыл алынды. Биринчи бошогон адис сиз менен байланышат. Сураныч, профилге кирип телефон номериңизди толтуруп коюңуз.');
            }
        }else{
            return redirect()->back()->withSuccess2('Балансыңыз жетишсиз, азыраак сумманы көрсөтүңүз!');
        }   
    }
    
    
    
    
    public function popolnenie_balansa(Request $request)
    {
        $user_id = \Auth::user()->id;
        $pg_order_id = $user_id.'.'.time();
        
        DB::table('users')->where('id', \Auth::user()->id)->update(['balance_test' => $request->summa_balansa,]); 
        
        /**$platej = new Popolnenie_balans();
        $platej->user_id = \Auth::user()->id;
        $platej->order_id = $pg_order_id;
        $platej->amount = $request->summa_balansa;
        $platej->save();*/
        
        $paybox = new Paybox();
        $paybox->merchant->id = 540780;
        $paybox->merchant->secretKey = '63fm1t4MPxYLd0lu';
        $paybox->order->description = 'Пополнение баланса';
        $paybox->order->amount = $request->summa_balansa;
        $paybox->order->order_id = $pg_order_id;
        $paybox->order->salt = \Auth::user()->id.'.'.time().time();
        $paybox->order->sig = 'paybox_signature';
        /** $paybox->pg_payment_route = 'frame';currency
        $paybox->pg_user_id = \Auth::user()->id;*/
        
        if($paybox->init()) {
            header('Location: https://api.paybox.money/init_payment.php');
        }
    }
    
    public function result_popolnenie_balansa(Request $request)
    {
        if ($request->pg_result != 0) {
            $newprice = $request->pg_net_amount * 100;
            DB::table('users')->where('id', \Auth::user()->id)->increment('balance', $newprice);
        }
        
        $platej1 = new Popolnenie_balans_result();
        $platej1->pg_order_id = $request->pg_order_id;
        $platej1->pg_payment_id = $request->pg_payment_id;
        $platej1->pg_amount = $request->pg_amount;
        $platej1->pg_currency = $request->pg_currency;
        if($request->has('pg_net_amount')){$platej1->pg_net_amount = $request->pg_net_amount;}
        if($request->has('pg_ps_amount')){$platej1->pg_ps_amount = $request->pg_ps_amount;}
        if($request->has('pg_ps_full_amount')){$platej1->pg_ps_full_amount = $request->pg_ps_full_amount;}
        if($request->has('pg_ps_currency')){$platej1->pg_ps_currency = $request->pg_ps_currency;}
        $platej1->pg_payment_system = $request->pg_payment_system;
        $platej1->pg_description = $request->pg_description;
        $platej1->pg_result = $request->pg_result;
        $platej1->pg_payment_date = $request->pg_payment_date;
        $platej1->pg_can_reject = $request->pg_can_reject;
        if($request->has('pg_user_phone')){$platej1->pg_user_phone = $request->pg_user_phone;}
        if($request->has('pg_user_contact_email')){$platej1->pg_user_contact_email = $request->pg_user_contact_email;}
        $platej1->pg_testing_mode = $request->pg_testing_mode;
        if($request->has('pg_captured')){$platej1->pg_captured = $request->pg_captured;}
        if($request->has('pg_card_pan')){$platej1->pg_card_pan = $request->pg_card_pan;}
        if($request->has('pg_salt')){$platej1->pg_salt = $request->pg_salt;}
        if($request->has('pg_sig')){$platej1->pg_sig = $request->pg_sig;}
        $platej1->save();
        
        /**if ($request->pg_result != 0) {
            return redirect()->back()->withSuccess('Поздравляем, ваш баланс пополнен.');
        }
        else{
            return redirect()->back()->withSuccess2('Что то пошло не так, пожалуйста повторите попытку.');
        }*/
    }
    
    public function paybox_success()
    {
       return view('paybox.success');
    }
    
    public function paybox_failure()
    {
       return view('paybox.failure');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function ort_profile_edit($subdomain)
    {
        $users = User::where('id', \Auth::user()->id)->first();
        $role = DB::table('model_has_roles')->where('model_id', \Auth::user()->id)->first();
        $oblast = Oblast::get();
        $raion_shaar = Raion_shaar::get();
        return view('ort.profile.edituser', [
            'users'=>$users,
            'model_has_roles' => $role,
            'oblast' => $oblast,
            'raion_shaar' => $raion_shaar,
        ]);
    }


    public function edit(User $users)
    {
        $users = User::where('id', \Auth::user()->id)->first();
        $role = DB::table('model_has_roles')->where('model_id', \Auth::user()->id)->first();
        $oblast = Oblast::get();
        $raion_shaar = Raion_shaar::get();
        return view('pajes.edituser', [
            'users'=>$users,
            'model_has_roles' => $role,
            'oblast' => $oblast,
            'raion_shaar' => $raion_shaar,
        ]);
    }


    public function edit2(User $users)
    {
        $users = User::where('id', \Auth::user()->id)->first();
        $role = DB::table('model_has_roles')->where('model_id', \Auth::user()->id)->first();
        
        return view('pajes.updatepassword', [
            'users'=>$users,
            'model_has_roles' => $role,
            
        ]);
    }

    public function profile_password($subdomain)
    {
        $users = User::where('id', \Auth::user()->id)->first();
        $role = DB::table('model_has_roles')->where('model_id', \Auth::user()->id)->first();
        
        return view('ort.profile.updatepassword', [
            'users'=>$users,
            'model_has_roles' => $role,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ort_profile_update($subdomain, Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(\Auth::user()->id),],
            // 'f_fio' => ['required', 'string', 'max:255'],
            // 'i_fio' => ['required', 'string', 'max:255'],
            // 'o_fio' => ['required', 'string', 'max:255'],
            // 'aiyl_title' => ['required', 'string', 'max:255'],
            // 'mektep_title' => ['required', 'string', 'max:255'],
            // 'oblast' => ['required', 'string', 'max:255'],
            // 'raion_shaar' => ['required', 'string', 'max:255'],
            //'rebate_image1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,tiff,webp'],
        ]);

        $user_id = \Auth::user()->id;
        


       if ($request->hasFile('rebate_image1')) {
            if (Auth::user()->org_img != null) {
                unlink('storage/users/org_img/'.\Auth::user()->org_img);
            }
            if (Auth::user()->img_80_80 != null) {
                unlink('storage/users/img_80_80/'.\Auth::user()->img_80_80);
            }
            if (Auth::user()->img_160_160 != null) {
                unlink('storage/users/img_160_160/'.\Auth::user()->img_160_160);
            }
            if (Auth::user()->img_250_250 != null) {
                unlink('storage/users/img_250_250/'.\Auth::user()->img_250_250);
            }
            if (Auth::user()->img_600_600 != null) {
                unlink('storage/users/img_600_600/'.\Auth::user()->img_600_600);
            }

            $ratio = 1/1;

            $destinationPath = 'storage/users/org_img/';
            $destinationPath1 = 'storage/users/img_80_80/';
            $destinationPath2 = 'storage/users/img_160_160/';
            $destinationPath3 = 'storage/users/img_250_250/';
            $destinationPath4 = 'storage/users/img_600_600/';

            $file2 = $request->file('rebate_image1');

            $file_extension2 = $file2->getClientOriginalExtension();
            $ogImage = Image::make($file2);

            if ($ogImage->width() < $ogImage->height()) {
                $ogImage1=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio));
            }else{
                $ogImage1=$ogImage->fit($ogImage->height(), intval($ogImage->height() / $ratio));
            }            
            $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
            $ogImage1->save($destinationPath . $ogImagename);

            $thImage1=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(80,80);
            $thImagename1=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage1->save($destinationPath1 . $thImagename1);

            $thImage2=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(160,160);
            $thImagename2=$user_id.'3'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage2->save($destinationPath2 . $thImagename2);

            $thImage3=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(250,250);
            $thImagename3=$user_id.'4'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage3->save($destinationPath3 . $thImagename3);

            if ($ogImage->width() < 600) {
                $thImage4=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio));
            }else{
                $thImage4=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio))->resize(600,600);
            } 
            
            $thImagename4=$user_id.'5'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage4->save($destinationPath4 . $thImagename4);

            Auth::user()->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'f_fio' => $request->input('f_fio'),
                'i_fio' => $request->input('i_fio'),
                'o_fio' => $request->input('o_fio'),
                'oblast_id' => $request->input('oblast'),
                'raion_shaar_id' => $request->input('raion_shaar'),
                'aiyl_title' => $request->input('aiyl_title'),
                'mektep_title' => $request->input('mektep_title'),
                'org_img' => $ogImagename,
                'img_80_80' => $thImagename1,
                'img_160_160' => $thImagename2,
                'img_250_250' => $thImagename3,
                'img_600_600' => $thImagename4,
            ]);
        }else{
            Auth::user()->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'f_fio' => $request->input('f_fio'),
                'i_fio' => $request->input('i_fio'),
                'o_fio' => $request->input('o_fio'),
                'oblast_id' => $request->input('oblast'),
                'raion_shaar_id' => $request->input('raion_shaar'),
                'aiyl_title' => $request->input('aiyl_title'),
                'mektep_title' => $request->input('mektep_title'),
            ]);
        }
        return redirect()->route('ort_profile', ['subdomain' => 'ort'])->withSuccess('Профиль ийгиликтүү өзгөртүлдү');
    }


    public function update(Request $request, User $users)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(\Auth::user()->id),],
            'f_fio' => ['required', 'string', 'max:255'],
            'i_fio' => ['required', 'string', 'max:255'],
            'o_fio' => ['required', 'string', 'max:255'],
            'aiyl_title' => ['required', 'string', 'max:255'],
            'mektep_title' => ['required', 'string', 'max:255'],
            'oblast' => ['required', 'string', 'max:255'],
            'raion_shaar' => ['required', 'string', 'max:255'],
            //'rebate_image1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,tiff,webp'],
        ]);

        $user_id = \Auth::user()->id;
        


       if ($request->hasFile('rebate_image1')) {
            if (Auth::user()->org_img != null) {
                unlink('storage/users/org_img/'.\Auth::user()->org_img);
            }
            if (Auth::user()->img_80_80 != null) {
                unlink('storage/users/img_80_80/'.\Auth::user()->img_80_80);
            }
            if (Auth::user()->img_160_160 != null) {
                unlink('storage/users/img_160_160/'.\Auth::user()->img_160_160);
            }
            if (Auth::user()->img_250_250 != null) {
                unlink('storage/users/img_250_250/'.\Auth::user()->img_250_250);
            }
            if (Auth::user()->img_600_600 != null) {
                unlink('storage/users/img_600_600/'.\Auth::user()->img_600_600);
            }

            $ratio = 1/1;

            $destinationPath = 'storage/users/org_img/';
            $destinationPath1 = 'storage/users/img_80_80/';
            $destinationPath2 = 'storage/users/img_160_160/';
            $destinationPath3 = 'storage/users/img_250_250/';
            $destinationPath4 = 'storage/users/img_600_600/';

            $file2 = $request->file('rebate_image1');

            $file_extension2 = $file2->getClientOriginalExtension();
            $ogImage = Image::make($file2);

            if ($ogImage->width() < $ogImage->height()) {
                $ogImage1=$ogImage->fit($ogImage->width(), intval($ogImage->width() / $ratio));
            }else{
                $ogImage1=$ogImage->fit($ogImage->height(), intval($ogImage->height() / $ratio));
            }            
            $ogImagename=$user_id.'1'.uniqid().rand(1, 1000).time().'.'.$file_extension2;
            $ogImage1->save($destinationPath . $ogImagename);

            $thImage1=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(80,80);
            $thImagename1=$user_id.'2'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage1->save($destinationPath1 . $thImagename1);

            $thImage2=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(160,160);
            $thImagename2=$user_id.'3'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage2->save($destinationPath2 . $thImagename2);

            $thImage3=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(250,250);
            $thImagename3=$user_id.'4'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage3->save($destinationPath3 . $thImagename3);

            if ($ogImage->width() < 600) {
                $thImage4=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio));
            }else{
                $thImage4=$ogImage1->fit($ogImage1->width(), intval($ogImage1->width() / $ratio))->resize(600,600);
            } 
            
            $thImagename4=$user_id.'5'.uniqid().rand(1, 1000).time().'.'.$file_extension2;            
            $thImage4->save($destinationPath4 . $thImagename4);

            Auth::user()->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'f_fio' => $request->input('f_fio'),
                'i_fio' => $request->input('i_fio'),
                'o_fio' => $request->input('o_fio'),
                'oblast_id' => $request->input('oblast'),
                'raion_shaar_id' => $request->input('raion_shaar'),
                'aiyl_title' => $request->input('aiyl_title'),
                'mektep_title' => $request->input('mektep_title'),
                'org_img' => $ogImagename,
                'img_80_80' => $thImagename1,
                'img_160_160' => $thImagename2,
                'img_250_250' => $thImagename3,
                'img_600_600' => $thImagename4,
            ]);
        }else{
            Auth::user()->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'f_fio' => $request->input('f_fio'),
                'i_fio' => $request->input('i_fio'),
                'o_fio' => $request->input('o_fio'),
                'oblast_id' => $request->input('oblast'),
                'raion_shaar_id' => $request->input('raion_shaar'),
                'aiyl_title' => $request->input('aiyl_title'),
                'mektep_title' => $request->input('mektep_title'),
                'org_img' => 1,
            ]);
        }
        return redirect()->route('profil.index', Auth::user()->id)->withSuccess('Профиль успешно обновлена!');
    }


    
    public function ort_profile_password_update($subdomain, Request $request)
    {
        $users = User::find(\Auth::user()->id);

        $request->validate([
            'password' => 'required|string|min:4'
        ]);
        $users->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('ort_profile', ['subdomain' => 'ort'])->withSuccess('Пароль ийгиликтүү өзгөртүлдү');
    }

    public function update2(Request $request, User $users)
    {
        $users = User::find(\Auth::user()->id);

        $request->validate([
            'password' => 'required|string|min:4'
        ]);


        $users->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('profil.index', Auth::user()->id)->withSuccess('Пароль успешно обновлена!');
    }


    public function update22(Request $request, User $users)
    {
        $users = User::find(\Auth::user()->id);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:4|confirmed'
        ]);

        if ( ! Hash::check( $request->old_password, $users->password)){
            return back()->withSuccess2('Пароль не найден в базе данных.');
        }

        $users->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('profil.index', Auth::user()->id)->withSuccess('Пароль успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}