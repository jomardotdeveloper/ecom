<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Faker\Core\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(url('frontend/special_image/1.png'));
        return view('backend.products.index', [
            'products' => Product::where('is_archived', false)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.products.create', [
            'categories' => $this->getSelectOptions(Category::class)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $values = $request->all();

        if($values['is_active'] == 1)
            $values['is_active'] = true;
        else
            $values['is_active'] = false;
        
        $values['image'] = $this->uploadImage($request, 'image', 'products');
        $product = Product::create($values);
        $stock = Stock::create([
            'product_id' => $product->id,
            'quantity' => 999999,
            'is_validated' => true,
            'is_return' => false
        ]);
        
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backend.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit', [
            'product' => $product,
            'categories' => $this->getSelectOptions(Category::class)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $values = $request->all();
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image',
            ]);
            $values['image'] = $this->uploadImage($request, 'image', 'products');
        }

        if($values['is_active'] == 1)
            $values['is_active'] = true;
        else
            $values['is_active'] = false;
            
        $product->update($values);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->update(['is_archived' => true]);
        $product->update(['is_active' => true]);
        return response()->json(["success" => "Product Record Archived Successfully"],201);
    }
}
