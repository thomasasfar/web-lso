<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\RuangLingkupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\SosmedController;




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

// Route::get('/', function () {
//     return view('masyarakat/tentang');
// });

//login
Route::get('/backoffice', [AuthController::class, 'getLogin'])->name('login');
Route::post('/backoffice/login', [AuthController::class, 'login']);

//masyarakat
Route::get('/', [BannerController::class, 'index']);
Route::get('/klien', [ClientController::class, 'index']);
Route::get('/klien-ajax', [ClientController::class, 'paginationAjax']);

//tentang
Route::get('/profil', [TentangController::class, 'profil'])->name('tentang.profil');




//admin
Route::get('/admin/klien', [ClientController::class, 'indexAdmin']);

Route::get('/client', [ClientController::class, 'tableKlien'])->name('klien.table');
Route::get('admin/client/{id}/edit', [ClientController::class, 'edit'])->name('klien.edit');

Route::get('/liststandard', [StandardController::class, 'listStandard'])->name('standard.list');
Route::get('/listruanglingkup', [RuangLingkupController::class, 'listRuangLingkup'])->name('ruanglingkup.list');

Route::post('/tambahklien', [ClientController::class, 'store'])->name('klien.tambah');
Route::delete('/hapusclient/{id}', [ClientController::class, 'destroy'])->name('klien.hapus');

//banner
Route::get('admin/banner', [BannerController::class, 'indexAdmin']);
Route::post('/banner', [BannerController::class, 'uploadCropImage']);
Route::get('/listbanner', [BannerController::class, 'tableBanner'])->name('banner.list');

//layanan
Route::get('admin/layanan', [LayananController::class, 'indexAdmin']);
Route::get('/layanan', [LayananController::class, 'tableLayanan'])->name('layanan.table');
Route::delete('/hapuslayanan/{id}', [LayananController::class, 'destroy'])->name('layanan.hapus');
Route::get('admin/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
Route::post('/tambahlayanan', [LayananController::class, 'store'])->name('layanan.store');
Route::get('/admin/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');

//standar
Route::get('/admin/standard', [StandardController::class, 'index']);
Route::get('/standard', [StandardController::class, 'tableStandard'])->name('standard.table');
Route::get('/admin/standard/{id}/edit', [StandardController::class, 'edit']);
Route::post('/tambahstandard', [StandardController::class, 'store'])->name('standard.tambah');
Route::delete('/hapusstandard/{id}', [StandardController::class, 'destroy'])->name('standard.hapus');

//ruang lingkup
Route::get('/admin/ruanglingkup', [RuangLingkupController::class, 'index']);
Route::get('/ruanglingkup', [RuangLingkupController::class, 'table'])->name('ruanglingkup.table');
Route::get('/admin/ruanglingkup/{id}/edit', [RuangLingkupController::class, 'edit']);
Route::post('/tambahruanglingkup', [RuangLingkupController::class, 'store'])->name('ruanglingkup.tambah');
Route::delete('/hapusruanglingkup/{id}', [RuangLingkupController::class, 'destroy'])->name('ruanglingkup.hapus');

//Profil perusahaan
Route::get('/admin/profil', [TentangController::class, 'index']);
Route::get('/tableprofil', [TentangController::class, 'table'])->name('profil.table');
Route::get('/admin/profil/{id}/edit', [TentangController::class, 'edit'])->name('profil.edit');
Route::post('/updateprofil', [TentangController::class, 'update'])->name('profil.update');

//Kontak Kami
Route::get('/admin/kontak', [KontakController::class, 'index']);
Route::get('/listkontak', [KontakController::class, 'table'])->name('kontak.table');
Route::get('admin/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
Route::post('/updatekontak', [KontakController::class, 'update'])->name('kontak.update');

//Sosmed
Route::get('/admin/sosmed', [SosmedController::class, 'index']);
Route::get('/listsosmed', [SosmedController::class, 'table'])->name('sosmed.table');
Route::get('/admin/sosmed/{id}/edit', [SosmedController::class, 'edit']);
Route::post('/tambahsosmed', [SosmedController::class, 'store'])->name('sosmed.tambah');
Route::delete('/hapussosmed/{id}', [SosmedController::class, 'destroy'])->name('sosmed.hapus');
