<?php

namespace App\Http\Controllers\Client\Dish;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Dish;
use App\Models\Review;
use App\Http\Controllers\Client\Review\ReviewController;

class DishController extends Controller
{
    public function dishDetail($id)
    {
        $dishDetail = Dish::findOrFail($id);

        $categoryId = $dishDetail->category_id;
        $category = Category::find($categoryId);

        // Lấy các món ăn liên quan trong cùng một danh mục, loại bỏ món hiện tại
        $relatedDishes = $category ? $category->dishes()->where('id', '!=', $id)->limit(4)->get() : [];

        $dish = Dish::findOrFail($id);
        $reviews = Review::where('dish_id', $id)->get();

        return view('clients.food.dish_detail',compact('dishDetail','relatedDishes', 'reviews'));
    }

    public function menu()
    {
        // Sử dụng Eloquent để lấy danh mục và món ăn liên quan
        $categories = Category::with('dishes')->limit(5)->get();

        return view('clients.food.menu', compact('categories'));
    }

    public function dishCategories()
    {
        // Lấy tất cả danh mục và sản phẩm tương ứng của từng danh mục
        $categories = Category::with('dishes')->orderBy('created_at', 'desc')->limit(4)->get();

        return view('clients.food.menu', compact('categories'));
    }
}
