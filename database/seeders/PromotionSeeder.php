<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promotions')->insert([
            [
                'code' => 'PROMO10',
                'discount' => 10000,
                'number_use' => 100,
                'describe' => 'Giảm giá 10000đ',
                'status' => 'active',
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'PROMO20',
                'discount' => 20000,
                'number_use' => 50,
                'describe' => 'Giảm giá 20000đ',
                'status' => 'active',
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addDays(30),
            ],
            [
                'code' => 'PROMO30',
                'discount' => 30000,
                'number_use' => 20,
                'describe' => 'Giảm giá 30000đ',
                'status' => 'active',
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addDays(30),
            ],
        ]);
    }
}
