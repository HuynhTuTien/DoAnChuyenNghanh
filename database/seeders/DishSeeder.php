<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dish;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy tất cả các danh mục
        $categories = Category::all();

        // Lặp qua từng danh mục để tạo sản phẩm
        foreach ($categories as $category) {
            for ($i = 1; $i <= 8; $i++) {
                Dish::create([
                    'name' => 'Dish ' . $i . ' for ' . $category->name,
                    'category_id' => $category->id,
                    'slug' => 'dish-' . $i . '-' . Str::slug($category->name),
                    'description' => 'Description for dish ' . $i,
                    'price' => rand(50000, 200000), // Giá ngẫu nhiên giữa 50.000 và 200.000
                    'quantity' => rand(1, 10),
                    'image' => 'dish' . $i . '.png',
                ]);
            }
        }
    }
}
