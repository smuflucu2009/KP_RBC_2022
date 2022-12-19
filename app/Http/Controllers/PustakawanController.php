<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    function index() {
        return view('pustakawan.index');
    }
}
