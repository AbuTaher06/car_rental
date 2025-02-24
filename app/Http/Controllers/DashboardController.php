<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        //$cars=Car::where('availability_status', 'Available')->get();
        $availableCars = Car::where('availability_status', 'available')->get();
        $userBookings = Rental::where('customer_id', Auth::id())->where('status', 'active')->get();
        $bookingHistory = Rental::where('customer_id', Auth::id())->get(); // Fetch all history
       // dd($user);
        if (!$user->is_admin == 0) {
            Auth::logout();
            return back()->with(['error' => 'You have to login.']);
        }
        else{
            return view('dashboard',compact('bookingHistory','userBookings','availableCars'));
        }

    }
}
