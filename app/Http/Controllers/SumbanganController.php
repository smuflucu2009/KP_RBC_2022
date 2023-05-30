<?php

namespace App\Http\Controllers;

use App\Models\sumbangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SumbanganController extends Controller
{
    public function index(){
        $joins = DB::table('sumbangan')
        ->select('sumbangan.id','sumbangan.nama', 'sumbangan.nama2', 'sumbangan.nama3', 'sumbangan.nama4', 'sumbangan.nama5',
        'sumbangan.nama6', 'sumbangan.nama7', 'sumbangan.angkatan_wisuda', 'sumbangan.judul_buku', 'sumbangan.tahun_terbit', 'sumbangan.penulis',
        'sumbangan.harga', 'sumbangan.waktu_sumbang') 
        ->get();
        
        $joins = $joins->map(function($join) {
            $join->waktu_sumbang = Carbon::parse($join->waktu_sumbang)->setTimezone('Asia/Jakarta')->format('d M Y H:i');
            return $join;
        });

        return view('sumbangan.index')->with('joins', $joins);
    }

    public function carigalery(Request $request) {
        $carigalery = $request->carigalery;

        $joins = DB::table('sumbangan')
        ->select('sumbangan.id','sumbangan.nama', 'sumbangan.nama2', 'sumbangan.nama3', 'sumbangan.nama4', 'sumbangan.nama5',
        'sumbangan.nama6', 'sumbangan.nama7', 'sumbangan.angkatan_wisuda', 'sumbangan.judul_buku', 'sumbangan.tahun_terbit', 'sumbangan.penulis',
        'sumbangan.harga', 'sumbangan.waktu_sumbang') 
        ->orwhere('nama', 'like', "%$carigalery%")
        ->orwhere('nama2', 'like', "%$carigalery%")
        ->orwhere('nama3', 'like', "%$carigalery%")
        ->orwhere('nama4', 'like', "%$carigalery%")
        ->orwhere('nama5', 'like', "%$carigalery%")
        ->orwhere('nama6', 'like', "%$carigalery%")
        ->orwhere('nama7', 'like', "%$carigalery%")
        ->orwhere('angkatan_wisuda', 'like', "%$carigalery%")
        ->orwhere('judul_buku', 'like', "%$carigalery%")
        ->orwhere('tahun_terbit', 'like', "%$carigalery%")
        ->orwhere('penulis', 'like', "%$carigalery%")
        ->orwhere('harga', 'like', "%$carigalery%")
        ->orwhere('waktu_sumbang', 'like', "%$carigalery%")
        ->get();

        return view('sumbangan.index')->with('joins', $joins);
    }

    function detail_sumbangan($id){
        $joins = DB::table('sumbangan')
        ->select('sumbangan.id','sumbangan.nama', 'sumbangan.nama2', 'sumbangan.nama3', 'sumbangan.nama4', 'sumbangan.nama5',
        'sumbangan.nama6', 'sumbangan.nama7', 'sumbangan.angkatan_wisuda', 'sumbangan.judul_buku', 'sumbangan.tahun_terbit', 'sumbangan.penulis',
        'sumbangan.harga', 'sumbangan.waktu_sumbang')
        ->where('id', $id)
        ->first();
        return view('sumbangan.detail_sumbangan')->with('joins', $joins);
    }

    function create(){
        $joins = sumbangan::all();
        return view('sumbangan.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('nama2', $request->nama2);
        Session::flash('nama3', $request->nama3);
        Session::flash('angkatan_wisuda', $request->angkatan_wisuda);
        Session::flash('judul_buku', $request->judul_buku);
        Session::flash('tahun_terbit', $request->tahun_terbit);
        Session::flash('penulis', $request->penulis);
        Session::flash('harga', $request->harga);

        $request->validate([
            'nama' => 'required',
            'nama2' => 'required',
            'nama3' => 'required',
            'angkatan_wisuda' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'penulis' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama mahasiswa 1 wajib diisi',
            'nama2.required' => 'Nama mahasiswa 2 wajib diisi',
            'nama3.required' => 'Nama mahasiswa 3 wajib diisi',
            'angkatan_wisuda.required' => 'Angakatan wisuda wajib diisi',
            'judul_buku.required' => 'Judul buku wajib diisi',
            'tahun_terbit.required' => 'Tahun terbit buku wajib diisi',
            'penulis.required' => 'Pengarang buku wajib diisi',
            'harga.required' => 'Harga buku wajib diisi',
        ]);

        $now = Carbon::now();

        sumbangan::create([
            'nama' => Auth::user()->nama,
            'nama2' => $request->nama2,
            'nama3' => $request->nama3,
            'nama4' => $request->nama4,
            'nama5' => $request->nama5,
            'nama6' => $request->nama6,
            'nama7' => $request->nama7,
            'nim' => $request->nim,
            'angkatan_wisuda' => $request->angkatan_wisuda,
            'judul_buku' => $request->judul_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'waktu_sumbang' => $now,
        ]);

        return redirect()->route('home.index')->with('success', 'Berhasil menambahkan data sumbangan buku baru');
    }

    function edit($id)
    {
        $joins = sumbangan::where('id', $id)->first();
        return view('sumbangan.edit')->with('joins', $joins);
    }

    function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'nama2' => 'required',
            'nama3' => 'required',
            'angkatan_wisuda' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'penulis' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama mahasiswa 1 wajib diisi',
            'nama2.required' => 'Nama mahasiswa 2 wajib diisi',
            'nama3.required' => 'Nama mahasiswa 3 wajib diisi',
            'angkatan_wisuda.required' => 'Angakatan wisuda wajib diisi',
            'judul_buku.required' => 'Judul buku wajib diisi',
            'tahun_terbit.required' => 'Tahun terbit buku wajib diisi',
            'penulis.required' => 'Pengarang buku wajib diisi',
            'harga.required' => 'Harga buku wajib diisi',
        ]);

        $now = Carbon::now();

        $data = [
            'nama' => $request->nama,
            'nama2' => $request->nama2,
            'nama3' => $request->nama3,
            'nama4' => $request->nama4,
            'nama5' => $request->nama5,
            'nama6' => $request->nama6,
            'nama7' => $request->nama7,
            'angkatan_wisuda' => $request->angkatan_wisuda,
            'judul_buku' => $request->judul_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'waktu_sumbang' => $now,
        ];
        sumbangan::where('id', $id)->update($data);
        return redirect()->route('sumbangan.index')->with('success', 'Berhasil update data sumbangan buku!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM sumbangan WHERE id = :id', ['id' => $id]);
        return redirect()->route('sumbangan.index')->with('success', 'Berhasil hapus data sumbangan!');
    }

    public function delete_all()
	{
		DB::table('sumbangan')->delete();
        return redirect()->route('sumbangan.index')->with('success', 'Data sumbangan berhasil dihapus keseluruhan');
	}
}
