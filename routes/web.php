<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RabTahunanController;
use App\Http\Controllers\SaldoAwalController;
use App\Http\Controllers\DataKasBankController;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\SuplementController;
use App\Http\Controllers\PenutupController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\LembarPemeriksaanController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\SeluruhKartuBukuBesarController;
use App\Http\Controllers\NeracaAktifaPasifaController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\NeracaLajurController;
use App\Http\Controllers\RincianBiayaController;
use App\Http\Controllers\RekeningKoranController;
use App\Http\Controllers\MemorialSaldoAwalController;
use App\Http\Controllers\MemorialPemindahBukuanController;
use App\Http\Controllers\LaporanManagementController;
use App\Http\Controllers\NomorPerkiraanController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('rab_tahunans', RabTahunanController::class);

Route::resource('saldo_awals', SaldoAwalController::class);
Route::get('saldo_awal/{nomor}', [SaldoAwalController::class,'index2']);

Route::resource('data_kas_banks', DataKasBankController::class);
Route::get('/api/data_kas_banks/{no_bukti}', [DataKasBankController::class,'index2']);

Route::resource('memorials', MemorialController::class);

Route::resource('suplements', SuplementController::class);

Route::resource('penutups', PenutupController::class);

Route::resource('nomor_perkiraans', NomorPerkiraanController::class);

route::get("/cetak/laba_rugi",[LabaRugiController::class,'index']);
route::get("/cetak/lembar_pemeriksaan",[LembarPemeriksaanController::class,'index']);
route::get("/cetak/buku_besar/tanggal",[BukuBesarController::class,'index2']);
route::get("/cetak/buku_besar/no_perkiraan",[BukuBesarController::class,'index']);
route::get("/cetak/seluruh_kartu_bukubesar",[SeluruhKartuBukuBesarController::class,'index']);
route::get("/cetak/neraca",[NeracaController::class,'index']);
route::get("/cetak/neraca_aktifa_pasifa",[NeracaAktifaPasifaController::class,'index']);
route::get("/cetak/neraca_lajur",[NeracaLajurController::class,'index']);
route::get("/cetak/rincian_biaya",[RincianBiayaController::class,'index']);
route::get("/cetak/rekening_koran/urut_tangal",[RekeningKoranController::class,'index2']);
route::get("/cetak/rekening_koran/urut_no_perkiraan",[RekeningKoranController::class,'index']);
route::get("/cetak/memorial_pemindah_bukuan",[MemorialPemindahBukuanController::class,'index']);
route::get("/cetak/memorial_saldo_awal",[MemorialSaldoAwalController::class,'index']);
route::get("/cetak/laporan_management",[LaporanManagementController::class,'index']);


