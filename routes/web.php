<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\RestaurantManagerController;
use App\Http\Controllers\CartController;

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
Route::post('/cart/addToCart', [CartController::class, 'store'])->name('restaurants.addToCart');
Route::post('/cart/removeFromCart', [CartController::class, 'destroy'])->name('restaurants.removeFromCart');
Route::post('/cart/emptyCart', [CartController::class, 'clear'])->name('restaurants.emptyCart');

Route::get('/restaurantmanager/{restaurant_id?}', [RestaurantManagerController::class, 'index']);
Route::post('/restaurantmanager/login', [RestaurantManagerController::class, 'login'])->name('restaurantmanager.login');

