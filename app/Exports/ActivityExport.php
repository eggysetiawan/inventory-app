<?php

namespace App\Exports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Border;


class ActivityExport implements
    ShouldAutoSize,
    WithMapping,
    WithEvents,
    FromCollection,
    WithCustomStartCell,
    WithHeadings
{
    public $from;
    public $to;
    public $query;

    public $activities;

    public function __construct($from, $to, $query)
    {
        $this->from = $from;
        $this->to = $to;
        $this->query = $query;
    }

    public function collection()
    {
        $from = date('Y-m-d H:i', strtotime($this->from));
        $to = date('Y-m-d H:i', strtotime($this->to));

        // return Activity::all();
        $activites = Activity::filterActivities($from, $to, $this->query);
        return $this->activities = $activites;
    }

    public function getTotalRow()
    {
        return $this->activities->count() + 2;
    }

    public function headings(): array
    {
        return [
            __('Product Name'),
            __('Quantity'),
            __('Status'),
            __('Activity Date'),
        ];
    }

    public function map($activity): array
    {

        return [
            $activity->product->name,
            $activity->quantity,
            $activity->status,
            $activity->created_at,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getStyle('B2:E2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                ]);

                $event->sheet->getStyle('B3:E' . $this->getTotalRow())->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // $event->sheet->getStyle('C7:C' . $this->getTotalSupportRow())->applyFromArray([
                //     'alignment' => [
                //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                //     ],
                //     'borders' => [
                //         'allBorders' => [
                //             'borderStyle' => Border::BORDER_THIN,
                //             'color' => ['argb' => '000000'],
                //         ],
                //     ],
                // ]);
            },
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }
}
