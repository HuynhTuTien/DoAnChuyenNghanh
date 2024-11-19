<?php

namespace App\Http\Controllers\Admin\Statistical;

use App\Exports\StatisticalDatesExport;
use App\Exports\StatisticalExport;
use App\Exports\StatisticalMonthsExport;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StatisticalController extends Controller
{
    public function index(Request $request)
    {
        $day = $request->input('day', now()->format('d'));

        $statisticals = Payment::with('order', 'user')->paginate(5);
        //day
        $date = $request->input('date', now()->format('Y-m-d'));
        $month = $request->input('month', now()->format('m'));
        $year = $request->input('year', now()->format('Y'));

        $month1 = $request->input('month1', now()->format('m'));
        $year1 = $request->input('year1', now()->format('Y'));
        $month2 = $request->input('month2', now()->format('m'));
        $year2 = $request->input('year2', now()->format('Y'));
        // Ngày đầu và ngày cuối của tháng hiện tại

        $firstDayOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $lastDayOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();
        $firstDayOfMonth1 = Carbon::createFromDate($year1, $month1, 1)->startOfMonth();
        $lastDayOfMonth1 = Carbon::createFromDate($year1, $month1, 1)->endOfMonth();
        $firstDayOfMonth2 = Carbon::createFromDate($year2, $month2, 1)->startOfMonth();
        $lastDayOfMonth2 = Carbon::createFromDate($year2, $month2, 1)->endOfMonth();
        // Lọc dữ liệu theo ngày
        $statisticalsdates = Payment::whereDate('payment_date', $date)
            ->orderBy('payment_date', 'desc')
            ->paginate(5);

        // Lọc dữ liệu theo tháng
        $statisticalmonths = Payment::whereBetween('payment_date', [$firstDayOfMonth, $lastDayOfMonth])
            ->orderBy('payment_date', 'desc')
            ->paginate(5);

        // Tính tổng doanh thu
        $totalRevenueday = $statisticalsdates->sum('total_amount');
        $totalRevenuemonth = $statisticalmonths->sum('total_amount');
        $totalRevenue = Payment::sum('total_amount');

        // Lấy dữ liệu cho tháng hiện tại
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');
        $firstDayOfCurrentMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
        $lastDayOfCurrentMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->endOfMonth();
        $currentMonthRevenue = Payment::whereBetween('payment_date', [$firstDayOfCurrentMonth, $lastDayOfCurrentMonth])
            ->sum('total_amount');

        // Tính chênh lệch phần trăm
        $percentageDifference = 0;
        if ($currentMonthRevenue > 0) {
            $percentageDifference = (($totalRevenuemonth - $currentMonthRevenue) / $currentMonthRevenue) * 100;
        }


        $revenueMonth1 = Payment::whereBetween('payment_date', [$firstDayOfMonth1, $lastDayOfMonth1])
        ->sum('total_amount');
        $revenueMonth2 = Payment::whereBetween('payment_date', [$firstDayOfMonth2, $lastDayOfMonth2])
        ->sum('total_amount');
        $percentageDifferenceMonth = 0;
        if ($revenueMonth2 > 0) {
            $percentageDifferenceMonth = (($revenueMonth1 - $revenueMonth2) / $revenueMonth2) * 100;
        }
        return view('admin.statistical.index', compact('month2','year2','year1','month1','statisticals', 'totalRevenue', 'statisticalsdates', 'date', 'totalRevenueday', 'statisticalmonths', 'year', 'month', 'totalRevenuemonth', 'day','currentMonthRevenue',
        'percentageDifference','percentageDifferenceMonth'));

    }
    public function revenueChart(Request $request)
    {
        // Lấy dữ liệu tổng doanh thu theo từng ngày
        $revenueData = Payment::select(DB::raw('DATE(payment_date) as date'), DB::raw('SUM(total_amount) as total'))
            ->groupBy(DB::raw('DATE(payment_date)'))
            ->get();

        // Tạo mảng dữ liệu cho biểu đồ
        $labels = $revenueData->pluck('date')->toArray();
        $data = $revenueData->pluck('total')->toArray();

        // Trả về dữ liệu dưới dạng JSON để sử dụng trong biểu đồ
        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    public function export(Request $request)
    {
        $statisticals = Payment::get();
        $totalRevenue = Payment::sum('total_amount');

        return Excel::download(new StatisticalExport($statisticals, $totalRevenue), 'payments.xlsx');
    }

    public function exportStatisticalDates(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));
        $statisticalsdates = Payment::whereDate('payment_date', $date)
            ->orderBy('payment_date', 'desc')
            ->get();

        $totalRevenueday = $statisticalsdates->sum('total_amount');

        return Excel::download(new StatisticalDatesExport($statisticalsdates, $totalRevenueday), 'statistical_days.xlsx');
    }
    public function exportStatisticalMonths(Request $request)
    {
        $day = $request->input('day', now()->format('d'));
        $month = $request->input('month', now()->format('m'));
        $year = $request->input('year', now()->format('Y'));

        // Create start and end dates for the month
        $firstDayOfMonth = \Carbon\Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $lastDayOfMonth = \Carbon\Carbon::createFromDate($year, $month, 1)->endOfMonth();

        // Fetch payments for the month
        $statisticalmonths = Payment::whereBetween('payment_date', [$firstDayOfMonth, $lastDayOfMonth])
            ->orderBy('payment_date', 'desc')
            ->get();

        // Calculate total revenue for the month
        $totalRevenuemonth = $statisticalmonths->sum('total_amount');

        return Excel::download(new StatisticalMonthsExport($statisticalmonths, $totalRevenuemonth, $month, $year), 'statistical_months.xlsx');
    }
    public function filter(Request $request)
    {
        $month = $request->input('month', now()->format('m'));
        $year = $request->input('year', now()->format('Y'));

        try {
            // Get the first and last days of the selected month
            $firstDayOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $lastDayOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

            // Fetch payments and calculate total revenue for the selected month
            $statisticalmonths = Payment::whereBetween('payment_date', [$firstDayOfMonth, $lastDayOfMonth])
                ->orderBy('payment_date', 'desc')
                ->paginate(5);

            $totalRevenuemonth = $statisticalmonths->sum('total_amount');

            // Get the current month and year
            $currentMonth = now()->format('m');
            $currentYear = now()->format('Y');

            // Get the first and last days of the current month
            $firstDayOfCurrentMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
            $lastDayOfCurrentMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->endOfMonth();

            // Fetch payments and calculate total revenue for the current month
            $currentMonthRevenue = Payment::whereBetween('payment_date', [$firstDayOfCurrentMonth, $lastDayOfCurrentMonth])
                ->sum('total_amount');

            // Calculate percentage difference
            $percentageDifference = 0;
            if ($currentMonthRevenue > 0) {
                $percentageDifference = (($totalRevenuemonth - $currentMonthRevenue) / $currentMonthRevenue) * 100;
            }

            // Map the paginated data
            $data = $statisticalmonths->map(function ($item, $index) use ($statisticalmonths) {
                return [
                    'index' => $statisticalmonths->firstItem() + $index,
                    'order_code' => $item->order->code_order,
                    'customer_name' => $item->order->name,
                    'payment_date' => \Carbon\Carbon::parse($item->payment_date)->format('d-m-Y'),
                    'payment_method' => $item->payment_method,
                    'total_amount' => number_format($item->total_amount) . ' VNĐ',
                ];
            });

            return response()->json([
                'data' => $data,
                'pagination' => $statisticalmonths->links()->toHtml(),
                'total_revenue' => number_format($totalRevenuemonth) . ' VNĐ',
                'current_month_revenue' => number_format($currentMonthRevenue) . ' VNĐ',
                'percentage_difference' => number_format($percentageDifference),
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
    public function filterSoDoanhThuThang(Request $request)
    {
        // Lấy tháng và năm từ yêu cầu
        $month1 = $request->input('month1', now()->format('m'));
        $year1 = $request->input('year1', now()->format('Y'));
        $month2 = $request->input('month2', now()->format('m'));
        $year2 = $request->input('year2', now()->format('Y'));
    
        try {
            // Tính doanh thu cho tháng đầu tiên
            $firstDayOfMonth1 = Carbon::createFromDate($year1, $month1, 1)->startOfMonth();
            $lastDayOfMonth1 = Carbon::createFromDate($year1, $month1, 1)->endOfMonth();
    
            $revenueMonth1 = Payment::whereBetween('payment_date', [$firstDayOfMonth1, $lastDayOfMonth1])
                ->sum('total_amount');
    
            // Tính doanh thu cho tháng thứ hai
            $firstDayOfMonth2 = Carbon::createFromDate($year2, $month2, 1)->startOfMonth();
            $lastDayOfMonth2 = Carbon::createFromDate($year2, $month2, 1)->endOfMonth();
    
            $revenueMonth2 = Payment::whereBetween('payment_date', [$firstDayOfMonth2, $lastDayOfMonth2])
                ->sum('total_amount');
    
            // Tính toán tỷ lệ phần trăm chênh lệch
            $percentageDifferenceMonth = 0;
            if ($revenueMonth2 > 0) {
                $percentageDifferenceMonth = (($revenueMonth1 - $revenueMonth2) / $revenueMonth2) * 100;
            }
    
            return response()->json([
                'revenue_month1' => number_format($revenueMonth1) . ' VNĐ',
                'revenue_month2' => number_format($revenueMonth2) . ' VNĐ',
                'percentage_differenceMonth' => number_format($percentageDifferenceMonth),
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi'], 500);
        }
    }
    

}



