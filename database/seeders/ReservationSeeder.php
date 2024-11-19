<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation; // Import the Reservation model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'user_id' => 1,
                'table_id' => 1,
                'name' => 'John Doe',
                'phone' => '0354233641',
                'seats' => '4',
                'note' => 'Please prepare a birthday cake.',
                'status' => 'confirmed',
                'reservation_date' => '2024-08-10',
                'reservation_time' => '19:00',
            ],
            [
                'user_id' => 2,
                'table_id' => 2,
                'name' => 'Jane Smith',
                'phone' => '0354233642',
                'seats' => '6',
                'note' => 'Allergic to peanuts.',
                'status' => 'pending',
                'reservation_date' => '2024-08-11',
                'reservation_time' => '20:00',
            ],
        ]);
    }
}
