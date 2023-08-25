<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CHIKADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('homepageedit') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home page</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cards.index') }}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>properties items</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('inbox') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>inbox</span></a>
    </li>


    {{-- @can('user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>  
    @elseCan('admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>User Dashboard</span></a>
    </li>
    @endCan --}}


    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
