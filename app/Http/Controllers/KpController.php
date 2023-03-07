<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\buku;
use App\Models\Dosen;
use App\Models\kp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class KpController extends Controller
{
    public function index(Request $request){
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->when($request->name, function ($query) use ($request) {
            return $query->where('kp.name', 'like', '%'.$request->name.'%');
        })
        ->when($request->nim, function ($query) use ($request) {
            return $query->where('kp.nim', 'like', '%'.$request->nim.'%');
        })
        ->when($request->judul, function ($query) use ($request) {
            return $query->where('kp.judul', 'like', '%'.$request->judul.'%');
        })
        ->when($request->tahun, function ($query) use ($request) {
            return $query->where('kp.tahun', $request->tahun);
        })
        ->when($request->perusahaan, function ($query) use ($request) {
            return $query->where('kp.perusahaan', 'like', '%'.$request->perusahaan.'%');
        })
        ->when($request->lokasi_perusahaan, function ($query) use ($request) {
            return $query->where('kp.lokasi_perusahaan', 'like', '%'.$request->lokasi_perusahaan.'%');
        })
        ->when($request->nama_dosen, function ($query) use ($request) {
            return $query->where('dosen.nama_dosen', 'like', '%'.$request->nama_dosen.'%');
        })
        ->when($request->nama_bidang, function ($query) use ($request) {
            return $query->where('bidang.nama_bidang', 'like', '%'.$request->nama_bidang.'%');
        })
        ->paginate(10);

        return view('kp.index')->with('joins', $joins);
    }

    function detail_kp($id){
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->where('kp.id_kp', $id)
        ->first();
        return view('kp.detail_kp')->with('joins', $joins);
    }

    function update_admin(Request $request) {
        $joins = DB::table('kp')
        ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
        ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
        ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
        'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
        ->when($request->name, function ($query) use ($request) {
            return $query->where('kp.name', 'like', '%'.$request->name.'%');
        })
        ->when($request->nim, function ($query) use ($request) {
            return $query->where('kp.nim', 'like', '%'.$request->nim.'%');
        })
        ->when($request->judul, function ($query) use ($request) {
            return $query->where('kp.judul', 'like', '%'.$request->judul.'%');
        })
        ->when($request->tahun, function ($query) use ($request) {
            return $query->where('kp.tahun', $request->tahun);
        })
        ->when($request->perusahaan, function ($query) use ($request) {
            return $query->where('kp.perusahaan', 'like', '%'.$request->perusahaan.'%');
        })
        ->when($request->lokasi_perusahaan, function ($query) use ($request) {
            return $query->where('kp.lokasi_perusahaan', 'like', '%'.$request->lokasi_perusahaan.'%');
        })
        ->when($request->nama_dosen, function ($query) use ($request) {
            return $query->where('dosen.nama_dosen', 'like', '%'.$request->nama_dosen.'%');
        })
        ->when($request->nama_bidang, function ($query) use ($request) {
            return $query->where('bidang.nama_bidang', 'like', '%'.$request->nama_bidang.'%');
        })
        ->paginate(10);

        return view('kp.update_admin')->with('joins', $joins);
    }

    // function bin() {
    //     $joins = DB::table('kp')
    //     ->join('dosen', 'kp.dosen_id', '=', 'dosen.id')
    //     ->join('bidang', 'kp.bidang_id', '=', 'bidang.id')
    //     ->select('kp.id_kp', 'kp.name', 'kp.nim', 'bidang.nama_bidang', 'kp.tahun', 'kp.judul',
    //     'kp.perusahaan', 'kp.lokasi_perusahaan', 'dosen.nama_dosen', 'kp.abstrak', 'kp.file')
    //     ->where('kp.deleted_at',1)
    //     ->get();

    //     return view('kp.bin')
    //     ->with('joins', $joins);
    // }

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
        $nama_file = $file_kp->getClientOriginalName();
        $file_kp->move(public_path('storage/pdf/kp'), $nama_file);

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
            'file.required' => 'File KP wajib diisi, bila tidak ada perubahan. Mohon upload ulang file yang sama',
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,docx'
            ], [
                'file.mimes' => 'File KP wajib pdf atau docx'
            ]);

            $file_kp = $request->file('file');
            $nama_file = $file_kp->getClientOriginalName();
            $file_kp->move(public_path('storage/pdf/kp'), $nama_file);

            $data_kp = kp::where('id_kp', $id)->first();
            File::delete(public_path('storage/pdf/kp') . '/' . $data_kp->file);

        }

        DB::update('UPDATE kp SET name = :name, nim = :nim, bidang_id = :bidang_id,
        tahun = :tahun, judul = :judul, perusahaan = :perusahaan, lokasi_perusahaan = :lokasi_perusahaan,
        dosen_id = :dosen_id, abstrak = :abstrak, file = :file WHERE id_kp = :id',
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
            'file' => $nama_file,
        ]
        );
        return redirect()->route('kp.update_admin')->with('success', 'Berhasil update data KP!');
    }

    function delete($id)
    {
        // hapus data kp
        $data_kp = kp::where('id_kp', $id)->first();
        File::delete(public_path('storage/pdf/kp') . '/' . $data_kp->file);

		// hapus data
		kp::where('id_kp',$id)->delete();

		return redirect()->route('kp.update_admin')->with('success', 'Berhasil hapus data KP secara permanen!');
    }

    // function softDelete($id) {
    //     DB::update('UPDATE kp SET deleted_at = 1 WHERE id = :id', ['id' => $id]);
    //     return redirect()->route('kp.update_admin')->with('success', 'Berhasil hapus data KP secara sementara');
    // }

    // function restore($id){
    //     DB::update('UPDATE kp SET deleted_at = 0 WHERE id = :id', ['id' => $id]);
    //     return redirect()->route('kp.update_admin')->with('success', 'Data KP telah dikembalikan!');
    // }

}
