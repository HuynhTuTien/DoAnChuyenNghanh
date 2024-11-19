<?php

namespace App\Exports;

use App\Models\Promotion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PromotionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Promotion::all(); // Hoặc tùy chỉnh để chỉ lấy dữ liệu bạn muốn xuất
    }

    public function headings(): array
    {
        return [
            'ID',
            'Mã khuyến mãi',
            'Giá giảm',
            'Số lần sử dụng',
            'Ngày bắt đầu',
            'Ngày kết thúc',
            'Trạng thái',
            'Mô tả',
        ];
    }
}
