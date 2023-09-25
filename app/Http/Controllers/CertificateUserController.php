<?php

namespace App\Http\Controllers;

use App\Models\Certificate_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   


    public function admin_certificate_users_view()
    {
        $certificate_users = Certificate_user::paginate(50);

        return view('admin.certificate_users.certificate_users_view', [
            'certificate_users' => $certificate_users,
           ]);
    }

    public function proverka_certificatov2()
    {
        return redirect()->route('proverka_certificatov');
    }

    public function proverka_certificatov()
    {
        return view('pajes.proverka_certificatov', [ 
           ]);
    }

    
    public function proverka_sertificatov_search(Request $request)
    {
        $this->validate($request, [
            'fio' => ['required', 'string', 'max:255'],
        ]);

        $certificate_users = Certificate_user::where('fio', $request->fio)->get();

        $search_name = $request->fio;

        return view('pajes.proverka_certificatov_search', [ 
            'certificate_users' => $certificate_users,
            'search_name' => $search_name,
        ]);
    }

    

    

    public function admin_certificate_users_plus()
    {
        return view('admin.certificate_users.certificate_users_plus', [
            
           ]);
    }

    public function admin_certificate_users_plus_store(Request $request)
    {
        $data_nachalo_tura2 = preg_replace('~[^0-9]+~','', $request->data);
        $kun1 = substr($data_nachalo_tura2, 0, -6);
        $ai1 = substr($data_nachalo_tura2, 2, -4);
        $god1 = substr($data_nachalo_tura2, 4);

        $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.'00'.':'.'00'.':'.'00';
        $data_num = strtotime($data_num3);

        if($request->has('fio')){
            $text1 = $request->fio;
            $radio1 = $request->number;
            foreach($text1 as $key => $value)
            {
                $request['for_role']=$request->rol;
                $request['data_in_certificate']=$data_num;
                $request['text']=$request->text_certificata;
                $request['fio']=$text1[$key];
                $request['nomer_certificata']=$radio1[$key];
                Certificate_user::create($request->all());
            }
            return redirect()->route('admin_certificate_users_view')->withSuccess('Сакталды');
        }
        return redirect()->back()->withSuccess2('ФИО кошулган жок');
    }

    public function admin_certificate_users_status($certificate_user_id)
    {
        $certificate_user = Certificate_user::where('id', $certificate_user_id)->first();

        if ($certificate_user->status == 1) {
            DB::table('certificate_users')->where('id', $certificate_user_id)->update([
                'status' => 0,           
            ]);
        }else{
            DB::table('certificate_users')->where('id', $certificate_user_id)->update([
                'status' => 1,           
            ]);
        }

        return response()->json(true);
    }

    public function admin_certificate_users_edit($certificate_user_id)
    {
        $certificate_user = Certificate_user::where('id', $certificate_user_id)->first();

        return view('admin.certificate_users.certificate_users_edit', [
            'certificate_user' => $certificate_user,
           ]);
    }

    public function admin_certificate_users_plus_update(Request $request, $certificate_user_id)
    {
        $data_nachalo_tura2 = preg_replace('~[^0-9]+~','', $request->data);
        $kun1 = substr($data_nachalo_tura2, 0, -6);
        $ai1 = substr($data_nachalo_tura2, 2, -4);
        $god1 = substr($data_nachalo_tura2, 4);

        $data_num3 = $god1.'-'.$ai1.'-'.$kun1.' '.'00'.':'.'00'.':'.'00';
        $data_num = strtotime($data_num3);

        DB::table('certificate_users')->where('id', $certificate_user_id)->update([
            'for_role' => $request->rol, 
            'data_in_certificate' => $data_num, 
            'text' => $request->text_certificata, 
            'fio' => $request->fio, 
            'nomer_certificata' => $request->number,           
        ]);

        return redirect()->route('admin_certificate_users_view')->withSuccess('Өзгөртүлдү');
    }

    public function admin_certificate_users_delete($certificate_user_id)
    {
        $certificate_user = Certificate_user::find($certificate_user_id);
        $certificate_user->delete();
        return redirect()->back()->withSuccess('Сертификат өчүрүлдү');
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
     * @param  \App\Models\Certificate_user  $certificate_user
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate_user $certificate_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate_user  $certificate_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate_user $certificate_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate_user  $certificate_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate_user $certificate_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate_user  $certificate_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate_user $certificate_user)
    {
        //
    }
}
