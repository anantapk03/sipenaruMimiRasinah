<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthConroller extends Controller
{
    function index(){
        $warning =null;
        return view('login', array('warning' => $warning));
    }
    function auth_login(Request $request){
        request()->validate(
            [
            'email' =>'required',
            'password' =>'required',
            ]
        );
        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials)){
            $user=Auth::user();
            if($user->level=="admin"){
                return redirect()->intended('admin');
            } else if($user->level=="petugas"){
                return redirect()->intended('petugas');
            } else if ($user->level=="anggota"){
                return redirect()->intended('anggota');
            }
        }
        $warning = "Data yang anda inputkan salah!";
        return view('/login',['warning'=>$warning]);
    }

    function tampilan_register(){
        return view('daftar');
    }

    function logout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
