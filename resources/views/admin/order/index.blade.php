@extends('layouts.admin')
@section('title', 'list order')

@section('content')
    <div class="content-body">
        @if (session('success'))
            <script>
                toastr.success("{{ session('success') }}");
            </script>
        @endif
        <div class="container">
            <div class="d-flex justify-content-between mb-4 flex-wrap">
                <ul class="revnue-tab nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="status-tab" data-bs-toggle="tab" data-bs-target="#status-tab-pane"
                            type="button" role="tab" aria-controls="status-tab-pane" aria-selected="true">Danh sách đơn
                            hàng</button>
                    </li>
                </ul>
                <div class="d-flex align-items-center mb-4">
                    <div class="input-group search-area me-2">
                        <form action="{{ route('order.list') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..."
                                value="{{ request('search') }}">
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
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="status-tab-pane" role="tabpanel"
                            aria-labelledby="status-tab" tabindex="0">
                            <div class="card mt-2">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting ">
                                        <table id="empoloyees-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="d-flex align-items-center">
                                                        <div class="form-check custom-checkbox ms-0">
                                                            <input type="checkbox" class="form-check-input checkAllInput"
                                                                id="checkAll2" required="">
                                                            <label class="form-check-label" for="checkAll2"></label>
                                                        </div>
                                                    </th>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Khách hàng</th>
                                                    <th>Món ăn</th>

                                                    <th>Tổng tiền</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check custom-checkbox">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheckBox100" required="">
                                                                <label class="form-check-label"
                                                                    for="customCheckBox100"></label>
                                                            </div>
                                                        </td>
                                                        <td><span>{{ $order->code_order }}</span></td>
                                                        <td><span>{{ $order->name }}</span></td>
                                                        <td>
                                                            @foreach ($order->dishes as $dish)
                                                                <div>{{ $dish->name }} ({{ $dish->pivot->quantity }})<br>
                                                                </div>
                                                            @endforeach
                                                        </td>

                                                        <td>
                                                            @php
                                                                $totalAmount = $order->payments->sum('total_amount');
                                                            @endphp
                                                            <span>{{ number_format($totalAmount, 0, ',', '.') }} vnđ</span>
                                                        </td>
                                                        <td><span
                                                                class="badge badge-rounded badge-outline-primary badge-lg">{{ $order->status }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                                            stroke="#737B8B" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    style="">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('order.detail', $order->id) }}">Xem
                                                                        chi tiết</a>
                                                                </div>
                                                            </div>
                                                        </td>
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
    </div>
@endsection
