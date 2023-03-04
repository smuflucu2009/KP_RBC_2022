<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $table = "artikel";
    protected $fillable = ['id_artikel', 'judul_artikel', 'jenis_artikel', 'isi_artikel', 'waktu_artikel'];
}
