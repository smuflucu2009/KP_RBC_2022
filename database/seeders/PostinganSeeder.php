<?php

namespace Database\Seeders;

use App\Models\CategoryPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postingan = [ 
            [
                'name_category' => 'Info Magang',
            ],
            [
                'name_category' => 'Info Lomba',
            ],
            [
                'name_category' => 'Research News',
            ],
            [
                'name_category' => 'Meditekkom',
            ],
        ];
        foreach($postingan as $key => $value) {
            CategoryPost::create($value);
        }
    }
}
