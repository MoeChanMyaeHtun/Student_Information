<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Application</title>
    <link rel="stylesheet" href="{{asset('css/all.css')}}" />
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row g-0">
            @include('layouts.includes.sidebar')
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
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/dataTables.fixedColumns.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/fixedColumns.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/8a78536087.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
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

</html>