<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sumbangan extends Model
{
    use HasFactory;

    protected $table = "sumbangan";
    protected $fillable = ['nama', 'nama2', 'nama3', 'nama4', 'nama5', 'nama6', 'nama7', 
    'angkatan_wisuda', 'judul_buku', 'tahun_terbit', 'penulis', 'harga', 'waktu_sumbang'];
}
