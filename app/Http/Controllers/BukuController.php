<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    function index(Request $request){
        $caribuku = $request->caribuku;
        $data = buku::where('judul_buku', 'like', "%$caribuku%")
        ->orWhere('penulis', 'like', "%$caribuku%")
        ->orWhere('jenis_peminatan', 'like', "%$caribuku%")
        ->orWhere('detail_jenis_peminatan', 'like', "%$caribuku%")
        ->orWhere('kode_gabungan_final', 'like', "%$caribuku%")
        ->paginate(5);
        return view('buku.index')->with('data', $data);
    }

    // function index1(Request $request)
    // {
    //     $katakunci = $request->katakunci;
    //     $jumlahbaris = 5;
    //     if (strlen($katakunci)) {
    //         $data = buku::where('judul_buku', 'like', "%$katakunci%")
    //         ->orWhere('penulis', 'like', "%$katakunci%")
    //         ->orWhere('jenis_peminatan', 'like', "%$katakunci%")
    //         ->orWhere('detail_jenis_peminatan', 'like', "%$katakunci%")
    //         ->orWhere('kode_gabungan_final', 'like', "%$katakunci%")
    //         ->paginate($jumlahbaris);
    //     }else{
    //         $data = buku::orderBy('kode_gabungan_final', 'desc')->paginate(5);
    //     }
    //     return view('buku.index')->with('data', $data);
    // }

    function detail_buku($id){
        $data = buku::where('kode_gabungan_final', $id)->first();
        return view('buku.detail_buku')->with('data', $data);
    }

    function update() {
        $data = DB::select('SELECT * FROM buku where deleted_at is null');
        
        return view('buku.update')
        ->with('data', $data);  
    }

    // function cariBuku(Request $request) {
    //     $caribuku = $request->caribuku;

    //     $data = DB::table('buku')
    //     ->where('judul_buku', 'like', "%$caribuku%")
    //     ->orWhere('penulis', 'like', "%$caribuku%")
    //     ->orWhere('jenis_peminatan', 'like', "%$caribuku%")
    //     ->orWhere('detail_jenis_peminatan', 'like', "%$caribuku%")
    //     ->orWhere('kode_gabungan_final', 'like', "%$caribuku%")
    //     ->get();

    //     return view('buku.index')
    //         ->with('data', $data);
    // }

    function create(){
        return view('buku.create');
    }

    public function edit($id)
    {
        $data = buku::where('kode_gabungan_final', $id)->first();
        return view('buku.edit')->with('data', $data);
    }
}
