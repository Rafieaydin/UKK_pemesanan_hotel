<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Resepsionis;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use Database\Seeders\TipeSeeder;
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
        $total_r = Reservasi::count();
        $total_k = Kamar::count();
        $total_k_tersedia = TipeKamar::sum('total_jumlah_kamar_tersedia');
        $total_k_terisi = TipeKamar::sum('total_jumlah_kamar_booking');
        $reservasi = Reservasi::limit(5)->orderby('created_at', 'desc')->get();
        return view('resepsionis.dashboard', compact('reservasi', 'total_r', 'total_k', 'total_k_tersedia', 'total_k_terisi'));
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
