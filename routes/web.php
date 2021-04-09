<?php

use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\TransaksiController;
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

require __DIR__ . '/auth.php';

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('members', MemberController::class)->only(['index']);
Route::resource('transaksi', TransaksiController::class)->only('index');
Route::get('/laporan', [PembayaranController::class, 'index'])->name('laporan.index');
Route::post('/laporan/view', [PembayaranController::class, 'laporan'])->name('laporan.view');
Route::post('/transaksi/view', [TransaksiController::class, 'transaksi'])->name('transaksi.view');

Route::group(['middleware' => ['auth']], function () {
  Route::resource('members', MemberController::class)->except(['index']);

  Route::post('/laporan', [PembayaranController::class, 'store'])->name('laporan.store');
  Route::get('/laporan/create', [PembayaranController::class, 'create'])->name('laporan.create');
  Route::get('/laporan/{id}/edit', [PembayaranController::class, 'edit'])->name('laporan.edit');
  Route::post('/laporan/{id}', [PembayaranController::class, 'update'])->name('laporan.update');
  Route::delete('/laporan/{id}', [PembayaranController::class, 'destroy'])->name('laporan.destroy');

  Route::resource('transaksi', TransaksiController::class)->except('index');
});