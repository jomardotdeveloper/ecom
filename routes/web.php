<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.frontend.master');
// });

// ROUTES FOR AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('/send', [AuthController::class, 'send'])->name('send');
Route::get('/reset', [AuthController::class, 'reset'])->name('reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');




// ROUTES FOR FRONTEND
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/details/{product}', [FrontendController::class, 'details'])->name('frontend.details');
Route::get('/profile', [FrontendController::class, 'profile'])->name('frontend.profile');
Route::get('/posts', [FrontendController::class, 'posts'])->name('frontend.posts');
Route::get('/post/{announcement}', [FrontendController::class, 'post'])->name('frontend.post');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::get('/checkout/multiple', [FrontendController::class, 'checkoutMultiple'])->name('frontend.checkout-multiple');
Route::get('/order', [FrontendController::class, 'order'])->name('frontend.order');
Route::get('/view-order/{order}', [FrontendController::class, 'vorder'])->name('frontend.vorder');
Route::post('/proceed', [FrontendController::class, 'proceed'])->name('frontend.proceed');
Route::get('/terms', [FrontendController::class, 'terms'])->name('frontend.terms');
Route::get('/register', [FrontendController::class, 'register'])->name('frontend.register');
Route::post('/register', [FrontendController::class, 'createAccount'])->name('frontend.create-account');
Route::get('/personalized', [FrontendController::class, 'personalized'])->name('frontend.personalized');

Route::resource('carts', CartController::class);
Route::get('/testroute', function() {
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('jomar.developer@gmail.com')->send(new \App\Mail\MyTestMail2($details));
   
    dd("Email is Sent.");
});

// ROUTES FOR BACKEND
Route::prefix("/admin")->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/setting', [DashboardController::class, 'setting'])->name('setting');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('announcements', AnnouncementController::class);
    
    // ROUTES FOR PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile/personal_info', [ProfileController::class, 'changePersonalInformation'])->name('admin.updateProfile');
    Route::post('/profile/password', [ProfileController::class, 'changePassword'])->name('admin.updatePassword');
});