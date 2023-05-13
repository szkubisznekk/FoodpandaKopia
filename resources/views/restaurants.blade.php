@extends('layouts.app')

@section('content')
    @if ($pickedRestaurant == 0)
        @foreach ($restaurants as $restaurant)
            <a href="{{ url('restaurants/' . strval($restaurant->id)) }}">
                <h2> {{ $restaurant->name }} </h2>
            </a>
        @endforeach
    @else
        <div>
            <form action="/restaurants/{{ $pickedRestaurant }}">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg" style="z-index: -100">
                    <div class="absolute top-4 left-3">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input type="text" name="search"
                        class="h-14 w-full p1-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search" />
                    <div class="absolute top-2 right-2">
                        <button type="submit"
                            class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">Search</button>
                    </div>
                </div>
            </form>
        </div>
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
@endsection
