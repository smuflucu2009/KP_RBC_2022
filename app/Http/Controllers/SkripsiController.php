<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SkripsiController extends Controller
{
    public function index(){
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('skripsi.deleted_at',0)
        ->get();

        return view('skripsi.index')->with('joins', $joins);
    }

    public function cariSkripsi(Request $request) {
        $cariSkripsi = $request->cariSkripsi;

        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        // ->whereNotNull('skripsi.deleted_at')
        ->where('name', 'like', "%$cariSkripsi%")
        ->orWhere('nim', 'like', "%$cariSkripsi%")
        ->orWhere('bidang.nama_bidang', 'like', "%$cariSkripsi%")
        ->orWhere('tahun', 'like', "%$cariSkripsi%")
        ->orWhere('judul', 'like', "%$cariSkripsi%")
        ->orWhere('dosen1.nama_dosen', 'like', "%$cariSkripsi%")
        ->orWhere('dosen2.nama_dosen', 'like', "%$cariSkripsi%")
        ->get();

        return view('skripsi.index')
            ->with('joins', $joins);
    }

    function cariSkripsi2(Request $request) {
        $cariSkripsi2 = $request->cariSkripsi2;

        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 
         'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file', 'skripsi.deleted_at')
        ->where('name', 'like', "%$cariSkripsi2%")
        ->orWhere('nim', 'like', "%$cariSkripsi2%")
        ->orWhere('nama_bidang', 'like', "%$cariSkripsi2%")
        ->orWhere('tahun', 'like', "%$cariSkripsi2%")
        ->orWhere('judul', 'like', "%$cariSkripsi2%")
        ->orWhere('dosen1.nama_dosen', 'like', "%$cariSkripsi2%")
        ->orWhere('dosen2.nama_dosen', 'like', "%$cariSkripsi2%")
        ->where('skripsi.deleted_at', 0)
        ->get();

        return view('skripsi.update_admin')
            ->with('joins', $joins);
    }

    function detail_skripsi($id){
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('id_skripsi', $id)
        ->first();
        return view('skripsi.detail_skripsi')->with('joins', $joins);
    }

    function update_admin() {
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('skripsi.deleted_at',0)
        ->get();

        return view('skripsi.update_admin')
        ->with('joins', $joins);  
    }

    function bin() {
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen', 'dosen2.nama_dosen as nama_dosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('skripsi.deleted_at',1)
        ->get();

        return view('skripsi.bin')
        ->with('joins', $joins);  
    }

    function create(){
        $joins = Skripsi::all();
        return view('skripsi.create', compact('joins'));
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('nim', $request->nim);
        Session::flash('bidang_id', $request->bidang_id);
        Session::flash('tahun', $request->tahun);
        Session::flash('judul', $request->judul);
        Session::flash('dosen_id', $request->nama_dosen);
        Session::flash('dosen2_id', $request->nama_dosen2);
        Session::flash('abstrak', $request->abstrak);

        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'bidang_id' => 'required',
            'tahun' => 'required',
            'judul' => 'required',
            'dosen_id' => 'required',
            'dosen2_id' => 'required',
            'abstrak' => 'required',
            'file' => 'required|mimes:pdf,docx',
        ], [
            'name.required' => 'Nama wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'bidang_id.required' => 'Bidang wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
            'judul.required' => 'Judul TA wajib diisi',
            'dosen_id.required' => 'Nama Pembimbing Dosen I wajib diisi',
            'dosen2_id.required' => 'Nama Pembimbing Dosen II wajib diisi',
            'abstrak.required' => 'Abstrak TA wajib diisi',
            'file.required' => 'Laporan TA wajib diisi',
            'file.mimes' => 'Laporan TA wajib pdf atau docx',
        ]);

        $file_skripsi = $request->file('file');
        $file_extensi = $file_skripsi->getClientOriginalName();
        $nama_file = date('ymdhis') . '.' . $file_extensi;
        $file_skripsi->move(public_path('storage\pdf\skripsi'), $nama_file);

        DB::insert('INSERT INTO skripsi(name, nim, bidang_id, 
        tahun, judul, dosen_id, dosen2_id, abstrak, file) 
        VALUES (:name, :nim, :bidang_id, :tahun, :judul, :dosen_id, :dosen2_id, :abstrak, :file)',
        [
            'name' => $request->name,
            'nim' => $request->nim,
            'bidang_id' => $request->bidang_id,
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'dosen_id' => $request->dosen_id,
            'dosen2_id' => $request->dosen2_id,
            'abstrak' => $request->abstrak,
            'file' => $nama_file,
        ]
        );
        return redirect()->route('skripsi.update_admin')->with('success', 'Berhasil menambahkan data TA');
    }

    function edit($id)
    {
        $joins = skripsi::where('id_skripsi', $id)->first();
        return view('skripsi.edit')->with('joins', $joins);
    }

    function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'bidang_id' => 'required',
            'tahun' => 'required',
            'judul' => 'required',
            'dosen_id' => 'required',
            'dosen2_id' => 'required',
            'abstrak' => 'required',
            'file' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'bidang_id.required' => 'Bidang wajib diisi',
            'tahun.required' => 'Tahun wajib diisi',
            'judul.required' => 'Judul TA wajib diisi',
            'dosen_id.required' => 'Nama Pembimbing Dosen I wajib diisi',
            'dosen2_id.required' => 'Nama Pembimbing Dosen II wajib diisi',
            'abstrak.required' => 'Abstrak TA wajib diisi',
            'file.required' => 'Laporan TA wajib diisi',
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,docx'
            ], [
                'file.mimes' => 'File KP wajib pdf atau docx'
            ]);
        
            $file_skripsi = $request->file('file');
            $file_extensi = $file_skripsi->getClientOriginalName();
            $nama_file = date('ymdhis') . '.' . $file_extensi;
            $file_skripsi->move(public_path('storage\pdf\skripsi'), $nama_file);
        
            $data_skripsi = Skripsi::where('id_skripsi', $id)->first();
            File::delete(public_path('storage\pdf\skripsi') . '/' . $data_skripsi->file);
        
        }

        DB::update('UPDATE skripsi SET name = :name, nim = :nim, bidang_id = :bidang_id, 
        tahun = :tahun, judul = :judul, dosen_id = :dosen_id, dosen2_id = :dosen2_id, abstrak = :abstrak, file = :file WHERE id_skripsi = :id',
        [
            'id' => $id,
            'name' => $request->name,
            'nim' => $request->nim,
            'bidang_id' => $request->bidang_id,
            'tahun' => $request->tahun,
            'judul' => $request->judul,
            'dosen_id' => $request->dosen_id,
            'dosen2_id' => $request->dosen2_id,
            'abstrak' => $request->abstrak,
            'file' => $nama_file,
        ]
        );
        return redirect()->route('skripsi.update_admin')->with('success', 'Berhasil update data TA!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM skripsi WHERE id_skripsi = :id_skripsi', ['id_skripsi' => $id]);
        return redirect()->route('skripsi.update_admin')->with('success', 'Berhasil hapus data KP secara permanen!');
    }

    function softDelete($id) {
        DB::update('UPDATE skripsi SET deleted_at = 1 WHERE id_skripsi = :id_skripsi', ['id_skripsi' => $id]);
        return redirect()->route('skripsi.update_admin')->with('success', 'Berhasil hapus data KP secara sementara');
    }

    function restore($id){
        DB::update('UPDATE skripsi SET deleted_at = 0 WHERE id_skripsi = :id_skripsi', ['id_skripsi' => $id]);
        return redirect()->route('skripsi.update_admin')->with('success', 'Data KP telah dikembalikan!');
    }
}
