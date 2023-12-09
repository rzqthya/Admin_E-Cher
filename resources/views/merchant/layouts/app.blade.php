<!doctype html>
<html class="no-js" lang="en">

@include('merchant.layouts.head')

<body>
    {{-- <!-- @include('merchant.layouts.preloader') --> --}}
    <div class="page-container">
        <!-- Include the sidebar -->
        @include('merchant.layouts.sidebar')
        <!-- main content area start -->
        <div class="main-content">
            <!-- Include the header area  -->
            @include('merchant.layouts.header')
            <!-- Include the page title -->
            @include('merchant.layouts.page-title')
            <div class="main-content-inner">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JavaScript files and scripts go here -->
    <script src="{{ asset('assets/auth/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/auth/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/jquery.slicknav.min.js') }}"></script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('assets/auth/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/auth/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/auth/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/auth/js/scripts.js') }}"></script>
</body>
</html>
