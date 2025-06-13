@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Department</li>
        </ol>
    </nav>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="font-weight-bold">Department List</h4>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>
    <div class="table-responsive">
        <table id="departmentsTable" class="table table-bordered table-striped nowrap" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>Department Id</th>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->department_id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection