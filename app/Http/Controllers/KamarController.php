<?php

namespace App\Http\Controllers;

use App\Models\kamar;
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

    public function ajax(Request $request){
        if ($request->ajax()) {
            $kamar = kamar::all();
            return datatables()->of($kamar)
            ->editColumn('nama_tipe', function ($data) {
                return $data->tipekamar->nama_tipe;
            })
                ->editColumn('gambar', function ($data) {
                    return '<img src="'.asset('assets/images/'.$data->gambar).'" width="100px">';
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/kamar/detail/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .='<a  href="/admin/kamar/edit/' . $data->id . '" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
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
        $tipe = TipeKamar::all();
        return view('admin.kamar.create', compact('tipe'));
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
            'jumlah_kamar' => 'required',
            'tipe_id' => "required"
        ]);

        Kamar::create([
            'jumlah_kamar' => $request->jumlah_kamar,
            'tipe_id' => $request->tipe_id,
            'admin_id' => auth()->id(),
            'status' => 1
        ]);
        return redirect('/admin/kamar')->with('success', 'Data Kamar Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = kamar::find($id);
        return view('admin.kamar.detail', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe = TipeKamar::all();
        $kamar = kamar::find($id);
        return view('admin.kamar.edit', compact('kamar', 'tipe'));
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
            'jumlah_kamar' => 'required',
            'tipe_id' => "required"
        ]);

        Kamar::where('id',$id)->update([
            'jumlah_kamar' => $request->jumlah_kamar,
            'tipe_id' => $request->tipe_id,
            'admin_id' => auth()->id()
        ]);
        return redirect('/admin/kamar')->with('success', 'Data Kamar Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(kamar $kamar)
    {
        kamar::destroy($kamar->id);
        return response()->json(['success' => 'Berhasil Dihapus']);
    }
}
