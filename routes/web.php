<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\TamuController;
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


Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/Postlogin',[AuthController::class,'PostLogin'])->name('auth.Postlogin');
Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout');

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
});

Route::prefix('tamu')->middleware(['auth:tamu'])->group(function () {
    Route::get('dashboard', [TamuController::class, 'index'])->name('tamu.index');
});

Route::prefix('resepsionis')->middleware(['auth:resepsionis'])->group(function () {
    Route::get('dashboard', [ResepsionisController::class, 'index'])->name('resepsionis.index');
});
