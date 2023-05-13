@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
        Nagyon sikeresen bejelentkezdtél grat.
    @endif
@endsection
