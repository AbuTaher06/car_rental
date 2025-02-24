@extends('admin.master')

@section('title', 'Manage Rentals')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Manage Rentals</h1>

    <a href="{{ route('admin.rentals.create') }}" class="btn btn-primary mb-3">Add Rental</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->customer_name }}</td>
                    <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                    <td>{{ $rental->start_date }}</td>
                    <td>{{ $rental->end_date }}</td>
                    <td>${{ $rental->total_cost }}</td>
                    <td>{{ $rental->status }}</td>
                    <td>
                        <a href="{{ route('admin.rentals.edit', $rental) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.rentals.destroy', $rental) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this rental?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
