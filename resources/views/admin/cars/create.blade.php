@extends('admin.master')

@section('title', 'Add Car')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add Car</h1>

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Car Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
        </div>

        <div class="form-group">
            <label for="year_of_manufacture">Year of Manufacture</label>
            <input type="number" class="form-control" id="year_of_manufacture" name="year_of_manufacture" value="{{ old('year_of_manufacture') }}" required>
        </div>

        <div class="form-group">
            <label for="car_type">Car Type</label>
            <select class="form-control" id="car_type" name="car_type" required>
                <option value="">Select Car Type</option>
                <option value="SUV">SUV</option>
                <option value="Sedan">Sedan</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Convertible">Convertible</option>
            </select>
        </div>

        <div class="form-group">
            <label for="daily_rent_price">Daily Rent Price</label>
            <input type="number" step="0.01" class="form-control" id="daily_rent_price" name="daily_rent_price" value="{{ old('daily_rent_price') }}" required>
        </div>

        <div class="form-group">
            <label for="availability_status">Availability Status</label>
            <select class="form-control" id="availability_status" name="availability_status" required>
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Car Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Add Car</button>
        <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
