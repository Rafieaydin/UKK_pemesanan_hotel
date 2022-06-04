<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\ResepsionisUserController;
use  App\Http\Controllers\ResevasiController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TamuUserController;
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

Route::get('/tipe/harga/{id}',[BookingController::class,'cekharga']);

Route::prefix('admin')->group(function(){
Route::get('/dashboard/ajax/',[AdminController::class,'ajax']);
Route::get('/fasilitas_hotel/ajax/',[FasilitasHotelController::class,'ajax']);
Route::delete('/fasilitas_hotel/delete/{id}',[FasilitasHotelController::class,'destroy']);
Route::get('/fasilitas_kamar/ajax/',[FasilitasKamarController::class,'ajax']);
Route::delete('/fasilitas_kamar/delete/{id}',[FasilitasKamarController::class,'destroy']);
Route::get('/kamar/tipe_kamar/ajax/',[KamarController::class,'TipeKamarAjax']);
Route::get('/kamar/ajax/',[KamarController::class,'ajax']);
Route::post('/kamar',[KamarController::class,'ApiIndex']);
Route::post('/booking',[BookingController::class,'postresevarsi']);
Route::delete('/kamar/delete/{id}',[KamarController::class,'destroy']);
Route::get('/tipe_kamar/ajax/',[TipeKamarController::class,'ajax']);
Route::delete('/tipe_kamar/delete/{id}',[TipeKamarController::class,'destroy']);
Route::post('/resepsionis/ajax/',[ResepsionisUserController::class,'ajax']);
Route::delete('/resepsionis/delete/{id}',[ResepsionisUserController::class,'destroy']);
Route::post('/tamu/ajax/',[TamuUserController::class,'ajax']);
Route::delete('/tamu/delete/{id}',[TamuUserController::class,'destroy']);
Route::post('/status',[TamuController::class,'ubahstatus']);
});
Route::get('/resepsionis/dashboard/ajax/',[ResepsionisController::class,'ajax']);