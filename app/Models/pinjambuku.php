<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjambuku extends Model
{
    use HasFactory;
    protected $table = "pinjambuku";
    protected $fillable = ['id_user', 'kode_gabungan_final', 'akhir_pinjam'];
}
