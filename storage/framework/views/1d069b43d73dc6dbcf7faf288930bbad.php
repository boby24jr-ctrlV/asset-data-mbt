<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>➕ Tambah Repair</h3>

    <form method="POST" action="<?php echo e(route('repairs.store')); ?>">
        <?php echo csrf_field(); ?>

        
        <div class="mb-2">
            <label>Barang & Jadwal Maintenance</label>
            <select name="maintenance_schedule_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                <?php $__currentLoopData = $maintenanceSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($schedule->id); ?>">
                        <?php echo e($schedule->item->nama_barang); ?> 
                        (<?php echo e($schedule->jenis_maintenance); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <div class="mb-2">
            <label>Tempat Service</label>
            <select name="tempat_services_id" class="form-control" required>
                <option value="">-- Pilih Tempat Service --</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service->id); ?>">
                        <?php echo e($service->nama_tempat); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <div class="mb-2">
            <label>Tanggal Rusak</label>
            <input type="date" name="tanggal_rusak" class="form-control" required>
        </div>

        
        <div class="mb-2">
            <label>Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/repairs/create.blade.php ENDPATH**/ ?>