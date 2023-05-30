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
                'nama'=>'Dummy 1',
                'email'=>'dummy@email.com',
                'password'=>bcrypt('123456'),
                'alamat'=>'dummy address',
                'image'=>'ANANTA P K.jpg',
                'no_wa'=>"6283843726598",
                'level'=>'admin'
            ]
        );
        DB::table('users')->insert(
            [
                'nama'=>'Dummy 2',
                'email'=>'dummy2@email.com',
                'password'=>bcrypt('123456'),
                'alamat'=>'dummy address',
                'image'=>'ANANTA P K.jpg',
                'no_wa'=>"6283843726598",
                'level'=>'petugas'
            ]
        );
        DB::table('users')->insert(
            [
                'nama'=>'Dummy 3',
                'email'=>'dummy3@email.com',
                'password'=>bcrypt('123456'),
                'alamat'=>'dummy address',
                'image'=>'ANANTA P K.jpg',
                'no_wa'=>"6283843726598",
                'level'=>'anggota'
            ]
        );
    }
}
