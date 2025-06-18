@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attendance List</li>
        </ol>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Attendance List</h4>
        <a href="{{ route('attendance.create') }}" class="btn btn-primary">
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
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->student->student_id }}</td>
                    <td>{{ $attendance->student->student_name }}</td>
                    <td>{{ $attendance->course->course_name }}</td>
                    <td>{{ $attendance->attendance_date }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('attendance.edit', $attendance->attendance_id) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection