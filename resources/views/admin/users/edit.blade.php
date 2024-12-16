@extends('layouts.admin')

@section('title', 'Edit Staff')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa Nhân Viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user.update', $user1->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Tên -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $user1->name) }}" required>
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user1->email) }}" required>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Số điện thoại -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user1->phone) }}">
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" value="{{ old('address', $user1->address) }}">
                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Căn cước -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Căn cước</label>
                                        <input type="text" name="can_cuoc" class="form-control" value="{{ old('can_cuoc', $user1->can_cuoc) }}">
                                        @error('can_cuoc') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Quê Quán</label>
                                        <input type="text" name="que_quan" class="form-control" value="{{ old('que_quan', $user1->que_quan) }}">
                                        @error('que_quan') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Trạng thái</label>
                                        <select name="active" class="form-control">
                                            <option value="active" {{ $user1->active === 'active' ? 'selected' : '' }}>Hoạt động</option>
                                            <option value="inactive" {{ $user1->active === 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                                        </select>
                                        @error('active') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Chức vụ -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" name="chuc_vu" class="form-control" value="{{ old('chuc_vu', $user1->chuc_vu) }}">
                                        @error('chuc_vu') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Mật khẩu -->
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Mật khẩu mới</label>
                                        <input type="password" name="password" class="form-control" placeholder="Để trống nếu không đổi">
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- Nút hành động -->
                                <div>
                                    <a href="{{ route('user.list') }}" class="btn btn-danger">Hủy bỏ</a>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
