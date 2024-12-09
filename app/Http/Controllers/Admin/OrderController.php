<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDish;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Picqer\Barcode\BarcodeGeneratorHTML;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // Nếu có giá trị tìm kiếm
        // Khởi tạo query builder với các mối quan hệ
        $query = Order::with(['user', 'dishes', 'payments']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                    ->orWhere('code_order', 'like', "%{$search}%");
            });
        }

        // Sắp xếp các đơn hàng đã thanh toán lên trên và theo thứ tự mới nhất xuống dưới
        $query->orderByRaw('CASE WHEN status = "đã thanh toán" THEN 1 ELSE 2 END, created_at DESC');

        // Lấy các đơn hàng phù hợp với tiêu chí tìm kiếm
        $orders = $query->get();

        return view('admin.order.index', compact('orders'));
    }

    public function show(string $id)
    {
        $order = Order::with(['user', 'dishes', 'payments', 'promotion'])->findOrFail($id);

        return view('admin.order.detail.detail', compact('order'));
    }


    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
    {
        // Validate trạng thái
        $request->validate([
            'status' => 'required|in:tiếp nhận đơn,đang xử lý,đang vận chuyển,hoàn thành,đã hủy',
        ]);

        $order = Order::with(['dishes.ingredients'])->findOrFail($id);

        // Kiểm tra nếu trạng thái chuyển sang "hoàn thành"
        if ($request->status === 'hoàn thành' && $order->status !== 'hoàn thành') {
            foreach ($order->dishes as $dish) {
                // Trừ số lượng món ăn
                $dish->decrement('quantity', $dish->pivot->quantity);

                // Trừ số lượng nguyên liệu cần thiết
                foreach ($dish->ingredients as $ingredient) {
                    $quantityNeeded = $ingredient->pivot->quantity * $dish->pivot->quantity;

                    // Kiểm tra nếu số lượng nguyên liệu trong kho đủ
                    if ($ingredient->quantity < $quantityNeeded) {
                        return redirect()->route('admin.order.show', ['id' => $id])
                            ->with('error', "Không đủ nguyên liệu: {$ingredient->name} trong kho.");
                    }

                    // Trừ số lượng nguyên liệu
                    $ingredient->decrement('quantity', $quantityNeeded);

                    //-------------------------------------------------------
                    app(DishController::class)->updateDishQuantities();
                }
            }
        }

        // Cập nhật trạng thái đơn hàng
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.show', ['id' => $id])
            ->with('success', 'Trạng thái đơn hàng đã được cập nhật!');
    }


    public function generatePdf($id)
    {
        $order = Order::with(['user', 'dishes', 'payments', 'promotion'])->findOrFail($id);

        // Tính toán tổng số tiền
        $totalAmount = $order->dishes->sum(function ($dish) {
            return $dish->price * $dish->pivot->quantity;
        });

        // Tạo mã vạch từ code_order
        $generator = new BarcodeGeneratorHTMl();
        $barcode = $generator->getBarcode($order->code_order, $generator::TYPE_CODE_128);

        // Tạo instance của PDF
        $pdf = App::make(PDF::class); // Sử dụng App::make để tạo instance của PDF

        // Tạo PDF
        $pdf->loadView('admin.order.pdf', compact('order', 'totalAmount', 'barcode'));

        // Trả về file PDF cho người dùng tải về
        // return $pdf->download('invoice_' . $order->id . '.pdf');

        // Gửi file PDF trực tiếp cho trình duyệt để mở hộp thoại in
        return $pdf->stream('invoice.pdf');
    }
}
