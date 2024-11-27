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
        'number_use',
        'describe',
        'status',
        'start_time',
        'end_time'
    ];
    protected $dates = ['start_time', 'end_time'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setNumberUseAttribute($value)
    {
        $this->attributes['number_use'] = $value;

        // Cập nhật trạng thái nếu số lần sử dụng bằng 0
        if ($value == 0) {
            $this->attributes['status'] = 'inactive';
        }
    }

    public function isValid()
    {
        // Kiểm tra xem mã giảm giá còn hạn và chưa hết số lần sử dụng
        return $this->expiry_date >= now() && $this->number_use > 0;
    }
}
