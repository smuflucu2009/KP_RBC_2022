<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SkripsiController extends Controller
{
    public function index(Request $request){
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        ->when($request->name, function ($query) use ($request) {
            return $query->where('skripsi.name', 'like', '%'.$request->name.'%');
        })
        ->when($request->nim, function ($query) use ($request) {
            return $query->where('skripsi.nim', 'like', '%'.$request->nim.'%');
        })
        ->when($request->tahun, function ($query) use ($request) {
            return $query->where('skripsi.tahun', $request->tahun);
        })
        ->when($request->judul, function ($query) use ($request) {
            return $query->where('skripsi.judul', 'like', '%'.$request->judul.'%');
        })
        ->when($request->nama_bidang, function ($query) use ($request) {
            return $query->whereNamaBidang($request->nama_bidang);
        })
        ->when($request->namadosen1, function ($query) use ($request) {
            return $query->where('dosen1.nama_dosen', 'like', '%'.$request->namadosen1.'%');
        })
        ->when($request->namadosen2, function ($query) use ($request) {
            return $query->where('dosen2.nama_dosen', 'like', '%'.$request->namadosen2.'%');
        })
        ->paginate(10);

        return view('skripsi.index')->with('joins', $joins);
    }

    function detail_skripsi($id){
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        ->where('skripsi.id_skripsi', $id)
        ->first();
        return view('skripsi.detail_skripsi')->with('joins', $joins);
    }

    function update_admin(Request $request) {
        $joins = DB::table('skripsi')
        ->join('dosen as dosen1', 'skripsi.dosen_id', '=', 'dosen1.id')
        ->join('dosen as dosen2', 'skripsi.dosen2_id', '=', 'dosen2.id')
        ->join('bidang', 'skripsi.bidang_id', '=', 'bidang.id')
        ->select('skripsi.id_skripsi', 'skripsi.name', 'skripsi.nim', 'bidang.nama_bidang', 'skripsi.tahun',
         'skripsi.judul', 'dosen1.nama_dosen as namadosen1', 'dosen2.nama_dosen as namadosen2', 'skripsi.abstrak', 'skripsi.file')
        ->when($request->name, function ($query) use ($request) {
            return $query->where('skripsi.name', 'like', '%'.$request->name.'%');
        })
        ->when($request->nim, function ($query) use ($request) {
            return $query->where('skripsi.nim', 'like', '%'.$request->nim.'%');
        })
        ->when($request->tahun, function ($query) use ($request) {
            return $query->where('skripsi.tahun', $request->tahun);
        })
        ->when($request->judul, function ($query) use ($request) {
            return $query->where('skripsi.judul', 'like', '%'.$request->judul.'%');
        })
        ->when($request->nama_bidang, function ($query) use ($request) {
            return $query->whereNamaBidang($request->nama_bidang);
        })
        ->when($request->namadosen1, function ($query) use ($request) {
            return $query->where('dosen1.nama_dosen', 'like', '%'.$request->namadosen1.'%');
        })
        ->when($request->namadosen2, function ($query) use ($request) {
            return $query->where('dosen2.nama_dosen', 'like', '%'.$request->namadosen2.'%');
        })
        ->paginate(10);

        return view('skripsi.update_admin')->with('joins', $joins);
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
        $nama_file = $file_skripsi->getClientOriginalName();
        $file_skripsi->move(public_path('storage/pdf/skripsi'), $nama_file);

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
            'file.required' => 'File TA wajib diisi, bila tidak ada perubahan. Mohon upload ulang file yang sama',
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,docx'
            ], [
                'file.mimes' => 'File KP wajib pdf atau docx'
            ]);

            $file_skripsi = $request->file('file');
            $nama_file = $file_skripsi->getClientOriginalName();
            $file_skripsi->move(public_path('storage/pdf/skripsi'), $nama_file);

            $data_skripsi = Skripsi::where('id_skripsi', $id)->first();
            File::delete(public_path('storage/pdf/skripsi') . '/' . $data_skripsi->file);

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
        $data_kp = Skripsi::where('id_skripsi', $id)->first();
        File::delete(public_path('storage/pdf/kp') . '/' . $data_kp->file);

		// hapus data
		Skripsi::where('id_skripsi',$id)->delete();

		return redirect()->route('skripsi.update_admin')->with('success', 'Berhasil hapus data TA secara permanen!');
    }

    function softDelete($id) {
        DB::update('UPDATE skripsi SET deleted_at = 1 WHERE id_skripsi = :id_skripsi', ['id_skripsi' => $id]);
        return redirect()->route('skripsi.update_admin')->with('success', 'Berhasil hapus data TA secara sementara');
    }

    function restore($id){
        DB::update('UPDATE skripsi SET deleted_at = 0 WHERE id_skripsi = :id_skripsi', ['id_skripsi' => $id]);
        return redirect()->route('skripsi.update_admin')->with('success', 'Data TA telah dikembalikan!');
    }
}
