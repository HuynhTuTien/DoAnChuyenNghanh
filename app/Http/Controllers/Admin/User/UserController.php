<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Lọc người dùng với vai trò 'user'
        $usersQuery = User::where('role', 'user')->orderBy('created_at', 'desc');
        if ($search) {
            $usersQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $users = $usersQuery->paginate(5);

        // Lọc nhân viên với vai trò 'staff'
        $staffQuery = User::where('role', 'staff')->orderBy('created_at', 'desc');
        if ($search) {
            $staffQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $staff = $staffQuery->paginate(5);

        // Lọc quản trị viên với vai trò 'admin'
        $adminQuery = User::where('role', 'admin')->orderBy('created_at', 'desc');
        if ($search) {
            $adminQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $admin = $adminQuery->paginate(5);
        return view('admin.users.list', compact('users', 'staff', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $dataCreate = $request->validated();
        $user = $this->user->createUser($dataCreate);
        flash()->success('Tạo người dùng thành công.');
        return redirect()->route('user.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user1 = $this->user->findOrFail($id);
        // dd($user);
        return view('admin.users.edit', compact('user1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $dataUpdate = $request->validated();

        $user->updateUser($dataUpdate);
        flash()->success('Cập nhật thành công.');
        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->user->findOrFail($id);
        $user->delete();
        flash()->success('Xóa thành công.');
        return redirect()->route('user.list');
    }
}
