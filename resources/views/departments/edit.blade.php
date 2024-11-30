@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Edit Department</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Department Name -->
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $department->name) }}" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="Active" {{ $department->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $department->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Update Department</button>
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
