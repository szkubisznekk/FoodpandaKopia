@inject('FOOD_CATEGORIES', 'App\Models\FoodCategory')

@extends('layouts.app')

@section('content')
    @if (isset($picked_restaurant))
        <h1> {{ $picked_restaurant->name }} </h1>
        <h2>Jelenlegi ételek az étteremben:</h2>
        @isset($foods)
            @foreach ($foods as $food)
                <div
                    class="font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                    <h2 class="pl-10 pb-1">{{ $food->name }} </h2>
                    <p>{{ $food->description }} </p>
                    <p>{{ $food->price }} Ft </p>
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
                <input type="numnber" name="price"><br>
            </div>
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
    @endif
    <form method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
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
@endsection
