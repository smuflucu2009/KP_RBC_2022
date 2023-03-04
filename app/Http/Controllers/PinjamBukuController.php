<?php

namespace App\Http\Controllers;

use App\Models\pinjambuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PinjamBukuController extends Controller
{
    // function index() {
    //     return view('pinjamb.index');
    // }

    public function index(){
        $joins = DB::table('pinjambuku')
        ->join('buku', 'pinjambuku.kode_gabungan_final', '=', 'buku.kode_gabungan_final')
        ->join('users', 'pinjambuku.nim', '=', 'users.nim')
        ->select('pinjambuku.id_pinjam', 'users.nama', 'users.nim', 'buku.kode_gabungan_final', 'buku.judul_buku',
        'buku.status_pinjam', 'pinjambuku.awal_pinjam', 'pinjambuku.akhir_pinjam')
        ->get();

        return view('pinjamb.index')->with('joins', $joins);
    }

    function create(){
        $joins = pinjambuku::all();
        return view('pinjamb.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('kode_gabungan_final', $request->kode_gabungan_final);
        Session::flash('akhir_pinjam', $request->akhir_pinjam);

        $request->validate([
            'nim' => 'required',
            'kode_gabungan_final' => 'required',
            'akhir_pinjam' => 'required',
        ], [
            'nim.required' => 'NIM wajib diisi',
            'kode_gabungan_final.required' => 'Kode buku wajib diisi',
            'akhir_pinjam.required' => 'Deadline Peminjaman wajib diisi',
        ]);
        DB::insert('INSERT INTO pinjambuku(nim, kode_gabungan_final, akhir_pinjam) 
        VALUES (:nim, :kode_gabungan_final, :akhir_pinjam)',
        [
            'nim' => $request->nim,
            'kode_gabungan_final' => $request->kode_gabungan_final,
            'akhir_pinjam' => $request->akhir_pinjam,
        ]
        );
        return redirect()->route('buku.pinjamb')->with('success', 'Berhasil menambahkan data peminjaman buku');
    }
    
    function delete($id) {
        DB::delete('DELETE FROM pinjambuku WHERE id_pinjam = :id_pinjam', ['id_pinjam' => $id]);
        return redirect()->route('buku.pinjamb')->with('success', 'Berhasil hapus pinjam buku secara permanen!');
    }
}