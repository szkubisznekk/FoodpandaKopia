<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Restaurant;

class RestaurantManagerController extends Controller
{
    public function index($restaurant = 0)
    {
        $user = Auth::user();
        $restaurants = DB::table('restaurants')->where('restaurants.user_id', strval($user->id))->get();

        if($restaurant == 0)
        {
            return view('restaurantmanager')->with(['restaurants' => $restaurants, 'pickedRestaurant' => $restaurant]);
        }
        else
        {
            $restaurant_ = DB::table('restaurants')->where('restaurants.id', $restaurant)->first();
            if($restaurant_->user_id == $user->id)
            {
                return view('restaurantmanager', [strval($restaurant)])->with(['restaurants' => $restaurants, 'pickedRestaurant' => $restaurant]);
            }
            else
            {
                return view('restaurantmanager')->with(['restaurants' => $restaurants, 'pickedRestaurant' => 0])->withErrors(['Nem vagy bejelentkezve tetyám!']);
            }
        }
    }

    public function login(Request $request)
    {
        $restaurant = DB::table('restaurants')->where('restaurants.id', $request->restaurant_id)->first();

        if($restaurant->password == $request->password)
        {
            return redirect('restaurantmanager/' . strval($restaurant->id));
        }

        return redirect('restaurantmanager')->withErrors(['Nem jó a jelszó tetyám!']);
    }
}
