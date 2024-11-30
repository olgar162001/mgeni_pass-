@extends('layouts.vistor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Visitor Check-In</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('visitor.storeInfo', $visitor->id) }}">
                        @csrf

                        <!-- Display constant fields as read-only -->
                        <div class="form-group mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" class="form-control" value="{{ $visitor->first_name }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" class="form-control" value="{{ $visitor->last_name }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control" value="{{ $visitor->phone }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" value="{{ $visitor->email }}" disabled>
                        </div>

                        <!-- Editable non-constant fields -->
                        <div class="form-group mb-3">
                            <label for="purpose">Purpose of Visit</label>
                            <input type="text" name="purpose" id="purpose" class="form-control" placeholder="Enter purpose of visit" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select name="employee_id" id="employee_id" class="form-control">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ $visitor->employee_id == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit to proceed to photo capture -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Next: Capture Photo</button>
                            <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
