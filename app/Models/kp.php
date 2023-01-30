<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Do_;

class kp extends Model
{
    // ul ini kalo mau pake softdelete tinggal tulis kasih soft delete sama tambahin kolom deleted_at
    use HasFactory;



    protected $table = 'kp';
    protected $primaryKey = 'id';
    protected $fillable = [
        "name",
        "nim",
        "bidang_id",
        "tahun",
        "judul",
        "perusahaan",
        "lokasi_perusahaan",
        "dosen_id",
        "dosen2_id",
        "abstrak",
        "file"

    ];


    public $appends = [
        'file_url'
    ];
    protected $hidden = [
        "bidang_id",
        "dosen_id",
        "dosen2_id",
        "created_at",
        "updated_at",
        'file'
    ];




    public function Bidang(){
        return $this->belongsTo(Bidang::class, 'bidang_id', 'id');
    }

    public function Dosen(){
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }
    public function Dosen2(){
        return $this->belongsTo(Dosen::class, 'dosen2_id', 'id');
    }

    public function getFileUrlAttribute(){
        return asset(env('APP_URL') . 'app/' . $this->file);
    }



}

