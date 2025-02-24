<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">User Dashboard</h1>

        <!-- Welcome Message -->
        <div class="alert alert-info" role="alert">
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
