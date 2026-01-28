<!-- MAIN HEADER -->
<div class="main-header">
    <div class="logo-header">
        <a href="{{ url('/') }}" class="logo">
            Ready Dashboard
        </a>

        <button class="navbar-toggler sidenav-toggler ml-auto" type="button"
            data-toggle="collapse" data-target="collapse"
            aria-controls="sidebar" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <button class="topbar-toggler more">
            <i class="la la-ellipsis-v"></i>
        </button>
    </div>

    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">

            <!-- SEARCH -->
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <input type="text" placeholder="Search ..." class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-search search-icon"></i>
                        </span>
                    </div>
                </div>
            </form>

            <!-- RIGHT MENU -->
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                <!-- MESSAGE -->
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="la la-envelope"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <!-- NOTIFICATION -->
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="la la-bell"></i>
                        <span class="notification">3</span>
                    </a>
                    <ul class="dropdown-menu notif-box">
                        <li>
                            <div class="dropdown-title">You have 4 new notification</div>
                        </li>
                        <li>
                            <div class="notif-center">
                                <a href="#">
                                    <div class="notif-icon notif-primary">
                                        <i class="la la-user-plus"></i>
                                    </div>
                                    <div class="notif-content">
                                        <span class="block">New user registered</span>
                                        <span class="time">5 minutes ago</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="#">See all notifications <i class="la la-angle-right"></i></a>
                        </li>
                    </ul>
                </li>

                <!-- USER -->
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <img src="{{ asset('assets/img/profile.jpg') }}" width="36" class="img-circle">
                        <span>Hizrian</span>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <div class="user-box">
                                <div class="u-img">
                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="user">
                                </div>
                                <div class="u-text">
                                    <h4>Hizrian</h4>
                                    <p class="text-muted">hello@themekita.com</p>
                                    <a href="#" class="btn btn-rounded btn-danger btn-sm">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                        </li>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
                        <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</div>
