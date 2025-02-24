<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RentalController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public routes
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/signup', [AuthController::class, 'signup']);
// Route::get('/cars', [CarController::class, 'index']); // With filters

// Protected routes (auth:sanctum middleware)
// Route::middleware('auth:sanctum')->group(function () {
//   Route::post('/check-availability', [RentalController::class, 'checkAvailability']);
//   Route::post('/rentals', [RentalController::class, 'store']);
//   Route::get('/bookings', [RentalController::class, 'userBookings']);
//   Route::delete('/bookings/{id}', [RentalController::class, 'cancel']);
// });
