<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'dish_id',
        'promotion_id',
        'quantity',
        'total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public static function getTotalPrice($userId)
    {
        $carts = self::where('user_id', $userId)->with(['dish', 'promotion'])->get();

        $totalPrice = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->dish->price;
        });

        $discount = $carts->whereNotNull('promotion')->sum(function ($cart) {
            return $cart->promotion->discount ?? 0;
        });

        return [
            'totalPrice' => $totalPrice,
            'totalPriceAfterDiscount' => $totalPrice - $discount
        ];
    }

    public static function addToCart($userId, $productId, $quantity)
    {
        $product = Dish::find($productId);
        if (!$product) {
            return ['error' => 'Sản phẩm không tồn tại.'];
        }
        if ($product->quantity <= 0) {
            return ['error' => 'Đã hết món vui lòng quay lại sau.'];
        }

        if ($product->quantity < $quantity) {
            return ['error' => 'Số lượng sản phẩm không đủ. Vui lòng chọn số lượng khác.'];
        }

        $cartItem = self::where('user_id', $userId)
            ->where('dish_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->total_price = $cartItem->quantity * $product->price;
            $cartItem->save();
        } else {
            self::create([
                'user_id' => $userId,
                'dish_id' => $productId,
                'quantity' => $quantity,
                'total_price' => $product->price * $quantity,
            ]);
        }

        return ['success' => 'Sản phẩm đã được thêm vào giỏ hàng!'];
    }

    public static function applyDiscount($userId, $code)
    {
        $promotion = Promotion::where('code', $code)
            ->where('status', 'active')
            ->where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->first();

        if (!$promotion || $promotion->number_use <= 0) {
            return ['error' => 'Mã giảm giá không hợp lệ hoặc đã hết số lần sử dụng.'];
        }

        $cartItems = self::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return ['error' => 'Giỏ hàng của bạn đang trống. Hãy chọn món trước khi áp dụng mã giảm giá.'];
        }

        $total = $cartItems->sum(function ($cartItem) {
            return $cartItem->dish->price * $cartItem->quantity;
        });

        $total = max(0, $total - $promotion->discount);

        foreach ($cartItems as $cartItem) {
            $cartItem->promotion_id = $promotion->id;
            $cartItem->save();
        }

        return [
            'success' => 'Mã giảm giá đã được áp dụng!',
            'total' => $total,
            'discount' => $promotion->discount
        ];
    }

    public static function updateCart($userId, $cartData)
    {
        $total = 0;
        $promotionDiscount = 0;

        foreach ($cartData as $dishId => $quantity) {
            $cartItem = self::where('user_id', $userId)
                ->where('dish_id', $dishId)
                ->first();

            if ($quantity <= 0) {
                return ['error' => 'Số lượng món ăn phải lớn hơn 0.'];
            }

            if ($cartItem) {
                $dish = $cartItem->dish;
                if ($quantity > $dish->quantity) {
                    return ['error' => 'Số lượng món ăn vượt quá số lượng có sẵn.'];
                }

                $cartItem->quantity = $quantity;
                $cartItem->total_price = $quantity * $dish->price;
                $cartItem->save();

                $total += $cartItem->total_price;
            }
        }

        $cartItemWithPromotion = self::where('user_id', $userId)
            ->whereNotNull('promotion_id')
            ->first();

        if ($cartItemWithPromotion) {
            $promotion = $cartItemWithPromotion->promotion;

            if ($promotion) {
                $promotionDiscount = $promotion->discount;
                $total = max(0, $total - $promotionDiscount);
            }
        }

        return [
            'success' => 'Giỏ hàng đã được cập nhật!',
            'total' => $total,
            'discount' => $promotionDiscount
        ];
    }

    public static function clearCart($userId)
    {
        self::where('user_id', $userId)->delete();
        return ['success' => 'Giỏ hàng đã được làm sạch!'];
    }
}
