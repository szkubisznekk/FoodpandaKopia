<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function index($restaurant = 0)
    {
        $foods = DB::table('food')->where('restaurant_id', $restaurant)->get();

        return view('restaurants')->with(['restaurants'=>Restaurant::all(), 'pickedRestaurant' => $restaurant, 'foods' => $foods]);
    }

}
