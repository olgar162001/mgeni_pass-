@extends('layouts.app')

@section('title', 'Edit Designation')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Edit Designation</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('designations.update', $designation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- designations Name -->
                <div class="form-group">
                    <label for="name">Designation Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $designation->name) }}" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="Active" {{ $designation->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $designation->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Update Designation</button>
                <a href="{{ route('designations.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
