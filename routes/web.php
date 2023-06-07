<?php

use App\Http\Controllers\API\KPController as APIKPController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
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
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\SumbanganController;
use App\Http\Controllers\TAController;
use App\Models\artikel;
use App\Models\Postingan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\formController;

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
    Route::get('/register', [SesiController::class, 'register']);
    Route::post('/register/create', [SesiController::class, 'create'])->name('register.create');
});

route::middleware(['auth'])->group(function() {

    // uji coba    
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/admin', [RoleController::class, 'admin'])->middleware('userAkses:admin')->name('admin.index');
    Route::get('/koor', [RoleController::class, 'koor'])->middleware('userAkses:koor')->name('koor.index');

    Route::get('/logout', [SesiController::class, 'logout']);
    
    // Buku
    route::get('/buku/detail/{id}', [BukuController::class, 'detail_buku'])->name('buku.detail_buku');
    route::get('/buku/update_admin', [BukuController::class, 'update_admin'])->name('buku.update_admin')->middleware('userAkses:admin');
    route::get('/buku/update_admin/create', [BukuController::class, 'create'])->name('buku.create')->middleware('userAkses:admin');
    route::post('/buku/update_admin/store', [BukuController::class, 'store'])->name('buku.store')->middleware('userAkses:admin');    
    route::get('/buku/update_admin/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit')->middleware('userAkses:admin');
    route::post('/buku/update_admin/update/{id}', [BukuController::class, 'update'])->name('buku.update')->middleware('userAkses:admin');
    route::post('/buku/update_admin/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete')->middleware('userAkses:admin');
    route::post('/buku/update_admin/pinjam/{id}', [BukuController::class, 'pinjam'])->name('buku.pinjam')->middleware('userAkses:admin');
    Route::get('/buku/update_admin/export_excel', [BukuController::class, 'export_excel'])->middleware('userAkses:admin');
    Route::post('/buku/update_admin/import_excel', [BukuController::class, 'import_excel'])->middleware('userAkses:admin');
    route::post('/buku/update_admin/delete_all', [BukuController::class, 'delete_all'])->name('buku.delete_all')->middleware('userAkses:admin');

    // Peminjaman buku
    route::get('/buku/update_admin/pinjambuku', [PinjamBukuController::class, 'index'])->name('buku.pinjamb')->middleware('userAkses:admin');
    route::get('/buku/update_admin/pinjambuku/create', [PinjamBukuController::class, 'create'])->name('pinjamb.create');
    route::post('/buku/update_admin/pinjambuku/store', [PinjamBukuController::class, 'store'])->name('pinjamb.store');
    route::post('/buku/update_admin/pinjambuku/delete/{id}', [PinjamBukuController::class, 'delete'])->name('pinjamb.delete')->middleware('userAkses:admin');
    Route::post('/buku/update_admin/pinjambuku/approve/{id}', [PinjamBukuController::class,'approvePinjamBuku'])->name('buku.approve')->middleware('userAkses:admin');

    // TA / Skripsi
    route::get('/skripsi/update_admin', [SkripsiController::class, 'update_admin'])->name('skripsi.update_admin')->middleware('userAkses:admin');
    route::get('/skripsi/update_admin/create', [SkripsiController::class, 'create'])->name('skripsi.create')->middleware('userAkses:admin');
    route::post('/skripsi/update_admin/store', [SkripsiController::class, 'store'])->name('skripsi.store')->middleware('userAkses:admin');
    route::get('/skripsi/update_admin/edit/{id}', [SkripsiController::class, 'edit'])->name('skripsi.edit')->middleware('userAkses:admin');
    route::post('/skripsi/update_admin/update/{id}', [SkripsiController::class, 'update'])->name('skripsi.update')->middleware('userAkses:admin');
    route::post('/skripsi/update_admin/delete/{id}', [SkripsiController::class, 'delete'])->name('skripsi.delete')->middleware('userAkses:admin');
    route::get('/skripsi/detail/{id}', [SkripsiController::class, 'detail_skripsi'])->name('skripsi.detail_skripsi');
    Route::post('/skripsi/update_admin/import_excel', [SkripsiController::class, 'import_excel'])->middleware('userAkses:admin');

    // Kerja Praktek
    route::get('/kp/detail/{id}', [KpController::class, 'detail_kp'])->name('kp.detail_kp');
    route::get('/kp/update_admin', [KpController::class, 'update_admin'])->name('kp.update_admin')->middleware('userAkses:admin');
    route::get('/kp/update_admin/create', [KpController::class, 'create'])->name('kp.create')->middleware('userAkses:admin');
    route::post('/kp/update_admin/store', [KpController::class, 'store'])->name('kp.store')->middleware('userAkses:admin');
    route::get('/kp/update_admin/edit/{id}', [KpController::class, 'edit'])->name('kp.edit')->middleware('userAkses:admin');
    route::post('/kp/update_admin/update/{id}', [KpController::class, 'update'])->name('kp.update')->middleware('userAkses:admin');
    route::post('/kp/update_admin/delete/{id}', [KpController::class, 'delete'])->name('kp.delete')->middleware('userAkses:admin');
    Route::post('/kp/update_admin/import_excel', [KpController::class, 'import_excel'])->middleware('userAkses:admin');

    // Postingan
    route::get('/postingan', [PostinganController::class, 'index'])->name('postingan.index')->middleware('userAkses:admin');
    route::get('/postingan/detail/{id}', [PostinganController::class, 'detail_postingan'])->name('postingan.detail_postingan');
    route::get('/caripostingan', [PostinganController::class, 'caripostingan'])->name('postingan.cari')->middleware('userAkses:admin');
    route::get('/postingan/create', [PostinganController::class, 'create'])->name('postingan.create')->middleware('userAkses:admin');
    route::post('/postingan/store', [PostinganController::class, 'store'])->name('postingan.store')->middleware('userAkses:admin');
    route::get('/postingan/edit/{id}', [PostinganController::class, 'edit'])->name('postingan.edit')->middleware('userAkses:admin');
    route::post('/postingan/update/{id}', [PostinganController::class, 'update'])->name('postingan.update')->middleware('userAkses:admin');
    route::post('/postingan/delete/{id}', [PostinganController::class, 'delete'])->name('postingan.delete')->middleware('userAkses:admin');
    
    // Galery
    route::get('/galery', [GalleryController::class, 'index'])->name('galery.index')->middleware('userAkses:admin');
    route::get('/carigalery', [GalleryController::class, 'carigalery'])->name('galery.cari')->middleware('userAkses:admin');
    route::get('/galery/create', [GalleryController::class, 'create'])->name('galery.create')->middleware('userAkses:admin');
    route::post('/galery/store', [GalleryController::class, 'store'])->name('galery.store')->middleware('userAkses:admin');
    route::get('/galery/edit/{id}', [GalleryController::class, 'edit'])->name('galery.edit')->middleware('userAkses:admin');
    route::post('/galery/update/{id}', [GalleryController::class, 'update'])->name('galery.update')->middleware('userAkses:admin');
    route::post('/galery/delete/{id}', [GalleryController::class, 'delete'])->name('galery.delete')->middleware('userAkses:admin');

    // Pengunjung
    route::get('/pengunjung/admin', [PengunjungController::class, 'index'])->name('pengunjung.index')->middleware('userAkses:admin');
    route::get('/caripengunjung', [PengunjungController::class, 'caripengunjung'])->name('pengunjung.cari')->middleware('userAkses:admin');
    route::post('/pengunjung/delete/{id}', [PengunjungController::class, 'delete'])->name('pengunjung.delete')->middleware('userAkses:admin');
    route::post('/pengunjung/admin/delete_all', [PengunjungController::class, 'delete_all'])->name('pengunjung.delete_all')->middleware('userAkses:admin');

    // Feedback
    route::get('/feedback/admin', [FeedbackController::class, 'index'])->name('feedback.index')->middleware('userAkses:admin');
    route::get('/carifeedback', [FeedbackController::class, 'carifeedback'])->name('feedback.cari')->middleware('userAkses:admin');
    route::post('/feedback/delete/{id}', [FeedbackController::class, 'delete'])->name('feedback.delete')->middleware('userAkses:admin');
    route::post('/feedback/admin/delete_all', [FeedbackController::class, 'delete_all'])->name('feedback.delete_all')->middleware('userAkses:admin');

    // Sumbangan
    route::get('/sumbangan_buku/admin', [SumbanganController::class, 'index'])->name('sumbangan.index')->middleware('userAkses:admin');
    route::get('/carisumbangan', [SumbanganController::class, 'carisumbangan'])->name('sumbangan.cari')->middleware('userAkses:admin');
    route::get('/sumbangan_buku/admin/detail/{id}', [SumbanganController::class, 'detail_sumbangan'])->name('sumbangan.detail_sumbangan')->middleware('userAkses:admin');
    route::get('/sumbangan_buku', [SumbanganController::class, 'create'])->name('sumbangan.create');
    route::post('/sumbangan_buku/store', [SumbanganController::class, 'store'])->name('sumbangan.store');
    route::get('/sumbangan_buku/admin/edit/{id}', [SumbanganController::class, 'edit'])->name('sumbangan.edit')->middleware('userAkses:admin');
    route::post('/sumbangan_buku/admin/update/{id}', [SumbanganController::class, 'update'])->name('sumbangan.update')->middleware('userAkses:admin');
    route::post('/sumbangan_buku/admin/delete/{id}', [SumbanganController::class, 'delete'])->name('sumbangan.delete')->middleware('userAkses:admin');
});

//home
route::get('/', [PembukaController::class, 'index'])->name('home.index');
Route::get('/home', function () {
    return redirect('');
});

// route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
// route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
// route::get('/sesi/logout', [SessionController::class, 'logout'])->name('session.logout');
// route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');
// route::get('/sesi/register', [SessionController::class, 'register'])->name('session.register')->middleware('isTamu');
// route::post('/buku/update_admin/softdelete/{id}', [BukuController::class, 'softDelete'])->name('buku.softdelete');
// route::get('/buku/update_admin/restore/{id}', [BukuController::class, 'restore'])->name('buku.restore');
// route::get('/buku/cariJP', [BukuController::class, 'cariJP'])->name('buku.cariJP');
// route::get('/buku/cariDJP', [BukuController::class, 'cariDJP'])->name('buku.cariDJP');
// route::get('/caribuku', [BukuController::class, 'caribuku'])->name('buku.cari');
// route::get('/buku/update_admin/bin', [BukuController::class, 'bin'])->name('buku.bin');

route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
route::get('/caribuku', [BukuController::class, 'caribuku'])->name('buku.cari');
route::get('/buku/cariJP', [BukuController::class, 'cariJP'])->name('buku.cariJP');
route::get('/buku/cariDJP', [BukuController::class, 'cariDJP'])->name('buku.cariDJP');
route::get('/skripsi', [SkripsiController::class, 'index'])->name('skripsi.index');

route::get('/cariSkripsi', [SkripsiController::class, 'cariSkripsi'])->name('skripsi.cari');
route::get('/cariSkripsi2', [SkripsiController::class, 'cariSkripsi2'])->name('skripsi.cari2');

route::get('/kp', [KpController::class, 'index'])->name('kp.index');
route::get('/cariKP', [KpController::class, 'cariKP'])->name('kp.cari');
route::get('/cariKP2', [KpController::class, 'cariKP2'])->name('kp.cari2');

route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

Route::controller(BukuController::class)->group(function(){
    Route::get('autocomplete', 'autocomplete')->name('buku.autocomplete');
});

route::get('/pengunjung', [PengunjungController::class, 'create'])->name('pengunjung.create');
route::post('/pengunjung/store', [PengunjungController::class, 'store'])->name('pengunjung.store');

route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
route::get('/RuangBaca', [FasilitasController::class, 'RuangBaca'])->name('fasilitas.RuangBaca');
route::get('/mobile', [FasilitasController::class, 'mobile'])->name('fasilitas.mobile');

route::get('/pustakawan', [PustakawanController::class, 'index'])->name('pustakawan.index');
route::get('/visi', [PustakawanController::class, 'visi'])->name('pustakawan.visi');
route::get('/jam', [PustakawanController::class, 'jam'])->name('pustakawan.jam');
route::get('/faq', [PembukaController::class, 'faq'])->name('pembuka.faq');

// route::get('/pengunjung', [formController::class, 'pengunjung'])->name('forms.form-pengunjung');
// route::get('/sumbangan_buku', [formController::class, 'sumbangan'])->name('forms.form-sumbangan');
// route::get('/feedback', [formController::class, 'feedback'])->name('forms.form-feedback');

// route::get('/kd', [KDController::class, 'index'])->name('kd.index');

// route::get('/buku/update_admin/bin', [BukuController::class, 'bin'])->name('buku.bin')->middleware('userAkses:admin');
    
// route::post('/buku/update_admin/softdelete/{id}', [BukuController::class, 'softDelete'])->name('buku.softdelete')->middleware('userAkses:admin');
// route::get('/buku/update_admin/restore/{id}', [BukuController::class, 'restore'])->name('buku.restore')->middleware('userAkses:admin');
// route::get('/buku/update_admin/kembali/{id}', [BukuController::class, 'kembali'])->name('buku.kembali')->middleware('userAkses:admin');

// route::get('/skripsi/update_admin/bin', [SkripsiController::class, 'bin'])->name('skripsi.bin');
// route::post('/skripsi/update_admin/softdelete/{id}', [SkripsiController::class, 'softDelete'])->name('skripsi.softdelete');
// route::get('/skripsi/update_admin/restore/{id}', [SkripsiController::class, 'restore'])->name('skripsi.restore');

// route::get('/kp/update_admin/bin', [KpController::class, 'bin'])->name('kp.bin');
// route::post('/kp/update_admin/softdelete/{id}', [KpController::class, 'softDelete'])->name('kp.softdelete')->middleware('userAkses:admin');
// route::get('/kp/update_admin/restore/{id}', [KpController::class, 'restore'])->name('kp.restore')->middleware('userAkses:admin');
// Route::get('/kp/update_admin/export_excel', [KpController::class, 'export_excel'])->middleware('userAkses:admin');

// route::post('/postingan/update_admin/softdelete/{id}', [PostinganController::class, 'softDelete'])->name('postingan.softdelete');
// route::get('/postingan/update_admin/restore/{id}', [PostinganController::class, 'restore'])->name('postingan.restore');
// route::get('/postingan/update_admin/bin', [PostinganController::class, 'bin'])->name('postingan.bin');

// route::get('/postingan/update_admin', [PostinganController::class, 'update_admin'])->name('postingan.update_admin')->middleware('userAkses:admin');    
// route::get('/caripostingan2', [PostinganController::class, 'caripostingan2'])->name('postingan.cari2')->middleware('userAkses:admin');    
// route::get('/postingan/update_admin/detail/{id}', [PostinganController::class, 'detail_postingan_admin'])->name('postingan.detail_postingan_admin')->middleware('userAkses:admin');
