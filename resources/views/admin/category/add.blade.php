@extends('layouts.admin')
@section('title', 'Thêm danh mục')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="col-xl-12">
                <div class="card dz-card" id="bootstrap-table1">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-header flex-wrap border-0">
                                <div>
                                    <h2 class="card-title">Thêm danh mục</h2>

                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form action="{{route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tên danh mục</label>
                                            <input type="text" class="form-control" name="name" id="name" 
                                                placeholder="Nhập tên danh mục" value="{{old('name')}}" />
                                                @error('name')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Hình ảnh</label>
                                            <input type="file" class="form-control" name="image" id="image"
                                            accept="image/*" />
                                                @error('image')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
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
@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'tableColumn', 'tableRow', 'mergeTableCells', '|',
                    'undo', 'redo'
                ],
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells'
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush