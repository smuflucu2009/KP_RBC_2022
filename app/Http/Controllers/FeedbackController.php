<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function index(){
        $joins = DB::table('feedback')
        ->select('feedback.id', 'feedback.nama', 'feedback.kontak', 'feedback.jenis_feedback', 'feedback.penjelasan', 
        'feedback.penjelasan_rinci', 'feedback.waktu_post')
        ->get();        

        $joins = $joins->map(function($join) {
            $join->waktu_post = Carbon::parse($join->waktu_post)->setTimezone('Asia/Jakarta')->format('d M Y H:i');
            return $join;
        });

        return view('feedback.index')->with('joins', $joins);
    }

    public function carifeedback(Request $request) {
        $carifeedback = $request->carifeedback;

        $joins = DB::table('pengunjung')
        ->select('feedback.id', 'feedback.nama', 'feedback.kontak', 'feedback.jenis_feedback', 'feedback.penjelasan', 
        'feedback.penjelasan_rinci', 'feedback.waktu_post')
        ->orwhere('nama', 'like', "%$carifeedback%")
        ->orwhere('kontak', 'like', "%$carifeedback%")
        ->orwhere('jenis_feedback', 'like', "%$carifeedback%")
        ->orwhere('penjelasan', 'like', "%$carifeedback%")
        ->orwhere('waktu_post', 'like', "%$carifeedback%")
        ->get();

        return view('feedback.index')->with('joins', $joins);
    }

    function create(){
        $joins = feedback::all();
        return view('feedback.create', compact('joins'));
    }

    function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('kontak', $request->kontak);
        Session::flash('jenis_feedback', $request->jenis_feedback);
        Session::flash('penjelasan', $request->penjelasan);
        Session::flash('penjelasan_rinci', $request->penjelasan_rinci);

        $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'jenis_feedback' => 'required',
            'penjelasan' => 'required',
            'penjelasan_rinci' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'kontak.required' => 'Kontak wajib diisi',
            'jenis_feedback.required' => 'Jenis feedback wajib diisi',
            'penjelasan.required' => 'Kolom penjelasan wajib diisi',
            'penjelasan_rinci.required' => 'Kolom penjelasan rinci wajib diisi',
        ]);

        $now = Carbon::now();

        if (Auth::check()) {
            // Pengguna sudah login
            feedback::create([
                'nama' => Auth::user()->nama,
                'kontak' => $request->kontak,
                'jenis_feedback' => $request->jenis_feedback,
                'penjelasan' => $request->penjelasan,
                'penjelasan_rinci' => $request->penjelasan_rinci,
                'waktu_post' => $now,
            ]);
        
            return redirect()->route('home.index')->with('success', 'Berhasil menambahkan feedback');

        } else {
            // Pengguna belum login
            feedback::create([
                'nama' => $request->nama,
                'kontak' => $request->kontak,
                'jenis_feedback' => $request->jenis_feedback,
                'penjelasan' => $request->penjelasan,
                'penjelasan_rinci' => $request->penjelasan_rinci,
                'waktu_post' => $now,
            ]);
            return redirect()->route('home.index')->with('success', 'Berhasil menambahkan feedback!');
        }
    }

    public function delete_all()
	{
		DB::table('feedback')->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback dihapus keseluruhan');
	}

    function delete($id)
    {
        DB::delete('DELETE FROM feedback WHERE id = :id', ['id' => $id]);
        return redirect()->route('feedback.index')->with('success', 'Berhasil menghapus feedback!');
    }
}
