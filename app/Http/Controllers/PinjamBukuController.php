<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamBukuController extends Controller
{
    function index() {
        return view('pinjamb.index');
    }
}
