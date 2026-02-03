<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3>➕ Tambah Repair</h3>

        <form method="POST" action="<?php echo e(route('repairs.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-2">
                <label>Barang</label>
                <select name="item_id" class="form-control">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_barang); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <select name="tempat_services_id" class="form-control">
                <option value="">-- Pilih Tempat Service --</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service->id); ?>">
                        <?php echo e($service->nama_tempat); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <div class="mb-2">
                <label>Tanggal Rusak</label>
                <input type="date" name="tanggal_rusak" class="form-control">
            </div>

            <div class="mb-2">
                <label>Deskripsi Kerusakan</label>
                <textarea name="deskripsi_kerusakan" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt-pikram-branch\resources\views/repairs/create.blade.php ENDPATH**/ ?>