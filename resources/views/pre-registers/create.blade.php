@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>Pre-Register Visitor</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pre-registers.store') }}" method="POST">
                @csrf

                <!-- Full Name -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="first_name" class="form-control" placeholder="Enter first name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required>
                        </div>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-Mail Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                        </div>
                    </div>
                </div>

                <!-- Identification -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="national_id" class="form-label">National ID <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" name="national_id" class="form-control" placeholder="Enter National ID" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Employee Selection -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="employee_id" class="form-label">Select Employee <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                            <select name="employee_id" class="form-control" required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->department->name }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="expected_date" class="form-label">Expected Date <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" name="expected_date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Time and Additional Details -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expected_time" class="form-label">Expected Time <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            <input type="time" name="expected_time" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea name="comment" class="form-control" placeholder="Additional information"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter address"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
