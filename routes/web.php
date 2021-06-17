<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPegawaiController;
use App\Http\Controllers\AdminKonsumenController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\AdminPaketController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminTestimoniController;
use App\Http\Controllers\AdminPemasukanController;
use App\Http\Controllers\AdminPengeluaranController;
use App\Http\Controllers\KonsumenJadwalController;
use App\Http\Controllers\KonsumenPaketController;
use App\Http\Controllers\KonsumenPesanController;
use App\Http\Controllers\KonsumenProfileController;
use App\Http\Controllers\KonsumenTestimoniController;
use App\Http\Controllers\PegawaiDashboardController;
use App\Http\Controllers\PegawaiPesananController;
use App\Http\Controllers\PegawaiJadwalController;
use App\Http\Controllers\login;
use App\Http\Controllers\RegistrasiController;

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
Route::group(['prefix'=> 'admin', 'middleware'=> 'auth:admin'], function()
{
    Route::resource('dashboard',AdminDashboardController::class);
    Route::resource('pegawai',AdminPegawaiController::class);
    Route::resource('konsumen',AdminKonsumenController::class);
    Route::resource('pesanan',AdminPesananController::class);
    Route::resource('paket',AdminPaketController::class);
    Route::resource('jadwal',AdminJadwalController::class);
    Route::resource('testimoni',AdminTestimoniController::class);
    Route::resource('pemasukan',AdminPemasukanController::class);
    Route::resource('pengeluaran',AdminPengeluaranController::class);


});
//END ADMIN


//PEGAWAI
Route::group(['prefix'=> 'pegawai', 'middleware'=> 'auth:pegawai'], function()
{
Route::resource('dashboard-pegawai',PegawaiDashboardController::class);
Route::resource('pesanan-pegawai',PegawaiPesananController::class);
Route::resource('jadwal-pegawai',PegawaiJadwalController::class);

});
//END PEGAWAI


//KONSUMEN
Route::group(['prefix'=> 'konsumen', 'middleware'=> 'auth:konsumen'], function()
{
Route::resource('profile-konsumen',KonsumenProfileController::class);
Route::resource('paket-konsumen',KonsumenPaketController::class);
Route::resource('pesan-konsumen',KonsumenPesanController::class);
Route::resource('jadwal-konsumen',KonsumenJadwalController::class);
Route::resource('testimoni-konsumen',KonsumenTestimoniController::class);

});


//END KONSUMEN


//UMUM
Route::get('/', function () {
    return view('landing-page');
});



Route::resource('register',RegistrasiController::class);

Route::get('login', function () {
    return view('login');
})->middleware('guest');


Route::post('/kirimdata',[login::class,'login'])->name('login');
Route::get('/keluar',[login::class,'logout']);


//END UMUM