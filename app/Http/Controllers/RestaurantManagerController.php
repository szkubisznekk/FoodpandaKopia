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
                'picked_restaurant' => $picked_restaurant,
            ]);
        }
        else
        {
            $restaurant = DB::table('restaurants')
                ->where('restaurants.id', $restaurant_id)->first();

            if($restaurant->user_id == $user->id && request('hash') == $restaurant->password)
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
                    'foods' => $foods,
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

        if(Hash::check($request->password, $restaurant->password))
        {
            $link = "restaurantmanager/{$request->restaurant_id}?hash={$restaurant->password}";
            return redirect($link);
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

        $hash = request('hash');
        $link = "restaurantmanager/{$request->restaurant_id}?hash={$hash}";
        return redirect($link);
    }

    public function register(Request $request)
    {
        $user=Auth::user();

        $request->validate([
            'name' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'password' => Hash::make($request->password),
        ]);

        $link = "restaurantmanager/{$request->restaurant_id}?hash={$restaurant->password}";
        return redirect($link);
    }

    public function deletefood(Request $request)
    {
        DB::table('food')->delete($request->food_id);
        $hash = request('hash');
        $link = "restaurantmanager/{$request->restaurant_id}?hash={$hash}";
        return redirect($link);
    }
}
