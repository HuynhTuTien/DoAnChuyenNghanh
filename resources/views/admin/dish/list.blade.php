@extends('layouts.admin')
@section('title', 'List Dish')

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
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <div class="card-header flex-wrap border-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Danh sách món ăn</h3>
                                        </div>
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="input-group search-area me-2">
                                                <form action="{{ route('dish.list') }}" method="GET" class="d-flex">
                                                    <input type="text" name="search" class="form-control"
                                                        placeholder="Tìm kiếm..." value="{{ request('search') }}">
                                                    <button type="submit" class="input-group-text">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                                </form>
                                            </div>
                                            <form action="{{ route('dish.list') }}" method="GET" class="d-flex">
                                                <select class="default-select form-control form-control-sm" name="category">
                                                    <option>Chọn danh mục</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <select name="price" class="form-control ms-2">
                                                    <option value="">Chọn khoảng giá</option>
                                                    <option value="0-50000"
                                                        {{ request('price') == '0-50000' ? 'selected' : '' }}>0 - 50,000 VNĐ
                                                    </option>
                                                    <option value="50000-100000"
                                                        {{ request('price') == '50000-100000' ? 'selected' : '' }}>50,000 -
                                                        100,000 VNĐ</option>
                                                    <option value="100000-200000"
                                                        {{ request('price') == '100000-200000' ? 'selected' : '' }}>100,000
                                                        - 200,000 VNĐ</option>
                                                    <option value="200000-500000"
                                                        {{ request('price') == '200000-500000' ? 'selected' : '' }}>200,000
                                                        - 500,000 VNĐ</option>
                                                    <option value="500000"
                                                        {{ request('price') == '500000' ? 'selected' : '' }}>500,000 VNĐ
                                                        trở lên</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Lọc</button>
                                            </form>
                                        </div>
                                    </div>
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>#</strong></th>
                                                <th><strong>Danh mục</strong></th>
                                                <th><strong>Tên</strong></th>
                                                <th><strong>Giá</strong></th>
                                                <th><strong>Hình ảnh</strong></th>
                                                <th><strong>Trạng thái</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dishes as $dish)
                                                <tr>
                                                    <td><strong>{{ $dish->id }}</strong></td>
                                                    <td>{{ $dish->category->name }}</td>
                                                    <td>{{ $dish->name }}</td>
                                                    <td>{{ number_format($dish->price) }} VNĐ</td>
                                                    <td><img src="{{ asset('storage/images/' . $dish->image) }}"
                                                            alt="" width="60px" height="auto"></td>
                                                    <td>
                                                        <span
                                                            class="badge light {{ $dish->status == '0' ? 'badge-danger' : 'badge-success' }}">
                                                            {{ $dish->status == '0' ? 'Hết món' : 'Còn món' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp"
                                                                data-bs-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <circle fill="#000000" cx="5" cy="12"
                                                                            r="2" />
                                                                        <circle fill="#000000" cx="12" cy="12"
                                                                            r="2" />
                                                                        <circle fill="#000000" cx="19" cy="12"
                                                                            r="2" />
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('dish.edit', $dish->slug) }}">Chỉnh
                                                                    sửa</a>

                                                                <a class="dropdown-item" href="{{ route('dish.ingredients', $dish->slug) }}">
                                                                    Quản lý nguyên liệu</a>

                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal{{ $dish->slug }}">Xóa</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $dish->slug }}" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Xóa món ăn
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có chắc chắn muốn xóa món ăn này không?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Hủy</button>
                                                                <form action="{{ route('dish.delete', $dish->slug) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Xóa</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $dishes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
