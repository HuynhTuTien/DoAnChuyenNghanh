@extends('layouts.admin')

@section('title', 'Thêm món ăn')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm món ăn</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('dish.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Chọn danh mục:</label>
                                        <select name="category_id" class="default-select form-control wide">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Tên món ăn</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên món"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Số lượng món</label>
                                        <input type="number" name="quantity" class="form-control"
                                            placeholder="Nhập số lượng món" value="{{ old('quantity') }}">
                                        @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Giá</label>
                                        <input type="number" name="price" class="form-control" placeholder="200.000"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mô tả</label>
                                        <textarea name="description" class="form-txtarea form-control" rows="8">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Chọn hình ảnh</label>
                                        <input class="form-control" type="file" name="image" id="formFile"
                                            accept="image/*">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3" id="image-preview" style="display: none;">
                                        <img id="image-preview-img" src="" alt="Image Preview"
                                            style="max-width: 200px; max-height: 200px;">
                                        <button type="button" id="remove-image"
                                            style="position: relative; top: -50px; left: -0px; background: none; border: none; font-size: 24px; color: #1921fa;">&times;</button>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Chọn trạng thái:</label>
                                        <select name="status" class="default-select form-control wide">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Còn món
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Hết món
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Thêm món ăn</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            document.getElementById('formFile').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('image-preview-img').src = e.target.result;
                        document.getElementById('image-preview').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            document.getElementById('remove-image').addEventListener('click', function() {
                document.getElementById('formFile').value = "";
                document.getElementById('image-preview').style.display = 'none';
                document.getElementById('image-preview-img').src = "";
            });
        </script>
    @endpush
@endsection
