<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function index($restaurant_id = 0)
    {
        $food_cat=DB::table('food_categories')->join('food', 'food_categories.id', '=', 'food.category_id')->where('food.restaurant_id',$restaurant_id)->where('food.name','LIKE','%'.request('search').'%')->get([
            'food_categories.name',
            'food_categories.id',
        ])->unique();
        $array=[];
        foreach($food_cat as $category)
        {
            $foods=DB::table('food')->where('food.category_id',$category->id)->where('food.name','LIKE','%'.request('search').'%')->get([
                'food.id',
                'food.name',
                'food.description',
                'food.price',
            ]);
            $array+=[$category->id=>$foods];
        }
        return view('restaurants')->with(['restaurants'=>Restaurant::all(), 'pickedRestaurant' => $restaurant_id, 'foods' => $array,'categories' => $food_cat]);
    }
}
