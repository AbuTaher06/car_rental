<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Show all cars
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    // Show form for creating a new car
    public function create()
    {
        return view('admin.cars.create');
    }

    // Store a new car
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year_of_manufacture' => 'required|integer|digits:4',
        'car_type' => 'required|in:SUV,Sedan,Coupe,Convertible',
        'daily_rent_price' => 'required|numeric',
        'availability_status' => 'required|in:Available,Not Available',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('assets/uploads/cars', 'public');
        $validated['image'] = $imagePath;
    }


    Car::create($validated);

    return redirect()->route('admin.cars.index')->with('success', 'Car added successfully');
}


    // Show form for editing a car
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    // Update car details
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year_of_manufacture' => 'required|integer|digits:4',
            'car_type' => 'required|in:SUV,Sedan,Coupe,Convertible',
            'daily_rent_price' => 'required|numeric',
            'availability_status' => 'required|in:Available,Not Available',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $imagePath = $request->file('image')->store('cars_images', 'public');
            $validated['image'] = $imagePath;
        }

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully');
    }

    // Delete a car
    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully');
    }
}
