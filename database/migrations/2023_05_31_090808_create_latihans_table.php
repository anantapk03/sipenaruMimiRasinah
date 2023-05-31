<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latihans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_latihan');
            $table->dateTime('mulai_pendaftaran');
            $table->dateTime('selesai_pendaftaran');
            $table->dateTime('mulai_latihan');
            $table->dateTime('selesai_latihan');
            $table->string('deskripsi_latihan');
            $table->foreignId('id_pelatih');
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
        Schema::dropIfExists('latihans');
    }
}
