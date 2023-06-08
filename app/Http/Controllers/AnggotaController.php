<?php

namespace App\Http\Controllers;

use App\Models\DaftarLatihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    //
    function index(){
        return view('anggota.dashboard');
    }
    function data_latihan(){
            $data = DB::table('latihans')
            ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
            ->orderByDesc('selesai_pendaftaran')
            ->get();
            // $data2 = DB::table('via_pembayarans')->get();
            $title='| Data Latihan';
            $date_now = Carbon::now();
            return view('anggota.data_latihan',compact('data', 'title','date_now'));
    }

    function tampil_daftarlatihan($id_latihan){
        $data = DB::table('latihans')
        ->leftJoin('users', 'latihans.id_pelatih', '=', 'users.id')
        ->where('id_latihan', $id_latihan)
        ->first();
        $data2 = DB::table('via_pembayarans')->get();
        return view('anggota.form_daftarlatihan',compact('data','data2'));
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
}
