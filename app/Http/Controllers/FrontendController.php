<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->get();

        if(isset($_GET['category_id'])) {
            $products = Product::where('category_id', $_GET['category_id'])->where('is_active', true)->get();
        }

        if(isset($_GET['search'])) {
            $products = Product::where('name', 'like', '%' . $_GET['search'] . '%')->where('is_active', true)->get();
        }

        return view('frontend.index', [
            'products' => $products,
            'categories' => Category::all(),
            'promotions' => Announcement::where('is_promotion', true)->get()
        ]);
    }

    public function personalized()
    {
        $products = Product::where('is_active', true)->get();
        
        if(isset($_GET['type_of_switch']) &&  isset($_GET['lubed'])) {
            $products = Product::where('type_of_switch', $_GET['type_of_switch'])->where('is_lubed', intval($_GET['lubed']) == 1)->where('is_active', true)->get();
        }


        return view('frontend.personalized', [
            'products' => $products,
        ]);
    }

    public function details(Product $product)
    {
        return view('frontend.details', [
            'product' => $product,
            'shipping_fee' => "₱ " . number_format(Setting::first()->default_shipping_fee, 2)
        ]);
    }

    public function createAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'terms' =>'accepted'
        ]);
        $user = $this->createUser($request, User::USER);
        return redirect()->route('login')->with('success', 'Account created successfully');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function posts ()
    {

        if(isset($_GET['search'])) {
            return view('frontend.posts', [
                'announcements' => Announcement::where('title', 'like', '%' . $_GET['search'] . '%')->get()
            ]);
        }

        return view('frontend.posts', [
            'announcements' => Announcement::all()
        ]);
    }

    public function post (Announcement $announcement)
    {
        return view('frontend.post', [
            'announcement' => $announcement
        ]);
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function order()
    {
        return view('frontend.orders', [
            'orders' => auth()->user()->orders
        ]);
    
    }

    public function vorder(Order $order) {
        return view('frontend.vorder', [
            'order' => $order
        ]);
    }

    public function profile()
    {
        return view('frontend.profile', [
            'user' => auth()->user()
        ]);
        
    }

    public function checkout()
    {
        if(!isset($_GET['product_id']) || !isset($_GET['quantity'])) {
            return back()->withErrors([
                'error' => 'No quantity is set',
            ]);
        }


        return view('frontend.checkout-single', [
            'product' => Product::find($_GET['product_id']),
            'quantity' => $_GET['quantity']
        ]);
    }

    public function checkoutMultiple()
    {
        if(auth()->user()->carts()->where('is_active', true)->count() == 0) {
            return back()->withErrors([
                'error' => 'No items in cart',
            ]);
        }
        return view('frontend.checkout-cart', [
            'carts' => auth()->user()->carts()->where('is_active', true)->get()
        ]);
    }

    public function proceed(Request $request)
    {
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
        $values['shipping_fee'] = Setting::first()->default_shipping_fee;
        $order = Order::create($values);


        $values = $request->all();

        if($request->hasFile('proof_of_payment')) {
            $request->validate([
                'proof_of_payment' => 'image',
            ]);
            $values['proof_of_payment'] = $this->uploadImage($request, 'proof_of_payment', 'payments');
            $values['is_paid'] = false;
            $values['order_id'] = $order->id;
            $values['amount'] = $order->total;
        }

        Payment::create($values);

        if(array_key_exists('is_cart', $values))
        {
            auth()->user()->carts()->where('is_active', true)->update([
                'is_active' => false
            ]);
        }
        return redirect()->route('frontend.order')->with('success', 'Order successfully placed!');
    }
    
}
