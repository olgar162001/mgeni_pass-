@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Edit Employee</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $employee->first_name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" required>
                </div>

                <div class="form-group">
                    <label for="joining_date">Joining Date</label>
                    <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{ $employee->joining_date }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $employee->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if($employee->image)
                        <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" class="img-thumbnail mt-2" style="width: 100px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
