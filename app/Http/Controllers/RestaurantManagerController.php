<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Food;

class RestaurantManagerController extends Controller
{
    public function index($restaurant_id = 0)
    {
        $user = Auth::user();

        $restaurants = DB::table('restaurants')
            ->where('restaurants.user_id', strval($user->id))->get();

        $picked_restaurant = DB::table('restaurants')
            ->where('restaurants.user_id', strval($user->id))
            ->where('restaurants.id', strval($restaurant_id))->first();

        if($restaurant_id == 0)
        {
            return view('restaurantmanager')->with([
                'restaurants' => $restaurants,
                'picked_restaurant' => $picked_restaurant
            ]);
        }
        else
        {
            $restaurant = DB::table('restaurants')
                ->where('restaurants.id', $restaurant_id)->first();

            if($restaurant->user_id == $user->id)
            {
                $foods = DB::table('food')
                    ->join('food_categories','food.category_id','=','food_categories.id')
                    ->where('food.restaurant_id', $restaurant_id)->get([
                        'food_categories.id AS food_category_id',
                        'food_categories.name AS food_category_name',
                        'food.id',
                        'food.name',
                        'food.description',
                        'food.price',
                    ]);

                return view('restaurantmanager', [strval($restaurant_id)])->with([
                    'restaurants' => $restaurants,
                    'picked_restaurant' => $picked_restaurant,
                    'foods' => $foods
                ]);
            }
            else
            {
                return view('restaurantmanager')->with([
                    'restaurants' => $restaurants,
                ])->withErrors(['Nem vagy bejelentkezve tetyám!']);
            }
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

        $restaurant = DB::table('restaurants')
            ->where('restaurants.id', $request->restaurant_id)->first();

        if($restaurant->password == $request->password)
        {
            return redirect('restaurantmanager/' . strval($restaurant->id));
        }

        return redirect('restaurantmanager')->withErrors(['Nem jó a jelszó tetyám!']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_category' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $food = Food::create([
            'restaurant_id' => $request->restaurant_id,
            'category_id' => $request->food_category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect('restaurantmanager/' . strval($request->restaurant_id));
    }
}
