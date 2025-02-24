@extends('admin.master')

@section('title', 'Rental History')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ $customer->name }} - Rental History</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rental ID</th>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer->rentals as $rental)
                <tr>
                    <td>{{ $rental->id }}</td>
                    <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                    <td>{{ $rental->start_date }}</td>
                    <td>{{ $rental->end_date }}</td>
                    <td>${{ number_format($rental->total_cost, 2) }}</td>
                    <td>{{ $rental->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
