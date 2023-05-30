<?php

namespace App\Http\Controllers;

use App\Models\sumbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SumbanganController extends Controller
{
    public function index(){
        $joins = DB::table('galery')
        ->join('postingan', 'galery.post_id', '=', 'postingan.id_posting')
        ->select('galery.id','galery.post_id', 'galery.file')
        ->get();

        return view('galery.index')->with('joins', $joins);
    }

    public function carigalery(Request $request) {
        $carigalery = $request->carigalery;

        $joins = DB::table('galery')
        ->join('postingan', 'galery.post_id', '=', 'postingan.id_posting')
        ->select('galery.id', 'galery.post_id', 'galery.file')
        ->orwhere('post_id', 'like', "%$carigalery%")
        ->get();

        return view('galery.index')->with('joins', $joins);
    }

    function create(){
        $joins = sumbangan::all();
        return view('sumbangan.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('tanggal_masuk', $request->tanggal_masuk);
        Session::flash('judul_buku', $request->judul_buku);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('isbn', $request->isbn);
        Session::flash('jenis_peminatan', $request->jenis_peminatan);
        Session::flash('detail_jenis_peminatan', $request->detail_jenis_peminatan);
        Session::flash('kode_peminatan', $request->kode_peminatan);
        Session::flash('kode_detail_jenis_peminatan', $request->kode_detail_jenis_peminatan);
        Session::flash('kode_tahun', $request->kode_tahun);
        Session::flash('kode_nomor_urut_buku', $request->kode_nomor_urut_buku);
        Session::flash('kode_gabungan_final', $request->kode_gabungan_final);

        $request->validate([
            'tanggal_masuk' => 'required',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'isbn' => 'required',
            'jenis_peminatan' => 'required',
            'detail_jenis_peminatan' => 'required',
            'kode_peminatan' => 'required',
            'kode_detail_jenis_peminatan' => 'required',
            'kode_tahun' => 'required',
            'kode_nomor_urut_buku' => 'required',
            'kode_gabungan_final' => 'required|unique:Buku,kode_gabungan_final',
        ], [
            'tanggal_masuk.required' => 'Tanggal Masuk wajib diisi',
            'judul_buku.required' => 'Judul Buku wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
            'penerbit.required' => 'Penerbit wajib diisi',
            'isbn.required' => 'ISBN wajib diisi',
            'jenis_peminatan.required' => 'Jenis Peminatan wajib diisi',
            'detail_jenis_peminatan.required' => 'Detail Jenis Peminatan wajib diisi',
            'kode_peminatan.required' => 'Kode Jenis Peminatan wajib diisi',
            'kode_detail_jenis_peminatan.required' => 'Kode Jenis Peminatan wajib diisi',
            'kode_tahun.required' => 'Kode Tahun wajib diisi',
            'kode_nomor_urut_buku' => 'Kode Nomor Urut wajib diisi',
            'kode_gabungan_final.required' => 'Kode Buku wajib diisi',
            'kode_gabungan_final.unique' => 'Kode Buku sudah ada',
        ]);
        DB::insert('INSERT INTO buku(tanggal_masuk, judul_buku, penulis, penerbit, isbn, jenis_peminatan, 
        detail_jenis_peminatan, kode_peminatan, kode_detail_jenis_peminatan, kode_tahun, kode_nomor_urut_buku, kode_gabungan_final) 
        VALUES (:tanggal_masuk, :judul_buku, :penulis, :penerbit, :isbn, :jenis_peminatan, 
        :detail_jenis_peminatan, :kode_peminatan, :kode_detail_jenis_peminatan, :kode_tahun, :kode_nomor_urut_buku, :kode_gabungan_final)',
        [
            'tanggal_masuk' => $request->tanggal_masuk,
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'isbn' => $request->isbn,
            'jenis_peminatan' => $request->jenis_peminatan,
            'detail_jenis_peminatan' => $request->detail_jenis_peminatan,
            'kode_peminatan' => $request->kode_peminatan,
            'kode_detail_jenis_peminatan' => $request->kode_detail_jenis_peminatan,
            'kode_tahun' => $request->kode_tahun,
            'kode_nomor_urut_buku' => $request->kode_nomor_urut_buku,
            'kode_gabungan_final' => $request->kode_gabungan_final,
        ]
        );
        return redirect()->route('buku.update_admin')->with('success', 'Berhasil menambahkan data buku baru');
    }

    function edit($id)
    {
        $joins = sumbangan::where('id', $id)->first();
        return view('galery.edit')->with('joins', $joins);
    }

    function update(Request $request, $id) {
        $request->validate([
            'tanggal_masuk' => 'required',
            'judul_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'isbn' => 'required',
            'jenis_peminatan' => 'required',
            'detail_jenis_peminatan' => 'required',
            'kode_peminatan' => 'required',
            'kode_detail_jenis_peminatan' => 'required',
            'kode_tahun' => 'required',
            'kode_nomor_urut_buku' => 'required',
            'kode_gabungan_final' => 'required',
        ], [
            'tanggal_masuk.required' => 'Tanggal Masuk wajib diisi',
            'judul_buku.required' => 'Judul Buku wajib diisi',
            'penulis.required' => 'Penulis wajib diisi',
            'penerbit.required' => 'Penerbit wajib diisi',
            'isbn.required' => 'ISBN wajib diisi',
            'jenis_peminatan.required' => 'Jenis Peminatan wajib diisi',
            'detail_jenis_peminatan.required' => 'Detail Jenis Peminatan wajib diisi',
            'kode_peminatan.required' => 'Kode Jenis Peminatan wajib diisi',
            'kode_detail_jenis_peminatan.required' => 'Kode Jenis Peminatan wajib diisi',
            'kode_tahun.required' => 'Kode Tahun wajib diisi',
            'kode_nomor_urut_buku' => 'Kode Nomor Urut Wajib diisi',
            'kode_gabungan_final.required' => 'Kode Buku wajib diisi',
        ]);
        DB::update('UPDATE buku SET tanggal_masuk = :tanggal_masuk, judul_buku = :judul_buku, 
        penulis = :penulis, penerbit = :penerbit, isbn = :isbn, jenis_peminatan = :jenis_peminatan, 
        detail_jenis_peminatan = :detail_jenis_peminatan, kode_peminatan = :kode_peminatan, kode_detail_jenis_peminatan = :kode_detail_jenis_peminatan, 
        kode_tahun = :kode_tahun, kode_nomor_urut_buku = :kode_nomor_urut_buku, 
        kode_gabungan_final = :kode_gabungan_final WHERE kode_gabungan_final = :id',
        [
            'id' => $id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'isbn' => $request->isbn,
            'jenis_peminatan' => $request->jenis_peminatan,
            'detail_jenis_peminatan' => $request->detail_jenis_peminatan,
            'kode_peminatan' => $request->kode_peminatan,
            'kode_detail_jenis_peminatan' => $request->kode_detail_jenis_peminatan,
            'kode_tahun' => $request->kode_tahun,
            'kode_nomor_urut_buku' => $request->kode_nomor_urut_buku,
            'kode_gabungan_final' => $request->kode_gabungan_final,
        ]
        );
        return redirect()->route('buku.update_admin')->with('success', 'Berhasil update data buku!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM galery WHERE id = :id', ['id' => $id]);
        return redirect()->route('galery.index')->with('success', 'Berhasil hapus gambar!');
    }
}
