@extends('admin.master')

@section('title', 'Edit Rental')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Rental</h1>

    <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Customer Name -->
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                   value="{{ old('customer_name', $rental->customer_name) }}" required>
        </div>

        <!-- Car Selection -->
        <div class="form-group">
            <label for="car_id">Car</label>
            <select class="form-control" id="car_id" name="car_id" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->name }} ({{ $car->brand }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Rental Start Date -->
        <div class="form-group">
            <label for="start_date">Rental Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date"
                   value="{{ old('start_date', $rental->start_date) }}" required>
        </div>

        <!-- Rental End Date -->
        <div class="form-group">
            <label for="end_date">Rental End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date"
                   value="{{ old('end_date', $rental->end_date) }}" required>
        </div>

        <!-- Total Cost -->
        <div class="form-group">
            <label for="total_cost">Total Cost ($)</label>
            <input type="number" step="0.01" class="form-control" id="total_cost" name="total_cost"
                   value="{{ old('total_cost', $rental->total_cost) }}" required>
        </div>

        <!-- Rental Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Ongoing" {{ $rental->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="Completed" {{ $rental->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Canceled" {{ $rental->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Update Rental</button>
    </form>
@endsection
