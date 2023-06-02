<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Courier;
use App\Models\Restaurant;
use App\Models\Food;

class CourierController extends Controller
{
    public function index($courier_id = 0)
    {
        if($courier_id == 0)
        {
            return view('courier');
        }

        $orders = DB::table('orders')
            ->join('statuses', 'statuses.id', '=', 'orders.status_id')
            ->join('payment_methods', 'payment_methods.id', '=', 'orders.payment_method_id')
            ->whereIn('orders.status_id', [2, 3])
            ->where(function($query) use ($courier_id)
                {
                    $query->where('orders.courier_id', $courier_id);
                    $query->orWhereNull('orders.courier_id');
                })->get([
                    'orders.id',
                    'orders.postal_code',
                    'orders.city',
                    'orders.address',
                    'orders.phone_number',
                    'orders.payment_method_id AS payment_method_id',
                    'orders.status_id AS status_id',
                    'payment_methods.name AS payment_method_name',
                    'statuses.name AS status_name',
                ]);

        $courier = DB::table('couriers')
            ->where('couriers.id', $courier_id)->first();

        return view('courier')->with([
            'courier' => $courier,
            'orders' => $orders,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

        $courier = DB::table('couriers')
            ->where('couriers.id', $request->courier_id)->first();

        if(Hash::check($request->password, $courier->password))
        {
            return redirect('courier/' . $request->courier_id);
        }

        return redirect('courier')->withErrors([
            'Rossz jelszó!',
        ]);
    }

    public function changeOrderStatus(Request $request)
    {
        DB::table('orders')
            ->where('orders.id', $request->order_id)
            ->update([
                'orders.courier_id' => $request->courier_id,
                'orders.status_id' => $request->order_status_id - 1,
            ]);

        return redirect()->back();
    }
}
