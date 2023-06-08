<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_anggota',
        'id_latihan',
        'id_daftar',
        'status',
        'konfimasi_pembayaran',
    ];
}
