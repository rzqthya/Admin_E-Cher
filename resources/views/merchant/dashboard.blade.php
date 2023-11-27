@extends('layouts.merchant.merchant')

@section('content')
    <div class="page-container">
        <!-- sidebar menu area start -->
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <!-- header area end -->
            <!-- page title area start -->
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-gift"></i> Voucher Terklaim</div>
                                        <h2>{{ $totalTerklaim }}</h2>
                                    </div>
                                    <canvas id="seolinechart1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-ticket"></i> Voucher Belum Terklaim
                                        </div>
                                        <h2>{{ $totalBelumTerklaim }}</h2>
                                    </div>
                                    <canvas id="seolinechart2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    @section('scripts')
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
    @endsection
@endsection
