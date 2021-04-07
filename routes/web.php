<?php

use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PembayaranController;
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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('members', MemberController::class);

Route::get('/laporan', [PembayaranController::class, 'index'])->name('laporan.index');

Route::post('/laporan/view', [PembayaranController::class, 'laporan'])->name('laporan.view');

Route::post('/laporan', [PembayaranController::class, 'store'])->name('laporan.store');

Route::get('/laporan/create', [PembayaranController::class, 'create'])->name('laporan.create');

Route::get('/laporan/kas', [PembayaranController::class, 'kasBanjar'])->name('kas.banjar');

Route::get('/laporan/bop', [PembayaranController::class, 'kasBOP'])->name('kas.bop');

Route::get('/laporan/nyepi', [PembayaranController::class, 'kasNyepi'])->name('kas.nyepi');

Route::get('/laporan/piodalan', [PembayaranController::class, 'kasPiodalan'])->name('kas.piodalan');

Route::get('/laporan/banten', [PembayaranController::class, 'kasBanten'])->name('kas.banten');

Route::get('/laporan/whdi', [PembayaranController::class, 'kasWHDI'])->name('kas.whdi');

Route::get('/laporan/operasional', [PembayaranController::class, 'kasOprasional'])->name('kas.operasional');