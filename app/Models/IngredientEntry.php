<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientEntry extends Model
{
    use HasFactory;

    protected $table = 'ingredient_supplier'; // Chỉ định tên bảng

    protected $fillable = ['ingredient_id', 'supplier_id', 'quantity', 'unit', 'price'];

    // Quan hệ với Ingredient và Supplier
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
