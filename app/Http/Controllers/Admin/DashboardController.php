<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // dd($this->getLowOnStockProduct());
        return view('backend.dashboard', [
            'number_of_customers' => User::where('user_type', User::USER)->count(),
            'number_of_orders' => Order::count(),
            'number_of_products' => Product::count(),
            'number_of_categories' => Category::count(),
            'low_on_stock_products' => $this->getLowOnStockProduct(),
            'default_shipping_fee' => Setting::first()->default_shipping_fee,
        ]);
    }

    public function setting(Request $request) {
        $request->validate([
            'default_shipping_fee' => 'required|numeric',
        ]);

        $setting = Setting::first();
        $setting->default_shipping_fee = $request->get('default_shipping_fee');
        $setting->save();

        return back()->with('success', 'Setting updated successfully');
    }

    public function getLowOnStockProduct() {
        $products = [];
        $allProducts = Product::all();

        foreach ($allProducts as $product) {
            if($product->stocks_total <= 5) {
                $products[] = $product;
            }
        }
        return $products;
    }
}
