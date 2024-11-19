@extends('layouts.admin')

@section('title', 'Thống kê')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Tổng doanh thu</span>
                                <h3 class="mb-0">{{ number_format($totalRevenue) }} VNĐ</h3>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="26" height="30" viewBox="0 0 26 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.45 29.3C10.0102 29.3093 11.5568 29.0088 13 28.416C14.4417 29.0138 15.9893 29.3145 17.55 29.3C22.2885 29.3 26 26.7715 26 23.5422V18.1577C26 14.9284 22.2885 12.4 17.55 12.4C17.3303 12.4 17.1145 12.4104 16.9 12.4221V6.33285C16.9 3.16995 13.1885 0.699951 8.45 0.699951C3.7115 0.699951 0 3.16995 0 6.33285V23.6671C0 26.83 3.7115 29.3 8.45 29.3ZM23.4 23.5422C23.4 25.0359 20.9976 26.7 17.55 26.7C14.1024 26.7 11.7 25.0359 11.7 23.5422V22.3398C13.4605 23.4105 15.4899 23.9566 17.55 23.9141C19.6101 23.9566 21.6395 23.4105 23.4 22.3398V23.5422ZM17.55 15C20.9976 15 23.4 16.664 23.4 18.1577C23.4 19.6514 20.9976 21.3141 17.55 21.3141C14.1024 21.3141 11.7 19.6501 11.7 18.1577C11.7 16.6653 14.1024 15 17.55 15ZM8.45 3.29995C11.8976 3.29995 14.3 4.89895 14.3 6.33285C14.3 7.76675 11.8976 9.36705 8.45 9.36705C5.0024 9.36705 2.6 7.76805 2.6 6.33285C2.6 4.89765 5.0024 3.29995 8.45 3.29995ZM2.6 10.4266C4.36783 11.4764 6.39439 12.0101 8.45 11.967C10.5056 12.0101 12.5322 11.4764 14.3 10.4266L14.3 12.8289C12.8832 13.186 11.5839 13.9061 10.53 14.918C9.84648 15.066 9.14934 15.1418 8.45 15.1443C5.0024 15.1443 2.6 13.5453 2.6 12.1114V10.4266ZM2.6 16.2051C4.3682 17.2539 6.39459 17.787 8.45 17.7443C8.6814 17.7443 8.905 17.7157 9.1325 17.704C9.11313 17.8545 9.10228 18.0059 9.1 18.1576V20.8682C8.8816 20.8812 8.671 20.9228 8.45 20.9228C5.0024 20.9228 2.6 19.3238 2.6 17.8886V16.2051ZM2.6 21.9823C4.36783 23.0321 6.39439 23.5658 8.45 23.5228C8.6684 23.5228 8.8829 23.5058 9.1 23.4955V23.5422C9.1186 24.6489 9.54387 25.71 10.2947 26.5232C9.68645 26.638 9.06899 26.6972 8.45 26.7C5.0024 26.7 2.6 25.101 2.6 23.6671V21.9823Z"
                                        fill="var(--primary)" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Tổng doanh thu hôm nay</span>
                                <h3 class="mb-0">{{ number_format($totalRevenueday) }} VNĐ</h3>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="26" height="30" viewBox="0 0 26 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.45 29.3C10.0102 29.3093 11.5568 29.0088 13 28.416C14.4417 29.0138 15.9893 29.3145 17.55 29.3C22.2885 29.3 26 26.7715 26 23.5422V18.1577C26 14.9284 22.2885 12.4 17.55 12.4C17.3303 12.4 17.1145 12.4104 16.9 12.4221V6.33285C16.9 3.16995 13.1885 0.699951 8.45 0.699951C3.7115 0.699951 0 3.16995 0 6.33285V23.6671C0 26.83 3.7115 29.3 8.45 29.3ZM23.4 23.5422C23.4 25.0359 20.9976 26.7 17.55 26.7C14.1024 26.7 11.7 25.0359 11.7 23.5422V22.3398C13.4605 23.4105 15.4899 23.9566 17.55 23.9141C19.6101 23.9566 21.6395 23.4105 23.4 22.3398V23.5422ZM17.55 15C20.9976 15 23.4 16.664 23.4 18.1577C23.4 19.6514 20.9976 21.3141 17.55 21.3141C14.1024 21.3141 11.7 19.6501 11.7 18.1577C11.7 16.6653 14.1024 15 17.55 15ZM8.45 3.29995C11.8976 3.29995 14.3 4.89895 14.3 6.33285C14.3 7.76675 11.8976 9.36705 8.45 9.36705C5.0024 9.36705 2.6 7.76805 2.6 6.33285C2.6 4.89765 5.0024 3.29995 8.45 3.29995ZM2.6 10.4266C4.36783 11.4764 6.39439 12.0101 8.45 11.967C10.5056 12.0101 12.5322 11.4764 14.3 10.4266L14.3 12.8289C12.8832 13.186 11.5839 13.9061 10.53 14.918C9.84648 15.066 9.14934 15.1418 8.45 15.1443C5.0024 15.1443 2.6 13.5453 2.6 12.1114V10.4266ZM2.6 16.2051C4.3682 17.2539 6.39459 17.787 8.45 17.7443C8.6814 17.7443 8.905 17.7157 9.1325 17.704C9.11313 17.8545 9.10228 18.0059 9.1 18.1576V20.8682C8.8816 20.8812 8.671 20.9228 8.45 20.9228C5.0024 20.9228 2.6 19.3238 2.6 17.8886V16.2051ZM2.6 21.9823C4.36783 23.0321 6.39439 23.5658 8.45 23.5228C8.6684 23.5228 8.8829 23.5058 9.1 23.4955V23.5422C9.1186 24.6489 9.54387 25.71 10.2947 26.5232C9.68645 26.638 9.06899 26.6972 8.45 26.7C5.0024 26.7 2.6 25.101 2.6 23.6671V21.9823Z"
                                        fill="var(--primary)" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <div class="card-menu">
                                <span>Tổng doanh thu tháng {{ \Carbon\Carbon::createFromDate($month)->format('m') }} năm
                                    {{ \Carbon\Carbon::createFromDate($year)->format('Y') }}</span>
                                <h3 class="mb-0">{{ number_format($totalRevenuemonth) }} VNĐ</h3>
                            </div>
                            <div class="icon-box icon-box-lg bg-primary-light">
                                <svg width="26" height="30" viewBox="0 0 26 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.45 29.3C10.0102 29.3093 11.5568 29.0088 13 28.416C14.4417 29.0138 15.9893 29.3145 17.55 29.3C22.2885 29.3 26 26.7715 26 23.5422V18.1577C26 14.9284 22.2885 12.4 17.55 12.4C17.3303 12.4 17.1145 12.4104 16.9 12.4221V6.33285C16.9 3.16995 13.1885 0.699951 8.45 0.699951C3.7115 0.699951 0 3.16995 0 6.33285V23.6671C0 26.83 3.7115 29.3 8.45 29.3ZM23.4 23.5422C23.4 25.0359 20.9976 26.7 17.55 26.7C14.1024 26.7 11.7 25.0359 11.7 23.5422V22.3398C13.4605 23.4105 15.4899 23.9566 17.55 23.9141C19.6101 23.9566 21.6395 23.4105 23.4 22.3398V23.5422ZM17.55 15C20.9976 15 23.4 16.664 23.4 18.1577C23.4 19.6514 20.9976 21.3141 17.55 21.3141C14.1024 21.3141 11.7 19.6501 11.7 18.1577C11.7 16.6653 14.1024 15 17.55 15ZM8.45 3.29995C11.8976 3.29995 14.3 4.89895 14.3 6.33285C14.3 7.76675 11.8976 9.36705 8.45 9.36705C5.0024 9.36705 2.6 7.76805 2.6 6.33285C2.6 4.89765 5.0024 3.29995 8.45 3.29995ZM2.6 10.4266C4.36783 11.4764 6.39439 12.0101 8.45 11.967C10.5056 12.0101 12.5322 11.4764 14.3 10.4266L14.3 12.8289C12.8832 13.186 11.5839 13.9061 10.53 14.918C9.84648 15.066 9.14934 15.1418 8.45 15.1443C5.0024 15.1443 2.6 13.5453 2.6 12.1114V10.4266ZM2.6 16.2051C4.3682 17.2539 6.39459 17.787 8.45 17.7443C8.6814 17.7443 8.905 17.7157 9.1325 17.704C9.11313 17.8545 9.10228 18.0059 9.1 18.1576V20.8682C8.8816 20.8812 8.671 20.9228 8.45 20.9228C5.0024 20.9228 2.6 19.3238 2.6 17.8886V16.2051ZM2.6 21.9823C4.36783 23.0321 6.39439 23.5658 8.45 23.5228C8.6684 23.5228 8.8829 23.5058 9.1 23.4955V23.5422C9.1186 24.6489 9.54387 25.71 10.2947 26.5232C9.68645 26.638 9.06899 26.6972 8.45 26.7C5.0024 26.7 2.6 25.101 2.6 23.6671V21.9823Z"
                                        fill="var(--primary)" />
                                </svg>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card dz-card" id="bootstrap-table1">
                                <div class="card-header flex-wrap border-0">
                                    <div>
                                        <h4 class="card-title">Tổng doanh thu</h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('statistical.export') }}" class="btn btn-secondary">Xuất Excel</a>
                                    </div>
                                    <div>
                                        <h4 class="card-title">Doanh thu tất cả: {{ number_format($totalRevenue) }} VNĐ</h4>
                                    </div>
                                </div>

                                <!-- Nội dung bảng -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:80px;"><strong>Số thứ tự</strong></th>
                                                            <th>Mã đơn hàng</th>
                                                            <th>Khách hàng</th>
                                                            <th>Ngày đặt hàng</th>
                                                            <th>Phương thức thanh toán</th>
                                                            <th>Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($statisticals as $index => $statistical)
                                                            <tr>
                                                                <td><strong>{{ $statisticals->firstItem() + $index }}</strong>
                                                                </td>
                                                                <td>{{ $statistical->order->code_order }}</td>
                                                                <td>{{ $statistical->order->name }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($statistical->payment_date)->format('d-m-Y') }}
                                                                </td>
                                                                <td>{{ $statistical->payment_method }}</td>
                                                                <td>{{ number_format($statistical->total_amount) }} VNĐ
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $statisticals->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12">
                            <div class="card dz-card" id="bootstrap-table1">
                                <div class="card-header flex-wrap border-0">
                                    <div>
                                        <h4 class="card-title">Tổng doanh thu hôm nay</h4>
                                    </div>
                                    <div>
                                        <a style="margin-right:120px"
                                            href="{{ route('statistical.export.dates', ['date' => $date]) }}"
                                            class="btn btn-secondary">Xuất Excel</a>
                                    </div>
                                    <div>
                                        <h4 class="card-title">Doanh thu ngày: {{ number_format($totalRevenueday) }} VNĐ
                                        </h4>
                                    </div>
                                </div>
                                <!--tab-content-->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:80px;"><strong>Số thứ tự</strong></th>
                                                            <th>Mã đơn hàng</th>
                                                            <th>Khách hàng</th>
                                                            <th>Ngày đặt hàng</th>
                                                            <th>Phương thức thanh toán</th>
                                                            <th>Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($statisticalsdates as $index => $statisticalsdate)
                                                            <tr>
                                                                <td><strong>{{ $statisticalsdates->firstItem() + $index }}</strong>
                                                                </td>
                                                                <td>{{ $statisticalsdate->order->code_order }}</td>
                                                                <td>{{ $statisticalsdate->order->name }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($statisticalsdate->payment_date)->format('d-m-Y') }}
                                                                </td>
                                                                <td>{{ $statisticalsdate->payment_method }}</td>
                                                                <td>{{ number_format($statisticalsdate->total_amount) }}
                                                                    VNĐ</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $statisticalsdates->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12">
                            <div class="card dz-card" id="bootstrap-table1">
                                <div class="card-header flex-wrap border-0">
                                    <div>
                                        <h4 id="month-year-title" class="card-title">Tổng doanh thu tháng
                                            {{ \Carbon\Carbon::createFromDate($month)->format('m') }} Năm
                                            {{ \Carbon\Carbon::createFromDate($year)->format('Y') }}</h4>
                                    </div>
                                    <div>
                                        <a id="export-btn" style="margin-right:95px" class="btn btn-secondary">
                                            Xuất Excel
                                        </a>
                                    </div>
                                    <div>
                                        <h4 class="card-title" id="total-revenue">Doanh thu tháng:
                                            {{ number_format($totalRevenuemonth) }} VNĐ
                                        </h4>
                                        <h4 class="card-title" id="comparison-revenue">Doanh thu tháng hiện tại:
                                            {{ number_format($currentMonthRevenue) }} VNĐ</h4>
                                        <h4 class="card-title" id="percentage-difference">Chênh lệch: <span
                                                id="percentage-difference-value"></span></h4>
                                    </div>
                                </div>
                                <!-- Form lọc -->
                                <div class="card-body pt-0">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="month">Tháng:</label>
                                            <select name="month" id="month" class="form-control">
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                                        {{ $month == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="year">Năm:</label>
                                            <select name="year" id="year" class="form-control">
                                                @for ($i = now()->year; $i >= 2022; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $year == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--tab-content-->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:80px;"><strong>Số thứ tự</strong></th>
                                                            <th>Mã đơn hàng</th>
                                                            <th>Khách hàng</th>
                                                            <th>Ngày đặt hàng</th>
                                                            <th>Phương thức thanh toán</th>
                                                            <th>Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-body">
                                                        <!-- Dữ liệu bảng sẽ được cập nhật bởi AJAX -->
                                                    </tbody>
                                                </table>
                                                <div id="pagination-links">
                                                    <!-- Các liên kết phân trang sẽ được cập nhật bởi AJAX -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12">
                            <div class="card dz-card" id="bootstrap-table1">
                                <h4 id="month-year-title" class="p-4 pb-0 text-lg card-title">So sánh doanh thu giữa hai
                                    tháng</h4>
                                <!-- Form lọc -->
                                <div class="card-body row">
                                    <div class="col-lg-6">
                                        <h4 class="card-title" id="revenue-month1">Doanh thu tháng </h4>
                                        <div class="">
                                            <label for="month1">Tháng:</label>
                                            <select name="month1" id="month1" class="form-control">
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                                        {{ $month1 == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="">
                                            <label for="year1">Năm:</label>
                                            <select name="year1" id="year1" class="form-control">
                                                @for ($i = now()->year; $i >= 2022; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $year1 == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="card-title" id="revenue-month2">Doanh thu tháng </h4>
                                        <div class="">
                                            <label for="month2">Tháng:</label>
                                            <select name="month2" id="month2" class="form-control">
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                                        {{ $month2 == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="">
                                            <label for="year2">Năm:</label>
                                            <select name="year2" id="year2" class="form-control">
                                                @for ($i = now()->year; $i >= 2022; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $year2 == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 mb-3">
                                    <h4 class="card-title" id="percentage-differenceMonth">Chênh lệch: <span
                                            id="percentage-differenceMonth-value"></span>%</h4>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script>
        $(document).ready(function() {
            function updateTable(month, year) {
                $.ajax({
                    url: '{{ route('statistical.filter') }}',
                    method: 'POST',
                    data: {
                        month: month,
                        year: year,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        let tableBody = $('#table-body');
                        let paginationLinks = $('#pagination-links');
                        let totalRevenue = $('#total-revenue');
                        let comparisonRevenue = $('#comparison-revenue');
                        let percentageDifference = $('#percentage-difference-value');
                        let monthYearTitle = $('#month-year-title');

                        tableBody.empty();
                        paginationLinks.empty();

                        // Cập nhật dữ liệu bảng
                        response.data.forEach(row => {
                            tableBody.append(
                                `<tr>
                            <td><strong>${row.index}</strong></td>
                            <td>${row.order_code}</td>
                            <td>${row.customer_name}</td>
                            <td>${row.payment_date}</td>
                            <td>${row.payment_method}</td>
                            <td>${row.total_amount}</td>
                        </tr>`
                            );
                        });

                        // Cập nhật liên kết phân trang
                        paginationLinks.html(response.pagination);

                        // Cập nhật tổng doanh thu tháng
                        totalRevenue.text(`Doanh thu tháng ${month}: ${response.total_revenue}`);
                        comparisonRevenue.text(
                            `Doanh thu tháng hiện tại: ${response.current_month_revenue}`);

                        percentageDifference.text(response.percentage_difference + '%');

                        // Cập nhật tiêu đề với tháng và năm
                        monthYearTitle.html(`Tổng doanh thu tháng ${month} năm ${year}`);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }

            // Gọi hàm khi trang được tải
            updateTable($('#month').val(), $('#year').val());

            // Gọi hàm khi chọn tháng hoặc năm
            $('#month, #year').on('change', function() {
                var month = $('#month').val();
                var year = $('#year').val();
                updateTable(month, year);
            });

            $('#export-btn').on('click', function() {
                var month = $('#month').val();
                var year = $('#year').val();
                window.location.href =
                    `{{ route('statistical.export.monthly') }}?month=${month}&year=${year}`;
            });
        });

        $(document).ready(function() {
    function updateComparison(month1, year1, month2, year2) {
        $.ajax({
            url: '{{ route('statistical.filterSoDoanhThuThang') }}',
            method: 'POST',
            data: {
                month1: month1,
                year1: year1,
                month2: month2,
                year2: year2,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                let revenueMonth1 = $('#revenue-month1');
                let revenueMonth2 = $('#revenue-month2');
                let percentageDifferenceMonth = $('#percentage-differenceMonth-value');

                // Cập nhật dữ liệu so sánh
                revenueMonth1.text(`Doanh thu tháng ${month1}/${year1}: ${response.revenue_month1}`);
                revenueMonth2.text(`Doanh thu tháng ${month2}/${year2}: ${response.revenue_month2}`);
                
                // Đảm bảo rằng giá trị phần trăm không bị undefined hoặc lỗi
                if(response.percentage_differenceMonth !== undefined) {
                    percentageDifferenceMonth.text(response.percentage_differenceMonth);
                } else {
                    percentageDifferenceMonth.text('Không có dữ liệu');
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi AJAX:', status, error);
            }
        });
    }

    // Gọi hàm khi trang được tải
    updateComparison($('#month1').val(), $('#year1').val(), $('#month2').val(), $('#year2').val());

    // Gọi hàm khi chọn tháng hoặc năm
    $('#month1, #year1, #month2, #year2').on('change', function() {
        var month1 = $('#month1').val();
        var year1 = $('#year1').val();
        var month2 = $('#month2').val();
        var year2 = $('#year2').val();
        updateComparison(month1, year1, month2, year2);
    });
});

    </script>
@endpush
