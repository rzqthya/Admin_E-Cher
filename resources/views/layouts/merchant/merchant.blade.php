<!doctype html>
<html class="no-js" lang="en">

@include('layouts.merchant.head')

<body>
    @include('layouts.merchant.preloader')
    @include('layouts.merchant.sidebar')
    @include('layouts.merchant.header')
    @include('layouts.merchant.page-title')

    <div class="main-content-inner">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
