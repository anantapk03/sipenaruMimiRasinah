<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_latihan',
        'nama_latihan',
        'mulai_pendaftaran',
        'selesai_pendaftaran',
        'mulai_latihan',
        'selesai_latihan',
        'id_pelatih',
        'deskripsi_latihan',
    ];
    protected $date = [
        'created_at',
        'updated_at',
        'mulai_pendaftaran',
        'selesai_pendaftaran',
        'mulai_latihan',
       'selesai_latihan',
    ];
}
