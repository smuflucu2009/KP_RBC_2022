<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;


    protected $table = 'dosen';
    protected $primaryKey = 'id';
    protected $fillable = [
        "name"


    ];

    protected $hidden = [

        "created_at",
        "updated_at",

    ];

    public function Dosens(){
        return $this->hasMany(kp::class, 'dosen_id', 'id');
    }

    public function Dosens2(){
        return $this->hasMany(kp::class, 'dosen2_id', 'id');
    }

    public function DosensSk(){
        return $this->hasMany(Skripsi::class, 'dosen_id', 'id');
    }

    public function Dosens2Sk(){
        return $this->hasMany(Skripsi::class, 'dosen2_id', 'id');
    }
}


