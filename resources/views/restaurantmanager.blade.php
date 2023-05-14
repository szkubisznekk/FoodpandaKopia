@inject('FOOD_CATEGORIES', 'App\Models\FoodCategory')

@extends('layouts.app')

@section('content')
    @if (isset($picked_restaurant))
        <h1 class="mt-4  text-center text-6xl">{{ $picked_restaurant->name }}</h1>
        <h2 class="text-4xl mb-4 underline underline-offset-auto"> Jelenlegi aktív rendelések: </h2>
        @isset($orders)
            @foreach ($orders as $order)
                <div class="flex items-center flex-wrap justify-around">
                    <div class="w-1/2">
                        <p> Irányítószám: {{ $order->postal_code }} </p>
                        <p> Város: {{ $order->city }} </p>
                        <p> Cím: {{ $order->address }} </p>
                        <p> Telefon: {{ $order->phone_number }} </p>
                        <p> Fizetési mód: {{ $order->payment_method_name }} </p>
                        <p class="font-bold"> Rendelés státusza: {{ $order->status_name }} </p>
                    </div>
                    <div>
                        @foreach ($orderedItems[$order->id] as $orderedItem)
                            <div
                                class=" font-regular relative mb-2 block w-80 rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-2 text-base leading-5 text-white opacity-100">
                                <h2 class="underline underline-offset-auto pb-1 text-center text-xl font-bold ">
                                    {{ $orderedItem->name }} </h2>
                                <p class="pl-2"> {{ $orderedItem->price }} Ft </p>
                                <p class="pl-2"> {{ $orderedItem->amount }} db </p>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <form method="POST" action="{{ route('restaurantmanager.changeOrderStatus') }}">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="order_status_id" value="{{ $order->status_id }}">
                            <input type="submit"
                                class="hover:border-2 hover:border-pink-800 hover:text-pink-500 hover:bg-gray-200 ml-10 text-bs middle none center rounded-lg bg-pink-500 py-4 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                value="ELFOGAD">
                        </form>
                    </div>
                </div>
                <hr class="w-1/2 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-2 dark:bg-gray-700">
            @endforeach
        @endisset
        <h2 class="mt-12 text-xl underline underline-offset-auto">Jelenlegi ételek az étteremben:</h2>
        @isset($foods)
            <div class="flex items-center flex-wrap justify-around">
                @foreach ($foods as $food)
                    <div class="w-1/4 h-64 p-4 relative">
                        <div
                            class="hover:scale-105 hover:border-red-800 hover:border-2 h-full font-regular relative m-1 p-4 block w-full rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] text-base leading-5 text-white opacity-100">
                            <h2 class="underline underline-offset-auto pb-1 text-center text-xl font-bold ">{{ $food->name }}
                            </h2>
                            <p class="mb-2">{{ $food->description }} </p>
                            <p class="mb-2">{{ $food->price }} Ft </p>
                            <div class="text-right pr-2 absolute inset-x-0 bottom-0 h-16">
                                <form method="POST" action="{{ route('restaurantmanager.deletefood') }}">
                                    @csrf
                                    <input type="hidden" name="food_id" value="{{ $food->id }}">
                                    <input type="hidden" name="restaurant_id" value="{{ $picked_restaurant->id }}">
                                    <input type="hidden" name="hash" value="{{ $picked_restaurant->password }}">
                                    <input type="submit"
                                        class="text-center hover:border-2 hover:border-red-800 hover:text-red-800 hover:bg-gray-200 ml-10 text-bs rounded-lg bg-red-500 py-4 px-6 font-sans font-bold uppercase text-white transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        value="TÖRLÉS">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
        <hr class="w-1/2 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <h1 class="text-center text-4xl">Étel regisztráció</h1>
        <div class="flex items-center flex-wrap justify-around">
            <div
                class="w-1/2 font-regular relative rounded-lg m-8 hover:scale-110 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 opacity-100">
                <div class="flex items-center flex-wrap justify-around">
                    <form method="POST" action="{{ route('restaurantmanager.place') }}">
                        @csrf
                        <input type="hidden" name="restaurant_id" value="{{ $picked_restaurant->id }}">
                        <div class="mt-4 hover:scale-105">
                            <label class="text-xl text-white mr-2" for="food_category">Kategória:</label>
                            <select class="h-8 w-48 text-xl" name="food_category">
                                @foreach ($FOOD_CATEGORIES::all() as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-xl mt-4 hover:scale-105">
                            <label class="text-xl text-white mr-12" for="name">Név:</label>
                            <input class="h-8" type="text" name="name"><br>
                        </div>
                        <div class="text-xl mt-4 hover:scale-105">
                            <label class="text-xl text-white mr-7" for="description">Leírás:</label>
                            <input type="text" name="description"><br>
                        </div>
                        <div class="text-xl mt-4 hover:scale-105">
                            <label class="text-white mr-16" for="price">Ár: </label>
                            <input type="number" name="price"><br>
                        </div>
                        <input type="hidden" name="hash" value="{{ $picked_restaurant->password }}">
                        <div class="mt-8 text-center hover:scale-105 hover:text-pink-200">
                            <input class="text-white font-bold outline-white rounded-lg outline outline-2 outline-offset-4"
                                type="submit" value="Új étel leadása">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <h1 class="text-center text-4xl mt-6">Bejelentkezés</h1>
        @if (isset($restaurants))
            <div class="flex items-center flex-wrap justify-around">
                @foreach ($restaurants as $restaurant)
                    <div class="w-1/2">
                        <div
                            class="font-regular relative rounded-lg m-8 hover:scale-110 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                            <h2 class="align-middle text-center mb-4 font-bold text-4xl">{{ $restaurant->name }}</h2>
                            <form method="POST" action="{{ route('restaurantmanager.login') }}">
                                @csrf
                                <div class="ml-8 hover:scale-105">
                                    <label class="mr-2" for="password">
                                        Jelszó:
                                    </label>
                                    <input class="text-black" type="text" name="password">
                                </div>
                                <div class="mt-4 text-center hover:scale-105 hover:text-pink-200">
                                    <input class="outline-white rounded-lg outline outline-2 outline-offset-4"
                                        type="submit" value="BEJELENTKEZÉS">
                                </div>
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <hr class="w-1/2 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <h1 class="text-center text-4xl">Étterem regisztráció</h1>
        <div class="flex items-center flex-wrap justify-around">
            <div
                class="flex items-center flex-wrap justify-around w-1/2 rounded-lg m-8 hover:scale-105 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                <form method="POST" action="{{ route('restaurantmanager.register') }}">
                    @csrf
                    <div class="hover:scale-105">
                        <label class="mr-7" for="name">Étterem neve:</label>
                        <input class="text-black" type="text" name="name"><br>
                    </div>
                    <div class="mt-4 hover:scale-105">
                        <label class="mr-1" for="password">Étterem jelszava:</label>
                        <input class="text-black" type="text" name="password"><br>
                    </div>
                    <div class="mt-8 text-center hover:scale-105 hover:text-pink-200">
                        <input class="outline-white rounded-lg outline outline-2 outline-offset-4" type="submit"
                            value="REGISZTRÁCIÓ"><br>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
