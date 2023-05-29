<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;

    protected $table = 'postingan';
    protected $fillable = [
        "judul",
        "deskripsi",
        "category_id",
        "cover_gambar",


    ];



    protected $hidden = [

        "created_at",
        "updated_at",
        "deleted_at"

    ];


    public function Category(){
        return $this->belongsTo(CategoryPost::class, 'category_id', 'id');
    }


    public function Galleries(){

        return $this->hasMany(Gallery::class, 'post_id', 'id');
    }


}
