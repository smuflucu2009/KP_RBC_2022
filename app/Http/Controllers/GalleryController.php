<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index(){
        $joins = DB::table('galery')
        ->join('postingan', 'galery.post_id', '=', 'postingan.id_posting')
        ->select('galery.id','galery.post_id', 'galery.file')
        ->get();

        return view('galery.index')->with('joins', $joins);
    }

    public function carigalery(Request $request) {
        $carigalery = $request->carigalery;

        $joins = DB::table('galery')
        ->join('postingan', 'galery.post_id', '=', 'postingan.id_posting')
        ->select('galery.id', 'galery.post_id', 'galery.file')
        ->orwhere('post_id', 'like', "%$carigalery%")
        ->get();

        return view('galery.index')->with('joins', $joins);
    }

    function create(){
        $joins = Gallery::all();
        return view('galery.create', compact('joins'));
    }

    public function store(Request $request)
    {
        Session::flash('post_id', $request->post_id);

        $request->validate([
            'post_id' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg',
        ], [
            'post_id.required' => 'Judul postingan wajib diisi',
            'file.required' => 'Gambar wajib diisi',
            'file.mimes' => 'Gambar wajib png, jpg, atau jpeg',
        ]);

        $gambar_file = $request->file('file');
        $gambar_extensi = $gambar_file->getClientOriginalName();
        $nama_gambar = date('ymdhis') . '.' . $gambar_extensi;
        $gambar_file->move(public_path('storage/img/news'), $nama_gambar);

        DB::insert('INSERT INTO galery(post_id, file) VALUES (:post_id, :file)',
        [
            'post_id' => $request->post_id,
            'file' => $nama_gambar,
        ]
        );
        return redirect()->route('galery.index')->with('success', 'Berhasil menambahkan gambar!');
    }

    function edit($id)
    {
        $joins = Gallery::where('id', $id)->first();
        return view('galery.edit')->with('joins', $joins);
    }

    function update(Request $request, $id) {
        $request->validate([
            'post_id' => 'required',
        ], [
            'post_id.required' => 'Judul postingan wajib diisi',
            'file.required' => 'Gambar wajib diisi',
        ]);

        $file_gambar = $request->file('file');
        $gambar_extensi = $file_gambar->getClientOriginalName();
        $nama_gambar = date('ymdhis') . '.' . $gambar_extensi;
        $file_gambar->move(public_path('storage/img/news'), $nama_gambar);

        $data_postingan = Gallery::where('id', $id)->first();
        File::delete(public_path('storage/img/news') . '/' . $data_postingan->file);

        DB::update('UPDATE galery SET post_id = :post_id, file = :file WHERE id = :id',
        [
            'id' => $id,
            'post_id' => $request->post_id,
            'file' => $nama_gambar
        ]
        );
        return redirect()->route('galery.index')->with('success', 'Berhasil update gambar!');
    }

    function delete($id)
    {
        DB::delete('DELETE FROM galery WHERE id = :id', ['id' => $id]);
        return redirect()->route('galery.index')->with('success', 'Berhasil hapus gambar!');
    }
}
