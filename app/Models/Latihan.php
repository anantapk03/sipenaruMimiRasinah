<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_latihan',
        'mulai_pendaftaran',
        'selesai_pendaftaran',
        'mulai_latihan',
        'selesai_latihan',
        'id_pelatih',
        'deskripsi_latihan',
    ];
}
