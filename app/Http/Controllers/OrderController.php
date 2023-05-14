<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Basket;

class OrderController extends Controller
{
    public function index($order_id = 0)
    {
        if($order_id == 0)
        {
            return view('order');
        }

        $order = DB::table('orders')
            ->join('statuses', 'statuses.id', '=', 'orders.status_id')
            ->join('payment_methods', 'payment_methods.id', '=', 'orders.payment_method_id')
            ->where('orders.id', $order_id)->first([
                'orders.id',
                'orders.postal_code',
                'orders.city',
                'orders.address',
                'orders.phone_number',
                'payment_methods.name AS payment_method_name',
                'statuses.name AS status_name',
            ]);

        $orderedItems = DB::table('baskets')
            ->join('orders', 'orders.id', '=', 'baskets.order_id')
            ->join('food', 'food.id', '=', 'baskets.food_id')
            ->where('order_id', $order->id)->get([
                'baskets.id',
                'baskets.order_id AS order_id',
                'baskets.food_id AS food_id',
                'food.name AS name',
                'food.description AS description',
                'food.price AS price',
                'baskets.amount',
            ]);

        $price = 0;
        foreach($orderedItems as $orderedItem)
        {
            $price += $orderedItem->amount * $orderedItem->price;
        }

        return view('order', [strval($order_id)])->with([
            'order' => $order,
            'orderedItems' => $orderedItems,
            'price' => $price,
        ]);
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();

        if($user != null)
        {
            return redirect('order');
        }

        return redirect()->back()->withErrors(['Nem vagy bejelentkezve']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'postal_code' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
        ]);

        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id,
            'status_id' => 4,
            'order_time' => now(),
            'payment_method_id' => $request->payment_method,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        $cart = session()->pull('cart', []);
        session()->forget('cart');

        foreach($cart as $cartItem)
        {
            Basket::create([
                'order_id' => $order->id,
                'food_id' => $cartItem['food_id'],
                'amount' => $cartItem['amount'],
            ]);
        }

        return redirect('order/' . strval($order->id));
    }
}
