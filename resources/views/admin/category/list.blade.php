@extends('layouts.admin')

@section('title', 'Danh sách danh mục')

@section('content')

<div class="content-body">
    @if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
    @endif
    <div class="container">
        <div class="col-xl-12">
            <div class="card dz-card" id="bootstrap-table1">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-header flex-wrap border-0">
                            <div>
                                <h2 class="mt-4 card-title">Danh sách danh mục</h2>
                            </div>
                            <div class="row mb-4 align-items-center">
                                <div class="col-md-8 d-flex">
                                    <form action="{{ route('category.list') }}" method="GET" class="d-flex flex-grow-1">
                                        <div class="input-group me-2 flex-grow-1">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Tìm kiếm..." value="{{ request('search') }}">
                                            <button type="submit" class="input-group-text">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1_450)">
                                                        <path opacity="0.3"
                                                            d="M14.2929 16.7071C13.9024 16.3166 13.9024 15.6834 14.2929 15.2929C14.6834 14.9024 15.3166 14.9024 15.7071 15.2929L19.7071 19.2929C20.0976 19.6834 20.0976 20.3166 19.7071 20.7071C19.3166 21.0976 18.6834 21.0976 18.2929 20.7071L14.2929 16.7071Z"
                                                            fill="#452B90" />
                                                        <path
                                                            d="M11 16C13.7614 16 16 13.7614 16 11C16 8.23859 13.7614 6.00002 11 6.00002C8.23858 6.00002 6 8.23859 6 11C6 13.7614 8.23858 16 11 16ZM11 18C7.13401 18 4 14.866 4 11C4 7.13402 7.13401 4.00002 11 4.00002C14.866 4.00002 18 7.13402 18 11C18 14.866 14.866 18 11 18Z"
                                                            fill="#452B90" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1_450">
                                                            <rect width="24" height="24" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{ route('category.list') }}" method="GET" class="d-flex">
                                        <select name="sort" class="form-control me-2" style="width: 100px;">
                                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Mới
                                                nhất</option>
                                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Cũ nhất
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                    </form>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('category.add') }}" class="btn btn-primary">Thêm Danh mục</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th style="width:200px;"><strong>Số thứ tự</strong></th>
                                            <th><strong>Tên danh mục</strong></th>
                                            <th><strong>Hình ảnh</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index => $category)
                                        <tr>
                                            <td><strong>{{ $categories->firstItem() + $index }}</strong></td>
                                            <td>{{ $category->name }}</td>
                                            <td><img width="60px" height="auto" class="img-fluid"
                                                    src="{{ asset('storage/images/' . $category->image) }}" alt=""></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                <circle fill="#000000" cx="19" cy="12" r="2" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('category.update', $category->id) }}">Chỉnh
                                                            sửa</a>
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $category->id }}">Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <form id="delete-form-{{ $category->id }}"
                                                action="{{ route('category.delete', $category->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </tr>
                                        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Xóa danh mục</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc chắn muốn xóa danh mục này không?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Hủy</button>
                                                        <form action="{{ route('category.delete', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection