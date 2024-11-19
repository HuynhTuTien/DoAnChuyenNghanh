@extends('layouts.admin')
@section('title', 'Create User')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm người dùng</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên: <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Tên">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email: <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Số điện thoại: <span class="text-danger">*</span></label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone') }}" placeholder="Số điện thoại">
                                        @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Địa chỉ: <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ old('address') }}" placeholder="Địa chỉ">
                                        @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Password: <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            value="{{ old('password') }}" placeholder="Mật khẩu">
                                        @error('password')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quyền: <span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide" name="role" id="role">
                                            <option value="" disabled selected>Chọn quyền</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                                                Người Dùng
                                            </option>
                                            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Nhân viên
                                            </option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                        <a href="{{ route('user.create') }}" class="btn btn-danger">Hủy bỏ</a>
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
