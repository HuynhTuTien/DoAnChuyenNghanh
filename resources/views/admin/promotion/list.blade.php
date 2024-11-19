@extends('layouts.admin')
@section('title', 'Danh sách khuyến mãi')

@section('content')

    <div class="content-body">
        <div class="container">
            <div class="col-xl-12">
                <div class="card dz-card" id="bootstrap-table1">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                            @if (session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif
                            <div class="card-header flex-wrap border-0">
                                <div>
                                    <h2 class="mt-4 card-title">Danh sách khuyến mãi</h2>
                                </div>
                                <div>
                                    <a href="{{ route('promotion.add') }}" class="btn btn-primary mt-2 me-1">Thêm Khuyến mãi</a>
                                    <a href="{{ route('promotions.export') }}" class="btn btn-secondary mt-2">Xuất Excel</a>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Số thứ tự</strong></th>
                                                <th><strong>Mã khuyến mãi</strong></th>
                                                <th><strong>Giá khuyến mãi</strong></th>
                                                <th><strong>Số lần sử dụng</strong></th>
                                                <th><strong>Ngày bắt đầu</strong></th>
                                                <th><strong>Ngày kết thúc</strong></th>
                                                <th><strong>Trạng thái</strong></th>
                                                <th><strong>Mô tả</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($promotions as $index => $promotion)
                                                <tr>
                                                    <td><strong>{{ $promotions->firstItem() + $index }}</strong></td>
                                                    <td>{{ $promotion->code }}</td>
                                                    <td>{{ number_format($promotion->discount) }} VNĐ</td>
                                                    <td>{{ $promotion->number_use }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($promotion->start_time)->format('d-m-Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($promotion->end_time)->format('d-m-Y') }}</td>
                                                    <td>
                                                    <span class="badge light {{ $promotion->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $promotion->status == 'active' ? 'hoạt động' : 'Không hoạt động' }}
                                                    </span>
                                                    </td>
                                                    <td>{{ $promotion->describe }}</td>
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
                                                                    href="{{ route('promotion.update', $promotion->id) }}">Sửa</a>
                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal{{ $promotion->id }}">Xóa</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- Form ẩn để gửi DELETE request -->
                                                    <form id="delete-form-{{ $promotion->id }}"
                                                        action="{{ route('category.delete', $promotion->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <div class="modal fade" id="deleteModal{{ $promotion->id }}" tabindex="-1"
                                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Xóa khuyến mãi
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Bạn có chắc chắn muốn xóa khuyến mãi này không?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Hủy</button>
                                                                    <form
                                                                        action="{{ route('promotion.delete', $promotion->id) }}"
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
                                    {{ $promotions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
