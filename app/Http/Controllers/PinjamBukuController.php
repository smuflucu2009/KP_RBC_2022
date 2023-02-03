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
        ->join('buku', 'pinjambuku.kode_gabungan_final', '=', 'buku.id')
        ->join('users', 'pinjambuku.id_user', '=', 'users.id')
        ->select('pinjambuku.id', 'users.nama', 'users.id_user', 'buku.kode_gabungan_final', 'buku.judul_buku',
        'buku.status_pinjam', 'pinjambuku.awal_pinjam', 'pinjambuku.akhir_pinjam', 'buku.id as id_buku')
        ->get();

        return view('pinjamb.index')->with('joins', $joins);
    }

    function create(){
        $joins = pinjambuku::all();
        return view('pinjamb.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('id_user', $request->id_user);
        Session::flash('kode_gabungan_final', $request->kode_gabungan_final);
        Session::flash('akhir_pinjam', $request->akhir_pinjam);

        $request->validate([
            'id_user' => 'required',
            'kode_gabungan_final' => 'required',
            'akhir_pinjam' => 'required',
        ], [
            'id_user.required' => 'NIM wajib diisi',
            'kode_gabungan_final.required' => 'Kode buku wajib diisi',
            'akhir_pinjam.required' => 'Deadline Peminjaman wajib diisi',
        ]);
        DB::insert('INSERT INTO pinjambuku(id_user, kode_gabungan_final, akhir_pinjam) 
        VALUES (:id_user, :kode_gabungan_final, :akhir_pinjam)',
        [
            'id_user' => $request->id_user,
            'kode_gabungan_final' => $request->kode_gabungan_final,
            'akhir_pinjam' => $request->akhir_pinjam,
        ]
        );
        return redirect()->route('buku.pinjamb')->with('success', 'Berhasil menambahkan data peminjaman buku');
    }
    
    function delete($id) {
        DB::delete('DELETE FROM pinjambuku WHERE id = :id', ['id' => $id]);
        return redirect()->route('buku.pinjamb')->with('success', 'Berhasil hapus pinjam buku secara permanen!');
    }
}
