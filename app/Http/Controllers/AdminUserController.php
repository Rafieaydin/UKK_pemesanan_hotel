<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.index');
    }

    public function userajax(Request $request){
        if ($request->ajax()) {
            $admin = Admin::where('id','!=',Auth::guard('admin')->user()->id)->orderby('created_at','desc')->get();
            return datatables()->of($admin)
            ->addColumn('action', function ($admin) {
                $button = '<a href="/admin/user/' . $admin->id . '"   id="' . $admin->id . '" class="edit btn btn-primary btn-sm"><i class="fas fa-search"></i></a>';
                $button .= '&nbsp';
                $button .='<a  href="/admin/user/' . $admin->id . '/edit" id="edit" data-toggle="tooltip"  data-id="' . $admin->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post"><i class="fas fa-pencil-alt"></i></a>';
                $button .= '&nbsp';
                $button .= '<button type="button" name="delete" id="hapus" data-id="' . $admin->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
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
        return view('admin.admin.create');
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
            'username' =>'required|unique:admin',
            'email' => 'required|unique:admin',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // if($request->password != $request->password_confirmation){
        //     return redirect()->back()->with('error', 'Password tidak sama');
        // }

        Admin::create([
            'username' =>$request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('admin.user.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.admin.detail',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admin.edit',compact('admin'));
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
            'username' =>'required|unique:admin',
            'email' => 'required|unique:admin',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        Admin::where('id',$id)->update([
            'username' =>$request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('admin.user.index')->with('success','Data Berhasil Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
            return response()->json([
                'succes' => 'data bersail di hapus'
            ], 202);
    }
}
