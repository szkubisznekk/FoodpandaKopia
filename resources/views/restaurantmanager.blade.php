@inject('FOOD_CATEGORIES', 'App\Models\FoodCategory')

@extends('layouts.app')

@section('content')
    @if (isset($picked_restaurant))
        <h1> {{ $picked_restaurant->name }} </h1>
        <h2> Jelenlegi aktív rendelések: </h2>
        @isset($orders)
            @foreach ($orders as $order)
                <div>
                    <p> Irányítószám: {{ $order->postal_code }} </p>
                    <p> Város: {{ $order->city }} </p>
                    <p> Cím: {{ $order->address }} </p>
                    <p> Telefon: {{ $order->phone_number }} </p>
                    <p> Fizetési mód: {{ $order->payment_method_name }} </p>
                    <p> Rendelés státusza: {{ $order->status_name }} </p>
                    <div>
                        @foreach ($orderedItems[$order->id] as $orderedItem)
                            <div
                                class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                                <h2 class="pl-10 pb-1">{{ $orderedItem->name }} </h2>
                                <p> {{ $orderedItem->name }} </p>
                                <p> {{ $orderedItem->price }} Ft </p>
                                <p> {{ $orderedItem->amount }} db </p>
                            </div>
                        @endforeach
                    </div>
                    <form method="POST" action="{{ route('restaurantmanager.changeOrderStatus') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="order_status_id" value="{{ $order->status_id }}">
                        <input type="submit" value="CONFIRM">
                    </form>
                </div>
            @endforeach
        @endisset
        <h2>Jelenlegi ételek az étteremben:</h2>
        @isset($foods)
            @foreach ($foods as $food)
                <div
                    class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                    <h2 class="pl-10 pb-1">{{ $food->name }} </h2>
                    <p>{{ $food->description }} </p>
                    <p>{{ $food->price }} Ft </p>
                    <form method="POST" action="{{ route('restaurantmanager.deletefood') }}"
                        class="bg-black w-28 text-center">
                        @csrf
                        <input type="hidden" name="food_id" value="{{ $food->id }}">
                        <input type="hidden" name="restaurant_id" value="{{ $picked_restaurant->id }}">
                        <input type="hidden" name="hash" value="{{ $picked_restaurant->password }}">
                        <input type="submit" value="TÖRLÉS">
                    </form>
                </div>
            @endforeach
        @endisset
        <form method="POST" action="{{ route('restaurantmanager.place') }}">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $picked_restaurant->id }}">
            <div>
                <label for="food_category">Kategória</label>
                <select name="food_category">
                    @foreach ($FOOD_CATEGORIES::all() as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="name">Név:</label>
                <input type="text" name="name"><br>
            </div>
            <div>
                <label for="description">Leírás:</label>
                <input type="text" name="description"><br>
            </div>
            <div>
                <label for="price">Ár:</label>
                <input type="number" name="price"><br>
            </div>
            <input type="hidden" name="hash" value="{{ $picked_restaurant->password }}">
            <input type="submit" value="Lead">
        </form>
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
                                <div class="hover:scale-105">
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
