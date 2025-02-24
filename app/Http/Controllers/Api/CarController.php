<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index()
{
  return response()->json([
    'data' => Car::all() // Return JSON for Vue to consume
  ]);
}
}
