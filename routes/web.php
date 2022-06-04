<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\ResepsionisUserController;
use App\Http\Controllers\ReservasiLogController;
use App\Http\Controllers\ResevasiController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TamuUserController;
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
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('fasilitas_hotel', FasilitasHotelController::class);
    Route::resource('fasilitas_kamar', FasilitasKamarController::class);
    Route::resource('tipe_kamar', TipeKamarController::class);
    Route::get('kamar/{id}/create', [KamarController::class, 'create'])->name('kamar.create');
    Route::resource('kamar', KamarController::class);
    Route::post('user/ajax/',[AdminUserController::class,'userajax']);
    Route::delete('user/delete/{id}',[AdminUserController::class,'destroy']);
    Route::resource('user', AdminUserController::class);
    Route::resource('resepsionis', ResepsionisUserController::class);
    Route::resource('tamu', TamuUserController::class);
    Route::post('/reservasi/ajax/',[ResevasiController::class,'ajax']);
    Route::get('reservasi/ajax/detailresevasi',[ResevasiController::class,'detailresevasi']);
    Route::patch('/reservasi/{id}/status',[ResevasiController::class,'setStatus']);// check-in checkout
    Route::delete('/reservasi/delete/{id}',[ResevasiController::class,'destroy']);// check-in checkout
    Route::get('reservasi/{id}/pdf',[ResevasiController::class,'pdfresevarsi'])->name('pdfresevarsi');
    Route::resource('reservasi', ResevasiController::class);

    Route::post('/reservasilog/ajax/',[ReservasiLogController::class,'ajax']);
    Route::get('reservasilog/ajax/detailresevasi',[ReservasiLogController::class,'detailresevasi']);
    Route::resource('reservasilog', ReservasiLogController::class);

    Route::get('excel/reservasi',[ExcelController::class,'reservasi'])->name('reservasi');
    Route::get('excel/reservasilog',[ExcelController::class,'reservasilog'])->name('reservasilog');
    Route::get('excel/adminuser',[ExcelController::class,'adminuser'])->name('adminuser');
    Route::get('excel/resepsionisuser',[ExcelController::class,'resepsionisuser'])->name('resepsionisuser');
    Route::get('excel/tamuuser',[ExcelController::class,'tamuuser'])->name('tamuuser');
    Route::get('excel/fhotel',[ExcelController::class,'fhotel'])->name('fhotel');
    Route::get('excel/fkamar',[ExcelController::class,'fkamar'])->name('fkamar');
    Route::get('excel/tipekamar',[ExcelController::class,'tipekamar'])->name('tipekamar');
    Route::get('excel/kamar',[ExcelController::class,'kamar'])->name('kamar');
    Route::get('excel/{id}/kamar',[ExcelController::class,'DetailKamar'])->name('DetailKamar');

    Route::get('pdf/adminuser',[PDFController::class,'adminuser'])->name('adminuser');
    Route::get('pdf/resepsionisuser',[PDFController::class,'resepsionisuser'])->name('resepsionisuser');
    Route::get('pdf/tamuuser',[PDFController::class,'tamuuser'])->name('tamuuser');
    Route::get('pdf/reservasi',[PDFController::class,'reservasi'])->name('reservasi');
    Route::get('pdf/reservasilog',[PDFController::class,'reservasilog'])->name('reservasilog');
    Route::get('pdf/fhotel',[PDFController::class,'fhotel'])->name('fhotel');
    Route::get('pdf/fkamar',[PDFController::class,'fkamar'])->name('fkamar');
    Route::get('pdf/tipekamar',[PDFController::class,'tipekamar'])->name('tipekamar');
    Route::get('pdf/kamar',[PDFController::class,'kamar'])->name('kamar');

});

Route::prefix('resepsionis')->middleware(['auth:resepsionis'])->name('resepsionis.')->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('dashboard', [ResepsionisController::class, 'index'])->name('dashboard');

    Route::post('reservasi/ajax/',[ResevasiController::class,'ajax']);
    Route::get('reservasi/ajax/detailresevasi',[ResevasiController::class,'detailresevasi']);
    Route::patch('/reservasi/{id}/status',[ResevasiController::class,'setStatus']);
    Route::delete('reservasi/delete/{id}',[ResevasiController::class,'destroy']);
    Route::get('reservasi/{id}/pdf',[ResevasiController::class,'pdfresevarsi'])->name('pdfresevarsi');
    Route::resource('reservasi', ResevasiController::class);

    Route::get('excel/reservasi',[ExcelController::class,'reservasi'])->name('reservasi');
    Route::get('excel/reservasilog',[ExcelController::class,'reservasilog'])->name('reservasilog');

    Route::get('pdf/reservasi',[PDFController::class,'reservasi'])->name('reservasi');
    Route::get('pdf/reservasilog',[PDFController::class,'reservasilog'])->name('reservasilog');
});

Route::middleware(['auth:tamu'])->group(function () {
    Route::get('/history',[TamuController::class,'history'])->name('history');;
    Route::get('/history/{reservasi:uuid}/detail',[TamuController::class,'show'])->name('show');;
    Route::post('tamu/reservasi/ajax/',[TamuController::class,'ajax']);
    Route::get('tamu/reservasi/ajax/detailresevasi',[TamuController::class,'detailresevasi']);

    Route::get('pdf/reservasi/{id}',[PDFController::class,'reservasi'])->name('reservasi');
    Route::get('excel/reservasi/{id}',[ExcelController::class,'reservasi'])->name('reservasi');
});


