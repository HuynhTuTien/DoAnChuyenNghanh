<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientEntry extends Model
{
    use HasFactory;
    // public $timestamps = false;

    public function setUpdatedAt($value)
    {
        return null;  // Trả về null để không thay đổi updated_at
    }

    protected $table = 'ingredient_supplier';

    protected $fillable = [
        'ingredient_id',
        'supplier_id',
        'price',
        'quantity',
        'unit',
        'total_price'
    ];

    // Thuộc tính cho tổng tiền (được tính tự động)
    protected $appends = ['total_price'];

    // Hàm tính tổng tiền
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }
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
