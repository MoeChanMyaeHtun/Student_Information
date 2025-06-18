<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Department</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Department Edit</h4>
    </div>

    <form action="<?php echo e(route('departments.create.validate')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col">
                <label for="department_name" class="form-label">Department Name</label><span class="text-danger">*</span>
                <input type="text" name="department_name" class="form-control <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('department_name', $department->department_name)); ?>">
                <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update Department</button>
        </div>
    </form>

</div>
<!-- Modal -->
<?php if(session('showModal')): ?>
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="<?php echo e(route('departments.update', $department->department_id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" name="department_name" value="<?php echo e(old('department_name')); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Department Edition</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the department's details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Department Name:</strong> <?php echo e(old('department_name')); ?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo e(route('departments.edit',$department->department_id)); ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    body.modal-open {
        overflow: hidden;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
        modal.show();
    });
</script>
<?php endif; ?>

<!-- End Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\university_student_management_website\resources\views/departments/edit.blade.php ENDPATH**/ ?>