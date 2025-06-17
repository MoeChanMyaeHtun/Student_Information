@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Teacher</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Teacher Edit</h4>
    </div>

    <form action="{{ route('teachers.create.validate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="teacher_name" class="form-label">Teacher Name</label><span class="text-danger">*</span>
                <input type="text" name="teacher_name" class="form-control @error('teacher_name') is-invalid @enderror" value="{{ old('teacher_name', $teacher->teacher_name) }}">
                @error('teacher_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label><span class="text-danger">*</span>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $teacher->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label><span class="text-danger">*</span>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $teacher->phone) }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label><span class="text-danger">*</span>
                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="" disabled {{ old('gender', $teacher->gender) ? '' : 'selected' }}>Select Gender</option>
                    @foreach(App\Enums\Gender::cases() as $gender)
                    <option value="{{ $gender->value }}" {{ old('gender', $teacher->gender) == $gender->value ? 'selected' : '' }}>
                        {{ $gender->value }}
                    </option>
                    @endforeach
                </select>
                @error('gender')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">Date of Birth</label><span class="text-danger">*</span>
                <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth', $teacher->date_of_birth) }}">
                @error('date_of_birth')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $teacher->address) }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update Teacher</button>
        </div>
    </form>

</div>
<!-- Modal -->
@if(session('showModal'))
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('teachers.update',$teacher->teacher_id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="teacher_name" value="{{ old('teacher_name') }}">
            <input type="hidden" name="email" value="{{ old('email') }}">
            <input type="hidden" name="phone" value="{{ old('phone') }}">
            <input type="hidden" name="gender" value="{{ old('gender') }}">
            <input type="hidden" name="date_of_birth" value="{{ old('date_of_birth') }}">
            <input type="hidden" name="address" value="{{ old('address') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Teacher Creation</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the teacher's details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Teacher Name:</strong> {{ old('teacher_name') }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ old('email') }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ old('phone') }}</li>
                        <li class="list-group-item"><strong>Gender:</strong> {{ old('gender') }}</li>
                        <li class="list-group-item"><strong>Date of Birth:</strong> {{ old('date_of_birth') }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ old('address') }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('teachers.edit',$teacher->teacher_id) }}" class="btn btn-secondary">Cancel</a>
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