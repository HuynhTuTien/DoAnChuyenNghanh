<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    public function run()
    {

        // Thêm dữ liệu mẫu
        $payments = [
            [
                'order_id' => 2,
                'user_id' => 1,
                'payment_date' => Carbon::now(),
                'payment_method' => 'vnpay',
                'total_amount' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 3,
                'user_id' => 2,
                'payment_date' => Carbon::now(),
                'payment_method' => 'restaurant',
                'total_amount' => 35000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 4,
                'user_id' => 3,
                'payment_date' => Carbon::now(),
                'payment_method' => 'restaurant',
                'total_amount' => 35000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 5,
                'user_id' => 4,
                'payment_date' => Carbon::now(),
                'payment_method' => 'restaurant',
                'total_amount' => 35000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 6,
                'user_id' => 5,
                'payment_date' => Carbon::now(),
                'payment_method' => 'restaurant',
                'total_amount' => 35000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 1,
                'user_id' => 6,
                'payment_date' => Carbon::now(),
                'payment_method' => 'restaurant',
                'total_amount' => 35000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Thêm các bản ghi khác tương tự ở đây
        ];

        // Sử dụng create để thêm từng bản ghi vào bảng Payments
        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
