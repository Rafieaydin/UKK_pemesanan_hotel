<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Resevarsi;
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

     public function databooking(){
        $tipe_kamar = TipeKamar::all();
        return view('tamu.booking_kamar',compact('tipe_kamar'));
     }

     public function detailresevarsi($id){
         $resevarsi = Resevarsi::find($id);
         return view('detailresevarsi',compact('resevarsi'));
     }
     public function postbooking(Request $request){
        //  dd($request->all());
        $request->validate([
            'tipe_id' => 'required',
            'nama_tamu' => 'required',
            'nama_pemesan' => 'required',
            'email_pemesan' => 'required|email',
            'nomor_hp_pemesan' => 'required',
            'tanggal_checkin' => 'required',
            'tanggal_checkout' => 'required',
            'jumlah_kamar' => 'required',
        ]);

        $resev = Resevarsi::create([
            'tipe_id' => $request->tipe_id,
            'nama_pemesan' => $request->nama_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'jumlah_kamar' => $request->jumlah_kamar,
            'nama_tamu' => $request->nama_tamu
        ]);
        // dd($request->all());
        return redirect('/pesanan/'.$resev->id);
     }
}
