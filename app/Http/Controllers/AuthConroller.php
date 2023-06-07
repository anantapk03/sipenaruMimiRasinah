<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
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

    function register_anggota (Request $request){
        $data=new User(); 
        $data->email = $request ->email;
        $data->nama = $request->nama;
        $data->image = $request->image;
        $data->no_wa = $request->no_wa;
        $data->alamat = $request->alamat;
        $data->password = bcrypt($request->password);
        $data->level = 'anggota';

        if($request->hasFile('image')){
            $request->file('image')->move('fotoanggota/', $request->file('image')->getClientOriginalName());
            $data->image=$request->file('image')->getClientOriginalName();
            $data->save();
        } else{
            $data->save();
        }

        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials)){
            $user=Auth::user();
            if ($user->level=="anggota"){
                return redirect()->intended('anggota');
            }
        }
    }
}
