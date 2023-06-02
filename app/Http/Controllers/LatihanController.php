<?php

namespace App\Http\Controllers;

use App\Models\Latihan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatihanController extends Controller
{
    //

    function index(){
        $data = DB::table('latihans')
            ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
            ->get();
            

        $title = 'Mengelola Data Latihan';
        return view('admin.mengelola_latihan', compact('title', 'data'));
    }

    function tambah_latihan(){
        $data = DB::table('users')->Where('level', 'admin')->orWhere('level', 'petugas')->get();
        
        $title='ADMIN | Menambah Data Latihan';
        return view('admin.form_addlatihan', compact('data','title'));
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
        $data->save();
        return redirect('admin/mengelola_latihan')->with('success', 'Data berhasil ditambahkan!');
    }

    function delete_latihan(Request $request, $id_latihan){
        DB::table('latihans')->where('id_latihan', $id_latihan)->delete();
        return redirect('admin/mengelola_latihan')->with('success', 'Data berhasil dihapus!');
    }

    function edit_latihan(Request $request, $id_latihan){
     $data = DB::table('latihans')->where('id_latihan', $id_latihan)->first();
     $data2 = DB::table('users')->Where('level', 'admin')->orWhere('level', 'petugas')->get();
     $title='Admin | Edit Data Latihan';
     return view('admin.edit_latihan',compact('data', 'data2', 'title'));    
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
        return redirect('admin/mengelola_latihan')->with('success', 'Data berhasil diperbarui!');
    }
}
