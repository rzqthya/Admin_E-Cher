<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('merchant.dashboard') }}">Home</a></li>
                    <li>
                        <span>
                            @if ($activePage == 'Dashboard')
                                Dashboard
                            @elseif($activePage == 'KlaimVoucher')
                                Klaim Voucher
                            @elseif($activePage == 'VoucherTerklaim')
                                Voucher Terklaim
                            @endif
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('assets/auth/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ $name }}<i
                        class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('merchant.profile') }}">Profil</a>
                    <form id="merchant-logout-form" action="{{ route('merchant.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>