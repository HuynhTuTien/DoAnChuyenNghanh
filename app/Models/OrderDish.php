<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDish extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $table = 'order_dish';

    protected $fillable = [
        'order_id',
        'dish_id',
        'quantity'
    ];
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
