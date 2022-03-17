<?php

namespace App\Exports;

use App\Helpers\Helper;
use App\Models\TipeKamar;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReservasiExport implements FromCollection, WithHeadings,WithStyles,WithColumnWidths,WithMapping,ShouldAutoSize,WithCustomStartCell
{
    public $reservasi;

    public function __construct($resev)
    {
        $this->reservasi = $resev;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->reservasi);
    }
    public function headings():array
    {
        return [
            'id',
            'nama pemesan',
            'nama tamu',
            'email pemesan',
            'no hp',
            'checkin',
            'checkout',
            'harga / malam',
            'jumlah kamar',
            'total harga'
        ];
    }
    public function map($data):array
    {
        return [
            '',
            $data->nama_pemesan,
            $data->nama_tamu,
            $data->email_pemesan,
            $data->nomor_hp_pemesan,
            $data->tanggal_checkin->format('Y-m-d'),
            $data->tanggal_checkout->format('Y-m-d'),
            Helper::format_rupiah($data->tipekamar->harga),
            $data->jumlah_kamar,
            Helper::format_rupiah($data->total_harga)
        ];
    }
    public function startCell(): string
    {
        return 'B7';
    }
    public function styles(Worksheet $sheet)
    {
        $columnindex = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
        );
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();
        $sheet->getStyle('B8:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B8:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // tittle
        $sheet->mergeCells("B4:k4")->setCellValue("B4","Reservasi Hotel");
        $sheet->mergeCells("B5:K5")->setCellValue("B5","Aston Bogor");

        // header
        $sheet->getStyle('B4:K4')->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                    // 'width' => 10
                    'height' => 20
                )
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array(
                    'rgb' => '30336b',
                )
            ),
            'font' => array(
                'bold' => true,
                'color' => ['argb' => 'e5e5e5'],
            )
        ));
        $sheet->getStyle('B5:K5')->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                    // 'width' => 10
                    'height' => 20
                )
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array(
                    'rgb' => '30336b',
                )
            ),
            'font' => array(
                'bold' => true,
                'color' => ['argb' => 'e5e5e5'],
            )
        ));
        // end tittle
        //table
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));
        //header
        $sheet->getStyle('B7:' . $highestCol . '7')->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                    // 'width' => 10
                    'height' => 20
                )
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array(
                    'rgb' => '30336b',
                )
            ),
            'font' => array(
                'bold' => true,
                'color' => ['argb' => 'e5e5e5'],
            )
        ));

        $sheet->getRowDimension(4)->setRowHeight(20);
        $sheet->getRowDimension(5)->setRowHeight(20);
        $sheet->getRowDimension(7)->setRowHeight(30);
        for ($i=0; $i < count($this->reservasi) ; $i++) {
            $sheet->getRowDimension($i + 8)->setRowHeight(30);
        }

        for ($i=0; $i < count($this->reservasi) ; $i++) {
            $sheet->setCellValue("B" . ($i + 8), $i+1);
        }
    }
    public function columnWidths(): array
    {
        return [
            'b' => 10,
            'c' => 30,
            'd' => 30,
            'e' => 30,
            'f' => 20,
            'g' => 20,
            'h' => 20,
            'i' => 25,
            'j'=>  20,
            'k' => 25
        ];
    }

}
