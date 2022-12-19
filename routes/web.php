<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KDController;
use App\Http\Controllers\KpController;
use App\Http\Controllers\PembukaController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\TAController;
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
route::get('/buku/update_admin', [BukuController::class, 'update_admin'])->name('buku.update_admin');
route::get('/buku/detail/{id}', [BukuController::class, 'detail_buku'])->name('buku.detail_buku');
Route::get('/caribuku', [BukuController::class, 'caribuku'])->name('buku.cari');
route::get('/buku/update_admin/bin', [BukuController::class, 'bin'])->name('buku.bin');
route::get('/buku/update_admin/create', [BukuController::class, 'create'])->name('buku.create');
route::get('/buku/update_admin/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');

route::get('/ta', [TAController::class, 'index'])->name('ta.index');

route::get('/kp', [KpController::class, 'index'])->name('kp.index');

route::get('/kd', [KDController::class, 'index'])->name('kd.index');

route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');

route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
