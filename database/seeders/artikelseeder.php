<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class artikelseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikels')->insert([
            'judul' => 'judul',
            'preview' => 'preview',
            'isi_artikel' => 'isi_artikel',
            'id'=>1,
            'image_artikel'=>'aerlirasinah'
        ]);
        DB::table('artikels')->insert([
            'judul' => 'judul2',
            'preview' => 'preview',
            'isi_artikel' => 'isi_artikel',
            'id'=>1,
            'image_artikel'=>'aerlirasinah'
        ]);
    }
}
