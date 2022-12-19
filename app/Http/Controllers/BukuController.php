<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    function index(Request $request){
        $caribuku = $request->caribuku;
        $data = buku::where('judul_buku', 'like', "%$caribuku%")
        ->orWhere('penulis', 'like', "%$caribuku%")
        ->orWhere('jenis_peminatan', 'like', "%$caribuku%")
        ->orWhere('detail_jenis_peminatan', 'like', "%$caribuku%")
        ->orWhere('kode_gabungan_final', 'like', "%$caribuku%")
        ->paginate(5);
        return view('buku.index')->with('data', $data);
    }

    function update_admin() {
        $data = DB::select('SELECT * FROM buku where deleted_at = 0');

        return view('buku.update_admin')
        ->with('data', $data);  
    }

    public function caribuku(Request $request) {
        $caribuku_update = $request->caribuku_update;

        $data = DB::table('buku')
        ->where('judul_buku', 'like', "%$caribuku_update%")
        ->orWhere('penulis', 'like', "%$caribuku_update%")
        ->orWhere('jenis_peminatan', 'like', "%$caribuku_update%")
        ->orWhere('detail_jenis_peminatan', 'like', "%$caribuku_update%")
        ->orWhere('kode_gabungan_final', 'like', "%$caribuku_update%")
        ->get();

        return view('buku.update_admin')
            ->with('data', $data);
    }

    function detail_buku($id){
        $data = buku::where('kode_gabungan_final', $id)->first();
        return view('buku.detail_buku')->with('data', $data);
    }

    function create(){
        return view('buku.create');
    }

    public function store(Request $request)
    {
        Session::flash('no', $request->no);
        Session::flash('tanggal_masuk', $request->tanggal_masuk);
        Session::flash('judul_buku', $request->judul_buku);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('isbn', $request->isbn);
        Session::flash('jenis_peminatan', $request->jenis_peminatan);
        Session::flash('detail_jenis_peminatan', $request->detail_jenis_peminatan);
        Session::flash('kode_detail_jenis_peminatan', $request->kode_detail_jenis_peminatan);
        Session::flash('kode_tahun', $request->kode_tahun);
        Session::flash('kode_nomor_urut_buku', $request->kode_nomor_urut_buku);
        Session::flash('kode_gabungan_final', $request->kode_gabungan_final);

        $request->validate([
            'id_gunpla' => 'required|unique:Gunpla,id_gunpla',
            'nama_gunpla' => 'required',
            'grade' => 'required',
            'harga' => 'required',
        ], [
            'id_gunpla.required' => 'ID gunpla wajib diisi',
            'id_gunpla.unique' => 'ID gunpla sudah ada',
            'nama_gunpla.required' => 'Nama gunpla wajib diisi',
            'grade.required' => 'Grade gunpla wajib diisi',
            'harga.required' => 'Harga gunpla wajib diisi',
        ]);
        DB::insert('INSERT INTO gunpla(id_gunpla, nama_gunpla, grade, harga) VALUES (:id_gunpla, :nama_gunpla, :grade, :harga)',
        [
            'id_gunpla' => $request->id_gunpla,
            'nama_gunpla' => $request->nama_gunpla,
            'grade' => $request->grade,
            'harga' => $request->harga,
        ]
        );
        return redirect()->route('gunpla.index')->with('success', 'Berhasil menambahkan data gunpla');
    }

    function edit($id)
    {
        $data = buku::where('kode_gabungan_final', $id)->first();
        return view('buku.edit')->with('data', $data);
    }

    function update() {
        //
    }

    public function bin()
    {
        return view('buku.bin');
    }
}
