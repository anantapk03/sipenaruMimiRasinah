<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class daftarlatihanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar_latihans')->insert([
            'id_latihans'=>5,
            'konfirmasi_pembayaran'=>'data_pembayaran.jpg',
            'id_anggota'=>3,
            'status'=>'Menunggu'
        ]);
        DB::table('daftar_latihans')->insert([
            'id_latihans'=>2,
            'konfirmasi_pembayaran'=>'data_pembayaran.jpg',
            'id_anggota'=>3,
            'status'=>'Menunggu'
        ]);
        DB::table('daftar_latihans')->insert([
            'id_latihans'=>3,
            'konfirmasi_pembayaran'=>'data_pembayaran.jpg',
            'id_anggota'=>3,
            'status'=>'Menunggu'
        ]);
    }
}
