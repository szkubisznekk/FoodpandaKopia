<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(Request $request)
    {
        $food = DB::table('food')->where('food.id', $request->food_id)->first();

        session()->push('cart', ['food_id' => $request->food_id, 'food_name'=> $food->name, 'amount' => $request->amount, 'price' => $food->price * $request->amount]);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $cart = session()->pull('cart', []);

        foreach($cart as $key => $cartItem)
        {
            if($cartItem['food_id'] == $request->food_id)
            {
                unset($cart[$key]);
            }
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function clear(Request $request)
    {
        session()->forget('cart');

        return redirect()->back();
    }
}
