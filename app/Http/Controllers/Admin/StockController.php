<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.stocks.index', [
            'stocks' => Stock::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.stocks.create', [
            'products' => $this->getSelectOptions(Product::class)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->all();
        if($values['is_validated'] == 1)
            $values['is_validated'] = true;
        else
            $values['is_validated'] = false;

        if($values['is_return'] == 1)
            $values['is_return'] = true;
        else
            $values['is_return'] = false;
        $stock = Stock::create($values);
        return redirect()->route('stocks.index')->with('success', 'Stock created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('backend.stocks.edit', [
            'stock' => $stock,
            'products' => $this->getSelectOptions(Product::class)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $values = $request->all();
        if($values['is_validated'] == 1)
            $values['is_validated'] = true;
        else
            $values['is_validated'] = false;

        if($values['is_return'] == 1)
            $values['is_return'] = true;
        else
            $values['is_return'] = false;
        $stock->update($values);
        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return response()->json(["success" => "Stock Record Deleted Successfully"],201);
    }
}
