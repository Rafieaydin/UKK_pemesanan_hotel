<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Resevarsi;
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
    public function fasilitas_kamar(){
        $fasilitas_kamar = TipeKamar::all();
        return view('fasilitas_kamar', compact('fasilitas_kamar'));
     }
     public function fasilitas_hotel(){
        $fasilitas_hotel = FasilitasHotel::all();
        return view('fasilitas_hotel', compact('fasilitas_hotel'));
     }

     public function resevarsi(){
        $tipe_kamar = TipeKamar::where('total_jumlah_kamar', '>', '0')->get();
        return view('resevarsi',compact('tipe_kamar'));
     }

     public function detailresevarsi($id){
         $resevarsi = Resevarsi::where('uuid',$id)->first();
         return view('detailresevarsi',compact('resevarsi'));
     }
     public function postresevarsi(Request $request){
        // $after_date = $request->tanggal_checkin.' +1 day';
        $request->validate([
            'tipe_id' => 'required',
            'nama_tamu' => 'required',
            'nama_pemesan' => 'required',
            'email_pemesan' => 'required|email',
            'nomor_hp_pemesan' => 'required',
            'tanggal_checkin' => 'required',
            'tanggal_checkout' => 'required|after:tanggal_checkin',
            'jumlah_kamar' => 'required',
        ]);

        $tipe_kamar = TipeKamar::where('id',$request->tipe_id)->first();
        if(($tipe_kamar->total_jumlah_kamar - $request->jumlah_kamar) < 0){
            return redirect()->back()->with('status', 'Maaf, jumlah kamar yang tersedia tidak mencukupi');
        }
        $resev = Resevarsi::create([
            'uuid' => Str::uuid(),
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
        return redirect('/resevarsi/detail/'.$resev->uuid);
     }
     public function pdfresevarsi($id){
        $resevarsi = Resevarsi::where('uuid',$id)->first();
        $pdf = Pdf::loadView('PDF.detailresevarsi', compact('resevarsi'));
        return $pdf->stream('joko.pdf');
    }
}
