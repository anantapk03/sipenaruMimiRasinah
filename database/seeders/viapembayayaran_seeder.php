<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class viapembayayaran_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('via_pembayarans')->insert([
            'nama_bank'=>'BRI',
            'no_rekening'=>'123456789',
        ]);
        DB::table('via_pembayarans')->insert([
            'nama_bank'=>'BNI',
            'no_rekening'=>'987654321',
        ]);
        DB::table('via_pembayarans')->insert([
            'nama_bank'=>'Dana',
            'no_rekening'=>'5432167890',
        ]);

    }
}
