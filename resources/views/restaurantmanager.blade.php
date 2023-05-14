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
                    <form method="POST" action="{{ route('restaurantmanager.deletefood') }}" class="bg-black w-28 text-center">
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
        @if (isset($restaurants))
            @foreach ($restaurants as $restaurant)
                <p>
                    {{ $restaurant->name }}
                </p>
                <form method="POST" action="{{ route('restaurantmanager.login') }}">
                    @csrf
                    <div>
                        <label for="password">
                            Jelszó:
                        </label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input type="submit" value="BEJELENTKEZÉS">
                    </div>
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                </form>
            @endforeach
        @endif
        <form method="POST" action="{{ route('restaurantmanager.register') }}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name"><br>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name="password"><br>
            </div>
            <div>
                <input type="submit" value="REGISZTRÁCIÓ"><br>
            </div>
        </form>
    @endif
@endsection
