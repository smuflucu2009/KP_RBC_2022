<?php

namespace App\Http\Controllers;

use App\Models\kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KpController extends Controller
{
    public function index(){
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'abstrak')
        ->get();

        return view('kp.index')->with('joins', $joins);
    }

    function detail_kp($id){
        $joins = kp::where('id_kp', $id)->first();
        return view('kp.detail_kp')->with('joins', $joins);
    }

    function update_admin() {
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.deleted_at')
        ->get();

        return view('kp.update_admin')
        ->with('joins', $joins);  
    }

    function create(){
        $joins = kp::all();
        return view('kp.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('nim', $request->nim);
        Session::flash('bidang_id', $request->bidang_id);
        Session::flash('tahun', $request->tahun);
        Session::flash('judul', $request->judul);
        Session::flash('perusahaan', $request->perusahaan);
        Session::flash('lokasi_perusahaan', $request->lokasi_perusahaan);
        Session::flash('dosen_id', $request->nama_dosen);
        Session::flash('abstrak', $request->abstrak);

        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'bidang_id' => 'required',
            'tahun' => 'required',
            'judul' => 'required',
            'perusahaan' => 'required',
            'lokasi_perusahaan' => 'required',
            'dosen_id' => 'required',
            'abstrak' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'bidang_id.required' => 'Bidang wajib diisi',
            'tahun.required' => 'tahun wajib diisi',
            'judul.required' => 'judul wajib diisi',
            'perusahaan.required' => 'Nama Perusahaan wajib diisi',
            'lokasi_perusahaan.required' => 'Alamat Perusahaan wajib diisi',
            'dosen_id.required' => 'Nama Pembimbing Dosen wajib diisi',
            'abstrak.required' => 'Abstrak KP wajib diisi',
        ]);
        DB::insert('INSERT INTO kp(name, nim, bidang_id, 
        tahun, judul, perusahaan, lokasi_perusahaan, dosen_id, abstrak) 
        VALUES (:name, :nim, :bidang_id, :tahun, :judul, :perusahaan, :lokasi_perusahaan, 
        :dosen_id, :abstrak)',
        [
            'name' => $request->name,
            'nim' => $request->nim,
            'bidang_id' => $request->bidang_id,
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'perusahaan' => $request->perusahaan,
            'lokasi_perusahaan' => $request->lokasi_perusahaan,
            'dosen_id' => $request->dosen_id,
            'abstrak' => $request->abstrak,
        ]
        );
        return redirect()->route('kp.update_admin')->with('success', 'Berhasil menambahkan data KP');
    }
    
}
