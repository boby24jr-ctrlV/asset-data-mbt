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
            <li class="nav-item active">
                <a href="{{ url('/') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>

            <li class="nav-item">
    <a href="{{ route('items.index') }}">
        <i class="la la-table"></i>
        <p>Data Barang / Asset</p>
        <span class="badge badge-count">14</span>
    </a>
</li>

            <li class="nav-item">
                <a href="{{ route('maintenance.index') }}">
                    <i class="la la-keyboard-o"></i>
                    <p>Maintenece Scedule</p>
                    <span class="badge badge-count">50</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('repairs.index') }}">
                    <i class="la la-th"></i>
                    <p>Repair</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('notifikasi.index') }}">
                    <i class="la la-bell"></i>
                    <p>Notifications</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('tempat-services.index') }}">
                    <i class="la la-font"></i>
                    <p>Tempat Services</p>
                    <span class="badge badge-danger">25</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="la la-fonticons"></i>
                    <p>Icons</p>
                </a>
            </li>
        </ul>

    </div>
</div>
