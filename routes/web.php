<?php

use App\Http\Controllers\API\KPController as APIKPController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KDController;
use App\Http\Controllers\KpController;
use App\Http\Controllers\PembukaController;
use App\Http\Controllers\PinjamBukuController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\TAController;
use App\Models\artikel;
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

route::get('/', [PembukaController::class, 'index'])->name('home.index');

route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
route::get('/buku/update_admin', [BukuController::class, 'update_admin'])->name('buku.update_admin');
route::get('/buku/detail/{id}', [BukuController::class, 'detail_buku'])->name('buku.detail_buku');
route::get('/buku/cariJP', [BukuController::class, 'cariJP'])->name('buku.cariJP');
route::get('/buku/cariDJP', [BukuController::class, 'cariDJP'])->name('buku.cariDJP');
route::get('/buku/update_admin/create', [BukuController::class, 'create'])->name('buku.create');
route::post('/buku/update_admin/store', [BukuController::class, 'store'])->name('buku.store');
route::get('/caribuku', [BukuController::class, 'caribuku'])->name('buku.cari');
route::get('/buku/update_admin/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
route::post('/buku/update_admin/update/{id}', [BukuController::class, 'update'])->name('buku.update');
route::get('/buku/update_admin/bin', [BukuController::class, 'bin'])->name('buku.bin');
route::post('/buku/update_admin/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
route::post('/buku/update_admin/softdelete/{id}', [BukuController::class, 'softDelete'])->name('buku.softdelete');
route::get('/buku/update_admin/restore/{id}', [BukuController::class, 'restore'])->name('buku.restore');
route::post('/buku/update_admin/pinjam/{id}', [BukuController::class, 'pinjam'])->name('buku.pinjam');
route::get('/buku/update_admin/kembali/{id}', [BukuController::class, 'kembali'])->name('buku.kembali');
route::get('/buku/update_admin/pinjambuku', [PinjamBukuController::class, 'index'])->name('buku.pinjamb');
route::get('/buku/update_admin/pinjambuku/create', [PinjamBukuController::class, 'create'])->name('pinjamb.create');
route::post('/buku/update_admin/pinjambuku/store', [PinjamBukuController::class, 'store'])->name('pinjamb.store');
route::post('/buku/update_admin/pinjambuku/delete/{id}', [PinjamBukuController::class, 'delete'])->name('pinjamb.delete');

route::get('/ta', [TAController::class, 'index'])->name('ta.index');

route::get('/kp', [KpController::class, 'index'])->name('kp.index');
route::get('/kp/detail/{id}', [KpController::class, 'detail_kp'])->name('kp.detail_kp');
route::get('/kp/update_admin', [KpController::class, 'update_admin'])->name('kp.update_admin');
route::get('/kp/update_admin/create', [KpController::class, 'create'])->name('kp.create');
route::post('/kp/update_admin/store', [KpController::class, 'store'])->name('kp.store');
route::get('/kp/update_admin/edit/{id}', [KpController::class, 'edit'])->name('kp.edit');
route::post('/kp/update_admin/update/{id}', [KpController::class, 'update'])->name('kp.update');
route::post('/kp/update_admin/delete/{id}', [KpController::class, 'delete'])->name('kp.delete');
route::get('/cariKP', [KpController::class, 'cariKP'])->name('kp.cari');
route::get('/cariKP2', [KpController::class, 'cariKP2'])->name('kp.cari2');
route::get('/kp/update_admin/bin', [KpController::class, 'bin'])->name('kp.bin');
route::post('/kp/update_admin/softdelete/{id}', [KpController::class, 'softDelete'])->name('kp.softdelete');
route::get('/kp/update_admin/restore/{id}', [KpController::class, 'restore'])->name('kp.restore');

route::get('/kd', [KDController::class, 'index'])->name('kd.index');

route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
route::get('/artikel/update_admin', [ArtikelController::class, 'update_admin'])->name('artikel.update_admin');
route::get('/artikel/detail/{id}', [ArtikelController::class, 'detail_artikel'])->name('artikel.detail_artikel');
route::get('/artikel/update_admin/create', [ArtikelController::class, 'create'])->name('artikel.create');
route::post('/artikel/update_admin/store', [ArtikelController::class, 'store'])->name('artikel.store');
route::get('/cariartikel', [ArtikelController::class, 'cariartikel'])->name('artikel.cari');
route::get('/artikel/update_admin/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
route::post('/artikel/update_admin/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
route::get('/artikel/update_admin/bin', [BukuController::class, 'bin'])->name('artikel.bin');
route::post('/artikel/update_admin/delete/{id}', [BukuController::class, 'delete'])->name('artikel.delete');
route::post('/artikel/update_admin/softdelete/{id}', [BukuController::class, 'softDelete'])->name('artikel.softdelete');
route::get('/artikel/update_admin/restore/{id}', [BukuController::class, 'restore'])->name('artikel.restore');

route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
route::get('/faq', [PembukaController::class, 'faq'])->name('pembuka.faq');

