<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index() {
        return view('sesi/index');
    }

    function login(Request $request) {
    Session::flash('nim', $request->input('nim'));

    $request->validate([
        'nim' => 'required',
        'password' => 'required'
    ], [
        'nim.required' => 'NIM wajib diisi',
        'password.required' => 'Password wajib diisi'
    ]);

    $infologin = [
        'nim' => $request->nim,
        'password' => $request->password
    ];
        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success', Auth::user()->nama . 'Berhasil login');
        } else {
            return redirect('sesi')->withErrors('nim dan password yang dimasukkan tidak sesuai');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        Session::flash('nama', $request->input('nama'));
        Session::flash('nim', $request->input('nim'));

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:users',
            'password' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'nim.unique' => 'NIM sudah digunakan, silakan masukkan NIM yang lain',
            'password.required' => 'Password wajib diisi'
        ]);

        $data = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'nim' => $request->nim,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success', Auth::user()->nama . 'Berhasil Register Akun');
        } else {
            return redirect('sesi')->withErrors('NIM dan password yang dimasukkan tidak sesuai');
        }
    }
}
