<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [ 
            [
                'nama' => 'Admin',
                'id_user' => '1122334455',
                'password' => bcrypt('adminrupawan'),
                'level' => 1,
            ],
            [
                'nama' => 'Raung Kawijayan',
                'id_user' => '21120120140155',
                'password' => bcrypt('21120120140155'),
                'level' =>2,
            ],
        ];
        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
