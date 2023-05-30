<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    protected $table = "feedback";
    protected $fillable = ['nama', 'nim', 'kontak', 'jenis_feedback', 'penjelasan', 'penjelasan_rinci', 'waktu_post'];
}
