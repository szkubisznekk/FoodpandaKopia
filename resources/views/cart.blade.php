@extends('layouts.app')

@section('content')
    @if (Session::has('cart'))
        @foreach (Session::get('cart') as $cartItem)
            <p> Name: {{ strval($cartItem['food_name']) }} </p>
            <p> Amount: {{ strval($cartItem['amount']) }} db </p>
            <p> Price: {{ strval($cartItem['price']) }} Ft </p>
            <form method="POST", action="{{ route('restaurants.removeFromCart') }}">
                @csrf
                <input type="hidden" name="food_id", value="{{ $cartItem['food_id'] }}">

                <input type="submit" value="Kosárból kivenni">
            </form>
            <br>
        @endforeach
        <form method="POST", action="{{ route('restaurants.emptyCart') }}">
            @csrf
            <input type="submit" value="Kosár ürítés">
        </form>
    @endif
@endsection
