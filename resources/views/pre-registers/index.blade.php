@extends('layouts.app')

@section('title', 'Pre-registers')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">Pre-registers</h3>
    
    <!-- Add Pre-register Button -->
    <div class="text-right mb-3">
        <a href="{{ route('pre-registers.create') }}" class="btn btn-success btn-lg"><i class="fas fa-plus-circle"></i> Add Pre-register</a>
    </div>

    <!-- Table Container with Card-like design -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Pre-registers List</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Employee</th>
                        <th>Expected Date</th>
                        <th>Expected Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($preRegisters as $preRegister)
                    <tr class="text-center">
                        <td>{{ $preRegister->id }}</td>
                        <td>{{ $preRegister->first_name }} {{ $preRegister->last_name }}  </td>
                        <td>{{ $preRegister->email }}</td>
                        <td>{{ $preRegister->phone }}</td>
                        <td>{{ $preRegister->employee->first_name}} {{ $preRegister->employee->last_name }} ({{ $preRegister->employee->department->name ?? 'No Department' }})</td>
                        <td>{{ \Carbon\Carbon::parse($preRegister->expected_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($preRegister->expected_time)->format('h:i A') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('pre-registers.show', $preRegister) }}" class="btn btn-info btn-sm mr-2"><i class="fas fa-eye"></i> View</a>
                            <a href="{{ route('pre-registers.edit', $preRegister) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <form action="{{ route('pre-registers.destroy', $preRegister) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No pre-registers found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
