<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AdminStaff;
use App\Http\Requests\Staff\CreateStaffRequest;
use App\Http\Requests\Staff\UpdateStaffRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Lọc người dùng với vai trò 'user' từ bảng users
        $usersQuery = User::where('role', 'user')->orderBy('id', 'desc');
        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $users = $usersQuery->paginate(5);

        // Lọc nhân viên với vai trò 'staff' từ bảng admin_staff
        $staffQuery = AdminStaff::where('role', 'staff')->orderBy('id', 'desc');
        if ($search) {
            $staffQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $staff = $staffQuery->paginate(5);

        // Lọc quản trị viên với vai trò 'admin' từ bảng admin_staff
        $adminQuery = AdminStaff::where('role', 'admin')->orderBy('id', 'desc');
        if ($search) {
            $adminQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $admin = $adminQuery->paginate(5);

        return view('admin.users.list', compact('users', 'staff', 'admin'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateStaffRequest $request)
    {
        // Dữ liệu đã được xác thực thông qua CreateStaffRequest
        $validatedData = $request->validated();

        // Tạo nhân viên mới
        AdminStaff::createStaff($validatedData);

        return redirect()->route('user.list')->with('success', 'Nhân viên đã được tạo thành công.');
    }

    public function edit($id)
    {
        // Tìm nhân viên hoặc admin theo ID
        $user1 = AdminStaff::findOrFail($id);

        // Trả về view chỉnh sửa, truyền biến $user1
        return view('admin.users.edit', compact('user1'));
    }




    // public function update(UpdateUserRequest $request, $id)
    // {
    //     $user = $this->user->findOrFail($id);
    //     $dataUpdate = $request->validated();

    //     $user->updateUser($dataUpdate);
    //     flash()->success('Cập nhật thành công.');
    //     return redirect()->route('user.list');
    // }

    public function update(UpdateStaffRequest $request, $id): mixed
    {
        // Tìm nhân viên hoặc admin cần cập nhật
        $user = AdminStaff::findOrFail($id);
        // dd("Before Update: ", $user->toArray(), "Data to Update:", $request->validated());

        // Cập nhật thông tin nhân viên từ request đã validate
        $user->updateStaff($request->validated());
        // dd("After Update: ", $user->toArray());
        flash()->success('Cập nhật thông tin thành công.');
        return redirect()->route('user.list');
    }





    public function destroy(string $id)
    {
        $user = $this->user->findOrFail($id);
        $user->delete();
        flash()->success('Xóa thành công.');
        return redirect()->route('user.list');
    }

    public function destroyStaff(string $id)
    {
        // Tìm nhân viên theo id trong bảng admin_staff
        $staff = AdminStaff::findOrFail($id);

        // Xóa nhân viên
        $staff->delete();

        // Hiển thị thông báo thành công
        flash()->success('Xóa nhân viên thành công.');

        // Quay lại trang danh sách nhân viên
        return redirect()->route('user.list');
    }
}
