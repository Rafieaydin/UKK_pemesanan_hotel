<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\KamarReservasi;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kamar.index');
    }

    public function ApiIndex(Request $request)
    {
        $kamar = kamar::with('reservasi')->where('tipe_id',$request->tipe_id)->orderby('created_at','desc')->get();
        // $reservasis = Reservasi::where('uuid',$request->reservasi_id)->first();
        // $reservasi = $reservasis->KamarBooking;
        // $kamar_booked =[];
        // for($i = 0 ; $i < count($reservasi) ; $i++){
        //     $kamar_booked[] = $reservasi[$i]['kamar_id'];
        // }
        return response()->json(
            ['kamar' => $kamar]
            // 'kamar_booked' => $kamar_booked,
            // 'status' => 'sukses']
        );
    }

    public function TipeKamarAjax(Request $request){
        if ($request->ajax()) {
            $fasilitas_hotel = TipeKamar::all();
            return datatables()->of($fasilitas_hotel)
                ->editColumn('gambar', function ($data) {
                    // Todo: check if file exists
                    // if not call function to get default image and storage
                    return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
                })
                ->editColumn('harga', function ($data) {
                    // Todo: check if file exists
                    // if not call function to get default image and storage
                    return \App\Helpers\Helper::format_rupiah($data->harga);
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/kamar/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    return $button;
                })
                ->rawColumns(['action','gambar'])
                ->addIndexColumn()->make(true);
        }
    }
    public function ajax(Request $request){
        if ($request->ajax()) {
            $tipe = TipeKamar::where('id', request()->tipe_id)->first();
            if($tipe){
                $kamar = $tipe->kamars;
            }else{
                $kamar = [];
            }

            return datatables()->of($kamar->sortBy('kode_kamar'))
            ->editColumn('nama_tipe', function ($data) {
                return $data->tipekamar->nama_tipe;
            })
                ->editColumn('gambar', function ($data) {
                    return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
                })
                ->editColumn('status', function ($data) {
                    return $data->status == 0 ? '<span class="badge badge-success">Tersedia</span>' : '<span class="badge badge-danger">Tidak Tersedia</span>';
                })
                ->addColumn('action', function ($data) {
                    $button ='<a  href="/admin/kamar/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    if($data->status == 1){
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm" disabled><i class="fas fa-trash"></i></button>';
                    }else{
                        $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>';

                    }
                    // $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm" ><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','gambar','status'])
                ->addIndexColumn()->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $reservasi = Reservasi::all();
        $tipe = TipeKamar::where('id',$id)->get();
        return view('admin.kamar.create', compact('tipe', 'reservasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kamar' => 'required',
            'tipe_id' => "required",
        ]);

        Kamar::create([
            'kode_kamar' => $request->kode_kamar,
            'tipe_id' => $request->tipe_id,
            'admin_id' => auth()->id(),
            'status' => "0",
        ]);
        return redirect('/admin/kamar/'.$request->tipe_id)->with('success', 'Data Kamar Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.kamar.detail',['tipe_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservasi = Reservasi::all();
        $tipe = TipeKamar::all();
        $kamar = kamar::find($id);
        return view('admin.kamar.edit', compact('kamar', 'tipe', 'reservasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kamar' => 'required',
            'tipe_id' => "required",
        ]);

        Kamar::where('id',$id)->update([
            'kode_kamar' => $request->kode_kamar,
            'tipe_id' => $request->tipe_id,
            'admin_id' => auth()->id(),
        ]);
        return redirect('/admin/kamar/'.$request->tipe_id)->with('success', 'Data Kamar Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kamar  $k    amar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KamarReservasi::where('kamar_id',$id)->delete();
        kamar::destroy($id);
        return response()->json(['success' => 'Berhasil Dihapus']);
    }
}
