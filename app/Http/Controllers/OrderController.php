<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    public function index($order_id = 0)
    {
        if($order_id == 0)
        {
            return view('order')->with(['order' => null]);
        }

        $order = DB::table('orders')
            ->join('statuses', 'statuses.id', '=', 'orders.status_id')
            ->join('payment_methods', 'payment_methods.id', '=', 'orders.payment_method_id')
            ->where('orders.id', $order_id)->first([
                'orders.postal_code',
                'orders.city',
                'orders.address',
                'orders.phone_number',
                'payment_methods.name AS payment_method',
                'statuses.name AS status',
            ]);

        return view('order', [strval($order_id)])->with(['order' => $order]);
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();

        if($user != null)
        {
            return redirect('order')->with(['order' => null]);
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

        session()->forget('cart');

        return redirect('order/' . strval($order->id));
    }
}
