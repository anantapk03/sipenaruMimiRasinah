<?php

namespace App\Http\Controllers;

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
            $data2 = DB::table('via_pembayarans')->get();
            $title='| Data Latihan';
            $date_now = Carbon::now();
            return view('anggota.data_latihan',compact('data', 'title','data2','date_now'));
    }
}
