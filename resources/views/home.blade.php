@extends('layouts.layout')

@section('title', 'Visitor Pass Management')

@section('content')
<div class="text-center mt-5">
    <p class="text-uppercase font-weight-bold text-primary">Visitor Pass</p>
    <h1 class="display-4 font-weight-bold">Visitor Pass Management System</h1>
    <p class="lead">Welcome, please tap on button to check-in</p>

    <div class="d-flex justify-content-center my-4">
        <a href="{{ route('check-in.create_step') }}" class="btn btn-primary btn-lg mr-2">
            <i class="fas fa-sign-in-alt"></i> Check-in
        </a>
        <a href="#" class="btn btn-outline-primary btn-lg ml-2">
            <i class="fas fa-qrcode"></i> Scan QR
        </a>
    </div>

    <div class="d-flex justify-content-center">
        <div class="p-2">
            <div style="width: 250px; height: 150px; background-color: #ccc; border-radius: 10px;"></div>
        </div>
        <div class="p-2">
            <div style="width: 250px; height: 150px; background-color: #ccc; border-radius: 10px;"></div>
        </div>
    </div>
</div>
@endsection
