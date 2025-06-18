<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attendance List</li>
        </ol>
    </nav>
    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Attendance List</h4>
        <a href="<?php echo e(route('attendance.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <div class="table-responsive">
        <table id="departmentsTable" class="table table-bordered table-striped nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Attendance Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($attendance->student->student_id); ?></td>
                    <td><?php echo e($attendance->student->student_name); ?></td>
                    <td><?php echo e($attendance->course->course_name); ?></td>
                    <td><?php echo e($attendance->attendance_date); ?></td>
                    <td><?php echo e($attendance->status); ?></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="<?php echo e(route('attendance.edit', $attendance->attendance_id)); ?>" class="btn btn-sm btn-warning me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\university_student_management_website\resources\views/attendance/index.blade.php ENDPATH**/ ?>