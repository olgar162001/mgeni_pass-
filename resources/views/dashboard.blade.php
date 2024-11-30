@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card text-center text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Employees</h5>
                <p class="card-text display-4">{{ $totalEmployees }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Visitors</h5>
                <p class="card-text display-4">{{ $totalVisitors }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Pre-registers</h5>
                <p class="card-text display-4">{{ $totalPreRegisters }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h4>Visitors <span class="badge badge-primary">{{ $totalVisitors }}</span></h4>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Visitor ID</th>
                    <th>Employee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->id }}</td>
                    <td>{{ $visitor->employee->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('visitor.edit', $visitor->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No visitors found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
