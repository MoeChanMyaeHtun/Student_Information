@extends('layouts.app')
@section('content')
<div class="container-fluid p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Department</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Department Create</h4>
    </div>

    <form action="{{ route('departments.create.validate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="department_name" class="form-label">Department Name</label><span class="text-danger">*</span>
                <input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" value="{{ old('department_name') }}">
                @error('department_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create Department</button>
        </div>
    </form>

</div>
<!-- Modal -->
@if(session('showModal'))
<div class="modal fade show" id="confirmModal" style="display: block;" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('departments.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="department_name" value="{{ old('department_name') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Department Creation</h5>
                </div>
                <div class="modal-body">
                    <p>Please confirm the department's details before saving:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Department Name:</strong> {{ old('department_name') }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('departments.create') }}" class="btn btn-secondary">Cancel</a>
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