@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course</li>
        </ol>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Course List</h4>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
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
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->course_id }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->department->department_name }}</td>
                    <td>{{ $course->semester }}</td>
                    <td>{{ $course->credits }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning me-2">
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