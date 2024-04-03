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
use App\Http\Controllers\StatusController;
use App\Http\Controllers\GaleriController;




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



//admin
Route::middleware(['auth'])->group(function(){
    //klien
    Route::get('/admin/klien', [ClientController::class, 'indexAdmin'])->name('klien.list');
    Route::get('/client', [ClientController::class, 'tableKlien'])->name('klien.table');
    Route::get('admin/klien/{id}/edit', [ClientController::class, 'edit'])->name('klien.edit');
    Route::get('/admin/klien/create', [ClientController::class, 'create'])->name('klien.create');
    Route::post('/tambahklien', [ClientController::class, 'store'])->name('klien.tambah');
    Route::delete('/hapusclient/{id}', [ClientController::class, 'destroy'])->name('klien.hapus');
    Route::get('/getstandard/{id}', [ClientController::class, 'getstandard'])->name('getstandard');
    Route::get('/selectstandard', [ClientController::class, 'selectstandard'])->name('selectstandard');
    Route::get('/getruanglingkup/{id}', [ClientController::class, 'getruanglingkup'])->name('getruanglingkup');
    Route::get('/selectruanglingkup', [ClientController::class, 'selectruanglingkup'])->name('selectruanglingkup');
    Route::get('/selectstatus', [ClientController::class, 'selectstatus'])->name('selectstatus');

    //banner
    Route::get('admin/banner', [BannerController::class, 'indexAdmin']);
    Route::get('admin/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/banner', [BannerController::class, 'uploadCropImage']);
    Route::get('/listbanner', [BannerController::class, 'tableBanner'])->name('banner.list');
    Route::delete('/admin/banner/{id}', [BannerController::class, 'destroy'])->name('banner.hapus');

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

    //status
    Route::get('/admin/status', [StatusController::class, 'index']);
    Route::get('/status', [StatusController::class, 'table'])->name('status.table');
    Route::get('/admin/status/{id}/edit', [StatusController::class, 'edit']);
    Route::post('/tambahstatus', [StatusController::class, 'store'])->name('status.tambah');
    Route::delete('/hapusstatus/{id}', [StatusController::class, 'destroy'])->name('status.hapus');

    //galeri
    Route::get('/admin/galeri', [GaleriController::class, 'indexbyAdmin']);
    Route::get('/admin/galeritable', [GaleriController::class, 'table'])->name('galeri.table');
    Route::get('/admin/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::post('/admin/galeri', [GaleriController::class, 'store'])->name('galeri.tambah');
    Route::delete('/admin/galeri/hapus/{id}', [GaleriController::class, 'destroy'])->name('galeri.hapus');
});

Route::middleware(['admin'])->group(function(){
    Route::get('/backoffice', function () {
        return redirect()->route('profil.list');
    })->name('login');
    //Profil perusahaan
    Route::get('/admin/profil', [TentangController::class, 'index'])->name('profil.list');
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
});

Route::middleware(['operator'])->group(function(){
    Route::get('/backoffice', function () {
        return redirect()->route('klien.list');
    })->name('login');
});

//masyarakat
Route::get('/', [BannerController::class, 'index']);
Route::get('/klien', [ClientController::class, 'index']);
Route::get('/klien-ajax', [ClientController::class, 'paginationAjax']);
Route::get('/klien/{id}',[ClientController::class, 'show'])->name('detail.klien');

//tentang
Route::get('/profil', [TentangController::class, 'profil'])->name('tentang.profil');

//login
Route::get('/backoffice', [AuthController::class, 'getLogin'])->name('login');
Route::post('/backoffice/login', [AuthController::class, 'login']);

//footer
Route::get('/footer', [KontakController::class, 'footer']);
Route::get('/kontakfooter', [KontakController::class, 'kontakfooter'])->name('footer.kontak');
Route::get('/sosmedfooter', [KontakController::class, 'sosmedfooter'])->name('footer.sosmed');

Route::get('/download', [ClientController::class, 'downloadKlien']);

//kontak
Route::get('/kontak', [KontakController::class, 'indexMasyarakat']);

//galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
