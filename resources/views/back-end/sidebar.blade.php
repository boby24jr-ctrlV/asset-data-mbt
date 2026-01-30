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
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>

                <div class="clearfix"></div>

                <div class="collapse show" id="collapseUser">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MENU -->
        <ul class="nav">

            <!-- DASHBOARD -->
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>

            <!-- DATA BARANG / ASSET -->
            <li class="nav-item {{ request()->routeIs('items.*') ? 'active' : '' }}">
                <a href="{{ route('items.index') }}">
                    <i class="la la-table"></i>
                    <p>Data Barang / Asset</p>
                    <span class="badge badge-count">14</span>
                </a>
            </li>

            <!-- MAINTENANCE -->
            <li class="nav-item {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
                <a href="{{ route('maintenance.index') }}">
                    <i class="la la-keyboard-o"></i>
                    <p>Maintenance Schedule</p>
                    <span class="badge badge-count">50</span>
                </a>
            </li>

            <!-- REPAIR -->
            <li class="nav-item {{ request()->routeIs('repairs.*') ? 'active' : '' }}">
                <a href="{{ route('repairs.index') }}">
                    <i class="la la-th"></i>
                    <p>Repair</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>

            <!-- NOTIFICATIONS -->
            <li class="nav-item">
                <a href="#">
                    <i class="la la-bell"></i>
                    <p>Notifications</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>

        </ul>

    </div>
</div>
