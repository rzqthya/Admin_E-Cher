<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/auth/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/auth/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('merchant.login') }}">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <p>Login untuk masuk ke halaman admin merchant anda.</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="email">Email address</label>
                            <input type="email" name="email" id="email">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>

                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('assets/auth/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/auth/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/jquery.slicknav.min.js') }}"></script>

    <!-- others plugins -->
    <script src="{{ asset('assets/auth/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/auth/js/scripts.js') }}"></script>
</body>

</html>
