<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            ['number' => 1, 'seats' => 6],
            ['number' => 2, 'seats' => 6],
            ['number' => 3, 'seats' => 6],
            ['number' => 4, 'seats' => 6],
            ['number' => 5, 'seats' => 6],
            ['number' => 6, 'seats' => 6],
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
