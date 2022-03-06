<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ResepsionisController;
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

Route::get('/', function () {
    return view('home');
});

// call auth route
require __DIR__.'/auth.php';

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('fasilitas_hotel', [FasilitasHotelController::class, 'index'])->name('fasilitas_hotel.index');
    Route::get('fasilitas_hotel/create', [FasilitasHotelController::class, 'create'])->name('fasilitas_hotel.create');
    Route::post('fasilitas_hotel/store', [FasilitasHotelController::class, 'store'])->name('fasilitas_hotel.store');
    Route::get('fasilitas_hotel/detail/{id}', [FasilitasHotelController::class, 'detail'])->name('fasilitas_hotel.detail');
    Route::get('fasilitas_hotel/edit/{id}', [FasilitasHotelController::class, 'edit'])->name('fasilitas_hotel.edit');
    Route::patch('fasilitas_hotel/update/{id}', [FasilitasHotelController::class, 'update'])->name('fasilitas_hotel.update');
    Route::delete('fasilitas_hotel/delete/{id}', [FasilitasHotelController::class, 'destroy'])->name('fasilitas_hotel.destroy');

    Route::get('fasilitas_kamar', [FasilitasKamarController::class, 'index'])->name('fasilitas_kamar.index');
    Route::get('fasilitas_kamar/create', [FasilitasKamarController::class, 'create'])->name('fasilitas_kamar.create');
    Route::post('fasilitas_kamar/store', [FasilitasKamarController::class, 'store'])->name('fasilitas_kamar.store');
    Route::get('fasilitas_kamar/detail/{id}', [FasilitasKamarController::class, 'detail'])->name('fasilitas_kamar.detail');
    Route::get('fasilitas_kamar/edit/{id}', [FasilitasKamarController::class, 'edit'])->name('fasilitas_kamar.edit');
    Route::patch('fasilitas_kamar/update/{id}', [FasilitasKamarController::class, 'update'])->name('fasilitas_kamar.update');

    Route::get('kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('tipe_kamar', [TipeKamarController::class, 'index'])->name('tipe_kamar.index');
    Route::get('tipe_kamar/create', [TipeKamarController::class, 'create'])->name('tipe_kamar.create');
    Route::post('tipe_kamar/store', [TipeKamarController::class, 'store'])->name('tipe_kamar.store');
    Route::get('tipe_kamar/detail/{id}', [TipeKamarController::class, 'detail'])->name('tipe_kamar.detail');
    Route::get('tipe_kamar/edit/{id}', [TipeKamarController::class, 'edit'])->name('tipe_kamar.edit');
    Route::patch('tipe_kamar/update/{id}', [TipeKamarController::class, 'update'])->name('tipe_kamar.update');
});

Route::prefix('resepsionis')->middleware(['auth:resepsionis'])->name('resepsionis.')->group(function () {
    Route::get('dashboard', [ResepsionisController::class, 'index'])->name('dashboard');

    Route::get('resevarsi', [ResevasiController::class, 'index'])->name('resevarsi.index');
    Route::get('resevarsi/create', [ResevasiController::class, 'create'])->name('resevarsi.create');
    Route::post('resevarsi/store', [ResevasiController::class, 'store'])->name('resevarsi.store');
    Route::get('resevarsi/detail/{id}', [ResevasiController::class, 'detail'])->name('resevarsi.detail');
    Route::get('resevarsi/edit/{id}', [ResevasiController::class, 'edit'])->name('resevarsi.edit');
    Route::patch('resevarsi/update/{id}', [ResevasiController::class, 'update'])->name('resevarsi.update');
    Route::delete('resevarsi/delete/{id}', [ResevasiController::class, 'destroy'])->name('resevarsi.destroy');
});

Route::prefix('tamu')->middleware(['auth:tamu'])->group(function () {
    Route::get('dashboard', [TamuController::class, 'index'])->name('tamu.index');
});


