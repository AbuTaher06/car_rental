<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\CustomerController;
//Redirect root to login page
// Route::get('/', function () {
//     return redirect()->route('login');
// });

// Authentication Routes
Route::get('admin-login', [AuthController::class, 'login'])->name('login');
Route::post('/submit/login', [AuthController::class, 'submitLogin'])->name('submit.login');

// Admin routes protected by 'admin' middleware
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

     // List cars
     Route::get('cars', [CarController::class, 'index'])->name('cars.index');

     // Create car
     Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
     Route::post('cars', [CarController::class, 'store'])->name('cars.store');

     // Edit car
     Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
     Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');

     // Delete car
     Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

     Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index'); // View all rentals
     Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create'); // Add rental form
     Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store'); // Store rental

     Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])->name('rentals.edit'); // Edit rental
     Route::put('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update'); // Update rental
     Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy'); // Delete rental

    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index'); // List Customers
    Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create'); // Add Customer Form
    Route::post('customers', [CustomerController::class, 'store'])->name('customers.store'); // Store Customer
    Route::get('customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit'); // Edit Customer Form
    Route::put('customers/{customer}', [CustomerController::class, 'update'])->name('customers.update'); // Update Customer
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy'); // Delete Customer
    Route::get('customers/{customer}/rental-history', [CustomerController::class, 'rentalHistory'])->name('customers.rental_history'); // Rental History


});

