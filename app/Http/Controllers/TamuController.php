<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\KamarReservasi;
use App\Models\Resepsionis;
use App\Models\Reservasi;
use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tamu.dashboard');
    }

    public function history(){
        return view('tamu.history');
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            if(!empty($request->check_in) && !empty($request->check_out)){
                $reservasi = Reservasi::whereDate('tanggal_checkin','>=',$request->check_in)->whereDate('tanggal_checkout','<=',$request->check_out);
            }else
            if(!empty($request->check_in)){
                $reservasi = Reservasi::whereDate('tanggal_checkin', '=', $request->check_in)->orderby('created_at','desc');
            }else if(!empty($request->check_out)){
                $reservasi = Reservasi::whereDate('tanggal_checkout', '=', $request->check_out)->orderby('created_at','desc');
            }else
            {
                $reservasi = Reservasi::orderby('created_at','desc');
            }
            $reservasi->where('tamu_id',auth()->guard('tamu')->user()->id)->get();

            return datatables()->of($reservasi)
                ->addcolumn('fasilitas', function($data){
                    return $data->tipeKamar->nama_tipe;
                })
                ->addcolumn('tanggal_checkin', function($data) use($request){
                    return $data->tanggal_checkin->format('d-m-Y');
                })
                ->addcolumn('tanggal_checkout', function($data){
                    return $data->tanggal_checkout->format('d-m-Y');
                })
                ->addColumn('harga', function($data){
                    return Helper::format_rupiah($data->tipekamar->harga);
                })
                ->addColumn('total_harga', function($data){
                    return Helper::format_rupiah($data->total_harga);
                })
                ->addColumn('action', function ($data) {
                    // if($data->status == "batal"){
                    //     $button ='<a  href="/history/' . $data->uuid . '/detail" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    //     $button .=' <a  href="/resevarsi/detail/' . $data->uuid . '/pdf" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    //     $button .=' <button id="statusb"  data-toggle="tooltip" data-status="batal"  data-id="' . $data->uuid . '" data-original-title="Edit" class="edit btn disabled btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>';
                    // }else{
                    //     $button ='<a  href="/history/' . $data->uuid . '/detail" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    //     $button .=' <a  href="/resevarsi/detail/' . $data->uuid . '/pdf" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    //     $button .=' <button id="statusb" data-toggle="tooltip" data-status="batal"  data-id="' . $data->uuid . '" data-original-title="Edit" class="edit btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>';
                    // }
                    $button ='<a  href="/history/' . $data->uuid . '/detail" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .=' <a  href="/resevarsi/detail/' . $data->uuid . '/pdf" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    return $button;
                })
                // ->addColumn('status', function ($data) {
                //     $button = '';
                //     if($data->status == 'pending'){
                //     $button .= '  <span class="badge bg-primary">Menunggu Konfirmasi</span>';}
                //     elseif($data->status == 'konfirmasi'){
                //     $button .= '  <span class="badge bg-success">Konfirmasi</span>';}
                //     elseif($data->status == 'batal'){
                //     $button .= '  <span class="badge bg-danger">Reservasi dibatalkan</span>';}
                //     return $button;
                // })
                ->rawColumns(['action','gambar','harga','total_harga'])
                ->addIndexColumn()->make(true);
        }
    }

    public function detailresevasi(Request $request){
        if ($request->ajax()) {
            $kamar = KamarReservasi::where('reservasi_id',request()->reservasi_id)->get();
            return datatables()->of($kamar)
                ->addColumn('tipe_kamar', function ($data) {
                    return $data->kamar->tipekamar->nama_tipe;
                })
                ->addColumn('kode_kamar', function ($data) {
                    return $data->kamar->kode_kamar;
                })
                ->addColumn('harga', function ($data) {
                    return Helper::format_rupiah($data->kamar->tipekamar->harga);
                })
                ->EditColumn('status', function ($data) {
                    if($data->status == 'booking'){
                    $button = '  <span class="badge bg-primary">Booking</span>';}
                    elseif($data->status == 'checkin'){
                    $button = '  <span class="badge bg-success">Check-in</span>';}
                    elseif($data->status == 'checkout'){
                    $button = '  <span class="badge bg-danger">Check-out</span>';}
                    elseif($data->status == 'batal'){
                    $button = '  <span class="badge bg-danger">dibatalkan</span>';}
                    return $button;
                })
                ->rawColumns(['nama_tipe','kode_kamar','harga','action','status'])
                ->addIndexColumn()->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi $reservasi)
    {
        return view('tamu.detailhistory',['res'=>$reservasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tamu $tamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tamu $tamu)
    {
        //
    }

    public function ubahstatus(Request $request){
        Reservasi::where('uuid',$request->reservasi_id)->update([
            'status' => $request->status
        ]);
        if($request->status == "batal"){
        KamarReservasi::where('reservasi_id',$request->reservasi_id)->update([
            'status' => $request->status
        ]);}
        return response()->json(['success'=>'Berhasil']);
    }
}
