<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialliteController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $socialuser =  Socialite::driver('google')->stateless()->user();

        $registerUser = User::where('google_id', $socialuser->id)->first();

        if(!$registerUser){
            $user = User::updateOrCreate([
                'google_id' => $socialuser->id,
            ],[
                'name' => $socialuser->name,
                'email' => $socialuser->email,
                'password' => Hash::make('user123'),
                'role' => 'pasien',
                'google_token' => $socialuser->token,
                'google_refresh_token' => $socialuser->refreshToken,
            ]);

            Auth::login($user);

            return redirect()->route('/user/dashboard');
        }
        

        Auth::login($registerUser);

        return redirect()->route('/user/dashboard')->with(Session::flash('berhasil_login', true));
    }
}
