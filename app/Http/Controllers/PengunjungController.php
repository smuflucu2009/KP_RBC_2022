<?php

namespace App\Http\Controllers;

use App\Models\pengunjung;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PengunjungController extends Controller
{
    public function index(){
        $joins = DB::table('pengunjung')
        ->select('pengunjung.id', 'pengunjung.nama', 'pengunjung.nim', 'pengunjung.angkatan', 'pengunjung.keperluan', 'pengunjung.waktu_post')
        ->get();        

        $joins = $joins->map(function($join) {
            $join->waktu_post = Carbon::parse($join->waktu_post)->setTimezone('Asia/Jakarta')->format('d M Y H:i');
            return $join;
        });

        return view('pengunjung.index')->with('joins', $joins);
    }

    public function caripengunjung(Request $request) {
        $caripengunjung = $request->caripengunjung;

        $joins = DB::table('pengunjung')
        ->select('pengunjung.id', 'pengunjung.nama', 'pengunjung.nim', 'pengunjung.angkatan', 'pengunjung.keperluan', 'pengunjung.waktu_post')
        ->orwhere('nama', 'like', "%$caripengunjung%")
        ->orwhere('nim', 'like', "%$caripengunjung%")
        ->orwhere('angkatan', 'like', "%$caripengunjung%")
        ->orwhere('keperluan', 'like', "%$caripengunjung%")
        ->orwhere('waktu_post', 'like', "%$caripengunjung%")
        ->get();

        return view('pengunjung.index')->with('joins', $joins);
    }

    function create(){
        $joins = pengunjung::all();
        return view('pengunjung.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('nim', $request->nim);
        Session::flash('angkatan', $request->angkatan);
        Session::flash('keperluan', $request->keperluan);

        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'keperluan' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'angkatan.required' => 'Angkatan wajib diisi',
            'keperluan.required' => 'Keperluan wajib diisi',
        ]);

        $now = Carbon::now();

        if (Auth::check()) {
            // Pengguna sudah login
            pengunjung::create([
                'nama' => Auth::user()->nama,
                'nim' => Auth::user()->nim,
                'angkatan' => $request->angkatan,
                'keperluan' => $request->keperluan,
                'waktu_post' => $now,
            ]);
            return redirect()->route('home.index')->with('success', 'Berhasil menambahkan data pengunjung');

        } else {
            // Pengguna belum login
            pengunjung::create([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'angkatan' => $request->angkatan,
                'keperluan' => $request->keperluan,
                'waktu_post' => $now,
            ]);
            return redirect()->route('home.index')->with('success', 'Berhasil menambahkan data pengunjung');
        }
    }

    public function delete_all()
	{
		DB::table('pengunjung')->delete();
        return redirect()->route('pengunjung.index')->with('success', 'Data pengunjung berhasil dihapus keseluruhan');
	}

    function delete($id)
    {
        DB::delete('DELETE FROM pengunjung WHERE id = :id', ['id' => $id]);
        return redirect()->route('pengunjung.index')->with('success', 'Berhasil hapus data pengunjung!');
    }
}
