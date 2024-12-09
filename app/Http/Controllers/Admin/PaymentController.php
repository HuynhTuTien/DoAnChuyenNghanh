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

    public function vnpay(Request $request)
    {
        // Lấy thông tin giỏ hàng
        $orderId = $request->input('order_id');
        $order = Order::findOrFail($orderId);
        $amount = $order->total_amount; // Tổng số tiền cần thanh toán

        // Thông tin VNPay
        $vnp_TmnCode = "YOUR_VNPAY_MERCHANT_CODE"; // Mã của Merchant
        $vnp_HashSecret = "YOUR_VNPAY_API_SECRET"; // API Secret của VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vnpay.krn"; // URL thanh toán của VNPay (URL sandbox hoặc URL chính thức)
        $vnp_ReturnUrl = route('payment.vnpay.return'); // URL nhận kết quả thanh toán từ VNPay

        // Dữ liệu thanh toán
        $vnp_TxnRef = Carbon::now()->format('YmdHis'); // Sử dụng thời gian hiện tại để tạo số tham chiếu giao dịch
        $vnp_Amount = $amount * 100; // VNPay yêu cầu số tiền tính bằng đồng (VNĐ)

        // Dữ liệu cần gửi đến VNPay
        $inputData = array(
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => Carbon::now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_OrderInfo" => "Thanh toán đơn hàng #" . $order->id,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_Locale" => "vn",
            "vnp_IpAddr" => $request->ip(),
        );

        // Thêm chữ ký vào dữ liệu
        $inputData['vnp_SecureHash'] = $this->generateVnPaySecureHash($inputData, $vnp_HashSecret);

        // Chuyển hướng người dùng đến VNPay
        $url = $vnp_Url . '?' . http_build_query($inputData);
        return Redirect::to($url);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_TmnCode = "YOUR_VNPAY_MERCHANT_CODE";
        $vnp_HashSecret = "YOUR_VNPAY_API_SECRET";

        $inputData = $request->all();
        $secureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        // Kiểm tra chữ ký trả về từ VNPay
        $isValid = $this->verifyVnPaySecureHash($inputData, $secureHash, $vnp_HashSecret);

        if ($isValid) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                // Thanh toán thành công
                $order = Order::where('vnp_TxnRef', $inputData['vnp_TxnRef'])->first();
                if ($order) {
                    $order->status = 'Đã thanh toán';
                    $order->save();
                    return view('payment.success', compact('order'));
                }
            } else {
                // Thanh toán thất bại
                return view('payment.fail');
            }
        } else {
            // Chữ ký không hợp lệ
            return view('payment.fail');
        }
    }

    // Hàm tạo chữ ký để gửi đến VNPay
    private function generateVnPaySecureHash($data, $vnp_HashSecret)
    {
        unset($data['vnp_SecureHash']);
        ksort($data);
        $query = http_build_query($data);
        $query = urldecode($query);
        $secureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
        return $secureHash;
    }

    // Hàm xác minh chữ ký từ VNPay
    private function verifyVnPaySecureHash($data, $secureHash, $vnp_HashSecret)
    {
        unset($data['vnp_SecureHash']);
        ksort($data);
        $query = http_build_query($data);
        $query = urldecode($query);
        $generatedSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
        return $generatedSecureHash === $secureHash;
    }
}
