<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArtikelController extends Controller
{
    function index(Request $request){
        $cariartikel = $request->cariartikel;
        $data = artikel::where('judul_artikel', 'like', "%$cariartikel%")
        ->orWhere('jenis_artikel', 'like', "%$cariartikel%")
        ->orWhere('isi_artikel', 'like', "%$cariartikel%")
        ->orWhere('waktu_artikel', 'like', "%$cariartikel%")
        ->paginate(5);
        return view('artikel.index')->with('data', $data);
    }

    function detail_artikel($id){
        $data = artikel::where('id_artikel', $id)->first();
        return view('artikel.detail_artikel')->with('data', $data);
    }    

    function update_admin() {
        $data = DB::select('SELECT * FROM artikel where deleted_at = 0');

        return view('artikel.update_admin')
        ->with('data', $data);  
    }

    function cariartikel(Request $request) {
        $cariartikel_update = $request->cariartikel_update;

        $data = DB::table('artikel')
        ->where('judul_artikel', 'like', "%$cariartikel_update%")
        ->orWhere('jenis_artikel', 'like', "%$cariartikel_update%")
        ->orWhere('isi_artikel', 'like', "%$cariartikel_update%")
        ->orWhere('waktu_artikel', 'like', "%$cariartikel_update%")
        ->get();

        return view('artikel.update_admin')
            ->with('data', $data);
    }

    function create(){
        $data = artikel::all();
        return view('artikel.create', compact('data'));
    }

    function store(Request $request)
    {
        Session::flash('judul_artikel', $request->judul_artikel);
        Session::flash('jenis_artikel', $request->jenis_artikel);
        Session::flash('isi_artikel', $request->isi_artikel);
        Session::flash('waktu_artikel', $request->waktu_artikel);

        $request->validate([
            'judul_artikel' => 'required',
            'jenis_artikel' => 'required',
            'isi_artikel' => 'required',
            'waktu_artikel' => 'required',
        ], [
            'judul_artikel.required' => 'Judul artikel wajib diisi',
            'jenis_artikel.required' => 'Jenis artikel wajib diisi',
            'isi_artikel.required' => 'Isi artikel wajib diisi',
            'waktu_artikel.required' => 'Penulisan waktu artikel wajib diisi',
        ]);
        DB::insert('INSERT INTO artikel(judul_artikel, jenis_artikel, isi_artikel, waktu_artikel) 
        VALUES (:judul_artikel, :jenis_artikel, :isi_artikel, :waktu_artikel)',
        [
            'judul_artikel' => $request->judul_artikel,
            'jenis_artikel' => $request->jenis_artikel,
            'isi_artikel' => $request->isi_artikel,
            'waktu_artikel' => $request->waktu_artikel,
        ]
        );
        return redirect()->route('artikel.update_admin')->with('success', 'Berhasil menambahkan data artikel');
    }

    function edit($id)
    {
        $data = artikel::where('id_artikel', $id)->first();
        return view('artikel.edit')->with('data', $data);
    }

    function update(Request $request, $id) {
        $request->validate([
            'judul_artikel' => 'required',
            'jenis_artikel' => 'required',
            'isi_artikel' => 'required',
            'waktu_artikel' => 'required',
        ], [
            'judul_artikel.required' => 'Judul artikel wajib diisi',
            'jenis_artikel.required' => 'Jenis artikel wajib diisi',
            'isi_artikel.required' => 'Isi artikel wajib diisi',
            'waktu_artikel.required' => 'Penulisan waktu artikel wajib diisi',
        ]);
        DB::update('UPDATE artikel SET judul_artikel = :judul_artikel, jenis_artikel = :jenis_artikel, isi_artikel = :isi_artikel, 
        waktu_artikel = :waktu_artikel WHERE id_artikel = :id',
        [
            'id' => $id,
            'judul_artikel' => $request->judul_artikel,
            'jenis_artikel' => $request->jenis_artikel,
            'isi_artikel' => $request->isi_artikel,
            'waktu_artikel' => $request->waktu_artikel,
        ]
        );
        return redirect()->route('artikel.update_admin')->with('success', 'Berhasil update artikel!');
    }
}
