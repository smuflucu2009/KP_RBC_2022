<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembukaController extends Controller
{
    function index() {
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'category.name_category', 'postingan.waktu_posting', 'postingan.cover_gambar')
        ->get();
        return view('pembuka.index')->with('joins', $joins);
    }

    function faq(){
        return view('pembuka.faq');
    }
}
