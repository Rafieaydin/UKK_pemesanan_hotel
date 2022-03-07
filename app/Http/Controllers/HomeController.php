<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $fasilitas_hotel = FasilitasHotel::all();
        $fasilitas_kamar = TipeKamar::all();
        $tipe_kamar = TipeKamar::all();
        return view('home', compact('fasilitas_hotel', 'fasilitas_kamar', 'tipe_kamar'));
    }
    public function fasilitas_kamar(){ 
        $fasilitas_kamar = TipeKamar::all();
        return view('fasilitas_kamar', compact('fasilitas_kamar'));
     }
     public function fasilitas_hotel(){ 
        $fasilitas_hotel = FasilitasHotel::all();
        return view('fasilitas_hotel', compact('fasilitas_hotel'));
     }
}
