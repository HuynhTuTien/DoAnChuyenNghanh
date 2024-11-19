<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Thêm dữ liệu mẫu
        $orders = [
            [
                'user_id' => 1,
                'table_id' => 1,
                'promotion_id' => 1,
                'name' => 'Order 1',
                'note' => 'Note for order 1',
                'status' => 'đang xử lý',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'table_id' => 2,
                'promotion_id' => 2,
                'name' => 'Order 2',
                'note' => 'Note for order 2',
                'status' => 'đã thanh toán',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'table_id' => 3,
                'promotion_id' => 3,
                'name' => 'Order 3',
                'note' => 'Note for order 3',
                'status' => 'đã thanh toán',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'table_id' => 3,
                'promotion_id' => 3,
                'name' => 'Order 3',
                'note' => 'Note for order 3',
                'status' => 'đã thanh toán',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'table_id' => 4,
                'promotion_id' => 1,
                'name' => 'Order 4',
                'note' => 'Note for order 4',
                'status' => 'đã thanh toán',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'table_id' => 5,
                'promotion_id' => 2,
                'name' => 'Order 5',
                'note' => 'Note for order 5',
                'status' => 'đã thanh toán',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'table_id' => 6,
                'promotion_id' => 3,
                'name' => 'Order 6',
                'note' => 'Note for order 6',
                'status' => 'đã thanh toán',
                'order_date' => Carbon::now()->format('Y-m-d'),
                'order_time' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Thêm các bản ghi khác tương tự ở đây
        ];

        // Sử dụng Eloquent để thêm từng bản ghi vào bảng orders
        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
