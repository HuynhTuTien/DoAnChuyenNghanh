<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit', 'quantity'];

    // Hàm để tính toán lại số lượng nguyên liệu khi nhập
    public function updateQuantity($quantity)
    {
        $this->quantity += $quantity;
        $this->save();
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dishes_ingredients')
            ->withPivot('quantity')
            ->withTimestamps();
    }


    // Trong Model Dish hoặc Ingredient
    public function addIngredient($ingredientId, $quantity)
    {
        // Chuyển đổi quantity thành kiểu DECIMAL(10, 2) trước khi lưu vào DB
        $quantity = number_format($quantity, 2, '.', '');

        $this->ingredients()->attach($ingredientId, ['quantity' => $quantity]);
    }

    public function updateIngredient($ingredientId, $quantity)
    {
        // Chuyển đổi quantity thành kiểu DECIMAL(10, 2) trước khi cập nhật vào DB
        $quantity = number_format($quantity, 2, '.', '');

        $this->ingredients()->updateExistingPivot($ingredientId, ['quantity' => $quantity]);
    }
}
