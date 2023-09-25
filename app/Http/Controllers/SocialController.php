<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;




class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser, true);

                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('user'),
                ]);

                Auth::login($createUser, true);

                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser, true);

                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('user'),
                ]);

                Auth::login($createUser, true);

                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


    public function instagramRedirect()
    {
        return Socialite::driver('instagram')->redirect();
    }

    public function loginWithInstagram()
    {
        try {
            $user = Socialite::driver('instagram')->user();
            $isUser = User::where('instagram_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser, true);

                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'instagram_id' => $user->id,
                    'password' => encrypt('user'),
                ]);

                Auth::login($createUser, true);

                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}