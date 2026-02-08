<?php $__env->startSection('content'); ?>
<div class="card">

    
    <div class="card-header">
        <h4 class="card-title mb-0">🏢 Tambah Tempat Service</h4>
    </div>

    
    <div class="card-body">

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('tempat_services.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <div class="form-group">
                <label>Nama Tempat Service</label>
                <input
                    type="text"
                    name="nama_tempat"
                    class="form-control"
                    placeholder="Contoh: Service Laptop Jaya"
                    value="<?php echo e(old('nama_tempat')); ?>"
                    required
                >
            </div>

            
            <div class="form-group">
                <label>Alamat</label>
                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3"
                    placeholder="Alamat lengkap tempat service"
                    required
                ><?php echo e(old('alamat')); ?></textarea>
            </div>

            
            <div class="form-group">
                <label>No Telepon</label>
                <input
                    type="text"
                    name="no_telepon"
                    class="form-control"
                    placeholder="08xxxxxxxxxx"
                    value="<?php echo e(old('no_telepon')); ?>"
                    required
                >
            </div>

            
            <div class="d-flex justify-content-between">
                <a href="<?php echo e(route('tempat_services.index')); ?>" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/tempat_services/create.blade.php ENDPATH**/ ?>