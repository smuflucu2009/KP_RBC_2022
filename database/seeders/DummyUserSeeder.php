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
                'nama' => 'Admin Tampan dan Cantik (??)',
                'nim' => '1',
                'email' => 'adminrbc2008@gmail.com',
                'role' => 'admin',
                'password' =>bcrypt('tekkom2008')
            ],
            [
                'nama' => 'Mahasiswa Teladan',
                'nim' => '2',
                'email' => 'mahasiswa@gmail.com',
                'role' => 'mahasiswa',
                'password' =>bcrypt('mahasiswa')
            ],
            [
                'nama' => 'Koordinator RBC',
                'nim' => '3',
                'email' => 'koordinatorrbc@gmail.com',
                'role' => 'koor',
                'password' =>bcrypt('rbc2022')
            ]
        ];

        foreach ($userdata as $key => $val) {
            User::create($val);
        }
    }
}
