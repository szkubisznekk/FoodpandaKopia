<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;


class RestaurantManagerController extends Controller
{
    public function index($restaurant = 0)
    {
        $user = Auth::user();
        $restaurants = DB::table('restaurants')->where('restaurants.user_id', strval($user->id))->get();
        return view('restaurantmanager')->with(['restaurants'=>$restaurants,'pickedRestaurant'=>$restaurant]);
    }
    public function login(Request $request)
    {
        $restaurant = DB::table('restaurants')->where('restaurants.id', $request->restaurant_id)->first();
        if($restaurant->password==$request->password)
        {
            return redirect('restaurantmanager/'.strval($restaurant->id));
        }
        return redirect('restaurantmanager')->withErrors(['Nem jó a jelszó tetyám!']);
    }
}
