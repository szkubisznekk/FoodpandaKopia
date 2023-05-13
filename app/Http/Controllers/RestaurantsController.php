<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function index($restaurant_id = 0)
    {
        $foods = DB::table('food')->join('food_categories', 'food.category_id', '=', 'food_categories.id')->where('food.restaurant_id', $restaurant_id)->get([
            'food.id',
            'food.name',
            'food.description',
            'food.price',
            'food_categories.name AS category_name',
        ]);

        return view('restaurants')->with(['restaurants'=>Restaurant::all(), 'pickedRestaurant' => $restaurant_id, 'foods' => $foods]);
    }

    public function addToCart(Request $request)
    {
        $food = DB::table('food')->where('food.id', $request->food_id)->first();

        session()->push('cart', ['food_id' => $request->food_id, 'food_name'=> $food->name, 'amount' => $request->amount, 'price' => $food->price * $request->amount]);

        return redirect()->back();
    }
}
