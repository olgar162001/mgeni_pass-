@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Returning Visitor Section -->
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Return Visitor Details</h4>
                </div>
                <div class="card-body">
                    <!-- Form for Entering Token, Email, Phone, or NID -->
                    <form method="POST" action="{{ route('visitor.checkToken') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="searchField" class="form-label">
                                Visitor's Email, Phone, or NID <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="search_field" id="searchField" class="form-control" placeholder="Enter Token, Email, Phone, or NID" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
