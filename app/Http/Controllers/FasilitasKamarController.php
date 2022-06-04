<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\TipeKamar;
use Database\Seeders\FasilitasKamarSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitas_kamar.index');
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            $fasilitas_kamar = FasilitasKamar::orderBy('created_at','desc')->get();
            return datatables()->of($fasilitas_kamar)
                ->addColumn('icon_fasilitas', function ($data) {
                    return '<i class="'.$data->icon_fasilitas.'" ></i>';
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/fasilitas_kamar/' . $data->id . '"   id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                    $button .= '&nbsp';
                    $button .='<a  href="/admin/fasilitas_kamar/' . $data->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                    $button .= '&nbsp';
                    $button .= '<button type="button" name="delete" id="hapus" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action','icon_fasilitas'])
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
        return view('admin.fasilitas_kamar.create', compact('tipe'));
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
            'icon_fasilitas' => 'required',
        ]);
        $tipe_kamar = new FasilitasKamar();
        $tipe_kamar->nama_fasilitas = $request->nama_fasilitas;
        $tipe_kamar->admin_id = Auth::user()->id;
        $tipe_kamar->icon_fasilitas = $request->icon_fasilitas;
        $tipe_kamar->save();
        return redirect()->route('admin.fasilitas_kamar.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitasKamar = FasilitasKamar::find($id);
        return view('admin.fasilitas_kamar.detail',compact('fasilitasKamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe = TipeKamar::all();
        $fasilitasKamar = FasilitasKamar::find($id);
        return view('admin.fasilitas_kamar.edit',compact('fasilitasKamar','tipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'icon_fasilitas' => 'required',
        ]);

        FasilitasKamar::where('id',$id)->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'admin_id' => Auth::user()->id,
            'icon_fasilitas' => $request->icon_fasilitas,
        ]);
        return redirect()->route('admin.fasilitas_kamar.index')->with('success','Data berhasil edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FasilitasKamar::destroy($id);
        return response()->json(['success' => 'Data berhasil di hapus.']);
    }
}
