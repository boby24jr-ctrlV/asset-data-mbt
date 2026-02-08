<!-- SIDEBAR -->
<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">

        <!-- USER -->
        <div class="user">
            <div class="photo">
                <img src="<?php echo e(asset('assets/img/profile.jpg')); ?>">
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
            <li class="nav-item <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- DATA BARANG -->
            <li class="nav-item <?php echo e(request()->routeIs('items.*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('items.index')); ?>">
                    <i class="la la-table"></i>
                    <p>Data Barang / Asset</p>
                </a>
            </li>

            <!-- TEMPAT SERVICE (INI FIX UTAMA) -->
            <li class="nav-item <?php echo e(request()->routeIs('tempat_services.*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('tempat_services.index')); ?>">
                    <i class="la la-wrench"></i>
                    <p>Tempat Service</p>
                </a>
            </li>

            <!-- MAINTENANCE -->
            <li class="nav-item <?php echo e(request()->routeIs('maintenance.*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('maintenance.index')); ?>">
                    <i class="la la-calendar"></i>
                    <p>Maintenance Schedule</p>
                </a>
            </li>
            <li class="nav-item <?php echo e(request()->routeIs('repairs.*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('repairs.index')); ?>">
                    <i class="la la-tools"></i>
                    <p>Repair</p>
                </a>
            </li>

        </ul>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/back-end/sidebar.blade.php ENDPATH**/ ?>