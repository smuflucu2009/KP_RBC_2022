<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request){
        $request -> validate([
            'email' => 'required',
            // 'nim' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email diisi euy',
            // 'nim.required' => 'nim diisi euy',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            // 'nim' => $request->nim,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){

            return redirect('/role');

            // if (Auth::user()->role == 'mahasiswa'){
            //     return redirect('');
            // } elseif (Auth::user()->role == 'admin') {
            //     return redirect('/admin');
            // } elseif (Auth::user()->role == 'koor') {
            //     return redirect('/koor');
            // }
        }else{
            return redirect('')->withErrors('Ada yang error')->withInput();
        };
    }

    function logout() {
        Auth::logout();
        return redirect('');
    }

    function register() {
        return redirect('register');
    }
}
