<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembukaController extends Controller
{
    function index() {
        return view('pembuka.index');
    }
}
