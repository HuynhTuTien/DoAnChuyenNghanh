{{-- resources/views/admin/ingredient/list.blade.php --}}
@extends('layouts.admin')

@section('content')

<a href="{{ route('ingredient.create') }}" class="btn btn-primary mt-2 me-1 m-2 float-end">Thêm nguyên liệu</a>

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
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th><strong>Tên Nguyên Liệu</strong></th>
                                            <th><strong>Số Lượng</strong></th>
                                            <th><strong>Đơn Vị</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (is_object($ingredients))
                                        @php
                                            $i=1;
                                        @endphp
                                            @foreach ($ingredients as $ingredient)
                                                <tr>
                                                    <td><strong>{{ $i++ }}</strong></td>
                                                    <td>{{ $ingredient->name }}</td>
                                                    <td>{{ $ingredient->quantity }}</td>
                                                    <td>{{ $ingredient->unit ?? 'N/A' }}</td>

                                                    <td>
                                                        <!-- Chỉnh sửa -->
                                                        <a href="{{ route('ingredient.edit', $ingredient->id) }}" class="btn btn-warning btn-sm text-white">
                                                            <i class="fas fa-edit"></i> Sửa
                                                        </a>

                                                        <!-- Xóa -->
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $ingredient->id }}">
                                                            <i class="fas fa-trash-alt"></i> Xóa
                                                        </button>

                                                        <!-- Modal Xóa -->
                                                        <div class="modal fade" id="deleteModal{{ $ingredient->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">Xóa nhà cung cấp</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Bạn có chắc chắn muốn xóa nhà cung cấp này không?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                                        <form action="{{ route('ingredient.destroy', $ingredient->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">Không tìm thấy nguyên liệu nào</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
