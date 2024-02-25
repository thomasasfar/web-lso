<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

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

Route::get('/tentang', [BannerController::class, 'index'])->name('tentang.index');
Route::get('/kontak', [BannerController::class, 'lokasi'])->name('kontak.lokasi');