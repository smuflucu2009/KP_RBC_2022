<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    function index() {
        $data = DB::select('SELECT * FROM buku where deleted_at is null');
        
        return view('buku.index')
        ->with('data', $data);
        
    }
}
