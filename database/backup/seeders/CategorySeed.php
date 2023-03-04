<?php

namespace Database\Seeders;

use App\Models\CategoryPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = [
            [
                'id' => '1',
                'name_category' => 'Info Magang',
            ],
            [
                'id' => '2',
                'name_category' => 'Info Lomba',
            ],
            [
                'id' => '3',
                'name_category' => 'Research News',
            ],
            [
                'id' => '4',
                'name_category' => 'Meditekkom',
            ],
        ];
        foreach($seed as $key => $value) {
            CategoryPost::create($value);
        }
    }
}
