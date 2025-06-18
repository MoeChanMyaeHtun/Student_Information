<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
        </ol>
    </nav>
    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">DashBoard</h4>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\university_student_management_website\resources\views/index.blade.php ENDPATH**/ ?>