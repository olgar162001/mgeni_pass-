@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Employee Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Employee Information -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/' . $employee->image) }}" class="rounded-circle img-thumbnail" alt="Employee Image" style="width: 150px; height: 150px;">
                    <h4 class="mt-3">{{ $employee->name }}</h4>
                    <p class="text-muted">{{ $employee->designation->name ?? 'N/A' }}</p>
                </div>

                <!-- Employee Details -->
                <div class="col-md-8">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $employee->name }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $employee->phone }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $employee->email }}</li>
                        <li class="list-group-item"><strong>Joining Date:</strong> {{ $employee->joining_date }}</li>
                        <li class="list-group-item"><strong>Gender:</strong> {{ $employee->gender }}</li>
                        <li class="list-group-item"><strong>Department:</strong> {{ $employee->department->name ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ $employee->status }}</li>
                    </ul>
                    <button class="btn btn-primary mt-3">Download QR</button>
                </div>
            </div>

            <!-- Visitors Section -->
            <div class="mt-5">
                <h4>Visitors</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Checkin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $visitor->image) }}" alt="Visitor Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                                </td>
                                <td>{{ $visitor->name }}</td>
                                <td>{{ $visitor->email }}</td>
                                <td>{{ $visitor->checkin_time }}</td>
                                <td>
                                    <a href="{{ route('visitors.show', $visitor->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this visitor?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
