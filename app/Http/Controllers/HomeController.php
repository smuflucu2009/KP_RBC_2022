<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        function index() {
            $joins = DB::table('postingan')
            ->join('category', 'postingan.category_id', '=', 'category.id')
            ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
            ->get();
            return view('home')->with('joins', $joins);
        }
    }
}
