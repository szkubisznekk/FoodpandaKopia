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

        $restaurants = ($user->id == 1)
            ? DB::table('restaurants')->get()
            : DB::table('restaurants')
                ->where('restaurants.user_id', $user->id)->get();

        $picked_restaurant = ($user->id == 1)
            ? DB::table('restaurants')
                ->where('restaurants.id', strval($restaurant_id))->first()
            : DB::table('restaurants')
                ->where('restaurants.user_id', $user->id)
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

            if(($restaurant->user_id == $user->id || $user->id == 1) && request('hash') == $restaurant->password)
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

                $orders = DB::table('orders')
                    ->join('statuses', 'statuses.id', '=', 'orders.status_id')
                    ->join('payment_methods', 'payment_methods.id', '=', 'orders.payment_method_id')
                    ->join('baskets', 'baskets.order_id', '=', 'orders.id')
                    ->join('food', 'food.id', '=', 'baskets.food_id')
                    ->where('food.restaurant_id', $restaurant_id)
                    ->whereIn('status_id', [2, 3, 4])->get([
                        'orders.id',
                        'orders.postal_code',
                        'orders.city',
                        'orders.address',
                        'orders.phone_number',
                        'orders.payment_method_id AS payment_method_id',
                        'orders.status_id AS status_id',
                        'payment_methods.name AS payment_method_name',
                        'statuses.name AS status_name',
                    ])->unique();

                $orderedItems = [];
                foreach($orders as $order)
                {
                    $orderedItemsInOrder = DB::table('baskets')
                        ->join('food', 'food.id', '=', 'baskets.food_id')
                        ->where('baskets.order_id', $order->id)
                        ->where('food.restaurant_id', $restaurant_id)->get([
                            'food.id',
                            'food.name',
                            'food.price',
                            'baskets.amount',
                        ]);

                    $orderedItems += [$order->id => $orderedItemsInOrder];
                }

                return view('restaurantmanager', [strval($restaurant_id)])->with([
                    'restaurants' => $restaurants,
                    'picked_restaurant' => $picked_restaurant,
                    'foods' => $foods,
                    'orders' => $orders,
                    'orderedItems' => $orderedItems,
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

        $link = "restaurantmanager/{$request->restaurant_id}?hash={$request->hash}";
        return redirect($link);
    }

    public function register(Request $request)
    {
        $user = Auth::user();

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

        $link = "restaurantmanager/{$request->restaurant_id}?hash={$request->hash}";

        return redirect($link);
    }

    public function changeOrderStatus(Request $request)
    {
        DB::table('orders')
            ->where('orders.id', $request->order_id)
            ->update([
                'orders.status_id' => $request->order_status_id - 1,
            ]);

        return redirect()->back();
    }
}
