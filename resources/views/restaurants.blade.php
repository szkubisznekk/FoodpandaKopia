@extends('layouts.app')

@section('content')
    @if ($pickedRestaurant == 0)
        @foreach ($restaurants as $restaurant)
            <a href="{{ url('restaurants/' . strval($restaurant->id)) }}">
                <h2> {{ $restaurant->name }} </h2>
            </a>
        @endforeach
    @else
        @foreach ($foods as $food)
            <div>
                <h2> Név: {{ $food->name }} </h2>
                <p> Leírás: {{ $food->description }} </p>
                <p> Ár: {{ $food->price }} Ft </p>
                <p> Kategória: {{ $food->category_name }} </p>

                <form method="POST", action="{{ route('restaurants.addToCart') }}">
                    @csrf
                    <input type="hidden" name="food_id", value="{{ $food->id }}">

                    <div>
                        <label for="amount">Amount</label>
                        <input type="text" name="amount"><br>
                    </div>

                    <input type="submit" value="Kosárba">
                </form>

                <br>
            </div>
        @endforeach
    @endif
    @if (Session::has('cart'))
        @foreach (Session::get('cart') as $cartItem)
            <p> Name: {{ strval($cartItem['food_name']) }} </p>
            <p> Amount: {{ strval($cartItem['amount']) }} db </p>
            <p> Price: {{ strval($cartItem['price']) }} Ft </p>
            <br>
        @endforeach
    @endif
@endsection
