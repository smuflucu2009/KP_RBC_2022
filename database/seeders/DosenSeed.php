<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeed extends Seeder
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
                'nama_dosen' => 'Dania Eridani S.T., M.Eng',
            ],
            [
                'id' => '2',
                'nama_dosen' => 'Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE',
            ],
            [
                'id' => '3',
                'nama_dosen' => 'Eko Didik Widianto S.T., M.T.',
            ],
            [
                'id' => '4',
                'nama_dosen' => 'Rinta Kridalukmana, M.Kom., MT., PhD',
            ],
            [
                'id' => '5',
                'nama_dosen' => 'Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM',
            ],
            [
                'id' => '6',
                'nama_dosen' => 'Kurniawan Teguh Martono S.T., M.T.',
            ],
            [
                'id' => '7',
                'nama_dosen' => 'Risma Septiana S.T., M.Eng.',
            ],
            [
                'id' => '8',
                'nama_dosen' => 'Ike Pertiwi Windasari S.T., M.T.',
            ],
            [
                'id' => '9',
                'nama_dosen' => 'Adnan Fauzi S.T., M.Kom.',
            ],
            [
                'id' => '10',
                'nama_dosen' => 'Dr. Oky Dwi Nurhayati S.T., M.T.',
            ],
            [
                'id' => '11',
                'nama_dosen' => 'Agung Budi Prasetijo S.T., M.I.T., Ph.D.',
            ],
            [
                'id' => '12',
                'nama_dosen' => 'Patricia Evericho Mountaines, S.T., M.Cs.',
            ],
        ];
        foreach($seed as $key => $value) {
            Dosen::create($value);
        }
    }
}
