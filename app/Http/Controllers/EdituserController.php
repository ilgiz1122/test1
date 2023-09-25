<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EdituserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

       return view('admin.user.index', [
        'users' => $users
       ]);
    }




    public function index2()
    {
        $users = User::where('id', \Auth::user()->id)->first();

       return view('pajes.user', [
        'users' => $users
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
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user'=>$user
        ]);
    }


    public function edit2(User $users)
    {
        $users = User::where('id', \Auth::user()->id)->first();
        return view('pajes.edituser', [
            'users'=>$users
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->balance = $request->balance;
        $user->save();

        return redirect('admin_panel/user')->withSuccess('Данные пользователья успешно обновлена!');
    }



    public function update2(Request $request, User $users)
    {
        $users->name = $request->name;
        $users->save();

        return redirect('/')->withSuccess('Данные пользователья успешно обновлена!');
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