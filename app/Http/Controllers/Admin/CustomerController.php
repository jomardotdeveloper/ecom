<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.customers.index', [
            'customers' => User::where('user_type' , '=', User::USER)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = $this->createUser($request, User::USER);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        return view('backend.customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $customer->id,
        ]);
        $this->updateUser($request, $customer);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        return response()->json(["success" => "Customer Record Deleted Successfully"],201);
    }
}
