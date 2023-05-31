<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function index(){
        $title="Admin | Dashboard";
        return view('admin.dashboard', ['title' => $title]);
    }

    function mengelola_petugassanggar (Request $request){
        $data = DB::table('users')->where('level', 'petugas')->get();
        $title = 'Admin | Mengelola Data Petugas';
        return view('admin.mengelola_petugassanggar', ['data'=>$data,'title'=>$title]);
    }

    function form_addpetugas(){

        $title="Admin | Tambah Data Petugas";
        return view('admin.form_addpetugas', ['title'=>$title]);
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
        $title = "Admin | Edit Data Petugas";
        return view('admin.edit_data', ['data'=>$data, 'title'=>$title]);
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

    function mengelola_admin (Request $request){
        $data = DB::table('users')->where('level', 'admin')->get();
        $title = 'Admin | Mengelola Data Admin';
        return view('admin.mengelola_admin', ['data'=>$data,'title'=>$title]);
    }

    function form_addadmin(){

        $title="Admin | Tambah Data Admin";
        return view('admin.form_addadmin', ['title'=>$title]);
    }

    function add_admin(Request $request){
        $data=new User(); 
        $data->email = $request -> email;
        $data->nama = $request->nama;
        $data->image = $request->image;
        $data->no_wa = $request->no_wa;
        $data->alamat = $request->alamat;
        $data->password = bcrypt($request->password);
        $data->level = 'admin';

        if($request->hasFile('image')){
            $request->file('image')->move('fotopetugassanggar/', $request->file('image')->getClientOriginalName());
            $data->image=$request->file('image')->getClientOriginalName();
            $data->save();
        } else{
            $data->save();
        }
        return redirect('admin/mengelola_admin')->with('success', 'Data Berhasil ditambahkan');
    }

    function hapus_dataadmin(Request $request, $id){
        $data = User::find($id);
        $data->delete();
        return redirect('admin/mengelola_admin')->with('success', 'Data Berhasil dihapus!');
    }

    function tampil_dataadmin(Request $request, $id){
        $data=DB::table('users')->where('id',$id)->first();
        $title = "Admin | Edit Data Admin";
        return view('admin.edit_dataadmin', ['data'=>$data, 'title'=>$title]);
    }

    function edit_passadmin(Request $request, $id){
        $data = User::find($id);
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('admin/mengelola_admin')->with('success', 'Data Password Berhasil Diubah!');
    }

}
