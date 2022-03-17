<?php

namespace App\Http\Controllers;

use App\Models\Resepsionis;
use Illuminate\Http\Request;

class ResepsionisUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.resepsionis.index');
    }
    public function ajax(Request $request){
        if ($request->ajax()) {
            $resepsionis = Resepsionis::orderby('created_at','desc')->get();
            return datatables()->of($resepsionis)
            ->addColumn('action', function ($resepsionis) {
                $button = '<a href="/admin/resepsionis/' . $resepsionis->id . '"   id="' . $resepsionis->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                $button .= '&nbsp';
                $button .='<a  href="/admin/resepsionis/' . $resepsionis->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $resepsionis->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                $button .= '&nbsp';
                $button .= '<button type="button" name="delete" id="hapus" data-id="' . $resepsionis->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
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
        return view('admin.resepsionis.create');
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
            'username' =>'required|unique:resepsionis',
            'nama_resepsionis' => 'required',
            'email' => 'required|unique:resepsionis',
            'no_hp' => 'required|min:8',
            'alamat'=>'required',
            'jk' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // if($request->password != $request->password_confirmation){
        //     return redirect()->back()->with('error', 'Password tidak sama');
        // }

        Resepsionis::create([
            'username' =>$request->username,
            'nama_resepsionis' => $request->nama_resepsionis,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat'=> $request->alamat,
            'jk' => $request->jk,
            'password' => $request->password,
        ]);
        return redirect()->route('admin.resepsionis.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resepsionis = Resepsionis::find($id);
        return view('admin.resepsionis.detail',compact('resepsionis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resepsionis = resepsionis::find($id);
        return view('admin.resepsionis.edit',compact('resepsionis'));
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
            'username' =>'required|unique:resepsionis',
            'nama_resepsionis' => 'required',
            'email' => 'required|unique:resepsionis',
            'no_hp' => 'required|min:8',
            'alamat'=>'required',
            'jk' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        Resepsionis::where('id',$id)->update([
            'username' =>$request->username,
            'nama_resepsionis' => $request->nama_resepsionis,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat'=> $request->alamat,
            'jk' => $request->jk,
            'password' => $request->password,
        ]);
        return redirect()->route('admin.resepsionis.index')->with('success','Data Berhasil Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resepsionis::destroy($id);
            return response()->json([
                'succes' => 'data bersail di hapus'
            ], 202);
    }
}
