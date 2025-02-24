@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Cars</h1>

    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($car->image) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">
                        Brand: {{ $car->brand }}<br>
                        Price: ${{ $car->daily_rent_price }}/day
                    </p>
                    <a href="{{ route('cars.show', $car) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{ $cars->links() }}
</div>
@endsection
