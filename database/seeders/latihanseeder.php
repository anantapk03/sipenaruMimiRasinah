<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class latihanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('latihans')->insert([
            'nama_latihan'=>'Latihan 1',
            'mulai_pendaftaran'=>'2023-01-01 00:00:00',
            'selesai_latihan'=>'2023-02-01 00:00:00',
            'mulai_latihan'=>'2023-02-01 00:00:00',
            'selesai_pendaftaran'=>'2023-02-28 00:00:00',
            'id_pelatih'=>'1',
            'deskripsi_latihan'=>'Hallo Ini Adalah Deskripsi Latihan'
        ]);

        DB::table('latihans')->insert([
            'nama_latihan'=>'Latihan 2',
            'mulai_pendaftaran'=>'2023-01-01 00:00:00',
            'selesai_latihan'=>'2023-02-01 00:00:00',
            'mulai_latihan'=>'2023-02-01 00:00:00',
            'selesai_pendaftaran'=>'2023-02-28 00:00:00',
            'id_pelatih'=>'1',
            'deskripsi_latihan'=>'Hallo Ini Adalah Deskripsi Latihan'
        ]);

        DB::table('latihans')->insert([
            'nama_latihan'=>'Latihan 3',
            'mulai_pendaftaran'=>'2023-01-01 00:00:00',
            'selesai_latihan'=>'2023-02-01 00:00:00',
            'mulai_latihan'=>'2023-02-01 00:00:00',
            'selesai_pendaftaran'=>'2023-02-28 00:00:00',
            'id_pelatih'=>'2',
            'deskripsi_latihan'=>'Hallo Ini Adalah Deskripsi Latihan'
        ]);
    }
}
