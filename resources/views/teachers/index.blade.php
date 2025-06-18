@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Teacher</li>
        </ol>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Teacher List</h4>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <div class="table-responsive">
        <table id="departmentsTable" class="table table-bordered table-striped nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>Teacher Id</th>
                    <th>Teacher Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->teacher_id }}</td>
                    <td>{{ $teacher->teacher_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->date_of_birth }}</td>
                    <td>{{ $teacher->gender }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('teachers.edit', $teacher->teacher_id) }}" class="btn btn-sm btn-warning me-2">
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