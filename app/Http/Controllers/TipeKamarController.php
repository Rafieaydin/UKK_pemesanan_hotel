<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TipeKamarController extends Controller
{
    public function index(){
        return view('admin.tipe_kamar.index');
    }
    public function ajax(Request $request){
        if ($request->ajax()) {
            $fasilitas_hotel = TipeKamar::all();
            return datatables()->of($fasilitas_hotel)
                ->editColumn('gambar', function ($data) {
                    return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
                    // Todo: check if file exists
                    // if(file_exists(public_path('assets/images/'.$data->gambar))){
                    //     return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
                    // }else if(file_exists(public_path('storaget/'.$data->gambar))){
                    //     return '<img src="'.asset('storage/'.$data->gambar).'" width="100px">';
                    // }else{
                    //     return '<img src="'.asset('storage/'.Storage::get('tipekamar/'.$data->gambar)).'" width="100px">';
                    // }
                    // if not call function to get default image and storage
                   
                })
                ->editColumn('harga', function ($data) {
                    // Todo: check if file exists
                    // if not call function to get default image and storage
                    return \App\Helpers\Helper::format_rupiah($data->harga);
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/tipe_kamar/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .='<a  href="/admin/tipe_kamar/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','gambar'])
                ->addIndexColumn()->make(true);
        }
    }


    public function create(){
        $fasilitas = FasilitasKamar::all();
        return view('admin.tipe_kamar.create',compact('fasilitas'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_tipe' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'keterangan' => 'required',
            'fasilitas_id' => 'required',
            'kapasitas_orang' => 'required',
        ]);
        $file = $request->file('gambar')->getClientOriginalName().''.time();
        $request->file('gambar')->move('assets/images/tipekamar',$file);
        // $request->file('gambar')->storeAs('tipekamar',$file);
        $tipe_kamar = new TipeKamar;
        $tipe_kamar->nama_tipe = $request->nama_tipe;
        $tipe_kamar->gambar = 'tipekamar/'.$file;
        $tipe_kamar->harga = $request->harga;
        $tipe_kamar->keterangan = $request->keterangan;
        $tipe_kamar->admin_id = Auth::user()->id;
        $tipe_kamar->kapasitas_orang = $request->kapasitas_orang;
        $tipe_kamar->save();
        $tipe_kamar->fasilitas()->attach($request->fasilitas_id);
        return redirect()->route('admin.tipe_kamar.index')->with('success','Data berhasil ditambahkan');
    }

    public function show($id){
        $tipe_kamar = TipeKamar::find($id);
        return view('admin.tipe_kamar.detail',compact('tipe_kamar'));
    }

    public function edit($id){
        $tipe = TipeKamar::find($id);
        $fasilitas = FasilitasKamar::all();
        $val_failitas = [];
        foreach ($tipe->fasilitas()->get() as $key => $value) {
            $val_failitas[] = $value->id;
        }
        $val_fasilitas  = implode('',$val_failitas);
        return view('admin.tipe_kamar.edit',compact('tipe','fasilitas','val_fasilitas'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'nama_tipe' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
            'keterangan' => 'required',
            'kapasitas_orang' => 'required',
        ]);
        $file = $request->file('gambar')->getClientOriginalName() .''.time();
        $request->file('gambar')->move('assets/images/tipekamar/',$file);
        $tipe_kamar = TipeKamar::find($id);
        $tipe_kamar->update([
            'nama_tipe' => $request->nama_tipe,
            'gambar' => 'tipekamar/'.$file,
            'admin_id' => Auth::user()->id,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'kapasitas_orang' => $request->kapasitas_orang,
        ]);
        $tipe_kamar->fasilitas()->sync($request->fasilitas_id);
        return redirect()->route('admin.tipe_kamar.index')->with('success','Data berhasil edit');
    }

    public function destroy($id){
        TipeKamar::where('id',$id)->delete();
        return response()->json(['success'=>'Data berhasil di hapus']);
    }

}
