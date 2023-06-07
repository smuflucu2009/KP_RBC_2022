<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;

class PembukaController extends Controller
{
    function index() {
        
        $joins = DB::table('postingan')
        ->join('category', 'postingan.category_id', '=', 'category.id')
        ->select('postingan.id_posting', 'postingan.judul', 'postingan.deskripsi', 'postingan.cover_gambar')
        ->paginate(3);
        return view('pembuka.index')->with('joins', $joins);
    }

    function faq(){
        return view('pembuka.faq');
    }
}
