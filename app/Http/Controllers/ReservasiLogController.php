<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\ReservasiLog;
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
                    $button = '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','gambar','harga','total_harga'])
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
        //
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
