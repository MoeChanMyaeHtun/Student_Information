<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/twitter-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dataTables.bootstrap5.css')); ?>">
</head>

<body>
    <div class="container-fluid">
        <div class="row g-0">
            <?php echo $__env->make('layouts.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="flex-fill"> </div>
                    <div class="navbar nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">User Profile</a></li>
                                <li><a class="dropdown-item" href="#">Log Out</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link"><i class="fas fa-cog"></i></a>
                        </li>
                    </div>
                </nav>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('js/jquery-3.7.1.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.bootstrap5.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables.fixedColumns.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fixedColumns.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/8a78536087.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable({
                scrollX: true,
                responsive: true,
                fixedColumns: {
                    leftColumns: 3,
                    rightColumns: 1
                },
                columnDefs: [{
                        targets: [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        orderable: false
                    },
                    {
                        targets: '_all',
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).css('text-align', 'left');
                        }
                    }
                ],
            });
            $('#departmentsTable').DataTable({
                scrollX: true,
                responsive: true,
                columnDefs: [{
                    targets: [2],
                    orderable: false
                }]
            });
        });
    </script>
</body>

</html><?php /**PATH D:\university_student_management_website\resources\views/layouts/app.blade.php ENDPATH**/ ?>