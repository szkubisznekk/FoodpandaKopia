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
                <p> Kategória: {{ $food->category_id }} </p>
                <br>
            </div>
        @endforeach
    @endif
@endsection
