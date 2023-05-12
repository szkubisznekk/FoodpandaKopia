<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function index()
    {
        return view('restaurants')->with(['restaurants'=>Restaurant::all()]);
    }

}
