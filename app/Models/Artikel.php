<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_artikel',
        'judul',
        'preview',
        'image_Artikel',
        'mulai_latihan',
        'isi_artikel',
        'selesai_latihan',
        'id',
    ];
}
