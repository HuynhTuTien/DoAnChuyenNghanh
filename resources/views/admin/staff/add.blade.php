@extends('layouts.admin')
@section('title','add staff')
@section('content')	
        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <div class="container">
				
                <!-- row -->
                <div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm nhân viên</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('staff.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tên</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control">
                                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Hình ảnh</label>
                                            <div class="col-sm-9">
                                                <input type="file"  name="image" id="image-input" class="form-control">
                                                <img src="" id="image-preview" alt="" class="img-fluid mt-3" width="75px" height="100px" style="display: none;">
                                                
                                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Số điện thoại</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="phone" class="form-control" >
                                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Địa chỉ</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control" >
                                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Chức vị</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="position" class="form-control" >
                                                @error('position') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Lương</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="salary" class="form-control" >
                                                @error('salary') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>
										{{-- <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Thời gian tạo</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" >
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Thời gian cập nhật</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" >
                                            </div>
                                        </div> --}}
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
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
</div>
@endsection

@push('script')
<script>
    document.getElementById('image-input').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('image-preview').src = event.target.result;
            document.getElementById('image-preview').style.display = 'block'; // show the img element
        };
        reader.readAsDataURL(file);
    });
</script>
@endpush