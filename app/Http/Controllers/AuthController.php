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
        if(Auth::attempt($request->only('email','password'))){
            return redirect ('/dashboard');
        }

        return redirect ('/user/auth');
    }

    public function logout (){
        Auth::logout();
        return redirect ('/user/auth');
    }
}
