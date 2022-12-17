<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KpController;
use App\Http\Controllers\PembukaController;
use App\Http\Controllers\SkripsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Buat patokan
// route::get('mahasiswa', [MahasiswaController::class, 'index']);
// route::get('mahasiswa/{id}', [MahasiswaController::class, 'detail'])->where('id', '[0-9]+');

// route::get('/', [HalamanController::class, 'index']);
// route::get('/tentang', [HalamanController::class, 'tentang']);
// route::get('/kontak', [HalamanController::class, 'kontak']);

route::get('/', [PembukaController::class, 'index'])->name('home.index');

route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

route::get('/skripsi', [SkripsiController::class, 'index'])->name('skripsi.index');

route::get('/kp', [KpController::class, 'index'])->name('kp.index');

route::get('/jurnal', [JurnalController::class, 'index'])->name('jurnal.index');
