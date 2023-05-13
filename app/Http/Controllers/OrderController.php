<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();

        if($user != null)
        {
            return redirect('order');
        }

        return redirect()->back()->withErrors(['Nem vagy bejelntkezve']);
    }

    public function store(Request $request)
    {
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

        return redirect('/');
    }
}
