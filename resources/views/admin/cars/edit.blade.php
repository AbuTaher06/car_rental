@extends('admin.master')

@section('title', 'Edit Car')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Car</h1>

    <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Car Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $car->name) }}" required>
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $car->brand) }}" required>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" required>
        </div>

        <div class="form-group">
            <label for="year_of_manufacture">Year of Manufacture</label>
            <input type="number" class="form-control" id="year_of_manufacture" name="year_of_manufacture" value="{{ old('year_of_manufacture', $car->year_of_manufacture) }}" required>
        </div>

        <div class="form-group">
            <label for="car_type">Car Type</label>
            <select class="form-control" id="car_type" name="car_type" required>
                <option value="SUV" {{ old('car_type', $car->car_type) == 'SUV' ? 'selected' : '' }}>SUV</option>
                <option value="Sedan" {{ old('car_type', $car->car_type) == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                <option value="Hatchback" {{ old('car_type', $car->car_type) == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                <option value="Convertible" {{ old('car_type', $car->car_type) == 'Convertible' ? 'selected' : '' }}>Convertible</option>
            </select>
        </div>

        <div class="form-group">
            <label for="daily_rent_price">Daily Rent Price</label>
            <input type="number" step="0.01" class="form-control" id="daily_rent_price" name="daily_rent_price" value="{{ old('daily_rent_price', $car->daily_rent_price) }}" required>
        </div>

        <div class="form-group">
            <label for="availability_status">Availability Status</label>
            <select class="form-control" id="availability_status" name="availability_status" required>
                <option value="Available" {{ old('availability_status', $car->availability_status) == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Not Available" {{ old('availability_status', $car->availability_status) == 'Not Available' ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>

        <div class="form-group">
            <label for="car_image">Car Image</label>
            <input type="file" class="form-control-file" id="car_image" name="car_image">
            @if($car->car_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $car->car_image) }}" alt="Car Image" width="100">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Car</button>
        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
