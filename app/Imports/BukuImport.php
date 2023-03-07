<?php

namespace App\Imports;

use App\Models\buku;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new buku([
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
