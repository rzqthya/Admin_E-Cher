<div class="sidebar-menu bg-danger" style="background: #dc3545">
    <div class="sidebar-header bg-danger">
        <div class="logo">
            <a href="{{ route('merchant.dashboard') }}"><img class="rounded mr-1"
                    src="{{ Vite::asset('resources/images/ECher.png') }}" width="180" height="50" alt="image">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="{{ route('merchant.dashboard') }}" aria-expanded="true">
                            <i class=" text-light ti-dashboard"></i>
                            <span class="text-light">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('merchant.checkvoc') }}" aria-expanded="true">
                            <i class="fa fa-check-square-o text-light"></i>
                            <span class="text-light">Tukar Voucher</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('merchant.pakaivoc') }}" aria-expanded="true">
                            <i class="fa fa-check text-light"></i>
                            <span class="text-light">Voucher Terpakai</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
