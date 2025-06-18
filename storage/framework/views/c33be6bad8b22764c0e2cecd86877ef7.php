<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Attendance Create</h4>
    </div>

    <form action="<?php echo e(route('attendance.create.validate')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="course_id" class="form-label">Course</label><span class="text-danger">*</span>
                <select name="course_id" class="form-control <?php $__errorArgs = ['course_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Select Course</option>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($course->course_id); ?>" <?php echo e(old('course_id') == $course->course_id ? 'selected' : ''); ?>>
                        <?php echo e($course->course_name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['course_id'];
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
            <div class="col-md-6">
                <label for="student_id" class="form-label">Student</label><span class="text-danger">*</span>
                <select name="student_id" class="form-control <?php $__errorArgs = ['student_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Select Student</option>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($student->student_id); ?>" <?php echo e(old('student_id') == $student->student_id ? 'selected' : ''); ?>>
                        <?php echo e($student->student_name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['student_id'];
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
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label><span class="text-danger">*</span>
                <select name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Select Status</option>
                    <?php $__currentLoopData = \App\Enums\AttendanceStatus::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($status); ?>" <?php echo e(old('status') == $status ? 'selected' : ''); ?>>
                        <?php echo e($status); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['status'];
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
            <div class="col-md-6">
                <label for="attendance_date" class="form-label">Attendance Date</label><span class="text-danger">*</span>
                <input type="date" name="attendance_date" class="form-control <?php $__errorArgs = ['attendance_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('attendance_date')); ?>">
                <?php $__errorArgs = ['attendance_date'];
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
            <a href="<?php echo e(route('attendance.index')); ?>" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create Attendance</button>
        </div>
    </form>
</div>
<!-- Modal -->
<?php if(session('showModal')): ?>
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="<?php echo e(route('attendance.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="student_id" value="<?php echo e(old('student_id')); ?>">
            <input type="hidden" name="course_id" value="<?php echo e(old('course_id')); ?>">
            <input type="hidden" name="attendance_date" value="<?php echo e(old('attendance_date')); ?>">
            <input type="hidden" name="status" value="<?php echo e(old('status')); ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Attendance Creation</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the attendance details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Student ID:</strong> <?php echo e(old('student_id')); ?></li>
                        <li class="list-group-item"><strong>Course ID:</strong> <?php echo e(old('course_id')); ?></li>
                        <li class="list-group-item"><strong>Attendance Date:</strong> <?php echo e(old('attendance_date')); ?></li>
                        <li class="list-group-item"><strong>Status:</strong> <?php echo e(old('status')); ?></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo e(route('attendance.create')); ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\university_student_management_website\resources\views/attendance/create.blade.php ENDPATH**/ ?>