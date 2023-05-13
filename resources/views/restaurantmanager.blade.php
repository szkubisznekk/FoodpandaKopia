@inject('food_categories', 'App\Models\FoodCategory')
@extends('layouts.app')
@section('content')
    @if ($pickedRestaurant == 0)
        @if ($restaurants != null)
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
        @else
            <h2>Nincs éttermed testvér, vegyél.</h2>
        @endif
    @else
    <h1>Nagyon sikeresen bejelentkezdtél grat.</h1>
    <h2>Jelenlegi ételek az étteremben:</h2>
    @isset($foods)
        @foreach ($foods as $food)
                <p>{{ $food->name }}--------{{ $food->food_category_name}}</p>
        @endforeach
    @endisset
    <form method="POST" action="{{ route('restaurantmanager.place') }}">
        @csrf
        <input type="hidden" name="restaurant_id" value="{{ $pickedRestaurant }}">
        <div>
            <label for="food_category">Kategória</label>
            <select name="food_category">
                @foreach ($food_categories::all() as $category)
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
    @endif
@endsection
