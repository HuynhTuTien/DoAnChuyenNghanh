@extends('layouts.admin')
@section('title', 'payment')

@section('content')
    <div class="content-body">
        @if (session('success'))
            <script>
                toastr.success("{{ session('success') }}");
            </script>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card dz-card" id="bootstrap-table1">
                        <div class="card-header flex-wrap border-0">
                            <div>
                                <h4 class="card-title">Hàng đợi thanh toán gần đây</h4>
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
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payments as $index => $payment)
                                                <tr>
                                                    <td><strong>{{ $payments->firstItem() + $index}}</strong></td>
                                                    <td>{{ $payment->order->code_order }}</td>
                                                    <td>{{ $payment->order->name }}</td>
                                                    <td>{{ $payment->payment_date }}</td>
                                                    <td>{{ $payment->payment_method }}</td>
                                                    <td>
                                                        @if($payment->order->status == 'completed')
                                                            <span class="badge light badge-success">{{ $payment->order->status }}</span>
                                                        @elseif($payment->order->status == 'đã hủy')
                                                            <span class="badge light badge-danger">{{ $payment->order->status }}</span>
                                                        @else
                                                            <span class="badge light badge-secondary">{{ $payment->order->status }}</span> <!-- Màu sắc mặc định cho các trạng thái khác -->
                                                        @endif
                                                    </td>
                                                    <td>{{ number_format($payment->total_amount, 0, ',', '.') }} VND</td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $payments->links() }}
                                    </div>
                                </div>
                                <!-- /Recent Payments Queue -->
                            </div>

                        </div>
                        <!--/tab-content-->

                        <!-- Column ends -->


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--**********************************
                    Content body end
                ***********************************-->
@endsection
