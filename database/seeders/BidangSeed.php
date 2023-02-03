<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeed extends Seeder
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
                'nama_bidang' => 'RPL',
            ],
            [
                'id' => '2',
                'nama_bidang' => 'Multimedia',
            ],
            [
                'id' => '3',
                'nama_bidang' => 'Jaringan',
            ],
            [
                'id' => '4',
                'nama_bidang' => 'Embedded',
            ],
        ];
        foreach($seed as $key => $value) {
            Bidang::create($value);
        }
    }
}
