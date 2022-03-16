<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\ResepsionisUserController;
use App\Http\Controllers\ResevasiController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TipeKamarController;
use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Resepsionis;

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


Route::get('/',[HomeController::class,'index']);
Route::get('/resevarsi',[BookingController::class,'resevarsi'])->name('resevarsi');;
Route::get('/resevarsi/detail/{id}',[BookingController::class,'detailresevarsi'])->name('detailresevarsi');
Route::get('/resevarsi/detail/{id}/pdf',[BookingController::class,'pdfresevarsi'])->name('pdfresevarsi');
Route::post('/postresevarsi',[BookingController::class,'postresevarsi'])->name('postresevarsi');

// call auth route
require __DIR__.'/auth.php';

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('fasilitas_hotel', FasilitasHotelController::class);
    Route::resource('fasilitas_kamar', FasilitasKamarController::class);
    Route::resource('tipe_kamar', TipeKamarController::class);
    Route::resource('kamar', KamarController::class);
    Route::post('user/ajax/',[AdminUserController::class,'userajax']);
    Route::delete('user/delete/{id}',[AdminUserController::class,'destroy']);
    Route::resource('user', AdminUserController::class);

    Route::resource('resepsionis', ResepsionisUserController::class);

    Route::post('/reservasi/ajax/',[ResevasiController::class,'ajax']);
    Route::delete('/reservasi/delete/{id}',[ResevasiController::class,'destroy']);
    Route::get('reservasi/{id}/pdf',[ResevasiController::class,'pdfresevarsi'])->name('pdfresevarsi');
    Route::resource('reservasi', ResevasiController::class);
});

Route::prefix('resepsionis')->middleware(['auth:resepsionis'])->name('resepsionis.')->group(function () {
    Route::get('dashboard', [ResepsionisController::class, 'index'])->name('dashboard');

    Route::post('reservasi/ajax/',[ResevasiController::class,'ajax']);
    Route::delete('reservasi/delete/{id}',[ResevasiController::class,'destroy']);
    Route::get('reservasi/{id}/pdf',[ResevasiController::class,'pdfresevarsi'])->name('pdfresevarsi');
    Route::resource('reservasi', ResevasiController::class);
});

Route::prefix('tamu')->middleware(['auth:tamu'])->group(function () {
    Route::get('dashboard', [TamuController::class, 'index'])->name('tamu.index');
});


