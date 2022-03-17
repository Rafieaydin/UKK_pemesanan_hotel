<?php

namespace App\Http\Controllers;

use App\Exports\ReservasiExport;
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
        return $this->excel->download(new ReservasiExport($reservasi), 'reservasi.xlsx');
    }
}
