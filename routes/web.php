<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RabTahunanController;
use App\Http\Controllers\SaldoAwalController;
use App\Http\Controllers\DataKasBankController;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\SuplementController;
use App\Http\Controllers\PenutupController;

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

Route::get('/', function () {
    return view('admin.layout.core');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('rab_tahunans', RabTahunanController::class);

Route::resource('saldo_awals', SaldoAwalController::class);

Route::resource('data_kas_banks', DataKasBankController::class);

Route::resource('memorials', MemorialController::class);

Route::resource('suplements', SuplementController::class);

Route::resource('penutups', PenutupController::class);

