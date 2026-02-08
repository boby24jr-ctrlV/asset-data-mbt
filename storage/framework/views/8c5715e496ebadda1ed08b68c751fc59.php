<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SIMAR | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ready.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>">
</head>

<body>

<div class="wrapper">

    <!-- NAVBAR -->
    <?php echo $__env->make('back-end.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- SIDEBAR -->
    <?php echo $__env->make('back-end.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- MAIN PANEL -->
    <div class="main-panel">

        <!-- CONTENT -->
        <div class="content">
            <div class="container-fluid">

                <h4 class="page-title">Dashboard</h4>

                <div class="row">

                    <div class="col-md-3">
                        <div class="card card-stats card-warning">
                            <div class="card-body">
                                <p class="card-category">Jumblah asset</p>
                                <h4 class="card-title">1</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-stats card-success">
                            <div class="card-body">
                                <p class="card-category">Jumlah Maintenence</p>
                                <h4 class="card-title">1</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-stats card-danger">
                            <div class="card-body">
                                <p class="card-category">Jumlah Repair</p>
                                <h4 class="card-title">1</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright ml-auto">
                    © <?php echo e(date('Y')); ?> SIMAR — made with ❤️
                </div>
            </div>
        </footer>

    </div>
</div>

<!-- JS -->
<script src="<?php echo e(asset('assets/js/core/jquery.3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/ready.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/back-end/dashboard.blade.php ENDPATH**/ ?>