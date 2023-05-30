<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasSanggar extends Model
{
    use HasFactory;
    protected $fillable = ['email','nama', 'no_wa', 'level', 'alamat','password', 'id', 'image'];
}
