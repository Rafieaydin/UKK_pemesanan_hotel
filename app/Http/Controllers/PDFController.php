<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Resepsionis;
use App\Models\Reservasi;
use App\Models\ReservasiLog;
use App\Models\Tamu;
use App\Models\TipeKamar;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function adminuser()
    {
        $admin = Admin::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.admin',['admin'=>$admin]);
        return $pdf->stream();
    }

    public function resepsionisuser()
    {
        $resepsionis = Resepsionis::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.resepsionis',['resepsionis'=>$resepsionis]);
        return $pdf->stream();
    }

    public function tamuuser()
    {
        $tamu = Tamu::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.tamu',compact('tamu'));
        return $pdf->stream();
    }
    
    public function reservasi($id = '')
    {
        if($id){
            $reservasi = Reservasi::where('tamu_id',$id)->orderby('created_at','desc')->get();
        }else{
            $reservasi = Reservasi::orderby('created_at','desc')->get();
        }
        
        $pdf = PDF::Loadview('PDF.reservasi',['reservasi'=>$reservasi]);
        return $pdf->stream();
    }

    public function reservasilog()
    {
        $reservasilog = ReservasiLog::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.reservasilog',['reservasilog'=>$reservasilog]);
        return $pdf->stream();
    }

    public function fhotel()
    {
        $fhotel = FasilitasHotel::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.fhotel',['fhotel'=>$fhotel]);
        return $pdf->stream();
    }

    public function fkamar()
    {
        $fkamar = FasilitasKamar::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.fkamar',['fkamar'=>$fkamar]);
        return $pdf->stream();
    }

    public function tipekamar()
    {
        $tipekamar = TipeKamar::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.tipekamar',['tipekamar'=>$tipekamar]);
        return $pdf->stream();
    }

    public function kamar()
    {
        $kamar = Kamar::orderby('created_at','desc')->get();
        $pdf = PDF::Loadview('PDF.kamar',['kamar'=>$kamar]);
        return $pdf->stream();
    }
}
