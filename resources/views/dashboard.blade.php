<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>User Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Car Rental</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cars">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rental">Rental</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 text-center">Welcome to Your Dashboard</h1>

        <!-- Welcome Message -->
        <div class="alert alert-info text-center" role="alert">
            Welcome, {{ Auth::user()->name }}! Here’s what you can do:
        </div>

        <div class="row mt-4">
            <!-- Available Cars Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Available Cars</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($availableCars as $car)
                                <li class="list-group-item">{{ $car->name }} - ${{ $car->daily_rent_price }}/day</li>
                            @endforeach
                        </ul>
                        <a href="/cars" class="btn btn-primary mt-3">Browse Cars</a>
                    </div>
                </div>
            </div>

            <!-- My Bookings Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">My Bookings</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($userBookings as $booking)
                                <li class="list-group-item">{{ $booking->car->name }} - Status: {{ $booking->status }}</li>
                            @endforeach
                        </ul>
                        <a href="/my-bookings" class="btn btn-secondary mt-3">View All Bookings</a>
                    </div>
                </div>
            </div>

            <!-- Account Settings Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Account Settings</div>
                    <div class="card-body">
                        <a href="/profile" class="btn btn-warning">Edit Profile</a>
                        <form action="{{ route('logout') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking History Section -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Booking History</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Car Name</th>
                                    <th>Rental Start</th>
                                    <th>Rental End</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookingHistory as $history)
                                    <tr>
                                        <td>{{ $history->car->name }}</td>
                                        <td>{{ $history->start_date }}</td>
                                        <td>{{ $history->end_date }}</td>
                                        <td>{{ $history->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
