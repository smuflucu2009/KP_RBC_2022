<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    function index() {
        return view('artikel.index');
    }
}
