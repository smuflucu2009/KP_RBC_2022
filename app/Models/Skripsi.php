<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $table = 'skripsi';
    protected $fillable = [
        "name",
        "nim",
        "bidang_id",
        "tahun",
        "judul",
        "koleksi",
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
        'file',
        'deleted_at'
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
        return asset('https://docs.google.com/viewerng/viewer?url=' . env('APP_URL') . 'storage/pdf/skripsi' . $this->file);
    }

}
