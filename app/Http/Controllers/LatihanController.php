<?php

namespace App\Http\Controllers;

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
}
