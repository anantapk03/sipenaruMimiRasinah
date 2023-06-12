<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'nama'=>'Admin',
                'email'=>'dummy4@email.com',
                'password'=>bcrypt('123456'),
                'alamat'=>'dummy address',
                'image'=>'ANANTA P K.jpg',
                'no_wa'=>"6283843726598",
                'level'=>'admin'
            ]
        );
    }
}
