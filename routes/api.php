<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\ResepsionisUserController;
use App\Http\Controllers\ResevasiController;
use App\Http\Controllers\TipeKamarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/admin/dashboard/ajax/',[AdminController::class,'ajax']);
Route::get('/admin/fasilitas_hotel/ajax/',[FasilitasHotelController::class,'ajax']);
Route::delete('admin/fasilitas_hotel/delete/{id}',[FasilitasHotelController::class,'destroy']);
Route::get('/admin/fasilitas_kamar/ajax/',[FasilitasKamarController::class,'ajax']);
Route::delete('admin/fasilitas_kamar/delete/{id}',[FasilitasKamarController::class,'destroy']);

Route::get('/admin/kamar/ajax/',[KamarController::class,'ajax']);
Route::get('/admin/kamar/{id}',[KamarController::class,'ApiIndex']);

Route::post('/admin/booking/',[BookingController::class,'postresevarsi']);

Route::delete('/admin/kamar/delete/{id}',[KamarController::class,'destroy']);
Route::get('/admin/tipe_kamar/ajax/',[TipeKamarController::class,'ajax']);
Route::delete('admin/tipe_kamar/delete/{id}',[TipeKamarController::class,'destroy']);

// Route::post('/resepsionis/reservasi/ajax/',[ResevasiController::class,'ajax']);
// Route::delete('resepsionis/reservasi/delete/{id}',[ResevasiController::class,'destroy']);



Route::post('/admin/resepsionis/ajax/',[ResepsionisUserController::class,'ajax']);
Route::delete('admin/resepsionis/delete/{id}',[ResepsionisUserController::class,'destroy']);
