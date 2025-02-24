@extends('admin.master')

@section('title', 'Add Rental')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add Rental</h1>

    <form action="{{ route('admin.rentals.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>

        <div class="form-group">
            <label for="car_id">Select Car</label>
            <select class="form-control" id="car_id" name="car_id" required>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->brand }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>

        <div class="form-group">
            <label for="total_cost">Total Cost</label>
            <input type="number" class="form-control" id="total_cost" name="total_cost" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
                <option value="Canceled">Canceled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Rental</button>
    </form>
@endsection
