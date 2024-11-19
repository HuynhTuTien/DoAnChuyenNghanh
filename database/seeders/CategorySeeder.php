<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Pizza', 'image' => 'pizza.png'],
            ['name' => 'Burger', 'image' => 'burger.png'],
            ['name' => 'Chicken', 'image' => 'chicken.png'],
            ['name' => 'Drinks', 'image' => 'drinks.png'],
            ['name' => 'Desserts', 'image' => 'desserts.png'],
            ['name' => 'Pasta', 'image' => 'pasta.png'],
            ['name' => 'Salad', 'image' => 'salad.png'],
            ['name' => 'Seafood', 'image' => 'seafood.png'],
            ['name' => 'Sushi', 'image' => 'sushi.png'],
            ['name' => 'Steak', 'image' => 'steak.png'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'image' => $category['image'],
            ]);
        }
    }
}
