<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dish\CreateDishRequest;
use App\Http\Requests\Dish\UpdateDishRequest;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $price = $request->input('price');
        $dishes = Dish::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    });
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('category_id', $category);
            })
            ->when($price, function ($query) use ($price) {
                $priceRange = explode('-', $price);
                if (count($priceRange) == 2) {
                    return $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
                } elseif ($price == '500000') {
                    return $query->where('price', '>=', 500000);
                }
            })
            ->paginate(5)
            ->appends([
                'search' => $search,
                'category' => $category,
                'price' => $price,
            ]);
        $categories = Category::all();
        return view('admin.dish.list', compact('dishes', 'categories'));
    }

    public function add()
    {
        $categories = Category::getAllCategories();
        return view('admin.dish.add', compact('categories'));
    }

    public function edit($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        $categories = Category::getAllCategories();
        return view('admin.dish.edit', compact('dish', 'categories'));
    }

    public function store(CreateDishRequest $request)
    {
        Dish::createNewDish($request->validated());
        flash()->success('Thêm thành công.');
        return redirect()->route('dish.list');
    }

    // public function store(CreateDishRequest $request)
    // {
    //     // Create the new dish
    //     $dish = Dish::createNewDish($request->validated());

    //     // Flash a success message
    //     flash()->success('Thêm thành công.');

    //     // Redirect to the manage ingredients page for the newly added dish
    //     return redirect()->route('dish.manageIngredients', ['slug' => $dish->slug]);
    // }


    public function update(UpdateDishRequest $request, $slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        $dish->updateDish($request->validated());
        flash()->success('Cập nhật thành công.');
        return redirect()->route('dish.list');
    }

    public function delete($slug)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        $dish->delete();
        flash()->success('Xóa thành công.');
        return redirect()->route('dish.list');
    }


    public function showIngredients($slug)
    {
        $dish = Dish::where('slug', $slug)->with('ingredients')->firstOrFail();
        $ingredients = Ingredient::all(); // Để dùng khi thêm nguyên liệu
        return view('admin.dish.ingredients', compact('dish', 'ingredients'));
    }

    //QUẢN LÝ NGUYÊN LIỆU CỦA MÓN ĂN
    // Hàm hiển thị danh sách nguyên liệu của món ăn
    public function manageIngredients($slug)
    {
        // Find the dish by its slug
        $dish = Dish::where('slug', $slug)->with('ingredients')->firstOrFail();

        // Get IDs of ingredients already associated with this dish
        $existingIngredientIds = $dish->ingredients->pluck('id')->toArray();

        // Get ingredients that are NOT in the existing ingredients list
        $remainingIngredients = Ingredient::whereNotIn('id', $existingIngredientIds)->get();

        return view('admin.dish.ingredients', [
            'dish' => $dish,
            'ingredients' => $remainingIngredients,
        ]);
    }

    public function storeIngredient(Request $request, $slug)
    {
        // Cập nhật validation để yêu cầu nhập giá trị DECIMAL (số thập phân)
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'quantity' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/', // Kiểm tra số thập phân với 2 chữ số sau dấu
        ]);

        $dish = Dish::where('slug', $slug)->firstOrFail();

        // Thêm nguyên liệu với quantity là kiểu số thập phân
        $dish->addIngredient($request->ingredient_id, $request->quantity);

        //-------------------------------------------------------
        app(DishController::class)->updateDishQuantities();

        flash()->success('Thêm nguyên liệu thành công.');
        return redirect()->route('dish.ingredients', $slug);
    }


    public function updateIngredientQuantity(Request $request, $slug, $ingredientId)
    {
        // Cập nhật validation để yêu cầu nhập giá trị DECIMAL (số thập phân)
        $request->validate([
            'quantity' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/', // Kiểm tra số thập phân với 2 chữ số sau dấu
        ]);

        $dish = Dish::where('slug', $slug)->firstOrFail();

        // Cập nhật số lượng nguyên liệu với kiểu dữ liệu DECIMAL
        $dish->updateIngredient($ingredientId, $request->quantity);
        //-------------------------------------------------------
        app(DishController::class)->updateDishQuantities();

        flash()->success('Cập nhật nguyên liệu thành công.');
        return redirect()->route('dish.ingredients', $slug);
    }

    // Hàm xóa nguyên liệu khỏi món ăn
    public function deleteIngredient($slug, $ingredientId)
    {
        $dish = Dish::where('slug', $slug)->firstOrFail();
        $dish->removeIngredient($ingredientId);

        flash()->success('Xóa nguyên liệu thành công.');
        return redirect()->route('dish.ingredients', $slug);
    }

    public function updateDishQuantities()
    {
        // Cập nhật số lượng món ăn trong bảng dishes
        DB::table('dishes')
            ->join(
                DB::raw('(
                    SELECT di.dish_id,
                           MIN(i.quantity / di.quantity) AS max_quantity
                      FROM dishes_ingredients di
                      JOIN ingredients i ON di.ingredient_id = i.id
                      GROUP BY di.dish_id
                ) AS ingredient_availability'),
                'dishes.id',
                '=',
                'ingredient_availability.dish_id'
            )
            ->update(['dishes.quantity' => DB::raw('ingredient_availability.max_quantity')]);

        return response()->json(['message' => 'Quantities updated successfully']);
    }
}