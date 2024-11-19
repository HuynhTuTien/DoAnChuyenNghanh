@extends('layouts.admin')
@section('title','update staff')
@section('content')
    <!-- Content body start -->
    <div class="content-body">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Cập nhật thông tin nhân viên</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('staff.update', $staffs->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tên</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $staffs->name) }}">
                                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Hình ảnh</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control">
                                            @if ($staffs->image)
                                                <img src="{{ asset('storage/images/'.$staffs->image) }}" alt="" class="img-fluid mt-3" width="75px" height="100px">
                                            @endif
                                            @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="phone" class="form-control" value="{{ old('phone', $staffs->phone) }}">
                                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Địa chỉ</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" class="form-control" value="{{ old('address', $staffs->address) }}">
                                            @error('address') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Chức vị</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="position" class="form-control" value="{{ old('position', $staffs->position) }}">
                                            @error('position') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Lương</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="salary" class="form-control" value="{{ old('salary', $staffs->salary) }}">
                                            @error('salary') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
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
    </div>
@endsection

@push('script')
    <script>
        // Thêm sự kiện change cho input file
        document.querySelector('input[name="image"]').addEventListener('change', function() {
            // Lấy file đã chọn
            var file = this.files[0];
            
            // Tạo URL cho file
            var url = URL.createObjectURL(file);
            
            // Cập nhật thuộc tính src cho thẻ img
            document.querySelector('img.img-fluid').src = url;
        });
    </script>
@endpush
