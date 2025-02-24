<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Car; // Ensure you have a Car model

class BookingController extends Controller
{
    public function book(Request $request, $carId)
    {
        $car = Car::findOrFail($carId);

        // Check if the user is authenticated
        if (Auth::check()) {
            // Create the rental record
            Rental::create([
                'customer_id' => Auth::id(),
                'car_id' => $car->id,
                'start_date' => now(),
                'end_date' => now()->addDays(1),
                'total_cost' => $car->daily_rent_price, // Use daily rent price
                'status' => 'Pending',
            ]);

            // Redirect to the dashboard with a success message
            return redirect()->route('dashboard')->with('success', 'Booking confirmed for ' . $car->name);
        }

        // Redirect to login with an error message if not authenticated
        return redirect()->route('login')->with('error', 'Please log in to confirm your booking.');
    }
}
