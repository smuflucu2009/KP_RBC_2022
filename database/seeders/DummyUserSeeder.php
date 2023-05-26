<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userdata = [
            [
                'nama' => 'Admin Tampan atau Cantik (??)',
                'nim' => '123',
                'email' => 'adminrbctekkom@gmail.com',
                'role' => 'admin',
                'password' =>bcrypt('tekkom2008')
            ],
            [
                'nama' => 'Mahasiswa Teladan',
                'nim' => '213',
                'email' => 'mahasiswa@gmail.com',
                'role' => 'mahasiswa',
                'password' =>bcrypt('123')
            ],
            [
                'nama' => 'Koordinator RBC',
                'nim' => '321',
                'email' => 'koormbakeve2022@gmail.com',
                'role' => 'koor',
                'password' =>bcrypt('koormbakeve2022')
            ]
        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
