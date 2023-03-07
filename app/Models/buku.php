<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = ['no', 'tanggal_masuk', 'judul_buku', 'penulis', 'penerbit', 'isbn', 'jenis_peminatan', 
    'detail_jenis_peminatan', 'kode_peminatan', 'kode_detail_jenis_peminatan', 'kode_tahun', 'kode_nomor_urut_buku', 'kode_gabungan_final'];
}
