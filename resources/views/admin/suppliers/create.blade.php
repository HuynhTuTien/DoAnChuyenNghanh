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
                                <h2 class="card-title">Thêm nhà cung cấp mới</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Form thêm nhà cung cấp -->
                            <form action="{{ route('supplier.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Thêm nhà cung cấp</button>

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
