<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Moderator;
use Illuminate\Support\Facades\DB;
use App\Models\User_vyplaty;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sms_index()
    {
        $sms1s = Sms::orderBy('status')->orderBy('updated_at', 'desc')->paginate(30);
        $moderators = Moderator::where('status', 0)->paginate(30);
        $user_vyplatys = User_vyplaty::where('status', 0)->orderBy('created_at', 'desc')->paginate(30);
        return view('admin.sms.sms_index', [
            'sms1s' => $sms1s,
            'moderators' => $moderators,
            'user_vyplatys' => $user_vyplatys,
        ]);
        
    }

    public function sdelat_moderatorom($id, $user_id)
    {
        $model_has_roles = "App\Models\User";

        $poisk  = DB::table('model_has_roles')->where('model_id', $user_id)->first();

        if ($poisk != null) {
            DB::table('model_has_roles')->where('model_id', $id)->update([
                            'role_id' => 3,
                        ]);
        }else{
            DB::table('model_has_roles')->insert([
                            'role_id' => 3,
                            'model_type' => $model_has_roles,
                            'model_id' => $user_id,
                        ]);
        }

        DB::table('moderators')->where('id', $id)->update([
                            'status' => 1,
                            'updated_at' => date("Y-m-d H:i:s"),
                        ]);
        DB::table('users')->where('id', $user_id)->update([
                            'for_role' => 3,
                        ]);
        return redirect()->back()->withSuccess('Модератордун ролу берилди');
        
    }



    public function udalit_sms($sms_id)
    {
        $sms = Sms::where('id', $sms_id)->first();
        $sms->delete();
        return redirect()->back()->withSuccess2('Sms өчүрүлдү');
    }




    public function otkaz_rola_moderatora($id, $user_id)
    {
        DB::table('moderators')->where('id', $id)->update([
                            'status' => 2,
                            'updated_at' => date("Y-m-d H:i:s"),
                        ]);
        return redirect()->back()->withSuccess2('Модератордун ролунан баш тартылды');
    }




    public function otvet_balans_na_som($id, Request $request)
    {
        $user_vyplaty = User_vyplaty::where('id', $id)->first();
        $user = User::where('id', $user_vyplaty->user_id)->first();
        if ($user->balance > $user_vyplaty->summa) {
            DB::table('user_vyplaties')->where('id', $id)->update([
                            'status' => $request->status,
                            'comment' => $request->comment,
                            'updated_at' => date("Y-m-d H:i:s"),
                        ]);
            DB::table('users')->where('id', $user_vyplaty->user_id)->decrement('balance', $user_vyplaty->summa);
            return redirect()->back()->withSuccess('Акча которулду');
        }else{
            DB::table('user_vyplaties')->where('id', $id)->update([
                            'status' => 2,
                            'comment' => "Балансыңыздагы акча каражаты жетишсиз. Азыраак сумманы көрсөтүңүз!",
                            'updated_at' => date("Y-m-d H:i:s"),
                        ]);
            return redirect()->back()->withSuccess('Азыраак сумманы көрсөтүүсү керек');
        }  
    }





    public function contact_sms_store1(Request $request)
    {
        $sms = new Sms();
        $sms->user_id = \Auth::user()->id;
        $sms->name = \Auth::user()->name;
        $sms->phone = $request->phone;
        $sms->sms = $request->sms;
        $sms->save();

        return redirect()->back()->withSuccess('Сиздин билдирүү ийгиликтүү жөнөтүлдү. Биринчи бошогон оператор сиздин билдирүүнү кабыл алат.');
    }




    public function contact_sms_store2(Request $request)
    {
        $sms = new Sms();
        $sms->name = $request->name;
        $sms->phone = $request->phone;
        $sms->sms = $request->sms;
        $sms->save();

        return redirect()->back()->withSuccess('Сиздин билдирүү ийгиликтүү жөнөтүлдү. Биринчи бошогон оператор сиздин билдирүүнү кабыл алат.');
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
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}