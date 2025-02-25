<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Car; // Ensure you have a Car model

class BookingController extends Controller
{
    public function book(Request $request, $carId)
    {
        //dd($request->all());
        $car = Car::findOrFail($carId);

        // Validate the request data
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Check if the user is authenticated
        if (Auth::check()) {
            // Create the rental record
            Rental::create([
                'customer_id' => Auth::id(),
                'car_id' => $car->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'total_cost' => $car->daily_rent_price * (Carbon::parse($request->end_date)->diffInDays($request->start_date) + 1), // Calculate total cost
                'status' => 'Pending',
            ]);

            // Redirect to the dashboard with a success message
            return redirect()->route('dashboard')->with('success', 'Booking confirmed for ' . $car->name);
        }

        // Redirect to login with an error message if not authenticated
        return redirect()->route('login')->with('error', 'Please log in to confirm your booking.');
    }

}
