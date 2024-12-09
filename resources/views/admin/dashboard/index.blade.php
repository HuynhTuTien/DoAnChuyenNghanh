@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="content-body">
        <div class="container">
            <h2>Chào bạn quay lại làm việc. Chúc bạn một ngày làm việc vui vẻ!!!</h2>
        </div>
    </div>

    @push('script')
        <!-- Required vendors -->
        <script src="{{ asset('assets/admin/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/apexchart/apexchart.js') }}"></script>

        <!-- Dashboard 1 -->
        <script src="{{ asset('assets/admin/js/dashboard/dashboard-1.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/swiper/js/swiper-bundle.min.js') }}"></script>


        <!-- JS for dotted map -->
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/contrib/suntimes.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/contrib/color-0.4.1.js') }}"></script>

        <script src="{{ asset('assets/admin/vendor/dotted-map/js/world.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/dotted-map/js/smallimap.js') }}"></script>
        <script src="{{ asset('assets/admin/js/dashboard/dotted-map-init.js') }}"></script>

        <!-- Vectormap -->
        <script src="{{ asset('assets/admin/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
        <script src="{{ asset('assets/admin/js/deznav-init.js') }}"></script>
        <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
        <script src="{{ asset('assets/admin/js/styleSwitcher.js') }}"></script>
    @endpush
@endsection
