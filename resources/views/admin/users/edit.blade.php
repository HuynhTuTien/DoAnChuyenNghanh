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
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $user1->name) }}" placeholder="Tên">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email', $user1->email) }}" placeholder="Email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone', $user1->phone) }}" placeholder="Số điện thoại">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ old('address', $user1->address) }}" placeholder="Địa chỉ">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Password: <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            value="{{ old('password') }}" placeholder="Mật khẩu">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Quyền: <span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide" name="role" id="role">
                                            <option value="admin"
                                                {{ old('role', $user1->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="user"
                                                {{ old('role', $user1->role) == 'user' ? 'selected' : '' }}>Người Dùng
                                            </option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Hoạt động: <span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide" name="active" id="active">
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
