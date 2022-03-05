<?php

namespace App\Http\Controllers;

use App\Models\Resepsionis;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resepsionis.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resepsionis  $resepsionis
     * @return \Illuminate\Http\Response
     */
    public function show(Resepsionis $resepsionis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resepsionis  $resepsionis
     * @return \Illuminate\Http\Response
     */
    public function edit(Resepsionis $resepsionis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resepsionis  $resepsionis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resepsionis $resepsionis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resepsionis  $resepsionis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resepsionis $resepsionis)
    {
        //
    }
}
