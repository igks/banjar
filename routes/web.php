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

Route::get('/laporan/{id}/edit', [PembayaranController::class, 'edit'])->name('laporan.edit');

Route::post('/laporan/{id}', [PembayaranController::class, 'update'])->name('laporan.update');

Route::delete('/laporan/{id}', [PembayaranController::class, 'destroy'])->name('laporan.destroy');