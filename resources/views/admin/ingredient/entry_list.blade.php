@extends('layouts.admin')

@section('content')
<div class="content-body">
    <div class="container">
        <h1>Danh sách nhập nguyên liệu từ nhà cung cấp</h1>
        <div class="col-xl-12">

            <div class="card dz-card" id="bootstrap-table1">

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>Nguyên liệu</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Số lượng</th>
                                            <th>Đơn vị</th>
                                            <th>Giá</th>
                                            <th>Ngày nhập</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entries as $entry)
                                            <tr>
                                                <td>{{ $entry->ingredient->name }}</td>
                                                <td>{{ $entry->supplier->name }}</td>
                                                <td>{{ $entry->quantity }}</td>
                                                <td>{{ $entry->unit }}</td>
                                                <td>{{ number_format($entry->price, 2) }}</td>
                                                <td>{{ $entry->created_at->format('d-m-Y H:i:s') }}</td>
                                            </tr>
                                        @endforeach
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
