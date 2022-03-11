<?php

namespace App\Http\Controllers;

use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    // Todo: check if file exists
                    // if not call function to get default image and storage
                    return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
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
        return view('admin.tipe_kamar.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_tipe' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        $file = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move('assets/images/',$file);
        $tipe_kamar = new TipeKamar;
        $tipe_kamar->nama_tipe = $request->nama_tipe;
        $tipe_kamar->gambar =$file;
        $tipe_kamar->harga = $request->harga;
        $tipe_kamar->keterangan = $request->keterangan;
        $tipe_kamar->admin_id = Auth::user()->id;
        $tipe_kamar->save();
        return redirect()->route('admin.tipe_kamar.index')->with('success','Data berhasil ditambahkan');
    }

    public function show($id){
        $tipe_kamar = TipeKamar::find($id);
        return view('admin.tipe_kamar.detail',compact('tipe_kamar'));
    }

    public function edit($id){
        $tipe = TipeKamar::find($id);
        return view('admin.tipe_kamar.edit',compact('tipe'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'nama_tipe' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        $file = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move('assets/images/',$file);
        TipeKamar::where('id',$id)->update([
            'nama_tipe' => $request->nama_tipe,
            'gambar' => $file,
            'admin_id' => Auth::user()->id,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('admin.tipe_kamar.index')->with('success','Data berhasil edit');
    }

    public function destroy($id){
        TipeKamar::where('id',$id)->delete();
        return response()->json(['success'=>'Data berhasil di hapus']);
    }

}
