@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">GPA List</li>
        </ol>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">GPA List</h4>
        <a href="{{ route('gpas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <div class="table-responsive">
        <table id="departmentsTable" class="table table-bordered table-striped nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>GPA ID</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Semester</th>
                    <th>GPA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gpas as $gpa)
                <tr>
                    <td>{{ $gpa->gpa_id }}</td>
                    <td>{{ $gpa->student->student_id }}</td>
                    <td>{{ $gpa->student->student_name }}</td>
                    <td>{{ $gpa->semester }}</td>
                    <td>{{ $gpa->gpa }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('gpas.edit', $gpa->gpa_id) }}" class="btn btn-sm btn-warning me-2">
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