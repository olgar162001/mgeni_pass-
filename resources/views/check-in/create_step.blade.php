@extends('layouts.vistor')

@section('title', 'Visitor Check-In')

@section('content')
<div class="container">
    <h2 class="text-primary my-4">Visitor Details</h2>
    <form action="{{ route('check-in.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name<span class="text-danger">*</span></label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name<span class="text-danger">*</span></label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone<span class="text-danger">*</span></label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender<span class="text-danger">*</span></label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="employee_id">Select Employee</label>
                    <select name="employee_id" id="employee_id" class="form-control">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" id="company_name" name="company_name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_no">National Identification No.<span class="text-danger">*</span></label>
                    <input type="text" id="id_no" name="id_no" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="purpose">Purpose<span class="text-danger">*</span></label>
                    <textarea id="purpose" name="purpose" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Continue</button>
        </div>
    </form>
</div>
@endsection
