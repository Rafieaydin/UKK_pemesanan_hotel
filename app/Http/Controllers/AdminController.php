<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Admin;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $f_h = FasilitasHotel::count();
        $f_k = FasilitasKamar::count();
        $t_k = TipeKamar::count();
        $kamar = Kamar::count();
        $reservasi = Reservasi::limit(5)->orderby('created_at', 'desc')->get();
        return view('admin.dashboard', compact('f_h','f_k','t_k','kamar','reservasi'));
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            $kamar = TipeKamar::all();
            return datatables()->of($kamar)
                ->editColumn('gambar', function ($data) {
                    return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
                })
                
                ->rawColumns(['gambar'])
                ->addIndexColumn()->make(true);
        }
        }
}

