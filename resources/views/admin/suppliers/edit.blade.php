@extends('layouts.admin')

@section('content')

<div class="content-body">
    <div class="container w-50">
        <div class="col-xl-12">
            <div class="card dz-card" id="bootstrap-table1">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-header flex-wrap border-0">
                            <div>
                                <h2 class="card-title">Sửa thông tin nhà cung cấp</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Form chỉnh sửa nhà cung cấp -->
                            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $supplier->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $supplier->address) }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $supplier->phone) }}">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>

                                <a href="{{ route('supplier.list') }}" class="btn btn-primary mt-2 me-1 m-2 float-end">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
