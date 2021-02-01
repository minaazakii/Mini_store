<?php

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\auth\AdminRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home Controller
Route::get('/home', function(){

    return view('home');
})->name('home');


Route::group(['prefix' => 'admin'], function () {
    //admin register
    Route::get('/register',[AdminRegisterController::class,'index'])->name('admin.register');
    Route::post('/register',[AdminRegisterController::class,'store'])->name('admin.register');

    //add Product
    Route::get('/addproduct',[ProductsController::class,'index'])->name('product.index');
    Route::post('/addproduct',[ProductsController::class,'store'])->name('product.add');
});

// Login/logout Routes
Route::get('/',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'store'])->name('login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


//Register Routes
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register');

//Shop Routes
Route::get('/products',[ProductController::class,'index'])->name('shop');
Route::get('/product/show/{product:name}',[ProductController::class,'show'])->name('shop.show');
Route::post('/products/addToCart/{product}',[ProductController::class,'add'])->name('addToCart');
Route::get('/products/search',[ProductController::class,'search'])->name('search');
Route::get('/products/checkout',[ProductController::class,'checkout'])->name('checkout');

//Cart Routes
Route::post('/cart/edit/{cart}',[CartController::class,'edit'])->name('cart.edit');
Route::post('/cart/remove/{cart}',[CartController::class,'remove'])->name('cart.remove');


//Payment Routes
Route::get('/products/payment',[PaymentController::class,'index'])->name('payment.index');
Route::post('/products/pay',[PaymentController::class,'store'])->name('payment.pay');

