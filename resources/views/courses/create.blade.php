@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Course Create</h4>
    </div>

    <form action="{{ route('courses.create.validate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="course_name" class="form-label">Course Name</label><span class="text-danger">*</span>
                <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{ old('course_name') }}">
                @error('course_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="department_id" class="form-label">Department</label><span class="text-danger">*</span>
                <select name="department_id" class="form-control @error('department_id') is-invalid @enderror">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->department_id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                    </option>
                    @endforeach
                </select>
                @error('department_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="credits" class="form-label">Credits</label><span class="text-danger">*</span>
                <input type="number" name="credits" class="form-control @error('credits') is-invalid @enderror" value="{{ old('credits') }}">
                @error('credits')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="semester" class="form-label">Semester</label><span class="text-danger">*</span>
                <select name="semester" class="form-select @error('semester') is-invalid @enderror">
                    <option value="" disabled {{ old('semester') ? '' : 'selected' }}>Select Semester</option>
                    @foreach(App\Enums\CurrentSemester::cases() as $semester)
                    <option value="{{ $semester->value }}" {{ old('semester') == $semester->value ? 'selected' : '' }}>
                        {{ $semester->value }}
                    </option>
                    @endforeach
                </select>
                @error('semester')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="teacher_id" class="form-label">Teacher</label><span class="text-danger">*</span>
                <select name="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                    <option value="{{ $teacher->teacher_id }}" {{ old('teacher_id') == $teacher->teacher_id ? 'selected' : '' }}>
                        {{ $teacher->teacher_name }}
                    </option>
                    @endforeach
                </select>
                @error('teacher_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create Course</button>
        </div>
    </form>

</div>
<!-- Modal -->
@if(session('showModal'))
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="course_name" value="{{ old('course_name') }}">
            <input type="hidden" name="department_id" value="{{ old('department_id') }}">
            <input type="hidden" name="credits" value="{{ old('credits') }}">
            <input type="hidden" name="semester" value="{{ old('semester') }}">
            <input type="hidden" name="teacher_id" value="{{ old('teacher_id') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Course Creation</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the course's details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Course Name:</strong> {{ old('course_name') }}</li>
                        <li class="list-group-item"><strong>Department:</strong> {{ $departments->find(old('department_id'))->department_name }}</li>
                        <li class="list-group-item"><strong>Credits:</strong> {{ old('credits') }}</li>
                        <li class="list-group-item"><strong>Semester:</strong> {{ old('semester') }}</li>
                        <li class="list-group-item"><strong>Teacher:</strong> {{ old('teacher_id') }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('courses.create') }}" class="btn btn-secondary">Cancel</a>
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
@endif

<!-- End Modal -->
@endsection