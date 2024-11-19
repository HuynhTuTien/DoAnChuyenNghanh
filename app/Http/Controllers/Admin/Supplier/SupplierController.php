<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // Hiển thị danh sách nhà cung cấp
    public function index()
    {
        // Lấy tất cả các nhà cung cấp từ database
        $suppliers = Supplier::all(); // Hoặc có thể dùng paginate() nếu bạn muốn phân trang

        // Truyền biến $suppliers vào view
        return view('admin.suppliers.index', compact('suppliers'));
    }

    // Hiển thị form tạo nhà cung cấp mới
    public function create()
    {
        return view('admin.suppliers.create'); // Sử dụng đúng đường dẫn view
    }

    // Lưu nhà cung cấp mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name',
            'email' => 'nullable|email|max:255|unique:suppliers,email',
            'address' => 'nullable|string|max:255|unique:suppliers,address',
            'phone' => 'nullable|string|max:11|unique:suppliers,phone',
        ], [
            'name.unique' => 'Nhà cung cấp đã tồn tại.',
            'email.unique' => 'Email này đã được sử dụng.',
            'address.unique' => 'Địa chỉ nhà cung cấp này đã có trong hệ thống.',
            'phone.unique' => 'Số điện thoại này đã được đăng ký.',
        ]);

        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('supplier.list')->with('success', 'Nhà cung cấp đã được thêm.');
    }

    // Hiển thị chi tiết một nhà cung cấp
    public function show(Supplier $supplier)
    {
        return view('admin.suppliers.show', compact('supplier'));
    }

    // Hiển thị form chỉnh sửa nhà cung cấp
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    // Cập nhật thông tin nhà cung cấp
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name,' . $supplier->id,
            'email' => 'nullable|email|max:255|unique:suppliers,email,' . $supplier->id,
            'address' => 'nullable|string|max:255|unique:suppliers,address,' . $supplier->id,
            'phone' => 'nullable|string|max:11|unique:suppliers,phone,' . $supplier->id,
        ], [
            'name.unique' => 'Nhà cung cấp đã tồn tại.',
            'email.unique' => 'Email này đã được sử dụng.',
            'address.unique' => 'Địa chỉ nhà cung cấp này đã có trong hệ thống.',
            'phone.unique' => 'Số điện thoại này đã được đăng ký.',
        ]);

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('supplier.list')->with('success', 'Thông tin nhà cung cấp đã được cập nhật.');
    }

    public function destroy(Request $request, $id)
    {
        $Supplier = Supplier::findOrFail($id);


        $Supplier->delete();

        flash()->success('Nhà cung cấp đã được xóa thành công.');
        return redirect()->route('supplier.list');
    }
}