<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\RestaurantManagerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/auth/register', [AuthController::class, 'store'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/lougout', [Authcontroller::class, 'destroy'])->middleware('auth')->name('auth.logout');

Route::get('/restaurants/{restaurant_id?}', [RestaurantsController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/addToCart', [CartController::class, 'store'])->name('cart.addToCart');
Route::post('/cart/removeFromCart', [CartController::class, 'destroy'])->name('cart.removeFromCart');
Route::post('/cart/emptyCart', [CartController::class, 'clear'])->name('cart.emptyCart');

Route::get('/restaurantmanager/{restaurant_id?}', [RestaurantManagerController::class, 'index']);
Route::post('/restaurantmanager/login', [RestaurantManagerController::class, 'login'])->name('restaurantmanager.login');
Route::post('/restaurantmanager/place', [RestaurantManagerController::class, 'store'])->name('restaurantmanager.place');
Route::post('/restaurantmanager/register', [RestaurantManagerController::class, 'register'])->name('restaurantmanager.register');

Route::get('/order/{order_id?}', [OrderController::class, 'index']);
Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
Route::post('/order/place', [OrderController::class, 'store'])->name('order.place');


