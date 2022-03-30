<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Reservasi;
use App\Models\ReservasiKamarLog;
use App\Models\ReservasiLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(Auth::getdefaultdriver().'.reservasilog.index');
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            if(!empty($request->check_in) && !empty($request->check_out)){
                $reservasi = ReservasiLog::whereDate('tanggal_checkin','>=',$request->check_in)->whereDate('tanggal_checkout','<=',$request->check_out)->get();
            }else
            if(!empty($request->check_in)){
                $reservasi = ReservasiLog::whereDate('tanggal_checkin', '=', $request->check_in)->orderby('created_at','desc')->get();
            }else if(!empty($request->check_out)){
                $reservasi = ReservasiLog::whereDate('tanggal_checkout', '=', $request->check_out)->orderby('created_at','desc')->get();
            }else
            {
                $reservasi = ReservasiLog::orderby('created_at','desc')->get();
            }

            return datatables()->of($reservasi)
                ->addcolumn('tanggal_checkin', function($data) use($request){
                    return $data->tanggal_checkin->format('d-m-Y');
                })
                ->addcolumn('tanggal_checkout', function($data){
                    return $data->tanggal_checkout->format('d-m-Y');
                })
                ->addColumn('harga', function($data){
                    return Helper::format_rupiah($data->harga);
                })
                ->addColumn('total_harga', function($data){
                    return Helper::format_rupiah($data->total_harga);
                })
                ->addColumn('action', function ($data) {
                    $button = '';
                    $button .= '<a href="/'.Auth::getdefaultdriver().'/reservasilog/' . $data->uuid . '"   id="' . $data->uuid . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','gambar','harga','total_harga'])
                ->addIndexColumn()->make(true);
        }
    }

    public function detailresevasi(Request $request){
        if ($request->ajax()) {
           $detail = ReservasiKamarLog::where('reservasi_id',request()->reservasi_id)->get();
            // $kamar = KamarReservasi::where('reservasi_id',request()->reservasi_id)->get();
            return datatables()->of($detail)
                ->addColumn('tipe_kamar', function ($data) {
                    return $data->tipe;
                })
                ->addColumn('checkin', function ($data) {
                    return ($data->checkin) ? Carbon::parse($data->checkin)->format('d-m-Y') : '00-00-000';
                })
                ->addColumn('checkout', function ($data) {
                    return ($data->checkout) ?  Carbon::parse($data->checkout)->format('d-m-Y') : '00-00-000';
                })
                ->addColumn('kode_kamar', function ($data) {
                    return $data->kode_kamar;
                })
                ->addColumn('harga', function ($data) {
                    return Helper::format_rupiah($data->harga);
                })
                ->addColumn('status', function ($data) {
                    if($data->status == 'booking'){
                    $button = '  <span class="badge badge-primary">Booking</span>';}
                    elseif($data->status == 'checkin'){
                    $button = '  <span class="badge badge-success">Check-in</span>';}
                    elseif($data->status == 'checkout'){
                    $button = '  <span class="badge badge-danger">Check-out</span>';}
                    elseif($data->status == 'batal'){
                    $button = '  <span class="badge badge-danger">dibatalkan</span>';}
                    return $button;
                })
                ->rawColumns(['nama_tipe','kode_kamar','harga','status','checkin','checkout'])
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = ReservasiLog::where('uuid',$id)->first();
        return view(Auth::getdefaultdriver().'.reservasilog.detail', compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReservasiLog::where('id',$id)->delete();
        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }
}
