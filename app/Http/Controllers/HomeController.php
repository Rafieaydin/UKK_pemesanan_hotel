<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $fasilitas_hotel = FasilitasHotel::all();
        $fasilitas_kamar = TipeKamar::with('fasilitas')->get();
        $tipe_kamar = TipeKamar::all();
        return view('home', compact('fasilitas_hotel', 'fasilitas_kamar', 'tipe_kamar'));
    }
}
