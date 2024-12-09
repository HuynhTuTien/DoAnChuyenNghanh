<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Dish extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'quantity',
        'image',
        'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderDishes()
    {
        return $this->hasMany(OrderDish::class);
    }

    public static function createNewDish($validatedData)
    {
        // Lấy đối tượng file hình ảnh
        $file = $validatedData['image'];

        // Tạo tên tệp duy nhất cho ảnh
        $fileName = 'dish_' . time() . '.' . $file->getClientOriginalExtension();

        // Lưu ảnh vào thư mục 'public/images' trong thư mục gốc
        $file->move(public_path('storage/images'), $fileName);

        // Lấy tên file sau khi đã lưu vào thư mục
        $imageName = $fileName;

        return self::create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'image' => $imageName,
            'status' => $validatedData['status'],
        ]);
    }

    public function updateDish($validatedData)
    {
        if (isset($validatedData['image'])) {
            // Lấy đối tượng file hình ảnh
            $file = $validatedData['image'];

            // Tạo tên tệp duy nhất cho ảnh
            $fileName = 'dish_' . time() . '.' . $file->getClientOriginalExtension();

            // Lưu ảnh vào thư mục 'public/storage/images'
            $file->move(public_path('storage/images'), $fileName);

            // Lưu tên file vào mảng validatedData
            $validatedData['image'] = $fileName;
        }

        // Cập nhật slug từ tên món ăn
        $validatedData['slug'] = Str::slug($validatedData['name']);

        // Cập nhật dữ liệu
        return $this->update($validatedData);
    }


    public function decrementQuantity($amount)
    {
        if ($this->quantity >= $amount) {
            $this->quantity -= $amount;
            $this->save();
            return true;
        }
        return false;
    }



    //QUẢN LÝ NGUYÊN LIỆU
    // Quan hệ với nguyên liệu
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'dishes_ingredients')
            ->withPivot('quantity');
    }


    // Thêm nguyên liệu vào món ăn
    public function addIngredient($ingredientId, $quantity)
    {
        return $this->ingredients()->attach($ingredientId, ['quantity' => $quantity]);
    }

    // Cập nhật nguyên liệu của món ăn
    public function updateIngredient($ingredientId, $quantity)
    {
        return $this->ingredients()->updateExistingPivot($ingredientId, ['quantity' => $quantity]);
    }

    // Xóa nguyên liệu khỏi món ăn
    public function removeIngredient($ingredientId)
    {
        return $this->ingredients()->detach($ingredientId);
    }
}
