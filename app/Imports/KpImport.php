<?php

namespace App\Imports;

use App\Models\kp;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class KpImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new kp([
            'name' => $row[0],
            'nim' => $row[1],
            'bidang_id' => $row[2],
            'tahun' => $row[3],
            'judul' => $row[4],
            'perusahaan' => $row[5],
            'lokasi_perusahaan' => $row[6],
            'dosen_id' => $row[7],
            'abstrak' => $row[8],
            'kode_tahun' => $row[9],

        ]);
    }
}
