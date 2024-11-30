@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow" style="width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h3>Forgot Password</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('password.request') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
            </form>
        </div>
    </div>
</div>
@endsection
