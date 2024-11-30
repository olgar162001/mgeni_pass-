@extends('layouts.vistor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

            <form id="photoForm" method="POST" action="{{ route('visitor.storePhoto', $visitor->id) }}">
                @csrf
                <input type="hidden" name="photo" id="photoInput">

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Finish Check-In</button>
                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Access the webcam and capture photo
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('captureButton');
    const photoInput = document.getElementById('photoInput');

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => console.error('Error accessing webcam:', err));

    captureButton.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.style.display = 'block';
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        const imageData = canvas.toDataURL('image/png');
        photoInput.value = imageData;
        alert('Photo captured successfully!');
    });
</script>
@endsection
