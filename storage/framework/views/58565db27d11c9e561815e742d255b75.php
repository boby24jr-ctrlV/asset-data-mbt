<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>✏️ Update Repair</h3>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('repairs.update', $repair->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
    <label class="form-label">Item</label>
    <select name="maintenance_schedule_id" class="form-control" required>
        <option value="">-- Pilih Item --</option>
        <?php $__currentLoopData = $maintenanceSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($ms->id); ?>"
                <?php echo e(old('maintenance_schedule_id', $repair->maintenance_schedule_id) == $ms->id ? 'selected' : ''); ?>>
                <?php echo e($ms->item->nama_barang ?? 'Item tidak ada'); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>


        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" 
                        <?php echo e(old('user_id', $repair->user_id) == $user->id ? 'selected' : ''); ?>>
                        <?php echo e($user->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
    <label class="form-label">Tempat Service</label>
    <select name="tempat_services_id" class="form-select">
        <option value="">-- Pilih Tempat Service --</option>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($service->id); ?>"
                <?php echo e(old('tempat_services_id', $repair->tempat_services_id) == $service->id ? 'selected' : ''); ?>>
                <?php echo e($service->nama_tempat); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>


        <div class="mb-3">
            <label class="form-label">Tanggal Rusak</label>
            <input type="date" name="tanggal_rusak" 
                   value="<?php echo e(old('tanggal_rusak', $repair->tanggal_rusak)); ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="form-control" rows="4" required><?php echo e(old('deskripsi_kerusakan', $repair->deskripsi_kerusakan)); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="dilaporkan" <?php echo e(old('status', $repair->status) == 'dilaporkan' ? 'selected' : ''); ?>>
                    Dilaporkan
                </option>
                <option value="proses" <?php echo e(old('status', $repair->status) == 'proses' ? 'selected' : ''); ?>>
                    Proses
                </option>
                <option value="selesai" <?php echo e(old('status', $repair->status) == 'selesai' ? 'selected' : ''); ?>>
                    Selesai
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Biaya</label>
            <input type="number" name="biaya" value="<?php echo e(old('biaya', $repair->biaya)); ?>" 
                   class="form-control" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" 
                   value="<?php echo e(old('tanggal_selesai', $repair->tanggal_selesai)); ?>" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="4"><?php echo e(old('catatan', $repair->catatan)); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="<?php echo e(route('repairs.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('be.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\asset-data-mbt\resources\views/repairs/edit.blade.php ENDPATH**/ ?>