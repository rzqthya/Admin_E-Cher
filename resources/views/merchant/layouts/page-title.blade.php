<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">
                    <a href="{{ route('merchant.dashboard') }}" style="color: black;">Dashboard</a>
                </h4>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right text" style="background: #dc3545">
                <img class="avatar user-thumb" src="{{ asset('assets/auth/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                    {{ $merchantName }}<i class="fa fa-angle-down"></i>
                </h4>
                <div class="dropdown-menu">
                    <form id="merchant-logout-form" action="{{ route('merchant.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
