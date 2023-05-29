<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    function feedback() {
        return view('forms.form-feedback');
    }

    function pengunjung() {
        return view('forms.form-pengunjung');
    }

    function sumbangan() {
        return view('forms.form-sumbangan');
    }
}
