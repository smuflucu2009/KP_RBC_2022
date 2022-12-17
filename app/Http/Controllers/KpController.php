<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KpController extends Controller
{
    function index() {
        return view('kp.index');
    }
}
