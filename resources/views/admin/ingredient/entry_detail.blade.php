@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="container w-50">
            <div class="col-xl-12">
                <div class="card dz-card" id="bootstrap-table1">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-header flex-wrap border-0">
                                <div>
                                    <h2 class="card-title">Hóa đơn nhập nguyên liệu</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="card-body">
                                    <p><strong>Nguyên liệu:</strong> {{ $entry->ingredient->name }}</p>
                                    <p><strong>Nhà cung cấp:</strong> {{ $entry->supplier->name }}</p>
                                    <p><strong>Số lượng nhập:</strong> {{ $entry->quantity }} {{ $entry->unit }}</p>
                                    <p><strong>Đơn giá:</strong> {{ number_format($entry->price, 0, ',', '.') }} VND</p>
                                    <p><strong>Tổng tiền:</strong> {{ number_format($entry->total_price, 0, ',', '.') }} VND</p>
                                    <p><strong>Ngày nhập:</strong> {{ $entry->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                </div>

                                <a href="{{ route('ingredient.entry.list') }}" class="btn btn-secondary mt-3">Quay lại danh sách nhập liệu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
