@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa người dùng</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user.update', $user1->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Tên -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $user1->name) }}" placeholder="Tên" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email', $user1->email) }}" placeholder="Email" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Số điện thoại -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone', $user1->phone) }}" placeholder="Số điện thoại" required>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ old('address', $user1->address) }}" placeholder="Địa chỉ" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Ngày sinh -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Ngày sinh</label>
                                        <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control"
                                            value="{{ old('ngay_sinh', $user1->ngay_sinh) }}">
                                        @error('ngay_sinh')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Căn cước -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Căn cước</label>
                                        <input type="text" name="can_cuoc" id="can_cuoc" class="form-control"
                                            value="{{ old('can_cuoc', $user1->can_cuoc) }}">
                                        @error('can_cuoc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Quê quán -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Quê quán</label>
                                        <input type="text" name="que_quan" id="que_quan" class="form-control"
                                            value="{{ old('que_quan', $user1->que_quan) }}">
                                        @error('que_quan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Chức vụ -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" name="chuc_vu" id="chuc_vu" class="form-control"
                                            value="{{ old('chuc_vu', $user1->chuc_vu) }}">
                                        @error('chuc_vu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Password (nếu thay đổi password) -->
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Password: <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            value="{{ old('password') }}" placeholder="Mật khẩu" autocomplete="new-password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Role -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Quyền: <span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide" name="role" id="role" required>
                                            <option value="admin"
                                                {{ old('role', $user1->role) == 'admin' ? 'selected' : '' }}>Admin</option>

                                            <option value="staff"
                                                {{ old('role', $user1->role) == 'staff' ? 'selected' : '' }}>Nhân viên</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Hoạt động -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Hoạt động: <span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide" name="active" id="active" required>
                                            <option value="active"
                                                {{ old('active', $user1->active) == 'active' ? 'selected' : '' }}>Hoạt động
                                            </option>
                                            <option value="inactive"
                                                {{ old('active', $user1->active) == 'inactive' ? 'selected' : '' }}>Không
                                                hoạt động</option>
                                        </select>
                                        @error('active')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        <a href="{{ route('user.list') }}" class="btn btn-danger">Hủy bỏ</a>
                                    </div>
                                </div>
                            </form>
                            {{-- <a href="{{ route('user.list') }}" class="btn btn-danger">Hủy bỏ</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
