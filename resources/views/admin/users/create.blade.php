@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm nhân viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên: <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Tên">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email: <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Email" autocomplete="off">
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
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Ngày sinh: <span class="text-danger">*</span></label>
                                        <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control"
                                            value="{{ old('ngay_sinh') }}">
                                        @error('ngay_sinh')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Căn cước công dân: <span class="text-danger">*</span></label>
                                        <input type="text" name="can_cuoc" id="can_cuoc" class="form-control"
                                            value="{{ old('can_cuoc') }}" placeholder="Căn cước công dân">
                                        @error('can_cuoc')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Quê quán: <span class="text-danger">*</span></label>
                                        <input type="text" name="que_quan" id="que_quan" class="form-control" value="{{ old('que_quan') }}" placeholder="Quê quán">
                                        @error('que_quan')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Chức vụ: <span class="text-danger">*</span></label>
                                        <input type="text" name="chuc_vu" id="chuc_vu" class="form-control" value="{{ old('chuc_vu') }}" placeholder="Chức vụ">
                                        @error('chuc_vu')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Password: <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            value="{{ old('password') }}" placeholder="Mật khẩu" autocomplete="new-password">
                                        @error('password')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <!-- Quyền -->
                                    @if(auth()->user()->role == 'admin')
                                        <!-- Nếu người dùng hiện tại là admin, cho phép chọn quyền cho người khác -->
                                        <div class="mb-3">
                                            <input type="hidden" name="role" value="staff">
                                        </div>
                                    @else
                                        <!-- Nếu không phải admin, quyền "user" sẽ tự động được gán -->
                                        <input type="hidden" name="role" value="user">
                                    @endif

                                    <div>
                                        <a href="{{ route('user.list') }}" class="btn btn-danger">Hủy bỏ</a>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
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
