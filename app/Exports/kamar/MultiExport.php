<?php

namespace App\Exports\kamar;

use App\Exports\kamar\KamarExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiExport implements WithMultipleSheets
{
    private $tipe;
    public function __construct($tipe)
    {
        $this->tipe = $tipe;
    }
    public function sheets(): array
    {
        foreach ($this->tipe as $key => $value) {
            $sheets[] = new KamarExport($this->tipe, $value->id, $value->nama_tipe);
        }
        return $sheets;
    }
}
