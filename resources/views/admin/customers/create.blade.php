@extends('admin.master')

@section('title', 'Add Customer')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Add Customer</h1>

    <form action="{{ route('admin.customers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Customer</button>
    </form>
@endsection
