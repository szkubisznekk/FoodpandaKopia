@extends('layouts.app')

@section('content')
    @if ($pickedRestaurant == 0)
        <div class="flex items-center flex-wrap justify-around">
            @foreach ($restaurants as $restaurant)
                <div class="m-auto w-1/2 h-40">
                    <a href="{{ url('restaurants/' . strval($restaurant->id)) }}">
                        <h2 class="hover:border-pink-700 hover:border-2 text-center rounded-lg bg-gradient-to-bl from-pink-700 to-[#9118ed] m-5 p-12 hover:scale-105 text-4xl font-sans font-bold uppercase hover:text-5xl hover:text-pink-300 text-white shadow-2xl shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true"> {{ $restaurant->name }} </h2>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <form action="{{ url('restaurants/' . strval($pickedRestaurant)) }}">
                <div class="pl-4 align-middle text-center content-center relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input type="text" name="search"
                        class="h-14 w-full p1-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Keresés" />
                    <div class="absolute top-2 right-2">
                        <button type="submit"
                            class="bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] h-10 w-20 text-white rounded-lg">Keresés</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex items-center flex-wrap justify-around">
            @foreach ($categories as $category)
                <p
                    class="font-regular hover:text-white tracking-widest hover:underline underline-offset-8 align-middle text-center font-bold relative block w-full rounded-lg bg-pink-500 p-4 text-2xl leading-5 text-black opacity-100">
                    {{ $category->name }} </p>
                @foreach ($foods[$category->id] as $food)
                    <div class="m-auto w-1/2 h-auto">
                        <div
                            class=" font-regular relative rounded-lg m-1 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                            <h2 class="hover:underline hover:underline-offset-auto text-center pb-1 font-bold text-xl">
                                {{ $food->name }} </h2>
                            <p class="text-justify">{{ $food->description }} </p>
                            <form method="POST", action="{{ route('cart.addToCart') }}">
                                @csrf
                                <input type="hidden" name="food_id", value="{{ $food->id }}">

                                <div class="mt-4">
                                    <p
                                        class="hover:scale-105 outline-white rounded-lg outline outline-2 outline-offset-4 mx-40 text-center align-middle font-bold">
                                        {{ $food->price }} Ft</p>
                                    <div class="mt-4 ml-4 ">
                                        <label class="font-bold">Darab: </label>
                                        <input
                                            class="inline-block text-bs font-bold bg-pink-300 border border-gray-300 text-gray-900 rounded-lg focus:ring-pink-500 focus:border-pink-500 w-[80] p-2.5 dark:bg-pink-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500"
                                            type="number" min="1" value="1" name="amount">

                                        <input
                                            class=" hover:text-pink-500 hover:bg-gray-200 ml-10 text-bs middle none center rounded-lg bg-pink-500 py-4 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            data-ripple-light="true" type="submit" value="Kosárba">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif
@endsection
