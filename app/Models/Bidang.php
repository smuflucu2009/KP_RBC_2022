<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;


    protected $table = 'bidang';
    protected $primaryKey = 'id';
    protected $fillable = [
        "name",


    ];

    protected $hidden = [

        "created_at",
        "updated_at",

    ];

    public function Bidangs(){
        return $this->hasMany(kp::class, 'bidang_id', 'id');
    }

    public function Bidangs2(){
        return $this->hasMany(Skripsi::class, 'bidang_id', 'id');
    }
}
