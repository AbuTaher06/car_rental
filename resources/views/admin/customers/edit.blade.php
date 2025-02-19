@extends('admin.master')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Customer</h1>

    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone"
                   value="{{ old('phone', $customer->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" required>{{ old('address', $customer->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Customer</button>
    </form>
@endsection
