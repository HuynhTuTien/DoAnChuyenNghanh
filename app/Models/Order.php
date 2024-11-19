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

    protected $fillable = [
        'promotion_id',
        'user_id',
        'name',
        'note',
        'code_order',
        'status',
        'order_date',
        'order_time',
        'delivery_address', // Cột mới
        'payment_option',   // Cột mới
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

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    public function order_dish()
    {
        return $this->hasMany(OrderDish::class);
    }
}
