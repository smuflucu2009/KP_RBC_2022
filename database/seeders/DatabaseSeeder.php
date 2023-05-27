<?php

namespace Database\Seeders;
use App\Models\Dosen;
use App\Models\Bidang;
use App\Models\CategoryPost;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Dosen::create([

        //     'nama_dosen' => 'Pak Ibra',

        // ]);

        $seeds = [
            [

                'nama_dosen' => 'Dania Eridani S.T., M.Eng'
            ],
            [

                'nama_dosen' => 'Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE'
            ],
            [

                'nama_dosen' => 'Eko Didik Widianto S.T., M.T.'
            ],
            [

                'nama_dosen' => 'Rinta Kridalukmana, M.Kom., MT., PhD'
            ],
            [

                'nama_dosen' => 'Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM'
            ],
            [

                'nama_dosen' => 'Kurniawan Teguh Martono S.T., M.T.'
            ],
            [

                'nama_dosen' => 'Risma Septiana S.T., M.Eng.'
            ],
            [

                'nama_dosen' => 'Ike Pertiwi Windasari S.T., M.T.'
            ],
            [

                'nama_dosen' => 'Adnan Fauzi S.T., M.Kom.'
            ],
            [

                'nama_dosen' => 'Dr. Oky Dwi Nurhayati S.T., M.T.'
            ],
            [

                'nama_dosen' => 'Agung Budi Prasetijo S.T., M.I.T., Ph.D.'
            ],
            [

                'nama_dosen' => 'Patricia Evericho Mountaines, S.T., M.Cs.'
            ],
        ];
        foreach($seeds as $seed) {
            Dosen::create($seed);
        }

        $bidangs = [
            [

                'nama_bidang' => 'RPL'
            ],
            [

                'nama_bidang' => 'Multimedia'
            ],
            [

                'nama_bidang' => 'Jaringan'
            ],
            [

                'nama_bidang' => 'Embedded'
            ],
        ];
        foreach($bidangs as  $bidang) {
            Bidang::create($bidang);
        }

        $categories = [
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
        foreach($categories as $category ) {
            CategoryPost::create($category);
        }

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
