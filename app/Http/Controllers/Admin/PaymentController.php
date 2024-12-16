<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDish;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(5);
        return view('admin.payment.index', compact('payments'));
    }

    // Trong TableBookController

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $reservation = Reservation::findOrFail($request->reservation_id);

            // Tạo đơn hàng mới
            $order = Order::create([
                // 'user_id' => $reservation->user_id,
                'name' => $reservation->name,
                'note' => $reservation->note,
                'code_order' => 'DH-' . strtoupper(str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT)),
                'status' => 'Đã thanh toán',
                'order_date' => now(),
                'order_time' => now(),
            ]);

            // Thêm món ăn vào OrderDish
            $dishes = $reservation->dishes;

            foreach ($dishes as $dish) {
                OrderDish::create([
                    'order_id' => $order->id,
                    'dish_id' => $dish->id,
                    'quantity' => $dish->pivot->quantity,
                ]);
            }


            // Lưu thông tin thanh toán vào bảng Payment
            Payment::create([
                'order_id' => $order->id,
                // 'user_id' => $reservation->user_id,
                'payment_date' => now(),
                'payment_method' => $request->payment_method,
                'total_amount' => $request->total_amount,
            ]);

            // Cập nhật trạng thái đặt bàn
            $reservation->update(['status' => 'Đã thanh toán']);

            DB::commit();
            // Set a session variable to show the print modal
            session()->flash('print_receipt', $order);

            flash()->success('Thanh toán thành công.');
            return redirect()->route('table-book.list');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }

    


    

}
