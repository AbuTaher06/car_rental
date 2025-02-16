<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.index');
});


Route::group([], function () {
    require base_path('routes/admin.php');
});
