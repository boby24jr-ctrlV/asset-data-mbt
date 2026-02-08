<!-- SIDEBAR -->
<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">

        <!-- USER -->
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseUser" aria-expanded="true">
                    <span>
                        SIMAR
                        <span class="user-level">Administrator</span>
                    </span>
                </a>
            </div>
        </div>

        <!-- MENU -->
        <ul class="nav">

            <!-- DASHBOARD -->
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}">
        <i class="la la-users"></i>
        <p>Daftar User</p>
    </a>
</li>


            <!-- DATA BARANG -->
            <li class="nav-item {{ request()->routeIs('items.*') ? 'active' : '' }}">
                <a href="{{ route('items.index') }}">
                    <i class="la la-table"></i>
                    <p>Data Barang / Asset</p>
                </a>
            </li>

            <!-- TEMPAT SERVICE (INI FIX UTAMA) -->
            <li class="nav-item {{ request()->routeIs('tempat_services.*') ? 'active' : '' }}">
                <a href="{{ route('tempat_services.index') }}">
                    <i class="la la-wrench"></i>
                    <p>Tempat Service</p>
                </a>
            </li>

            <!-- MAINTENANCE -->
            <li class="nav-item {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
                <a href="{{ route('maintenance.index') }}">
                    <i class="la la-calendar"></i>
                    <p>Maintenance Schedule</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('repairs.*') ? 'active' : '' }}">
                <a href="{{ route('repairs.index') }}">
                    <i class="la la-tools"></i>
                    <p>Repair</p>
                </a>
            </li>

        </ul>

    </div>
</div>
