<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function index($restaurant_id = 0)
    {
        $foods = DB::table('food')->join('food_categories', 'food.category_id', '=', 'food_categories.id')->where('food.restaurant_id', $restaurant_id)->where('food.name','LIKE','%'.request('search').'%')->get([
            'food.id',
            'food.name',
            'food.description',
            'food.price',
            'food_categories.name AS category_name',
        ]);
        //SELECT food.name, ...
        //FROM food join food_categories on food.category_id = food.categories.id
        //WHERE food.restaurant_id

        return view('restaurants')->with(['restaurants'=>Restaurant::all(), 'pickedRestaurant' => $restaurant_id, 'foods' => $foods]);
    }
}
