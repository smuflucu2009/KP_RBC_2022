<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    function index(Request $request){
        $cariartikel = $request->cariartikel;
        $data = artikel::where('judul_artikel', 'like', "%$cariartikel%")
        ->orWhere('jenis_artikel', 'like', "%$cariartikel%")
        ->orWhere('isi_artikel', 'like', "%$cariartikel%")
        ->orWhere('waktu_artikel', 'like', "%$cariartikel%")
        ->paginate(5);
        return view('artikel.index')->with('data', $data);
    }
}
