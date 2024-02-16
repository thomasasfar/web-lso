<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\RuangLingkupController;

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

//masyarakat
Route::get('/', [BannerController::class, 'index']);
Route::get('/klien', [ClientController::class, 'index']);

//admin
Route::post('/admin/klien/tambah',[ClientController::class, 'store'])->name('klien.store');
Route::get('/admin/klien', [ClientController::class, 'indexAdmin']);
Route::put('/klien/{id}', [ClientController::class, 'update'])->name('klien.update');
Route::delete('admin/klien/{id}/hapus', [ClientController::class, 'destroy'])->name('klien.delete');

Route::get('/client', [ClientController::class, 'tableKlien'])->name('klien.table');
Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('klien.edit');

Route::get('/liststandard', [StandardController::class, 'listStandard'])->name('standard.list');
Route::get('/listruanglingkup', [RuangLingkupController::class, 'listRuangLingkup'])->name('ruanglingkup.list');

Route::post('/tambahklien', [ClientController::class, 'store'])->name('klien.tambah');
Route::delete('/hapusclient/{id}', [ClientController::class, 'destroy'])->name('klien.hapus');
Route::put('/updateklien/{id}', [ClientController::class, 'update'])->name('klien.update');

// Route::resource('ruanglingkup', RuangLingkupController::class);
Route::resource('admin/clientAjax', ClientController::class);
