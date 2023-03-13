<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login function
    public function login (){
        return view ('auth');
    }

    public function postlogin (Request $request){

        // $credentials = $request->validate([
        //     'email' => ['required', 'email:dns'],
        //     'password' => ['required'],

        // ]);

        // $remember_me= $request->has('rememberme')?true:false;

        // if (Auth::attempt($credentials,$remember_me)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('dashboard');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect ('/dashboard');
        }

        // return redirect ('/user/auth');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout (){
        Auth::logout();
        return redirect ('/user/auth');
    }
}
