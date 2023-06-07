<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    //
    function index(){
        $title = 'Dashboard';
        return view('petugas.dashboard', compact('title'));
    }

    function mengelola_anggota (Request $request){
        $data = DB::table('users')->where('level', 'anggota')->get();
        $title = 'Mengelola Data Anggota';
        return view('petugas.mengelola_anggota', ['data'=>$data,'title'=>$title]);
    }

    function mengelola_latihan(){
        $data = DB::table('latihans')
            ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
            ->get();
        
        $title = 'Mengelola Data Latihan';
        return view('petugas.mengelola_latihan', compact('title', 'data'));
    }

    function tambah_latihan(){
        $data = DB::table('users')->Where('level', 'admin')->orWhere('level', 'petugas')->get();
        
        $title='ADMIN | Menambah Data Latihan';
        return view('petugas.form_addlatihan', compact('data','title'));
    }

    function post_latihan(Request $request){
        $data = new Latihan();
        $data->nama_latihan = $request->nama_latihan;
        $data->mulai_pendaftaran = $request->mulai_pendaftaran;
        $data->selesai_pendaftaran = $request->selesai_pendaftaran;
        $data->mulai_latihan = $request->mulai_latihan;
        $data->selesai_latihan = $request->selesai_latihan;
        $data->deskripsi_latihan = $request->deskripsi_latihan;
        $data->id_pelatih = $request->id_pelatih;
        $data->harga_latihan = $request->harga_latihan;
        $data->save();
        return redirect('petugas/mengelola_latihan')->with('success', 'Data berhasil ditambahkan!');
    }

    function delete_latihan(Request $request, $id_latihan){
        DB::table('latihans')->where('id_latihan', $id_latihan)->delete();
        return redirect('petugas/mengelola_latihan')->with('success', 'Data berhasil dihapus!');
    }

    function edit_latihan(Request $request, $id_latihan){
     $data = DB::table('latihans')->where('id_latihan', $id_latihan)->first();
     $data2 = DB::table('users')->Where('level', 'admin')->orWhere('level', 'petugas')->get();
     $title='Edit Data Latihan';
     return view('petugas.edit_latihan',compact('data', 'data2', 'title'));    
    }

    function update_latihan(Request $request, $id_latihan){
        $data = DB::table('latihans')->where('id_latihan', $id_latihan)
                                     ->update([
                                        'nama_latihan' => $request->nama_latihan,
                                        'mulai_pendaftaran' => $request->mulai_pendaftaran,
                                       'selesai_pendaftaran' => $request->selesai_pendaftaran,
                                       'mulai_latihan' => $request->mulai_latihan,
                                       'selesai_latihan' => $request->selesai_latihan,
                                       'deskripsi_latihan' => $request->deskripsi_latihan,
                                       'id_pelatih' => $request->id_pelatih
                                     ]);
        return redirect('petugas/mengelola_latihan')->with('success', 'Data berhasil diperbarui!');
    }

    function detail_latihan(Request $request, $id_latihan){
        $data = DB::table('latihans')
        ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
        ->where('id_latihan', $id_latihan)
        ->first();
        $data2 = DB::table('daftar_latihans')
        ->leftJoin('users', 'daftar_latihans.id_anggota', '=', 'users.id')
        ->where('id_latihans', $id_latihan)
        ->get();
        $title='Info Detail Latihan';
        return view('petugas.detail_latihan',compact('data', 'title','data2'));
    }

    function konfirmasi_pembayaran($id_daftar){
        $data = DB::table('daftar_latihans')->where('id_daftar',$id_daftar)->first();
        $title = "Konfirmasi Pembayaran";
        return view('petugas.konfirmasi_pembayaran',compact('data', 'title'));
    }

    function update_pembayaran(Request $request, $id_daftar){
        DB::table('daftar_latihans')->where('id_daftar',$id_daftar)
                                  ->update([
                                    'status' => $request->status
                                  ]);
        $data = DB::table('daftar_latihans')->where('id_daftar',$id_daftar)->first();

        return redirect('petugas/detail_datalatihan/'.$data->id_latihans);
    }


    function form_addanggota(){

        $title="Admin | Tambah Data Anggota";
        return view('petugas.form_addanggota', ['title'=>$title]);
    }

    function add_anggota(Request $request){
        $data=new User(); 
        $data->email = $request -> email;
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
        return redirect('petugas/data_anggota')->with('success', 'Data Berhasil ditambahkan');
    }

    
    function tampil_dataanggota(Request $request, $id){
        $data=DB::table('users')->where('id',$id)->first();
        $title = " Edit Data Admin";
        return view('petugas.edit_dataanggota', ['data'=>$data, 'title'=>$title]);
    }

    function edit_passanggota(Request $request, $id){
        $data = User::find($id);
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect('petugas/data_anggota')->with('success', 'Data Password Berhasil Diubah!');
    }

    function hapus_dataanggota(Request $request, $id){
        $data = User::find($id);
        $data->delete();
        return redirect('petugas/data_anggota')->with('success', 'Data Berhasil dihapus!');
    }

}
