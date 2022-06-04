<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/Postlogin',[AuthController::class,'PostLogin'])->name('auth.Postlogin');
Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/postregister',[AuthController::class,'postregister'])->name('auth.postregister');
Route::get('/forgot_password',[AuthController::class,'forgot_password'])->name('auth.forgot_password');
Route::post('/forgot_password',[AuthController::class,'postforgot_password'])->name('auth.forgot_password');
Route::get('/reset-password/{token}', function ($token) {return view('auth.reset-password', ['token' => $token]);})->middleware('guest')->name('password.reset');
Route::post('/reset_password',[AuthController::class,'resetPassword'])->name('auth.reset_password');
Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout');



?>
