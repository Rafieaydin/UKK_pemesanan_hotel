<?php

namespace App\Exports\kamar;

use App\Models\Kamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KamarExport implements  FromQuery, WithHeadings, WithCustomStartCell, WithStyles,WithColumnWidths,WithMapping,ShouldAutoSize, WithTitle
{
    protected $kamar;
    protected $tipe;
    protected $title;

    public function __construct($kamar, $tipe_id,$title)
    {
        $this->kamar = $kamar;
        $this->tipe = $tipe_id;
        $this->title = $title;
    }

    public function query()
    {
        $this->kamar = Kamar::query()->where('tipe_id', $this->tipe)->get();
        return Kamar::query()->where('tipe_id', $this->tipe);
    }

    public function headings():array
    {
        return [
            'id',
            'tipe kamar',
            'kode_kamar',
            'status',
        ];
    }
    public function map($data):array
    {
        $status = $data->status == 0 ? 'tersedia' : 'terisi';
        return [
            '',
            $data->tipekamar->nama_tipe,
            $data->kode_kamar,
            $status,
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
        $sheet->mergeCells("B4:E4")->setCellValue("B4","Data Kamar tipe ".$this->title);
        $sheet->mergeCells("B5:E5")->setCellValue("B5","Aston Bogor");

        // header
        $sheet->getStyle('B4:E4')->applyFromArray(array(
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
        $sheet->getStyle('B5:E5')->applyFromArray(array(
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
        for ($i=0; $i < count($this->kamar) ; $i++) {
            $sheet->getRowDimension($i + 8)->setRowHeight(30);
        }

        for ($i=0; $i < count($this->kamar) ; $i++) {
            $sheet->setCellValue("B" . ($i + 8), $i+1);
        }
    }
    public function columnWidths(): array
    {
        return [
            'b' => 10,
            'c' => 30,
            'd' => 30,
        ];
    }

    public function title(): string
    {
        return $this->title;
    }
}
