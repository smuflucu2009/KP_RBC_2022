<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    function index() {
        return view('pustakawan.index');
    }

    function visi() {
        return view('pustakawan.visi');
    }

    function jam() {
        return view('pustakawan.jam');
    }
}
