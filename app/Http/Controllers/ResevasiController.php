<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\Helper;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class ResevasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->create){
            return redirect()->route(Auth::getdefaultdriver().'.reservasi.index')->with('success', 'Data Reservasi Berhasil Ditambahkan');
        }
        if(request()->update){
            return redirect()->route(Auth::getdefaultdriver().'.reservasi.index')->with('success', 'Data Reservasi Berhasil Edit');
        }
        return view(Auth::getdefaultdriver().'.reservasi.index');
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            if(!empty($request->check_in) && !empty($request->check_out)){
                $reservasi = Reservasi::whereDate('tanggal_checkin','>=',$request->check_in)->whereDate('tanggal_checkout','<=',$request->check_out)->get();
            }else
            if(!empty($request->check_in)){
                $reservasi = Reservasi::whereDate('tanggal_checkin', '=', $request->check_in)->orderby('created_at','desc')->get();
            }else if(!empty($request->check_out)){
                $reservasi = Reservasi::whereDate('tanggal_checkout', '=', $request->check_out)->orderby('created_at','desc')->get();
            }else
            {
                $reservasi = Reservasi::orderby('created_at','desc')->get();
            }

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
                    $button ='<a  href="/'.Auth::getdefaultdriver().'/reservasi/' . $data->uuid . '/pdf" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/'.Auth::getdefaultdriver().'/reservasi/' . $data->uuid . '"   id="' . $data->uuid . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .='<a  href="/'.Auth::getdefaultdriver().'/reservasi/' . $data->uuid . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->uuid . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
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
        $tipe = TipeKamar::all();
        return view(Auth::getdefaultdriver().'.reservasi.create',compact('tipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Reservasi::where('uuid',$id)->first();
        return view(Auth::getdefaultdriver().'.reservasi.detail',compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe = TipeKamar::all();
        $reservasi = Reservasi::where('uuid',$id)->first();
        return view(Auth::getdefaultdriver().'.reservasi.edit',compact('tipe','reservasi'));
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

        $resev = Reservasi::with('KamarBooking')->where('uuid',$id)->first();
        $checkin = Carbon::parse($request->tanggal_checkin)->format('Y-m-d');
        $checkout = Carbon::parse($request->tanggal_checkout)->format('Y-m-d');
        $jumlah_hari = CarbonPeriod::create($checkin, $checkout); 
        $tipe = TipeKamar::where('id',$request->tipe_id)->first();
        $resev->where('uuid',$id)->update([
            'tipe_id' => $request->tipe_id,
            'nama_pemesan' => $request->nama_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'total_harga' => ($tipe->harga * count(json_decode($request->kode_kamar))) * (count($jumlah_hari) - 1),
            'nama_tamu' => $request->nama_tamu
        ]);
        foreach($resev->KamarBooking as $val){
            $val->update([
                'status' => '0',
                'reservasi_id' => NULL
            ]);
        }

        foreach (json_decode($request->kode_kamar) as $key => $val) {
            $kamar = Kamar::where('id',$val)->first();
            $kamar->update([
                'status' => '1',
                'reservasi_id' => $resev->uuid
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil diupdate',
            'reservasi' => $resev
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reser = Reservasi::where('uuid',$id)->first();
        foreach($reser->KamarBooking as $val){
            $val->update([
                'status' => '0',
                'reservasi_id' => NULL
            ]);
        }
        Reservasi::where('uuid',$id)->delete();
        return response()->json(['success' => 'Data Deleted successfully.']);
    }

    public function pdfresevarsi($id){
        $reservasi = Reservasi::where('uuid',$id)->first();
        $pdf = Pdf::loadView('PDF.detailreservasi', compact('reservasi'));
        return $pdf->stream('Invoice Reservasi Hotel Aston.pdf');
    }
}
