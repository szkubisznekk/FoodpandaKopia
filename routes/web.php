<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/register', [LoginController::class, 'store'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [Logincontroller::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/restaurants/{restaurant_id?}', [RestaurantsController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/addToCart', [CartController::class, 'store'])->name('restaurants.addToCart');
Route::post('/cart/removeFromCart', [CartController::class, 'destroy'])->name('restaurants.removeFromCart');
Route::post('/cart/emptyCart', [CartController::class, 'clear'])->name('restaurants.emptyCart');

Route::get('/restaurantmanager/{restaurant_id?}', [RestaurantManagerController::class, 'index']);
Route::post('/restaurant-login', [RestaurantManagerController::class, 'login'])->name('restaurant-login');

