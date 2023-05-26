<?php

namespace App\Exports;

use App\Models\Skripsi;
use Maatwebsite\Excel\Concerns\FromCollection;

class SkripsiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Skripsi::all();
    }
}
