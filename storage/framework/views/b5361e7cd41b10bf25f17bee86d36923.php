<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course</li>
        </ol>
    </nav>
    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Course List</h4>
        <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <div class="table-responsive">
        <table id="departmentsTable" class="table table-bordered table-striped nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>Course Id</th>
                    <th>Course Name</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Credit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($course->course_id); ?></td>
                    <td><?php echo e($course->course_name); ?></td>
                    <td><?php echo e($course->department->department_name); ?></td>
                    <td><?php echo e($course->semester); ?></td>
                    <td><?php echo e($course->credits); ?></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="btn btn-sm btn-warning me-2">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\university_student_management_website\resources\views/courses/index.blade.php ENDPATH**/ ?>