<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KDController extends Controller
{
    function index() {
        return view('kd.index');
    }
}
