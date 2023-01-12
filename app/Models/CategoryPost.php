<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        "name"
    ];

    protected $hidden = [
        'id',
        "created_at",
        "updated_at",

    ];


    public function Categories(){
        return $this->hasMany(Postingan::class, 'category_id', 'id');
    }
}

