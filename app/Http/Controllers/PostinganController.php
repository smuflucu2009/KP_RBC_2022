<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;

class PostinganController extends Controller
{
    public function index(){
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        ->where('postingan.deleted_at',0)
        ->get();

        return view('postingan.index')->with('joins', $joins);
    }

    function detail_postingan($id){
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        ->where('id_posting', $id)
        ->first();
        return view('postingan.detail_postingan')->with('joins', $joins);
    }

    function detail_postingan_admin($id){
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        ->where('postingan.id_posting', $id)
        ->first();
        return view('postingan.detail_postingan_admin')->with('joins', $joins);
    }

    function update_admin() {
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        ->where('postingan.deleted_at',0)
        ->get();

        return view('postingan.update_admin')->with('joins', $joins);
    }

    function bin() {
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        ->where('postingan.deleted_at',1)
        ->get();

        return view('postingan.bin')
        ->with('joins', $joins);
    }

    public function caripostingan(Request $request) {
        $caripostingan = $request->caripostingan;

        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        // ->where('postingan.deleted_at',0)
        ->orwhere('judul', 'like', "%$caripostingan%")
        ->orWhere('name_category', 'like', "%$caripostingan%")
        ->orWhere('waktu_posting', 'like', "%$caripostingan%")
        ->get();

        return view('postingan.index')->with('joins', $joins);
    }

    public function caripostingan2(Request $request) {
        $caripostingan2 = $request->caripostingan2;

        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        // ->where('postingan.deleted_at',0)
        ->orwhere('judul', 'like', "%$caripostingan2%")
        ->orWhere('name_category', 'like', "%$caripostingan2%")
        ->orWhere('waktu_posting', 'like', "%$caripostingan2%")
        ->get();

        return view('postingan.update_admin')->with('joins', $joins);
    }

    function create(){
        $joins = Postingan::all();
        return view('postingan.create', compact('joins'));
    }

    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('category_id', $request->category_id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required',
            'cover_gambar' => 'required|mimes:png,jpg,jpeg',
        ], [
            'judul.required' => 'Judul postingan wajib diisi',
            'deskripsi.required' => 'Deskripsi postingan wajib diisi',
            'category_id.required' => 'Kategori postingan wajib diisi',
            'cover_gambar.required' => 'Gambar cover wajib diisi',
            'cover_gambar.mimes' => 'Gambar cover wajib png, jpg, atau jpeg',
        ]);

        $gambar_cover = $request->file('cover_gambar');
        $gambar_extensi = $gambar_cover->getClientOriginalName();
        $nama_gambar = date('ymdhis') . '.' . $gambar_extensi;
        $gambar_cover->move(public_path('storage\postingan\cover_image'), $nama_gambar);

        DB::insert('INSERT INTO postingan(judul, deskripsi, category_id,
        cover_gambar)
        VALUES (:judul, :deskripsi, :category_id, :cover_gambar)',
        [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
            'cover_gambar' => $nama_gambar,
        ]
        );
        return redirect()->route('postingan.update_admin')->with('success', 'Berhasil menambahkan news!');
    }

    function edit($id)
    {
        $joins = Postingan::where('id_posting', $id)->first();
        return view('postingan.edit')->with('joins', $joins);
    }

    function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required',
            'cover_gambar' => 'required',
        ], [
            'judul.required' => 'Judul postingan wajib diisi',
            'deskripsi.required' => 'Deskripsi postingan wajib diisi',
            'category_id.required' => 'Kategori postingan wajib diisi',
            'cover_gambar.required' => 'Gambar cover wajib diupload',
        ]);

        if ($request->hasFile('cover_gambar')) {
            $request->validate([
                'cover_gambar' => 'mimes:png,jpg,jpeg'
            ], [
                'cover_gambar.mimes' => 'Gambar cover wajib png, jpg, atau jpeg'
            ]);

            $file_gambar = $request->file('cover_gambar');
            $gambar_extensi = $file_gambar->getClientOriginalName();
            $nama_gambar = date('ymdhis') . '.' . $gambar_extensi;
            $file_gambar->move(public_path('storage\postingan\cover_image'), $nama_gambar);

            $data_postingan = Postingan::where('id_posting', $id)->first();
            File::delete(public_path('storage\postingan\cover_image') . '/' . $data_postingan->cover_gambar);

        }

        DB::update('UPDATE postingan SET judul = :judul, deskripsi = :deskripsi, category_id = :category_id,
        cover_gambar = :cover_gambar WHERE id_posting = :id',
        [
            'id' => $id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'category_id' => $request->category_id,
            'cover_gambar' => $nama_gambar,
        ]
        );
        return redirect()->route('postingan.update_admin')->with('success', 'Berhasil update news!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM postingan WHERE id_posting = :id_posting', ['id_posting' => $id]);
        return redirect()->route('postingan.update_admin')->with('success', 'Berhasil hapus news secara permanen!');
    }

    function softDelete($id) {
        DB::update('UPDATE postingan SET deleted_at = 1 WHERE id = :id', ['id' => $id]);
        return redirect()->route('postingan.update_admin')->with('success', 'Berhasil hapus news secara sementara');
    }

    function restore($id){
        DB::update('UPDATE postingan SET deleted_at = 0 WHERE id = :id', ['id' => $id]);
        return redirect()->route('postingan.update_admin')->with('success', 'Data news telah dikembalikan!');
    }
}
