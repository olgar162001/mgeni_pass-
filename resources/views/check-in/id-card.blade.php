@extends('layouts.vistor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <h2>Visitor ID Card</h2>
            </div>

            <!-- Visitor ID Card -->
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Visitor Pass</h4>
                    <p>Dhaka, Bangladesh</p>
                    <p>E-mail: info@inilabs.xyz</p>
                </div>
                <div class="card-body text-center">
                    <!-- Visitor Photo -->
                    <img src="{{ asset('storage/photos' . $visitor->photo) }}" alt="Visitor Photo" class="rounded mb-3" width="150" height="150">

                    <!-- Visitor Information -->
                    <h5>{{ $visitor->first_name }} {{ $visitor->last_name }}</h5>
                    <p><strong>ID#:</strong> {{ $visitor->token }}</p>
                    <p><strong>Phone:</strong> {{ $visitor->phone }}</p>
                    <p><strong>Host:</strong> {{ $visitor->employee }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 text-center">
                <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                <button class="btn btn-success" onclick="window.print()">Print ID</button>
                <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
