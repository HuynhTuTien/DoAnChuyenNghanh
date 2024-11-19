<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class StatisticalDatesExport implements FromCollection, WithHeadings, WithTitle, WithStyles, ShouldAutoSize
{
    protected $statisticalsdates;
    protected $totalRevenueday;

    public function __construct($statisticalsdates, $totalRevenueday)
    {
        $this->statisticalsdates = $statisticalsdates;
        $this->totalRevenueday = $totalRevenueday;
    }

    public function collection()
    {
        return $this->statisticalsdates->map(function ($payment) {
            return [
                'ID' => $payment->id,
                'Mã hóa đơn' => $payment->order->code_order,
                'Khách hàng' => $payment->order->name,
                'Ngày thanh toán' => $payment->payment_date,
                'Phương thức thanh toán' => $payment->payment_method,
                'Tổng tiền' => $payment->total_amount,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Mã hóa đơn',
            'Khách hàng',
            'Ngày thanh toán',
            'Phương thức thanh toán',
            'Tổng tiền',
        ];
    }

    public function title(): string
    {
        return 'Payments by Date';
    }

    public function styles(Worksheet $sheet)
    {


        $sheet->setCellValue('H1', 'Tổng danh thu ngày: ' . number_format($this->totalRevenueday, 0, ',', '.') . ' VNĐ');
        $sheet->getStyle('F')->getNumberFormat()->setFormatCode('#,##0 "VNĐ"');

        $sheet->getStyle('A1:F1')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '0000FF', // Mã màu xanh dương
                ],
            ],
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'], // Màu chữ trắng
                'size' => 14,

            ]
        ]);
        $sheet->getStyle('H1')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '0000FF', // Mã màu xanh dương
                ],
            ],
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'], // Màu chữ trắng
            ]
        ]);

        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(20);

        $sheet->getColumnDimension('H')->setWidth(30);

    }
}
