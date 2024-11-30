@extends('layouts.layout') <!-- Reusing your existing layout -->

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow w-50">
        <!-- Card Header -->
        <div class="card-header bg-primary text-white text-center">
            <h3>Login</h3>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <!-- Remember Me & Forgot Password -->
                <div class="form-group d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="rememberMe" class="form-check-input">
                        <label for="rememberMe" class="form-check-label">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <hr>
            <!-- Demo Login Buttons 
            <div class="text-center">
                <p>For Demo Login, Click Below:</p>
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-info mx-1">Admin</a>
                    <a href="#" class="btn btn-warning mx-1">Employee</a>
                    <a href="#" class="btn btn-secondary mx-1">Reception</a>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
