<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all cars by default
        $cars = Car::all();

        // If there are filter parameters, apply them
        if ($request->ajax()) {
            if ($request->has('car_type') && $request->car_type != '') {
                $cars = $cars->where('car_type', $request->car_type);
            }
            if ($request->has('brand') && $request->brand != '') {
                $cars = $cars->where('brand', $request->brand);
            }
            if ($request->has('max_price') && $request->max_price != '') {
                $cars = $cars->where('daily_rent_price', '<=', $request->max_price);
            }
            return response()->json($cars);
        }

        return view('home', compact('cars'));
    }


}
