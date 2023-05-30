<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function index(){
        return view('admin.dashboard');
    }

    function mengelola_petugassanggar (Request $request){
        $data = DB::table('users')->where('level', 'petugas')->get();
        return view('admin.mengelola_petugassanggar', ['data'=>$data]);
    }

    function form_addpetugas(){
        
        return view('admin.form_addpetugas');
    }

    function add_petugas(Request $request){
        $data=new User(); 
        $data->email = $request -> email;
        $data->nama = $request->nama;
        $data->image = $request->image;
        $data->no_wa = $request->no_wa;
        $data->alamat = $request->alamat;
        $data->password = bcrypt($request->password);
        $data->level = 'petugas';

        if($request->hasFile('image')){
            $request->file('image')->move('fotopetugassanggar/', $request->file('image')->getClientOriginalName());
            $data->image=$request->file('image')->getClientOriginalName();
            $data->save();
        } else{
            $data->save();
        }
        return redirect('admin/mengelola_petugassanggar')->with('success', 'Data Berhasil ditambahkan');
    }

    function tampil_datapetugas(Request $request, $id){
        $data=DB::table('users')->where('id',$id)->first();
        return view('admin.edit_data', ['data'=>$data]);
    }

    function edit_passpetugas(Request $request, $id){
        $data = User::find($id);
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect('admin/mengelola_petugassanggar')->with('success', 'Data Password Berhasil Diubah!');
    }

    function hapus_datapetugas(Request $request, $id){
        $data = User::find($id);
        $data->delete();
        return redirect('admin/mengelola_petugassanggar')->with('success', 'Data Berhasil dihapus!');
    }
}
