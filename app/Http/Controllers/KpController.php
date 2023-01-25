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

    public function cariKP(Request $request) {
        $cariKP = $request->cariKP;

        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak')
        ->where('name', 'like', "%$cariKP%")
        ->orWhere('nim', 'like', "%$cariKP%")
        ->orWhere('nama_bidang', 'like', "%$cariKP%")
        ->orWhere('tahun', 'like', "%$cariKP%")
        ->orWhere('judul', 'like', "%$cariKP%")
        ->orWhere('perusahaan', 'like', "%$cariKP%")
        ->orWhere('lokasi_perusahaan', 'like', "%$cariKP%")
        ->orWhere('nama_dosen', 'like', "%$cariKP%")
        ->get();

        return view('kp.index')
            ->with('joins', $joins);
    }

    public function cariKP2(Request $request) {
        $cariKP2 = $request->cariKP2;

        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak')
        ->where('name', 'like', "%$cariKP2%")
        ->orWhere('nim', 'like', "%$cariKP2%")
        ->orWhere('nama_bidang', 'like', "%$cariKP2%")
        ->orWhere('tahun', 'like', "%$cariKP2%")
        ->orWhere('judul', 'like', "%$cariKP2%")
        ->orWhere('perusahaan', 'like', "%$cariKP2%")
        ->orWhere('lokasi_perusahaan', 'like', "%$cariKP2%")
        ->orWhere('nama_dosen', 'like', "%$cariKP2%")
        ->get();

        return view('kp.update_admin')
            ->with('joins', $joins);
    }

    function update_admin() {
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak')
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

    function edit($id)
    {
        $joins = kp::where('id_kp', $id)->first();
        return view('kp.edit')->with('joins', $joins);
    }

    function update(Request $request, $id) {
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
        DB::update('UPDATE kp SET name = :name, nim = :nim, bidang_id = :bidang_id, 
        tahun = :tahun, judul = :judul, perusahaan = :perusahaan, lokasi_perusahaan = :lokasi_perusahaan,
        dosen_id = :dosen_id, abstrak = :abstrak WHERE id_kp = :id',
        [
            'id' => $id,
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
        return redirect()->route('kp.update_admin')->with('success', 'Berhasil update data KP!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM kp WHERE id_kp = :id_kp', ['id_kp' => $id]);
        return redirect()->route('kp.update_admin')->with('success', 'Berhasil hapus data KP secara permanen!');
    }
    
}
