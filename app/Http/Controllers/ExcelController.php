<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Exports\FhotelExport;
use App\Exports\FkamarExport;
use App\Exports\KamarExport;
use App\Exports\ResepsionisExport;
use App\Exports\ReservasiExport;
use App\Exports\ReservasiLogExport;
use App\Exports\TipeKamarExport;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ExcelController extends Controller
{
    private $excel;
    public function __construct(Excel $excel)
    {
        return $this->excel = $excel;

    }
    public function reservasi(){
        $reservasi = Reservasi::all();
        return $this->excel->download(new ReservasiExport($reservasi), 'Laporan reservasi Hotel Aston Bogor.xlsx');
    }

    public function adminuser(){
        return $this->excel->download(new AdminExport, 'Data Admin Hotel Aston Bogor.xlsx');
    }

    public function resepsionisuser(){
        return $this->excel->download(new ResepsionisExport, 'Data Resepsionis Hotel Aston Bogor.xlsx');
    }

    public function fhotel(){
        return $this->excel->download(new FhotelExport, 'Laporan Fasilitas Hotel Aston Bogor.xlsx');
    }

    public function tipekamar(){
        return $this->excel->download(new TipeKamarExport, 'Laporan Tipe kamar Hotel Aston Bogor.xlsx');
    }

    public function fkamar(){
        return $this->excel->download(new FkamarExport, 'Laporan Fasilitas kamar Hotel Aston Bogor.xlsx');
    }

    public function kamar(){
        return $this->excel->download(new KamarExport, 'Laporan kamar Hotel Aston Bogor.xlsx');
    }

    public function reservasilog(){
        return $this->excel->download(new ReservasiLogExport, 'Laporan Log Reservasi Hotel Aston Bogor.xlsx');
    }

}
