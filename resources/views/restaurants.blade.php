@extends('layouts.app')

@section('content')
    @if ($pickedRestaurant == 0)
        @foreach ($restaurants as $restaurant)
            <a href="{{ url('restaurants/' . strval($restaurant->id)) }}">
                <h2 class="middle none center mr-4 rounded-lg bg-blue-500 my-5 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-light="true"  > {{ $restaurant->name }} </h2>
            </a>
        @endforeach
    @else
        <div>
            <form method="POST" action="/restaurants/{{ $pickedRestaurant }}">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
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
        @foreach ($categories as $category)
            <p
                class="font-regular relative block w-full rounded-lg bg-pink-300 p-4 text-base leading-5 text-black opacity-100">
                {{ $category->name }} </p>
            @foreach ($foods[$category->id] as $food)
                <div
                    class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-pink-600 to-pink-400 p-4 text-base leading-5 text-white opacity-100">
                    <h2 class="pl-10 pb-1">{{ $food->name }} </h2>
                    <p>{{ $food->description }} </p>
                    <p>{{ $food->price }} Ft </p>

                    <form method="POST", action="{{ route('restaurants.addToCart') }}">
                        @csrf
                        <input type="hidden" name="food_id", value="{{ $food->id }}">

                        <div>
                            <input
                                class="inline-block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[50] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="number" min="1" name="amount"><br>
                        </div>
                        <p>darab</p>
                        <input
                            class=" middle none center rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true" type="submit" value="Kosárba">
                    </form>

                    <br>
                </div>
            @endforeach
        @endforeach
    @endif
@endsection
