@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Attendance Edit</h4>
    </div>

    <form action="{{ route('attendance.create.validate') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="course_id" class="form-label">Course</label><span class="text-danger">*</span>
                <select name="course_id" class="form-control @error('course_id') is-invalid @enderror">
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->course_id }}"
                        {{ old('course_id', $attendance->course_id ?? '') == $course->course_id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                    @endforeach
                </select>
                @error('course_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="student_id" class="form-label">Student</label><span class="text-danger">*</span>
                <select name="student_id" class="form-control @error('student_id') is-invalid @enderror">
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                    <option value="{{ $student->student_id }}"
                        {{ old('student_id', $attendance->student_id ?? '') == $student->student_id ? 'selected' : '' }}>
                        {{ $student->student_name }}
                    </option>
                    @endforeach
                </select>
                @error('student_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label><span class="text-danger">*</span>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="">Select Status</option>
                    @foreach(\App\Enums\AttendanceStatus::cases() as $status)
                    <option value="{{ $status->value }}" {{ old('status', $attendance->status) == $status->value ? 'selected' : '' }}>
                        {{ $status->value }}
                    </option>
                    @endforeach
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="attendance_date" class="form-label">Attendance Date</label><span class="text-danger">*</span>
                <input type="date" name="attendance_date"
                    class="form-control @error('attendance_date') is-invalid @enderror"
                    value="{{ old('attendance_date', isset($attendance->attendance_date) ? \Carbon\Carbon::parse($attendance->attendance_date)->format('Y-m-d') : '') }}">
                @error('attendance_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>

    </form>
</div>
<!-- Modal -->
@if(session('showModal'))
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('attendance.update',$attendance->attendance_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="student_id" value="{{ old('student_id') }}">
            <input type="hidden" name="course_id" value="{{ old('course_id') }}">
            <input type="hidden" name="attendance_date" value="{{ old('attendance_date') }}">
            <input type="hidden" name="status" value="{{ old('status') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Attendance Edition</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the attendance details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Student ID:</strong> {{ old('student_id') }}</li>
                        <li class="list-group-item"><strong>Course ID:</strong> {{ old('course_id') }}</li>
                        <li class="list-group-item"><strong>Attendance Date:</strong> {{ old('attendance_date') }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ old('status') }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('attendance.update',$attendance->attendance_id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
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