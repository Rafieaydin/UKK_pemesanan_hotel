<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\Helper;
use App\Models\KamarReservasi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendReservasiMail;
use App\Models\ReservasiKamarLog;
use App\Models\ReservasiLog;

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
                // ->addColumn('status', function ($data) {
                //         $button = '';
                //         if($data->status == 'pending'){
                //         $button .= '  <span class="badge bg-primary text-white">Menunggu</span>';}
                //         elseif($data->status == 'konfirmasi'){
                //         $button .= '  <span class="badge bg-success text-white">Konfirmasi</span>';}
                //         elseif($data->status == 'batal'){
                //         $button .= '  <span class="badge bg-danger text-white">dibatalkan</span>';}
                //         return $button;
                // })
                // ->addColumn('status-action', function ($data) {
                //     $button = '';
                //     if($data->status == "pending"){
                //         $button .= '<button type="button" name="statusb" id="statusb" data-id="' . $data->uuid . '" data-status="konfirmasi" class="statusb btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>';
                //         $button .= ' <button type="button" name="statusb" id="statusb" data-id="' . $data->uuid . '" data-status="batal" class="statusb btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>';
                //     }else if($data->status == "konfirmasi"){
                //         $button .= '<button type="button" data-id="' . $data->uuid . '" class="statusb btn btn-success btn-sm disabed"><i class="fa fa-check" aria-hidden="true"></i></button>';
                //         $button .= ' <button type="button" name="statusb" id="statusb" data-id="' . $data->uuid . '" data-status="batal" class="statusb btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>';
                //     }else{
                //         $button .= '<button type="button" data-id="' . $data->uuid . '" class="statusb btn btn-success btn-sm disabed"><i class="fa fa-check" aria-hidden="true"></i></button>';
                //         $button .= ' <button type="button" data-id="' . $data->uuid . '" class="statusb btn btn-danger btn-sm disabed"><i class="fa fa-times" aria-hidden="true"></i></button>';
                //     }
                //     return $button;
                // })
                ->addColumn('action', function ($data) {
                    $button = '';
                    $button .= '<a  href="/'.Auth::getdefaultdriver().'/reservasi/' . $data->uuid . '/pdf" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<a href="/'.Auth::getdefaultdriver().'/reservasi/' . $data->uuid . '"   id="' . $data->uuid . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    if(Auth::guard('admin')->check()){
                        if($data->status !== "batal"){
                        $button .='<a  href="/'.Auth::getdefaultdriver().'/reservasi/' . $data->uuid . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                        $button .= '&nbsp';
                        }
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->uuid . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    }
                    $button .= '&nbsp';

                    return $button;
                })
                ->rawColumns(['action','gambar','harga','total_harga'])
                ->addIndexColumn()->make(true);
        }
    }

    public function detailresevasi(Request $request){
        if ($request->ajax()) {
            $kamar = Reservasi::where('uuid',request()->reservasi_id)->first();
            // $kamar = KamarReservasi::where('reservasi_id',request()->reservasi_id)->get();
            return datatables()->of($kamar->KamarBooking)
                ->addColumn('tipe_kamar', function ($data) {
                    return $data->tipeKamar->nama_tipe;
                })
                ->addColumn('checkin', function ($data) {
                    return ($data->pivot->checkin) ? Carbon::parse($data->pivot->checkin)->format('d-m-Y') : '00-00-000';
                })
                ->addColumn('checkout', function ($data) {
                    return ($data->pivot->checkout) ?  Carbon::parse($data->pivot->checkout)->format('d-m-Y') : '00-00-000';
                })
                ->addColumn('kode_kamar', function ($data) {
                    return $data->kode_kamar;
                })
                ->addColumn('harga', function ($data) {
                    return Helper::format_rupiah($data->tipekamar->harga);
                })
                ->addColumn('status', function ($data) {
                    if($data->pivot->status == 'booking'){
                    $button = '  <span class="badge badge-primary">Booking</span>';}
                    elseif($data->pivot->status == 'checkin'){
                    $button = '  <span class="badge badge-success">Check-in</span>';}
                    elseif($data->pivot->status == 'checkout'){
                    $button = '  <span class="badge badge-danger">Check-out</span>';}
                    elseif($data->pivot->status == 'batal'){
                    $button = '  <span class="badge badge-danger">dibatalkan</span>';}
                    return $button;
                })
                ->addColumn('action', function ($data) {
                    if($data->pivot->status == 'booking'){
                    $button = '<button class="btn btn-success button-action" id="button-action" data-id="'.$data->id.'" data-id_reservasi="'.$data->pivot->reservasi_id.'" data-status="checkin">Check-in</button>';}
                    elseif($data->pivot->status == 'checkin'){
                    $button = '<button class="btn btn-danger button-action" id="button-action"  data-id="'.$data->id.'" data-id_reservasi="'.$data->pivot->reservasi_id.'"  data-status="checkout">Check-out</button>';}
                    elseif($data->pivot->status == 'checkout'){
                    $button = '<button class="btn btn-success button-action"  disabled  data-id="'.$data->id.'" data-id_reservasi="'.$data->pivot->reservasi_id.'" >Selesai</button>';}
                    elseif($data->pivot->status == 'batal'){
                    $button = '<button class="btn btn-danger"  disabled  data-id="'.$data->id.'" >dibatalkan</button>';}
                    return $button;
                })
                ->rawColumns(['nama_tipe','kode_kamar','harga','action','status','checkin','checkout'])
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
        $id_resevasi = Str::uuid();
        $resev = Reservasi::create([
            'uuid' => $id_resevasi,
            'kode_booking' => Str::random(8),
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
            // $kamar->update([
            //     'status' => '1',
            // ]);
            $resev->KamarBooking()->attach($kamar->id,[
                'status' => 'booking',
                'checkin' => $request->tanggal_checkin,
                'checkout' => $request->tanggal_checkout,
            ]);
        }
        // SendReservasiMail::dispatch($resev);
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
        Reservasi::where('uuid',$id)->update([
            'tipe_id' => $request->tipe_id,
            'nama_pemesan' => $request->nama_pemesan,
            'email_pemesan' => $request->email_pemesan,
            'nomor_hp_pemesan' => $request->nomor_hp_pemesan,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'total_harga' => ($tipe->harga * count(json_decode($request->kode_kamar))) * (count($jumlah_hari) - 1),
            'nama_tamu' => $request->nama_tamu
        ]);
        SendReservasiMail::dispatch($resev);
        $old_kamar = [];
        $new_kamar = [];
        foreach($resev->KamarBooking as $val){
            if($val->pivot->status == 'booking'){
                $old_kamar[] = $val->id;
            }
        }
     
            foreach (json_decode($request->kode_kamar) as $key => $val) {
                $kamar = Kamar::where('id',$val)->first();
                    if(!in_array($kamar->id,$old_kamar)){ // jika kamar == kamar_id
                        // KamarReservasi::create([
                        //     'reservasi_id' => $id,
                        //     'kamar_id' => $kamar->id,
                        //     'status' => 'booking'
                        // ]);
                        $resev->KamarBooking()->attach($kamar->id,[
                            'status' => 'booking'
                        ]);
                    }
                        else if(in_array($kamar->id,$old_kamar)){
                        for($i = 0 ; $i < count($old_kamar); $i++){
                            if($old_kamar[$i] === $kamar->id){ // check kamar_id lama == id_baru
                                $new_kamar[] = $old_kamar[$i];
                            }
                        }
                    }
            }
            if(count($new_kamar) > 0){
                $deleted_kamars = array_diff($old_kamar,$new_kamar); 
                $resev->KamarBooking()->detach($deleted_kamars);
            }


        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil diupdate',
            'reservasi' => $resev
        ]);
    }
    public function setStatus(Request $request, $id)
    {
    $kamar = Kamar::find($request->id_kamar);
    $resev = Reservasi::with('KamarBooking')->where('uuid',$request->reservasi_id)->first();
    if($request->status == 'checkout'){
        $kamar->update([ // update status table kamar
            'status' => '0',
        ]);
        $kamar->reservasi()->sync([$request->reservasi_id=>[
            'status' => 'checkout',
            'checkout' => Carbon::now()->format('Y-m-d H:i:s'),
        ]]);
        }else if($request->status == 'checkin'){
        $kamar->update([
                'status' => '1',
        ]);
        $kamar->reservasi()->sync([$request->reservasi_id=>[
            'status' => 'checkin',
            'checkin' => Carbon::now()->format('Y-m-d H:i:s'),
        ]]);
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
        $re = Reservasi::where('uuid',$id)->first();
        $counting = $re->KamarBooking()->count();
        foreach($re->KamarBooking as $val){
            $val->update([
                'status' => '0',
            ]);
            ReservasiKamarLog::create([
                'reservasi_id' => $re->uuid,
                'kode_kamar' => $val->kode_kamar,
                'tipe' => $val->tipekamar->nama_tipe,
                'harga' => $val->tipekamar->harga,
                'status' => $val->pivot->status,
                'checkin' => Carbon::parse($val->pivot->checkin)->format('Y-m-d H:i:s'),
                'checkout' => Carbon::parse($val->pivot->checkout)->format('Y-m-d H:i:s'),
            ]);
        }
    
        Reservasi::where('uuid',$id)->delete();
        ReservasiLog::where('kode_booking',$re->kode_booking)->update([
            'jumlah_kamar' => $counting,
        ]);
        return response()->json(['success' => 'Data Deleted successfully.']);
    }

    public function pdfresevarsi($id){
        $reservasi = Reservasi::where('uuid',$id)->first();
        $pdf = Pdf::loadView('PDF.detailreservasi', compact('reservasi'));
        return $pdf->stream('Invoice Reservasi Hotel Aston.pdf');
    }
}
