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
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\TAController;
use App\Models\artikel;
use App\Models\Postingan;
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

route::middleware(['guest'])->group(function() {
    
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);

});

Route::get('/home', function () {
    return redirect('');
});

Route::get('/register', [SesiController::class, 'register']);

route::middleware(['auth'])->group(function() {
    
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/admin', [RoleController::class, 'admin'])->middleware('userAkses:admin')->name('admin.index');
    Route::get('/koor', [RoleController::class, 'koor'])->middleware('userAkses:koor')->name('koor.index');
    Route::get('/logout', [SesiController::class, 'logout']);    
    // route::get('/buku/detail/{id}', [BukuController::class, 'detail_buku'])->name('buku.detail_buku');
    // route::get('/buku/update_admin', [BukuController::class, 'update_admin'])->name('buku.update_admin');
    // route::get('/buku/update_admin/create', [BukuController::class, 'create'])->name('buku.create');
    // route::post('/buku/update_admin/store', [BukuController::class, 'store'])->name('buku.store');
    // route::get('/caribuku', [BukuController::class, 'caribuku'])->name('buku.cari');
    // route::get('/buku/update_admin/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    // route::post('/buku/update_admin/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    // route::get('/buku/update_admin/bin', [BukuController::class, 'bin'])->name('buku.bin');
    // route::post('/buku/update_admin/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
    // route::post('/buku/update_admin/softdelete/{id}', [BukuController::class, 'softDelete'])->name('buku.softdelete');
    // route::get('/buku/update_admin/restore/{id}', [BukuController::class, 'restore'])->name('buku.restore');
    // route::post('/buku/update_admin/pinjam/{id}', [BukuController::class, 'pinjam'])->name('buku.pinjam');
    // route::get('/buku/update_admin/kembali/{id}', [BukuController::class, 'kembali'])->name('buku.kembali');
    // Route::get('/buku/update_admin/export_excel', [BukuController::class, 'export_excel']);
    // Route::post('/buku/update_admin/import_excel', [BukuController::class, 'import_excel']);
});

route::get('/buku/detail/{id}', [BukuController::class, 'detail_buku'])->name('buku.detail_buku');
route::get('/buku/update_admin', [BukuController::class, 'update_admin'])->name('buku.update_admin');
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
Route::get('/buku/update_admin/export_excel', [BukuController::class, 'export_excel']);
Route::post('/buku/update_admin/import_excel', [BukuController::class, 'import_excel']);
// Route::post('/buku/approve/{id}', BukuController::class,'approvePinjamBuku')->name('buku.approve');
// Route::post('/buku/deny/{id}', BukuController::class,'denyPinjamBuku')->name('buku.deny');


route::get('/', [PembukaController::class, 'index'])->name('home.index');

route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
route::get('/buku/cariJP', [BukuController::class, 'cariJP'])->name('buku.cariJP');
route::get('/buku/cariDJP', [BukuController::class, 'cariDJP'])->name('buku.cariDJP');

route::get('/buku/update_admin/pinjambuku/admin', [PinjamBukuController::class, 'admin'])->name('pinjamb.admin');
route::get('/buku/update_admin/pinjambuku', [PinjamBukuController::class, 'index'])->name('buku.pinjamb');
route::get('/buku/update_admin/pinjambuku/create', [PinjamBukuController::class, 'create'])->name('pinjamb.create');
route::post('/buku/update_admin/pinjambuku/store', [PinjamBukuController::class, 'store'])->name('pinjamb.store');
route::post('/buku/update_admin/pinjambuku/delete/{id}', [PinjamBukuController::class, 'delete'])->name('pinjamb.delete');
route::post('/buku/update_admin/delete_all', [BukuController::class, 'delete_all'])->name('buku.delete_all');

route::get('/cariSkripsi', [SkripsiController::class, 'cariSkripsi'])->name('skripsi.cari');
route::get('/cariSkripsi2', [SkripsiController::class, 'cariSkripsi2'])->name('skripsi.cari2');
route::get('/ta', [SkripsiController::class, 'index'])->name('skripsi.index');
route::get('/skripsi/update_admin', [SkripsiController::class, 'update_admin'])->name('skripsi.update_admin');
route::get('/skripsi/update_admin/create', [SkripsiController::class, 'create'])->name('skripsi.create');
route::post('/skripsi/update_admin/store', [SkripsiController::class, 'store'])->name('skripsi.store');
route::get('/skripsi/update_admin/edit/{id}', [SkripsiController::class, 'edit'])->name('skripsi.edit');
route::post('/skripsi/update_admin/update/{id}', [SkripsiController::class, 'update'])->name('skripsi.update');
// route::get('/skripsi/update_admin/bin', [SkripsiController::class, 'bin'])->name('skripsi.bin');
route::post('/skripsi/update_admin/softdelete/{id}', [SkripsiController::class, 'softDelete'])->name('skripsi.softdelete');
route::get('/skripsi/update_admin/restore/{id}', [SkripsiController::class, 'restore'])->name('skripsi.restore');
route::post('/skripsi/update_admin/delete/{id}', [SkripsiController::class, 'delete'])->name('skripsi.delete');
route::get('/skripsi/detail/{id}', [SkripsiController::class, 'detail_skripsi'])->name('skripsi.detail_skripsi');

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
// route::get('/kp/update_admin/bin', [KpController::class, 'bin'])->name('kp.bin');
route::post('/kp/update_admin/softdelete/{id}', [KpController::class, 'softDelete'])->name('kp.softdelete');
route::get('/kp/update_admin/restore/{id}', [KpController::class, 'restore'])->name('kp.restore');
Route::get('/kp/update_admin/export_excel', [KpController::class, 'export_excel']);
Route::post('/kp/update_admin/import_excel', [KpController::class, 'import_excel']);
route::get('/kd', [KDController::class, 'index'])->name('kd.index');

route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
route::get('/RuangBaca', [FasilitasController::class, 'RuangBaca'])->name('fasilitas.RuangBaca');
route::get('/mobile', [FasilitasController::class, 'mobile'])->name('fasilitas.mobile');

route::get('/postingan', [PostinganController::class, 'index'])->name('postingan.index');
route::get('/postingan/update_admin', [PostinganController::class, 'update_admin'])->name('postingan.update_admin');
route::get('/caripostingan', [PostinganController::class, 'caripostingan'])->name('postingan.cari');
route::get('/caripostingan2', [PostinganController::class, 'caripostingan2'])->name('postingan.cari2');
route::get('/postingan/detail/{id}', [PostinganController::class, 'detail_postingan'])->name('postingan.detail_postingan');
route::get('/postingan/update_admin/detail/{id}', [PostinganController::class, 'detail_postingan_admin'])->name('postingan.detail_postingan_admin');
route::get('/postingan/update_admin/create', [PostinganController::class, 'create'])->name('postingan.create');
route::post('/postingan/update_admin/store', [PostinganController::class, 'store'])->name('postingan.store');
route::get('/postingan/update_admin/edit/{id}', [PostinganController::class, 'edit'])->name('postingan.edit');
route::post('/postingan/update_admin/update/{id}', [PostinganController::class, 'update'])->name('postingan.update');
// route::get('/postingan/update_admin/bin', [PostinganController::class, 'bin'])->name('postingan.bin');
route::post('/postingan/update_admin/delete/{id}', [PostinganController::class, 'delete'])->name('postingan.delete');
route::post('/postingan/update_admin/softdelete/{id}', [PostinganController::class, 'softDelete'])->name('postingan.softdelete');
route::get('/postingan/update_admin/restore/{id}', [PostinganController::class, 'restore'])->name('postingan.restore');

route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
route::get('/visi', [PustakawanController::class, 'visi'])->name('pustakawan.visi');
route::get('/jam', [PustakawanController::class, 'jam'])->name('pustakawan.jam');
route::get('/faq', [PembukaController::class, 'faq'])->name('pembuka.faq');

