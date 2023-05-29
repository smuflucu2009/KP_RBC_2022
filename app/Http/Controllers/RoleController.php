<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    function index() {
        // echo 'Selamat Datang';
        return view('/role');
    }

    function admin() {

        return redirect()->route('admin.index');
    }

    function mahasiswa() {
        
        return view('');
    }

    function koor() {
        
        return redirect()->route('koor.index');
    }
}
