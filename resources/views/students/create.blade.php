@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Student Create</h4>
    </div>

    <form action="{{ route('students.create.validate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="student_name" class="form-label">Name</label><span class="text-danger">*</span>
                <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" value="{{ old('student_name') }}">
                @error('student_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                    @foreach(App\Enums\Gender::cases() as $gender)
                    <option value="{{ $gender->value }}" {{ old('gender') == $gender->value ? 'selected' : '' }}>
                        {{ $gender->value }}
                    </option>
                    @endforeach
                </select>
                @error('gender')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
            @error('address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="enrollment_date" class="form-label">Enrollment Date</label><span class="text-danger">*</span>
                <input type="date" name="enrollment_date" class="form-control @error('enrollment_date') is-invalid @enderror" value="{{ old('enrollment_date') }}">
                @error('enrollment_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="current_semester" class="form-label">Current Semester</label><span class="text-danger">*</span>
                <select name="current_semester" class="form-select @error('current_semester') is-invalid @enderror">
                    <option value="" disabled {{ old('current_semester') ? '' : 'selected' }}>Select Semester</option>
                    @foreach(App\Enums\CurrentSemester::cases() as $semester)
                    <option value="{{ $semester->value }}" {{ old('current_semester') == $semester->value ? 'selected' : '' }}>
                        {{ $semester->value }}
                    </option>
                    @endforeach
                </select>
                @error('current_semester')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="department_id" class="form-label">Department</label><span class="text-danger">*</span>
                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                    <option value="" disabled selected>Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->department_id }}" {{ old('department_id') == $department->department_id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label><span class="text-danger">*</span>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select Status</option>
                    @foreach(App\Enums\StudentStatus::cases() as $status)
                    <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected' : '' }}>
                        {{ $status->value }}
                    </option>
                    @endforeach
                </select>
                @error('status')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create Student</button>
        </div>
    </form>
</div>

<!-- Modal -->
@if(session('showModal'))
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_name" value="{{ old('student_name') }}">
            <input type="hidden" name="email" value="{{ old('email') }}">
            <input type="hidden" name="phone" value="{{ old('phone') }}">
            <input type="hidden" name="date_of_birth" value="{{ old('date_of_birth') }}">
            <input type="hidden" name="gender" value="{{ old('gender') }}">
            <input type="hidden" name="address" value="{{ old('address') }}">
            <input type="hidden" name="enrollment_date" value="{{ old('enrollment_date') }}">
            <input type="hidden" name="current_semester" value="{{ old('current_semester') }}">
            <input type="hidden" name="department_id" value="{{ old('department_id') }}">
            <input type="hidden" name="status" value="{{ old('status') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Student Creation</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the student's details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ old('student_name') }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ old('email') }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ old('phone') }}</li>
                        <li class="list-group-item"><strong>DOB:</strong> {{ old('date_of_birth') }}</li>
                        <li class="list-group-item"><strong>Gender:</strong> {{ old('gender') }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ old('address') }}</li>
                        <li class="list-group-item"><strong>Enrollment Date:</strong> {{ old('enrollment_date') }}</li>
                        <li class="list-group-item"><strong>Semester:</strong> {{ old('current_semester') }}</li>
                        <li class="list-group-item"><strong>Department ID:</strong> {{ old('department_id') }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ old('status') }}</li>
                        <li class="list-group-item text-warnig"><strong>Note:</strong> Please re-select the photo file.</li>
                        <div class="mt-2">
                            <label for="photo_url" class="form-label">Upload Photo</label>
                            <input type="file" name="photo_url" class="form-control">
                        </div>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('students.create') }}" class="btn btn-secondary">Cancel</a>
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