<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    function index() {
        return view('skripsi.index');
    }
}
