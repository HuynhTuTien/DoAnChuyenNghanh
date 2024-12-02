<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount',
        'describe',
        'status',
        'start_time',
        'end_time'
    ];

    // Đảm bảo khai báo các trường ngày giờ trong thuộc tính $dates
    protected $dates = ['start_time', 'end_time'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
