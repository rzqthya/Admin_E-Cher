<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('merchant.dashboard') }}"><img class="rounded mr-1"
                    src="{{ Vite::asset('resources/images/Logo.png') }}" width="180" height="50"
                    alt="image"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{ route('merchant.dashboard') }}" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{ route('merchant.checkvoc') }}" aria-expanded="true"><i
                                class="fa fa-check-square-o"></i>
                            <span>Check Voucher</span></a>
                    </li>
                    <li>
                        <a href="{{ route('merchant.pakaivoc') }}" aria-expanded="true"><i
                                class="fa fa-check"></i>
                            <span>Voucher Terklaim</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
