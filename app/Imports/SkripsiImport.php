<?php

namespace App\Imports;

use App\Models\Skripsi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class SkripsiImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Skripsi([
            'name'                      => $row[0],
            'nim'                       => $row[1],
            'bidang_id'                 => $row[2],
            'tahun'                     => $row[3],
            'judul'                     => $row[4],
            'dosen_id'                  => $row[5],
            'dosen2_id'                 => $row[6],
            'abstrak'                   => $row[7],

        ]);
    }
}
