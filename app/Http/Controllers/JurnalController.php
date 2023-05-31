<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalController extends Controller
{
    function index() {
        return view('jurnal.index');
    }
}
