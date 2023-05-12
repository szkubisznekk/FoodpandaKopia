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
            'food.name',
            'food.description',
            'food.price',
            'food_categories.name AS category_name',
        ]);

        return view('restaurants')->with(['restaurants'=>Restaurant::all(), 'pickedRestaurant' => $restaurant_id, 'foods' => $foods]);
    }

}
