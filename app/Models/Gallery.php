<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galery';
    protected $fillable = [
        'post_id', 'file'
    ];


    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'file',

    ];

    public $timestamps = false;

    public $appends = [
        'file_url'
    ];

    public function getFileUrlAttribute(){
        return asset(env('APP_URL') . 'storage/' . $this->file);
    }

    public function Post(){
        return $this->belongsTo(Postingan::class, 'post_id', 'id_posting');
    }
}
