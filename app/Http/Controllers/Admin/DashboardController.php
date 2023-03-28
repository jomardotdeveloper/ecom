<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard', [
            'number_of_customers' => User::where('user_type', User::USER)->count(),
            'number_of_orders' => Order::count(),
            'number_of_products' => Product::count(),
            'number_of_categories' => Category::count(),
        ]);
    }
}
