@extends('layouts.app')

@section('content')
    @if (Session::has('cart'))
        <div class="flex items-center flex-wrap justify-around">
            @foreach (Session::get('cart') as $cartItem)
                <div class="w-1/4 h-56 p-4">
                    <div
                        class="hover:scale-105 hover:border-2 hover:border-pink-600 font-regular relative h-full mb-2 block rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-2 text-base leading-5 text-white opacity-100">
                        <h2 class="underline underline-offset-auto pb-1 text-center text-xl font-bold "> Név:
                            {{ strval($cartItem['food_name']) }} </h2>
                        <p> Darabszám: {{ strval($cartItem['amount']) }} db </p>
                        <p> Ár: {{ strval($cartItem['price']) }} Ft </p>
                        <form method="POST" action="{{ route('cart.removeFromCart') }}">
                            @csrf
                            <div class="absolute inset-x-4 bottom-0 h-16">
                                <input type="hidden" name="food_id" value="{{ $cartItem['food_id'] }}">
                                <input
                                    class="text-center hover:border-2 hover:border-red-800 hover:text-red-800 hover:bg-gray-200 text-sm rounded-lg bg-red-500 py-4 px-6 font-sans font-bold uppercase text-white transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="submit" value="Kivesz">
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex items-center flex-wrap justify-around">
            <div>
                <form method="POST" action="{{ route('cart.emptyCart') }}">
                    @csrf
                    <input
                        class="w-64 text-center hover:border-2 hover:border-red-800 hover:text-red-800 hover:bg-gray-200 text-sm rounded-lg bg-red-500 py-4 px-6 font-sans font-bold uppercase text-white transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="submit" value="Kosár ürítés">
                </form>
            </div>
            <div>
                @if (Auth::user() != null)
                    <form method="POST" action="{{ route('order.confirm') }}">
                        @csrf
                        <input
                            class="w-64 text-center hover:border-2 hover:border-red-800 hover:text-red-800 hover:bg-gray-200 text-sm rounded-lg bg-red-500 py-4 px-6 font-sans font-bold uppercase text-white transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="submit" value="Tovább">
                    </form>
                @endif
            </div>
        </div>
    @else
        <h2>Nincs semmi a kosaradban!</h2>
    @endif
@endsection
