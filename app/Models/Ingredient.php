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


    // Quan hệ với món ăn
    // public function dishes()
    // {
    //     return $this->belongsToMany(Dish::class, 'dishes_ingredients')
    //         ->withPivot('quantity');  // quantity là số lượng nguyên liệu của món ăn
    // }
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dishes_ingredients')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
