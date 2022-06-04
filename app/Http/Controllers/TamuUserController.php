<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TamuUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tamu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tamu.create');
    }

    public function ajax(Request $request){
        if ($request->ajax()) {
            $tamu = Tamu::orderby('created_at','desc')->get();
            return datatables()->of($tamu)
            ->addColumn('action', function ($tamu) {
                $button = '<a href="/admin/tamu/' . $tamu->id . '"   id="' . $tamu->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                $button .= '&nbsp';
                $button .='<a  href="/admin/tamu/' . $tamu->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $tamu->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                $button .= '&nbsp';
                $button .= '<button type="button" name="delete" id="hapus" data-id="' . $tamu->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()->make(true);
        }
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
            'username' => 'required',
            'password' => 'required|confirmed',
            'nama_tamu' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
        ]);
        Tamu::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_tamu' => $request->nama_tamu,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
        ]);
        return redirect('/admin/tamu')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tamu = Tamu::find($id);
        return view('admin.tamu.detail', compact('tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamu = Tamu::find($id);
        return view('admin.tamu.edit', compact('tamu'));
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
            'username' => 'required',
            'password' => 'required|confirmed',
            'nama_tamu' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
        ]);
        $tamu = Tamu::find($id);
        $tamu->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_tamu' => $request->nama_tamu,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
        ]);
        return redirect('/admin/tamu')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tamu::destroy($id);
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
