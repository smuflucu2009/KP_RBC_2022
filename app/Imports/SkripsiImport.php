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
            'tanggal_masuk' => $row[0],
            'judul_buku' => $row[1],
            'penulis' => $row[2],
            'penerbit' => $row[3],
            'isbn' => $row[4],
            'jenis_peminatan' => $row[5],
            'detail_jenis_peminatan' => $row[6],
            'kode_peminatan' => $row[7],
            'kode_detail_jenis_peminatan' => $row[8],
            'kode_tahun' => $row[9],
            'kode_nomor_urut_buku' => $row[10],
            'kode_gabungan_final' => $row[11]

        ]);
    }
}
