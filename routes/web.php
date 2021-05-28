<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPegawaiController;
use App\Http\Controllers\AdminKonsumenController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminPemasukanController;
use App\Http\Controllers\AdminPengeluaranController;

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

//ADMIN
Route::group(['prefix'=> 'admin'], function()
{
    Route::resource('dashboard',AdminDashboardController::class);
    Route::resource('pegawai',AdminPegawaiController::class);
    Route::resource('konsumen',AdminKonsumenController::class);
    Route::resource('pesanan',AdminPesananController::class);
    Route::resource('jadwal',AdminJadwalController::class);
    Route::resource('testimoni',AdminTestimoniController::class);
    Route::resource('pemasukan',AdminPemasukanController::class);
    Route::resource('pengeluaran',AdminPengeluaranController::class);


});
//END ADMIN


//PEGAWAI
Route::get('/pegawai', function () {
    return view('pegawai.pegawai');
    
});
Route::get('/data-pesanan-pegawai', function () {
    return view('pegawai.data-pesanan');
});
Route::get('/data-jadwal-pegawai', function () {
    return view('pegawai.data-jadwal');
});
//END PEGAWAI


//KONSUMEN
Route::get('/konsumen', function () {
    return view('konsumen');
});
//END KONSUMEN


//UMUM
Route::get('/', function () {
    return view('landing-page');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
//END UMUM