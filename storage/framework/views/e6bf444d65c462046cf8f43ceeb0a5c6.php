<?php $__env->startSection('content'); ?>
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student</li>
        </ol>
    </nav>
    <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Student List</h4>
        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <div class="table-responsive">
        <table id="studentsTable" class="table table-bordered table-striped nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>Student Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Enrollment Date</th>
                    <th>Department</th>
                    <th>Current Semester</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($student->student_id); ?></td>
                    <td>
                        <?php if($student->photo): ?>
                        <img src="<?php echo e(asset('storage/photos/' . $student->photo)); ?>" width="50" height="50" alt="Photo">
                        <?php else: ?>
                        <span>No Photo</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($student->student_name); ?></td>
                    <td><?php echo e($student->email); ?></td>
                    <td><?php echo e($student->phone); ?></td>
                    <td><?php echo e($student->date_of_birth); ?></td>
                    <td><?php echo e($student->gender); ?></td>
                    <td><?php echo e($student->address); ?></td>
                    <td><?php echo e($student->enrollment_date); ?></td>
                    <td><?php echo e($student->department->department_name ?? 'N/A'); ?></td>
                    <td><?php echo e($student->current_semester); ?></td>
                    <td><?php echo e($student->status); ?></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-sm btn-warning me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($student->id); ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="deleteModal<?php echo e($student->id); ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo e($student->id); ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel<?php echo e($student->id); ?>">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete student <strong><?php echo e($student->student_name); ?></strong>?
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="<?php echo e(route('students.delete', $student->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\university_student_management_website\resources\views/students/index.blade.php ENDPATH**/ ?>