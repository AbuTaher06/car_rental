<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.auth.login');
    }
    public function submitLogin(Request $request)
    {
      //  dd(User::all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }

        $user = Auth::user();
       // dd($user);
        if (!$user->is_admin == 1) {
            Auth::logout();
            return back()->with(['error' => 'Access denied. Admins only.']);
        }

      //  dd("ok");


        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
