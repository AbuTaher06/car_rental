<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Car Rental</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#car-listings">Browse Cars</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light ms-2" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="btn btn-outline-light ms-2" href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero text-white text-center py-5" style="background-image: url('/images/hero-bg.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <h1>Drive Your Dream</h1>
            <p>Your trusted partner for renting cars.</p>
            <a href="#car-listings" class="btn btn-primary">Explore Our Cars</a>
        </div>
    </div>

    <!-- Filtering Options -->
    <div class="container mt-5">
        <h2>Filter Available Cars</h2>
        <form id="filter-form">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Car Type</label>
                    <select class="form-select" name="car_type">
                        <option value="">All Types</option>
                        @foreach($cars->unique('car_type') as $car)
                        <option value="{{ $car->car_type }}">{{ $car->car_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Brand</label>
                    <select class="form-select" name="brand">
                        <option value="">All Brands</option>
                        @foreach($cars->unique('brand') as $car)
                        <option value="{{ $car->brand }}">{{ $car->brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Max Daily Rent ($)</label>
                    <input type="number" class="form-control" name="max_price" placeholder="Enter max price">
                </div>
            </div>
        </form>
    </div>

    <!-- Car Listings in Table Format -->
    <div class="container mt-5" id="car-listings">
        <h2>Available Cars</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year of Manufacture</th>
                    <th>Car Type</th>
                    <th>Daily Rent Price ($)</th>
                    <th>Availability Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="car-list">
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year_of_manufacture }}</td>
                    <td>{{ $car->car_type }}</td>
                    <td>${{ $car->daily_rent_price }}</td>
                    <td>{{ $car->availability_status }}</td>
                    <td><img src="{{ $car->image }}" alt="{{ $car->name }}" style="width: 100px; height: auto;"></td>
                    <td>
                        <form action="{{ route('book', ['carId' => $car->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Book Now</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Car Rental. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Trigger AJAX request when any filter changes
            $('#filter-form select, #filter-form input').on('change keyup', function() {
                $.ajax({
                    url: '{{ route('home') }}',
                    type: 'GET',
                    data: $('#filter-form').serialize(),
                    success: function(data) {
                        // Clear existing car listings
                        $('#car-list').empty();

                        // Populate the table with the filtered data
                        $.each(data, function(index, car) {
                            $('#car-list').append(
                                `<tr>
                                    <td>${car.name}</td>
                                    <td>${car.brand}</td>
                                    <td>${car.model}</td>
                                    <td>${car.year_of_manufacture}</td>
                                    <td>${car.car_type}</td>
                                    <td>$${car.daily_rent_price}</td>
                                    <td>${car.availability_status}</td>
                                    <td><img src="${car.image}" alt="${car.name}" style="width: 100px; height: auto;"></td>
                                    <td>
                                        <form action="/book/${car.id}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-primary btn-sm">Book Now</button>
                                        </form>
                                    </td>
                                </tr>`
                            );
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
</body>
</html>
