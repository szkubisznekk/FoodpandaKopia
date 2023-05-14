@extends('layouts.app')

@section('content')
    @if (Session::has('cart'))
    <div class="flex items-center flex-wrap justify-around">
        @foreach (Session::get('cart') as $cartItem)
        <div class="w-1/4 h-56">
            <p> Name: {{ strval($cartItem['food_name']) }} </p>
            <p> Amount: {{ strval($cartItem['amount']) }} db </p>
            <p> Price: {{ strval($cartItem['price']) }} Ft </p>
            <form method="POST" action="{{ route('cart.removeFromCart') }}">
                @csrf
                <input type="hidden" name="food_id" value="{{ $cartItem['food_id'] }}">

                <input type="submit" value="Kosárból kivenni">
            </form>
            <br>
        </div>
        @endforeach
    </div>
        <form method="POST" action="{{ route('cart.emptyCart') }}">
            @csrf
            <input type="submit" value="Kosár ürítés">
        </form>
        @if (Auth::user() != null)
            <form method="POST" action="{{ route('order.confirm') }}">
                @csrf
                <input type="submit" value="Tovább">
            </form>
        @endif
    @else
        <h2>Nincs semmi a kosaradban!</h2>
    @endif
@endsection
