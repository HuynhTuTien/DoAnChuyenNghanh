@extends('layouts.admin')
@section('title', 'Chỉnh sửa danh mục')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12">
                <div class="card dz-card" id="bootstrap-table1">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-header flex-wrap border-0">
                                <div>
                                    <h2 class="card-title">Cập nhật danh mục</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ route('category.processUpdate', ['id' => $category->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <!-- Tên danh mục -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Tên danh mục</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nhập tên danh mục" value="{{ $category->name }}" />
                                                    @error('name')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Chọn hình ảnh mới -->
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Chọn hình ảnh</label>
                                            <input type="file" class="form-control" name="image" id="image"  accept="image/*"/>
                                            @if ($category->image)
                                            <div id="imagePreview" class="mt-3 position-relative">
                                                <button type="button" id="removeImage"
                                                    class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                    style="z-index: 1;">X</button>
                                                <img src="{{ asset('storage/images/' . $category->image) }}"
                                                    alt="{{ $category->name }}" width="100" class="img-thumbnail">
                                            </div>
                                        @endif
                                            @error('image')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <!-- Nút cập nhật -->
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </form>
                                    </div>
                                </div>
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
    document.getElementById('formFile').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result +
                '" width="100" class="mt-3"><button type="button" id="removeImage" class="btn btn-danger btn-sm">X</button>';
            document.getElementById('removeImage').addEventListener('click', function() {
                output.innerHTML = '';
                document.getElementById('formFile').value = '';
            });
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    if (document.getElementById('removeImage')) {
        document.getElementById('removeImage').addEventListener('click', function() {
            document.getElementById('imagePreview').innerHTML = '';
            document.getElementById('formFile').value = '';
        });
    }
</script>
@endpush