<?php

namespace App\Http\Controllers;

use App\Models\DaftarLatihan;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    //
    function index(){
        $title = '| Dashboard';
        return view('anggota.dashboard', compact('title'));
    }
    function edit_anggota($id){
        $data=DB::table('users')->where('id',$id)->first();
        $title = " | Edit Data Admin";
        return view('anggota.edit_dataanggota', ['data'=>$data, 'title'=>$title]);
    }
    function edit_passanggota(Request $request, $id){
        $data = User::find($id);
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect('anggota')->with('success', 'Data Password Berhasil Diubah!');
    }

    function data_latihan(){
            $data = DB::table('latihans')
            ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
            ->orderByDesc('selesai_pendaftaran')
            ->get();
            // $data2 = DB::table('via_pembayarans')->get();
            $title='| Data Latihan';
            $date_now = Carbon::now();
            $id = Auth::user()->id;
            $data2 = DB::table('daftar_latihans')
            ->leftJoin('latihans', 'daftar_latihans.id_latihans', '=', 'latihans.id_latihan')
            ->leftJoin('users', 'daftar_latihans.id_anggota','=','users.id')
            ->where('id', '=', $id)
            ->get();
            // $data2 = DB::table('daftar_latihans')->where('id_anggota',$id)->get();
            return view('anggota.data_latihan',compact('data', 'title','date_now','data2'));
    }

    function tampil_daftarlatihan($id_latihan){
        
        $data = DB::table('latihans')
        ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
        ->where('id_latihan', $id_latihan)
        ->first();
        $data2 = DB::table('via_pembayarans')->get();
        $title = "| Daftar Latihan";
        return view('anggota.form_daftarlatihan',compact('data','data2', 'title'));
    }

    function post_datapendaftaran(Request $request, $id_latihan){
        $data = new DaftarLatihan ();
        $data->id_anggota = auth()->user()->id;
        $data->id_latihans = $id_latihan;
        $data->konfirmasi_pembayaran = $request->konfirmasi_pembayaran;
        $data->status = "Menunggu";

        if($request->hasFile('konfirmasi_pembayaran')){
            $request->file('konfirmasi_pembayaran')->move('buktipembayaran/', $request->file('konfirmasi_pembayaran')->getClientOriginalName());
            $data->konfirmasi_pembayaran=$request->file('konfirmasi_pembayaran')->getClientOriginalName();
            $data->save();
        } else{
            $data->save();
        }

        return redirect('anggota/data_latihan')->with('berhasil','Pendaftaran Anda telah selesai, tunggu konfirmasi berikutnya');
    }

    public function aksestiketlatihan($id_latihan, $id_daftar){

        $data = DB::table('latihans')
        ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
        ->where('id_latihan', $id_latihan)
        ->first();
        $data2 = DB::table('daftar_latihans')
            ->leftJoin('latihans', 'daftar_latihans.id_latihans', '=', 'latihans.id_latihan')
            ->where('id_daftar', $id_daftar)
            ->first();
        $title = "| Akses Tiket Latihan";
        return view('anggota.tiket_latihan', compact('title', 'data', 'data2'));
    }
}
