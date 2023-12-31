<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3"><img class="rounded mr-1 mt-2"
                src="{{ Vite::asset('resources/images/E-Cher.png') }}" width="180" height="50" alt="image"></div>
    </a> --}}
    <div class="sidebar-header">
        <div class="logo d-flex align-items-center justify-content-center">
            <a href="{{ route('merchant.dashboard') }}"><img class="rounded mr-1 mt-2" src="{{ Vite::asset('resources/images/ECher.png') }}" width="120" height="90" alt="image">
            </a>
        </div>
    </div>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Merchant
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-solid fa-shop"></i>
            <span>Merchant</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ route('admin.index') }}">Daftar Merchant</a>
                <a class="collapse-item" href="{{ route('admin.create') }}">Tambah Merchant</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-ticket-alt"></i>
            <span>Voucher</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('voucher.index') }}">Daftar Voucher</a>
                <a class="collapse-item" href="{{ route('admin.voucher.klaim') }}">Voucher Terklaim</a>
            </div>
        </div>
    </li>
    {{-- Users --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <i class="fa-solid fa-user"></i>
            <span> Customer </span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->
