<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'promotion_id',
        'user_id',
        'name',
        'phone_number',
        'note',
        'code_order',
        'status',
        'order_date',
        'order_time',
        'delivery_address',
        'district',
        'ward',
        'payment_option',
        'store_visit_time',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class, 'order_dish')->withPivot('quantity')->withTimestamps();
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function calculateTotalPrice()
    {
        $total = 0;
        foreach ($this->dishes as $dish) {
            $total += $dish->pivot->quantity * $dish->price;
        }
        return $total;
    }

    public function order_dish()
    {
        return $this->hasMany(OrderDish::class);
    }

    public function orderDishes()
    {
        return $this->hasMany(OrderDish::class);
    }
}
