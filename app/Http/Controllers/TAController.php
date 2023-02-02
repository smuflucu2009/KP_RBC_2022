<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TAController extends Controller
{
    public function index(){
        $joins = DB::table('skripsi')
        ->join('dosen', 'skripsi.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen.nama_dosen', 'dosen.nama_dosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('skripsi.deleted_at',0)
        ->get();

        return view('skripsi.index')->with('joins', $joins);
    }

    public function cariTA(Request $request) {
        $cariTA = $request->cariTA;

        $joins = DB::table('skripsi')
        ->join('dosen', 'skripsi.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen.nama_dosen', 'dosen.nama_dosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('skripsi.deleted_at',0)
        ->orwhere('name', 'like', "%$cariTA%")
        ->orWhere('nim', 'like', "%$cariTA%")
        ->orWhere('nama_bidang', 'like', "%$cariTA%")
        ->orWhere('tahun', 'like', "%$cariTA%")
        ->orWhere('judul', 'like', "%$cariTA%")
        ->orWhere('nama_dosen', 'like', "%$cariTA%")
        ->orWhere('nama_dosen2', 'like', "%$cariTA%")
        ->get();

        return view('skripsi.index')
            ->with('joins', $joins);
    }

    public function cariTA2(Request $request) {
        $cariKP2 = $request->cariKP2;

        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->where('kp.deleted_at',0)
        ->orwhere('name', 'like', "%$cariKP2%")
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

    function detail_kp($id){
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->where('id_kp', $id)
        ->first();
        return view('kp.detail_kp')->with('joins', $joins);
    }

    function update_admin() {
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->where('kp.deleted_at',0)
        ->get();

        return view('kp.update_admin')
        ->with('joins', $joins);  
    }

    function bin() {
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->where('kp.deleted_at',1)
        ->get();

        return view('kp.bin')
        ->with('joins', $joins);  
    }

    function create(){
        $joins = kp::all();
        return view('kp.create', compact('joins'));
    }

    public function store(Request $request)
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
            'file' => 'required|mimes:pdf,docx',
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
            'file.required' => 'File KP wajib diisi',
            'file.mimes' => 'File KP wajib pdf atau docx',
        ]);

        $file_kp = $request->file('file');
        $file_extensi = $file_kp->getClientOriginalName();
        $nama_file = date('ymdhis') . '.' . $file_extensi;
        $file_kp->move(public_path('storage\pdf\kp'), $nama_file);

        DB::insert('INSERT INTO kp(name, nim, bidang_id, 
        tahun, judul, perusahaan, lokasi_perusahaan, dosen_id, abstrak, file) 
        VALUES (:name, :nim, :bidang_id, :tahun, :judul, :perusahaan, :lokasi_perusahaan, 
        :dosen_id, :abstrak, :file)',
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
            'file' => $nama_file,
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
            'file' => 'required',
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
            'file.required' => 'File KP wajib diupload',
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,docx'
            ], [
                'file.mimes' => 'File KP wajib pdf atau docx'
            ]);
        
            $file_kp = $request->file('file');
            $file_extensi = $file_kp->getClientOriginalName();
            $nama_file = date('ymdhis') . '.' . $file_extensi;
            $file_kp->move(public_path('storage\pdf\kp'), $nama_file);
        
            $data_kp = kp::where('id_kp', $id)->first();
            File::delete(public_path('storage\pdf\kp') . '/' . $data_kp->file);
        
        }

        DB::update('UPDATE kp SET name = :name, nim = :nim, bidang_id = :bidang_id, 
        tahun = :tahun, judul = :judul, perusahaan = :perusahaan, lokasi_perusahaan = :lokasi_perusahaan,
        dosen_id = :dosen_id, dosen2_id = :dosen2_id, abstrak = :abstrak, file = :file WHERE id_kp = :id',
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
            'dosen2_id' => $request->dosen2_id,
            'abstrak' => $request->abstrak,
            'file' => $nama_file,
        ]
        );
        return redirect()->route('kp.update_admin')->with('success', 'Berhasil update data KP!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM kp WHERE id_kp = :id_kp', ['id_kp' => $id]);
        return redirect()->route('kp.bin')->with('success', 'Berhasil hapus data KP secara permanen!');
    }

    function softDelete($id) {
        DB::update('UPDATE kp SET deleted_at = 1 WHERE id_kp = :id_kp', ['id_kp' => $id]);
        return redirect()->route('kp.update_admin')->with('success', 'Berhasil hapus data KP secara sementara');
    }

    function restore($id){
        DB::update('UPDATE kp SET deleted_at = 0 WHERE id_kp = :id_kp', ['id_kp' => $id]);
        return redirect()->route('kp.update_admin')->with('success', 'Data KP telah dikembalikan!');
    }
}
