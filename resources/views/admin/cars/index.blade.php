@extends('admin.master')

@section('title', 'Cars')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Cars</h1>

    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year_of_manufacture }}</td>
                        <td>${{ $car->daily_rent_price }}</td>
                        <td>{{ $car->availability_status }}</td>
                        <td><img src="{{ asset( $car->image) }}" alt="Car Image" width="100"></td>
                        <td>
                            <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
