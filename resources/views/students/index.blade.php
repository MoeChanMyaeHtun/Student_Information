@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student</li>
        </ol>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Student List</h4>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
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
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>
                        @if($student->photo)
                        <img src="{{ asset('storage/photos/' . $student->photo) }}" width="50" height="50" alt="Photo">
                        @else
                        <span>No Photo</span>
                        @endif
                    </td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->enrollment_date }}</td>
                    <td>{{ $student->department->department_name ?? 'N/A' }}</td>
                    <td>{{ $student->current_semester }}</td>
                    <td>{{ $student->status }}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection