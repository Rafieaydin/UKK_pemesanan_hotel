<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitas_hotel.index');
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            $fasilitas_hotel = FasilitasHotel::all();
            return datatables()->of($fasilitas_hotel)
            ->editColumn('gambar', function ($data) {
                return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
            })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/fasilitas_hotel/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .='<a  href="/admin/fasilitas_hotel/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','gambar'])
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
        return view('admin.fasilitas_hotel.create');
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
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move('assets/images/',$file);
        $tipe_kamar = new FasilitasHotel();
        $tipe_kamar->nama_fasilitas = $request->nama_fasilitas;
        $tipe_kamar->gambar =$file;
        $tipe_kamar->keterangan = $request->keterangan;
        $tipe_kamar->admin_id = Auth::user()->id;
        $tipe_kamar->save();
        return redirect()->route('admin.fasilitas_hotel.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $fasilitas_hotel = FasilitasHotel::find($id);
        return view('admin.fasilitas_hotel.detail', compact('fasilitas_hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas_hotel= FasilitasHotel::find($id);
        return view('admin.fasilitas_hotel.edit',compact('fasilitas_hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move('assets/images/',$file);
        FasilitasHotel::where('id',$id)->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'keterangan' => $request->keterangan,
            'gambar' => $file,
            'admin_id' => Auth::user()->id,
        ]);
        return redirect()->route('admin.fasilitas_hotel.index')->with('success','Data berhasil edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FasilitasHotel::destroy($id);
        return response()->json(['success' => 'Data berhasil di hapus.']);
    }
}
