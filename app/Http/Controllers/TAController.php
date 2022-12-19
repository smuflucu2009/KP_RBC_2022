<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TAController extends Controller
{
    function index() {
        return view('ta.index');
    }
}
