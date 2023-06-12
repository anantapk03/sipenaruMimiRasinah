<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DaftarLatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_anggota',
        'id_latihans',
        'id_daftar',
        'status',
        'konfimasi_pembayaran',
    ];

    public static function datapeserta_latihan($id_latihan){
        $data2 = DB::table('daftar_latihans')
        ->leftJoin('users', 'daftar_latihans.id_anggota', '=', 'users.id')
        ->where('id_latihans', $id_latihan)
        ->select('id_daftar','id', 'nama')
        ->get()->toArray();
        return $data2;
        
    }
}
