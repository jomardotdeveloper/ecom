<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.orders.index', [
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.orders.create', [
            'products' => $this->getSelectOptions(Product::class, 'name', Product::where('is_active', true)->get()),
            'customers' => $this->getSelectOptions(User::class, 'full_name', User::where('user_type', User::USER)->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_ids' => 'required',
            'product_quantities' => 'required',
        ]);

        $values = $request->all();

        $product_ids = $request->get('product_ids');
        $quantities = $request->get('product_quantities');

        for($i = 0; $i < count($product_ids); $i++) {
            $product = Product::find($product_ids[$i]);

            if(floatval($product->stocks_total) < floatval($quantities[$i]))
            {
                return back()->withErrors([
                    'error' => 'Insufficient stocks for ' . $product->name,
                ]);
            }
        }

        $values["product_ids"] = implode(",", $product_ids);
        $values["product_quantities"] = implode(",", $quantities);

        Order::create($values);
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }   

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('backend.orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('backend.orders.edit', [
            'order' => $order,
            'products' => $this->getSelectOptions(Product::class, 'name', Product::where('is_active', true)->get()),
            'customers' => $this->getSelectOptions(User::class, 'full_name', User::where('user_type', User::USER)->get())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_ids' => 'required',
            'product_quantities' => 'required',
        ]);

        $values = $request->all();

        $product_ids = $request->get('product_ids');
        $quantities = $request->get('product_quantities');

        for($i = 0; $i < count($product_ids); $i++) {
            $product = Product::find($product_ids[$i]);

            if(floatval($product->stocks_total) < floatval($quantities[$i]))
            {
                return back()->withErrors([
                    'error' => 'Insufficient stocks for ' . $product->name,
                ]);
            }
        }

        $values["product_ids"] = implode(",", $product_ids);
        $values["product_quantities"] = implode(",", $quantities);

        $order->update($values);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(["success" => "Order Record Deleted Successfully"],201);
    }
}
