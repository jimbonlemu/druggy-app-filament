<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/admin');

Route::get('/penjualan/{penjualan}/cetak', [\App\Http\Controllers\PenjualanController::class, 'cetak'])->name('penjualan.cetak');
Route::get('/pembelian/{pembelian}/print', [\App\Http\Controllers\PembelianController::class, 'print'])->name('pembelian.print');

