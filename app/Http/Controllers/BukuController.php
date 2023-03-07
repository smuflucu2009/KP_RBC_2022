<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    function index(Request $request){
        $data= buku::query();

        $data->when($request->judul_buku, function ($query) use ($request) {
            return $query->where('judul_buku', 'like', '%'.$request->judul_buku.'%');
        });

        $data->when($request->penulis, function ($query) use ($request) {
            return $query->where('penulis', 'like', '%'.$request->penulis.'%');
        });

        $data->when($request->kode_gabungan_final, function ($query) use ($request) {
            return $query->where('kode_gabungan_final', 'like', '%'.$request->kode_gabungan_final.'%');
        });

        $data->when($request->penerbit, function ($query) use ($request) {
            return $query->where('penerbit', 'like', '%'.$request->penerbit.'%');
        });

        $data->when($request->jenis_peminatan, function ($query) use ($request) {
            return $query->whereJenisPeminatan($request->jenis_peminatan);
        });

        $data->when($request->detail_jenis_peminatan, function ($query) use ($request) {
            return $query->whereDetailJenisPeminatan($request->detail_jenis_peminatan);
        });
        
        return view('buku.index', ['data' => $data->paginate(10)]);
    }

    function update_admin(Request $request) {
        // $data = DB::select('SELECT * FROM buku where deleted_at = 0');
        // return view('buku.update_admin')->with('data', $data);
        // $u = DB::select('SELECT * FROM buku where deleted_at = 0');
        
        $data= buku::query();

        $data->when($request->judul_buku, function ($query) use ($request) {
            return $query->where('judul_buku', 'like', '%'.$request->judul_buku.'%');
        });

        $data->when($request->penulis, function ($query) use ($request) {
            return $query->where('penulis', 'like', '%'.$request->penulis.'%');
        });

        $data->when($request->kode_gabungan_final, function ($query) use ($request) {
            return $query->where('kode_gabungan_final', 'like', '%'.$request->kode_gabungan_final.'%');
        });

        $data->when($request->penerbit, function ($query) use ($request) {
            return $query->where('penerbit', 'like', '%'.$request->penerbit.'%');
        });

        $data->when($request->jenis_peminatan, function ($query) use ($request) {
            return $query->whereJenisPeminatan($request->jenis_peminatan);
        });

        $data->when($request->detail_jenis_peminatan, function ($query) use ($request) {
            return $query->whereDetailJenisPeminatan($request->detail_jenis_peminatan);
        });
        
        return view('buku.update_admin', ['data' => $data->paginate(10)]);  
    }

    // function caribuku(Request $request) {
    //     $caribuku_update = $request->caribuku_update;

    //     $data = DB::table('buku')
    //     ->where('judul_buku', 'like', "%$caribuku_update%")
    //     ->orWhere('penulis', 'like', "%$caribuku_update%")
    //     ->orWhere('jenis_peminatan', 'like', "%$caribuku_update%")
    //     ->orWhere('detail_jenis_peminatan', 'like', "%$caribuku_update%")
    //     ->orWhere('kode_gabungan_final', 'like', "%$caribuku_update%")
    //     ->get();

    //     return view('buku.update_admin')
    //         ->with('data', $data);
    // }

    function detail_buku($id){
        $data = buku::where('kode_gabungan_final', $id)->first();
        return view('buku.detail_buku')->with('data', $data);
    }

    function create(){
        $data = buku::all();
        return view('buku.create', compact('data'));
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
        $data = buku::where('kode_gabungan_final', $id)->first();
        return view('buku.edit')->with('data', $data);
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

    // function bin()
    // {
    //     $data = DB::select('SELECT * FROM buku where deleted_at = 1');
    //     return view('buku.bin')
    //     ->with('data', $data);
    // }

    function delete($id)
    {
        DB::delete('DELETE FROM buku WHERE kode_gabungan_final = :kode_gabungan_final', ['kode_gabungan_final' => $id]);
        return redirect()->route('buku.update_admin')->with('success', 'Berhasil hapus data buku secara permanen!');
    }

    // function softDelete($id) {
    //     DB::update('UPDATE buku SET deleted_at = 1 WHERE kode_gabungan_final = :kode_gabungan_final', ['kode_gabungan_final' => $id]);
    //     return redirect()->route('buku.update_admin')->with('success', 'Berhasil hapus data buku secara sementara');
    // }

    // function restore($id){
    //     DB::update('UPDATE buku SET deleted_at = 0 WHERE kode_gabungan_final = :kode_gabungan_final', ['kode_gabungan_final' => $id]);
    //     return redirect()->route('buku.update_admin')->with('success', 'Data buku telah dikembalikan!');
    // }

    function pinjam($id) {
        DB::update('UPDATE buku SET status_pinjam = 1 WHERE kode_gabungan_final = :kode_gabungan_final', ['kode_gabungan_final' => $id]);
        return redirect()->route('buku.update_admin')->with('success', 'Buku Dipinjam');
    }

    function kembali($id) {
        DB::update('UPDATE buku SET status_pinjam = 0 WHERE kode_gabungan_final = :kode_gabungan_final', ['kode_gabungan_final' => $id]);
        return redirect()->route('buku.pinjamb')->with('success', 'Buku Dikembalikan');
    }
}