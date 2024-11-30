@extends('layouts.vistor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Visitor Photo Capture -->
            <div class="text-center mb-4">
                <h4>Take Visitor Photo</h4>
                <div>
                    <video id="video" width="300" height="225" autoplay></video>
                    <canvas id="canvas" width="300" height="225" style="display: none;"></canvas>
                </div>
                <div>
                    <button id="captureButton" class="btn btn-primary mt-2">Capture Photo</button>
                </div>
            </div>

            <!-- Visitor Information -->
            <div class="card">
                <div class="card-header text-center">
                    <h4>Your Information</h4>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $visitor->first_name }} {{ $visitor->last_name }}</p>
                    <p><strong>Phone:</strong> {{ $visitor->phone }}</p>
                    <p><strong>Email:</strong> {{ $visitor->email }}</p>
                    <p><strong>NID No:</strong> {{ $visitor->id_no }}</p>
                    <p><strong>Host:</strong> {{ $visitor->employee }}</p>
                    <p><strong>Purpose:</strong> {{ $visitor->purpose }}</p>
                    <p><strong>Address:</strong> {{ $visitor->address }}</p>
                </div>
            </div>

            <!-- Continue and Cancel Buttons -->
            <div class="mt-4 text-center">
                <form id="photoForm" method="POST" action="{{ route('check-in.storePhoto', $visitor->id) }}">
                    @csrf
                    <input type="hidden" name="photo" id="photoInput">
                    <button type="submit" class="btn btn-primary">Continue</button>
                </form>
                <a href="{{ route('home', $visitor->id) }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Access the webcam and capture photo
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('captureButton');
    const photoInput = document.getElementById('photoInput');

    // Start video stream
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error('Error accessing webcam:', err);
        });

    // Capture photo and store it in the hidden input
    captureButton.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    canvas.style.display = 'block';
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Convert canvas to base64 image
    const imageData = canvas.toDataURL('image/png');
    photoInput.value = imageData;

    alert('Photo captured successfully!');

    console.log(photoInput.value); // Debug to confirm base64 image data
});

</script>
@endsection
