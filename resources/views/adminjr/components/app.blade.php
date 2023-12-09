<!DOCTYPE html>
<html lang="en">
@include('adminjr.components.head.head')

<body id="page-top">
    <div id="wrapper">
        @include('adminjr.components.sidebar.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('adminjr.components.navbar.navbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
                @include('adminjr.components.footer.footer')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!--Icons-->
    <script src="https://kit.fontawesome.com/eacd2b1685.js" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/chart-bar-demo.js') }}"></script>

</body>

</html>
