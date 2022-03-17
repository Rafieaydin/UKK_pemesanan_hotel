<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
     public function resevarsi(){
        $tipe_kamar = TipeKamar::all();
        return view('resevarsi',compact('tipe_kamar'));
     }

     public function detailresevarsi($id){
         $resevarsi = Reservasi::where('uuid',$id)->first();
         return view('detailresevarsi',compact('resevarsi'));
     }
     public function cekharga($id){
        $tipe = TipeKamar::where('id',$id)->first();
        return response()->json(['harga' => $tipe->harga], 200);
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
            // 'jumlah_kamar' => 'required',
        ]);
        $checkin = Carbon::parse($request->tanggal_checkin)->format('Y-m-d');
        $checkout = Carbon::parse($request->tanggal_checkout)->format('Y-m-d');
        $jumlah_hari = CarbonPeriod::create($checkin, $checkout); 
        $tipe = TipeKamar::where('id',$request->tipe_id)->first();
        $resev = Reservasi::create([
            'uuid' => Str::uuid(),
            'tipe_id' => $request->tipe_id,
            'nama_pemesan' => $request->nama_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'total_harga' => ($tipe->harga * count(json_decode($request->kode_kamar))) * (count($jumlah_hari) - 1),
            'nama_tamu' => $request->nama_tamu
        ]);

        foreach (json_decode($request->kode_kamar) as $key => $val) {
            $kamar = Kamar::where('id',$val)->first();
            $kamar->update([
                'status' => '1',
                'reservasi_id' => $resev->uuid
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat',
            'reservasi' => $resev
        ]);
     }
     public function pdfresevarsi($id){
        $reservasi = Reservasi::where('uuid',$id)->first();
        $pdf = Pdf::loadView('PDF.detailreservasi', compact('reservasi'));
        return $pdf->stream('Invoice Reservasi Hotel Aston.pdf');
    }
}
