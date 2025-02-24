<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    // View all rentals
    public function index()
    {
        $rentals = Rental::with('car')->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    // Show form to create a rental
    public function create()
    {
        $cars = Car::where('availability_status', 'Available')->get();
        return view('admin.rentals.create', compact('cars'));
    }

    // Store new rental
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:Ongoing,Completed,Canceled'
        ]);

        Rental::create($request->all());
        //  // Send email to user
        //  $user->notify(new RentalConfirmed($rental));

        //  // Send email to admin (example)
        //  $admin = User::where('role', 'admin')->first();
        //  $admin->notify(new NewRentalAlert($rental));

        // return response()->json($rental);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental added successfully!');
    }

    // Show form to edit a rental
    public function edit(Rental $rental)
    {
        $cars = Car::all();
        return view('admin.rentals.edit', compact('rental', 'cars'));
    }

    // Update rental details
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:Ongoing,Completed,Canceled'
        ]);

        $rental->update($request->all());

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully!');
    }

    // Delete a rental
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully!');
    }


}
