<?php

use Illuminate\Support\Facades\Route;

// Frontend routes for the Vue app
Route::get('/', function () {
    return view('welcome');  // Or your specific homepage view (like 'home')
});

Route::get('/about', function () {
    return view('about');  // This would correspond to the 'About.vue' in Vue
});

// More frontend routes like '/rentals', '/contact', '/login', '/signup', etc.
Route::get('/rentals', function () {
    return view('rentals');  // A view that loads your Rentals Vue page
});

Route::get('/contact', function () {
    return view('contact');  // A view that loads your Contact Vue page
});

// Other Vue frontend routes...

// Admin routes (keeping your current setup)
Route::group([], function () {
    require base_path('routes/admin.php');
});
