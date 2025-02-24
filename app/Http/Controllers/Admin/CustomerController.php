<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Rental;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form to create a new customer.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created customer in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        Customer::create($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully!');
    }

    /**
     * Show the form to edit an existing customer.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update a customer in the database.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        $customer->update($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Delete a customer from the database.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully!');
    }

    /**
     * Show a customer's rental history.
     */
    public function rentalHistory(Customer $customer)
    {
        $rentals = Rental::where('customer_id', $customer->id)->latest()->paginate(10);
        return view('admin.customers.rental_history', compact('customer', 'rentals'));
    }
}
