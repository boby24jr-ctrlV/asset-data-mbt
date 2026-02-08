<!-- MAIN HEADER -->
<div class="main-header">
    <div class="logo-header">
        <a href="<?php echo e(url('/')); ?>" class="logo">
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

                <!-- USER -->
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" width="36" class="img-circle">
                        <span><?php echo e(auth()->user()->name); ?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <div class="user-box">
                                <div class="u-img">
                                    <img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="user">
                                </div>
                                <div class="u-text">
                                    <h4><?php echo e(auth()->user()->name); ?></h4>
                                    <p class="text-muted"><?php echo e(auth()->user()->email); ?></p>
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

                        <!-- LOGOUT -->
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item"
                                style="background:none;border:none;width:100%;text-align:left;">
                                <i class="fa fa-power-off"></i> Logout
                            </button>
                        </form>

                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/back-end/navbar.blade.php ENDPATH**/ ?>