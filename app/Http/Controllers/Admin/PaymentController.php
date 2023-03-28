<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.payments.index', [
            'payments' => Payment::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.payments.create', [
            'orders' => $this->getSelectOptions(Order::class, 'special_name', Order::doesntHave('payment')->get()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->all();

        if($request->hasFile('proof_of_payment')) {
            $request->validate([
                'proof_of_payment' => 'image',
            ]);
            $values['proof_of_payment'] = $this->uploadImage($request, 'proof_of_payment', 'payments');
        }

        if($values['is_paid'] == 1)
            $values['is_paid'] = true;
        else
            $values['is_paid'] = false;

        Payment::create($values);
        return redirect()->route('payments.index')->with('success', 'Payment created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $orders = Order::whereOr('id', '=', $payment->order_id )->union(
                  Order::doesntHave('payment'))->get();
        
        return view('backend.payments.edit', [
            'payment' => $payment,
            'orders' => $this->getSelectOptions(Order::class, 'special_name', $orders),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $values = $request->all();

        if($request->hasFile('proof_of_payment')) {
            $request->validate([
                'proof_of_payment' => 'image',
            ]);
            $values['proof_of_payment'] = $this->uploadImage($request, 'proof_of_payment', 'payments');
        }

        if($values['is_paid'] == 1)
            $values['is_paid'] = true;
        else
            $values['is_paid'] = false;

        $payment->update($values);
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(["success" => "Payment Record Deleted Successfully"],201);
    }
}
