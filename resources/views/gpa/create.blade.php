@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">GPA</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>GPA Create</h4>
    </div>

    <form action="{{ route('gpas.create.validate') }}" method="POST">
        @csrf
        <div class="row mb-3">
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
            <div class="col-md-6">
                <label for="student_id" class="form-label">Student</label><span class="text-danger">*</span>
                <select name="student_id" class="form-control @error('student_id') is-invalid @enderror">
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                    <option value="{{ $student->student_id }}" {{ old('student_id') == $student->student_id ? 'selected' : '' }}>
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
                <label for="gpa" class="form-label">GPA</label>
                <input type="text" name="gpa" class="form-control @error('gpa') is-invalid @enderror" value="{{ old('gpa') }}">
                @error('gpa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('gpas.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
<!-- Modal -->
@if(session('showModal'))
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('gpas.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" value="{{ old('student_id') }}">
            <input type="hidden" name="gpa" value="{{ old('gpa') }}">
            <input type="hidden" name="semester" value="{{ old('semester') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm GPA Creation</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the gpa details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Student ID:</strong> {{ old('student_id') }}</li>
                        <li class="list-group-item"><strong>GPA:</strong> {{ old('gpa') }}</li>
                        <li class="list-group-item"><strong>Semester:</strong> {{ old('semester') }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('gpas.create') }}" class="btn btn-secondary">Cancel</a>
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