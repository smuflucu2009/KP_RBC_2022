<?php

namespace App\Http\Controllers;

use App\Models\pinjambuku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PinjamBukuController extends Controller
{
    public function index(){
        $joins = DB::table('pinjambuku')
        ->join('buku', 'pinjambuku.kode_gabungan_final', '=', 'buku.kode_gabungan_final')
        ->join('users', 'pinjambuku.nim', '=', 'users.nim')
        ->select('pinjambuku.id_pinjam', 'users.nama', 'users.nim', 'buku.kode_gabungan_final', 'buku.judul_buku',
        'buku.status_pinjam', 'pinjambuku.tanggal_peminjaman', 'pinjambuku.tanggal_pengembalian', 'pinjambuku.kadaluarsa')
        ->get();

        $joins = $joins->map(function($join) {
            $join->tanggal_peminjaman = Carbon::parse($join->tanggal_peminjaman)->setTimezone('Asia/Jakarta')->format('d M Y');
            $join->tanggal_pengembalian = Carbon::parse($join->tanggal_pengembalian)->setTimezone('Asia/Jakarta')->format('d M Y');
            return $join;
        });

        foreach ($joins as $join) {
            // Hitung selisih hari antara tanggal sekarang dan tanggal pengembalian
            $selisih = Carbon::parse($join->tanggal_pengembalian)->diffInDays(Carbon::now(), false);
            
            // Jika selisih hari negatif, tandai sebagai "Terlambat"
            $join->kadaluarsa = $selisih > 0 ? 'Terlambat' : '';
        }

        return view('pinjamb.index')->with('joins', $joins);
    }

    public function admin(){
        $joins = DB::table('pinjambuku')
        ->join('buku', 'pinjambuku.kode_gabungan_final', '=', 'buku.kode_gabungan_final')
        ->join('users', 'pinjambuku.nim', '=', 'users.nim')
        ->select('pinjambuku.id_pinjam', 'users.nama', 'users.nim', 'buku.kode_gabungan_final', 'buku.judul_buku',
        'buku.status_pinjam', 'pinjambuku.tanggal_peminjaman', 'pinjambuku.tanggal_pengembalian', 'pinjambuku.kadaluarsa')
        ->get();

        $joins = $joins->map(function($join) {
            $join->tanggal_peminjaman = Carbon::parse($join->tanggal_peminjaman)->format('d M Y');
            $join->tanggal_pengembalian = Carbon::parse($join->tanggal_pengembalian)->format('d M Y');
            return $join;
        });

        foreach ($joins as $join) {
            // Hitung selisih hari antara tanggal sekarang dan tanggal pengembalian
            $selisih = Carbon::parse($join->tanggal_pengembalian)->diffInDays(Carbon::now(), false);
            
            // Jika selisih hari negatif, tandai sebagai "Terlambat"
            $join->kadaluarsa = $selisih > 0 ? 'Terlambat' : '';
        }

        return view('pinjamb.admin')->with('joins', $joins);
    }

    function create(){
        $joins = pinjambuku::all();
        return view('pinjamb.create', compact('joins'));
    }

    function store(Request $request)
    {
        // Session::flash('nim', $request->nim);
        Session::flash('kode_gabungan_final', $request->kode_gabungan_final);
        Session::flash('tanggal_pengembalian', $request->akhir_pinjam);

        $request->validate([
            // 'nim' => 'required',
            'kode_gabungan_final' => 'required',
            'tanggal_pengembalian' => 'required',
        ], [
            // 'nim.required' => 'NIM wajib diisi',
            'kode_gabungan_final.required' => 'Kode buku wajib diisi',
            'tanggal_pengembalian.required' => 'Deadline Peminjaman wajib diisi',
        ]);

        $now = Carbon::now();

        if ($request->tanggal_pengembalian == 'A') {
            $deadline = $now->copy()->addWeek();
        } elseif ($request->tanggal_pengembalian == 'B') {
            $deadline = $now->copy()->addWeeks(2);
        }

        $kadaluarsa = $now->gt($deadline) ? 'Terlambat' : null;

        pinjambuku::create([
            'kode_gabungan_final' => $request->kode_gabungan_final,
            'nim' => Auth::user()->nim,
            'tanggal_peminjaman' => $now,
            'tanggal_pengembalian' => $deadline,
            'kadaluarsa' => $kadaluarsa,
        ]);

        return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan data peminjaman buku');
        // return redirect()->route('buku.detail_buku', $data->kode_gabungan_final)->with('success', 'Berhasil menambahkan data peminjaman buku');
    }
    
    function delete($id) {
        Pinjambuku::where('id_pinjam',$id)->first()->delete();
        return redirect()->route('buku.pinjamb')->with('success', 'Berhasil menghapus data peminjaman buku secara permanen!');
    }

    function approvePinjamBuku($id)
    {
        DB::update('UPDATE buku SET status_pinjam = "Terpinjam" WHERE kode_gabungan_final = :kode_gabungan_final', ['kode_gabungan_final' => $id]);
        return redirect()->route('buku.pinjamb')->with('success', 'Peminjaman buku berhasil disetujui. Status buku: terpinjam');
    }
}