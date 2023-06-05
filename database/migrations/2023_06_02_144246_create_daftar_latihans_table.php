<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarLatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_latihans', function (Blueprint $table) {
            $table->id('id_daftar');
            $table->foreignId('id_latihans')->references('id_latihan')->on('latihans');
            $table->string('konfirmasi_pembayaran');
            $table->foreignId('id_anggota')->references('id')->on('users');
            $table->enum('status',['Menunggu', 'Dikonfirmasi', 'Tolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_latihans');
    }
}
