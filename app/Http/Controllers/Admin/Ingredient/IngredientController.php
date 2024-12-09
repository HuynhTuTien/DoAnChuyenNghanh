<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Ingredient;
use App\Models\Supplier;
use App\Models\IngredientEntry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DishController;

class IngredientController extends Controller
{
    // Hiển thị danh sách nguyên liệu
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('admin.ingredient.list', compact('ingredients'));
    }

    // Hiển thị form tạo nguyên liệu mới
    public function create()
    {
        return view('admin.ingredient.create');
    }

    // Lưu nguyên liệu mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name', // Kiểm tra trùng tên
            'quantity' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/', // Cho phép quantity có thể null, và mặc định sẽ là 0 nếu không nhập
            'unit' => 'nullable|string|max:20',
        ], [
            'name.unique' => 'Nguyên liệu đã tồn tại.', // Thông báo lỗi khi tên nguyên liệu trùng
        ]);

        // Nếu không có quantity trong request, đặt giá trị mặc định là 0
        $quantity = $request->quantity ?? 0;

        // Tạo mới nguyên liệu
        $ingredient = Ingredient::create([
            'name' => $request->name,
            'quantity' => $quantity, // Sử dụng quantity đã được kiểm tra và gán giá trị mặc định
            'unit' => $request->unit,
        ]);

        return redirect()->route('ingredient.list')->with('success', 'Nguyên liệu đã được thêm.');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredient.edit', compact('ingredient'));
    }

    // Cập nhật nguyên liệu
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name,' . $ingredient->id, // Ensure name is unique except for the current ingredient
            'unit' => 'nullable|string|max:20', // Validate unit
        ], [
            'name.unique' => 'Nguyên liệu đã tồn tại.', // Custom error message for unique name
        ]);

        // Update only name and unit
        $ingredient->update([
            'name' => $request->name,
            'unit' => $request->unit,
        ]);

        return redirect()->route('ingredient.list')->with('success', 'Nguyên liệu đã được cập nhật.');
    }

    public function destroy(Request $request, $id)
    {
        $Ingredient = Ingredient::findOrFail($id);


        $Ingredient->delete();

        flash()->success('Nhà cung cấp đã được xóa thành công.');
        return redirect()->route('ingredient.list');
    }

    // Hiển thị form nhập nguyên liệu từ nhà cung cấp
    public function showEntryForm()
    {
        $ingredients = Ingredient::all();
        $suppliers = Supplier::all();
        return view('admin.ingredient.entry', compact('ingredients', 'suppliers'));
    }

    // Lưu thông tin nhập liệu mới và cập nhật kho
    public function storeEntry(Request $request)
    {
        $request->validate([
            'ingredient_id' => 'required|exists:ingredients,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
            'unit' => 'nullable|string|max:20',
            'price' => 'required|numeric|min:0',
        ]);

        // Tính tổng tiền (quantity * price)
        $totalPrice = $request->quantity * $request->price;

        // Tạo mới bản ghi nhập liệu
        IngredientEntry::create([
            'ingredient_id' => $request->ingredient_id,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'price' => $request->price,
            'total_price' => $totalPrice, // Lưu giá trị tổng tiền
        ]);


        // Cập nhật số lượng trong kho
        $ingredient = Ingredient::find($request->ingredient_id);
        $ingredient->updateQuantity($request->quantity);

        // Gọi phương thức cập nhật số lượng món ăn
        app(DishController::class)->updateDishQuantities();

        return redirect()->route('ingredient.list')->with('success', 'Nguyên liệu đã được nhập thành công!');
    }




    public function showEntryList()
    {
        // Lấy danh sách nhập nguyên liệu từ nhà cung cấp
        $entries = IngredientEntry::with(['ingredient', 'supplier'])->get();

        // Trả về view với danh sách các lần nhập nguyên liệu
        return view('admin.ingredient.entry_list', compact('entries'));
    }
}
