<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SesiController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email diisi euy',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if (Auth::user()->role == 'mahasiswa'){
                return redirect('');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('');
            }
        }else{
            return redirect('/login')->withErrors('Penulisan email dan password ada kesalahan')->withInput();
        };
    }

    function logout() {
        Auth::logout();
        return redirect('/login');
    }

    function register() {
        return view('register');
    }

    function create(Request $request)
    {
        Session::flash('nama', $request->input('nama'));
        Session::flash('nim', $request->input('nim'));
        Session::flash('email', $request->input('email'));

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'nim.unique' => 'NIM sudah digunakan, silakan masukkan NIM yang lain',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $inforegister = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($inforegister)) {
            return redirect('')->with('success Berhasil Register Akun');
        } else {
            return redirect('/register')->withErrors('Email atau password yang dimasukkan tidak sesuai');
        }
    }
}
