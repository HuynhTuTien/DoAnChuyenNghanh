@extends('layouts.admin')
@section('title', 'Thêm khuyến mãi')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12">
                <div class="card dz-card" id="bootstrap-table1">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-header flex-wrap border-0">
                                <div>
                                    <h2 class="card-title">Cập nhật khuyến mãi</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form action="{{ route('promotion.processUpdate', ['id' => $promotion->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Kiểm tra lỗi toàn bộ form -->

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="code" class="form-label">Mã giảm giá</label>
                                                <input type="text" class="form-control" name="code" id="code"
                                                    placeholder="Nhập mã giảm giá"
                                                    value="{{ old('code', $promotion->code) }}" />
                                                <!-- Hiển thị lỗi cho trường code -->
                                                @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="discount" class="form-label">Giá giảm</label>
                                                <input type="text" class="form-control" name="discount" id="discount"
                                                    placeholder="Nhập giá giảm"
                                                    value="{{ old('discount', $promotion->discount) }}" />
                                                <!-- Hiển thị lỗi cho trường discount -->
                                                @error('discount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="number_use" class="form-label">Số lần sử dụng</label>
                                                <input type="text" class="form-control" name="number_use" id="number_use"
                                                    value="{{ old('number_use',$promotion->number_use) }}" />
                                                <!-- Hiển thị lỗi cho trường number_use -->
                                                @error('number_use')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Trạng thái</label>
                                                <select class="default-select form-control wide" name="status" id="status">
                                                    <option value="active" {{ $promotion->status == 'active' ? 'selected' : '' }}>Hoạt động
                                                    </option>
                                                    <option value="inactive" {{ $promotion->status == 'inactive' ? 'selected' : '' }}>Không hoạt động
                                                    </option>
                                                </select>
                                                <!-- Hiển thị lỗi cho trường status -->
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="start_time" class="form-label">Ngày bắt đầu</label>
                                                <input type="date" class="form-control" name="start_time" id="start_time"
                                                    value="{{ $promotion->start_time }}" />
                                                <!-- Hiển thị lỗi cho trường start_time -->
                                                @error('start_time')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="end_time" class="form-label">Ngày kết thúc</label>
                                                <input type="date" class="form-control" name="end_time" id="end_time"
                                                    value="{{  $promotion->end_time }}" />
                                                <!-- Hiển thị lỗi cho trường end_time -->
                                                @error('end_time')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="describe" class="form-label">Mô tả</label>
                                            <textarea name="describe" id="describe" class="form-control" rows="10">{{ old('describe', $promotion->describe) }}</textarea>
                                            <!-- Hiển thị lỗi cho trường describe -->
                                            @error('describe')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
