@extends('layouts.admin')
@section('title', 'List Supplier')

@section('content')
    <a href="{{ route('supplier.create') }}" class="btn btn-primary mt-2 me-1 float-end">Thêm mới nhà cung cấp </a>

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
                                                <th><strong>Tên Nhà Cung Cấp</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Số Điện Thoại</strong></th>
                                                <th><strong>Địa Chỉ</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (is_object($suppliers))
                                            @php
                                                $i=1;
                                            @endphp
                                                @foreach ($suppliers as $supplier)
                                                    <tr>
                                                        <td><strong>{{ $i++ }}</strong></td>
                                                        <td>{{ $supplier->name }}</td>
                                                        <td>{{ $supplier->email }}</td>
                                                        <td>{{ $supplier->phone }}</td>
                                                        <td>{{ $supplier->address }}</td>
                                                        <td>
                                                            <!-- Chỉnh sửa -->
                                                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm text-white">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>

                                                            <!-- Xóa -->
                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $supplier->id }}">
                                                                <i class="fas fa-trash-alt"></i> Xóa
                                                            </button>

                                                            <!-- Modal Xóa -->
                                                            <div class="modal fade" id="deleteModal{{ $supplier->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                                                            <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
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
                                                    <td colspan="6" class="text-center">No Suppliers Found</td>
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
