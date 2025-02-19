<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Rental;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['total_cars']=Car::all()->count();
        $data['available_cars']=Car::where('availability_status', 'Available')->count();
        $data['rentals']=Rental::latest()->paginate(5);
        $data['total_earnings']=Rental::sum('total_cost');
        $data['customers']=Customer::all();

        return view('admin.dashboard.index', $data);
    }
}
