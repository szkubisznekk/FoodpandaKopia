@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodpanda Kopia</title>
    {{-- Font --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
        rel="stylesheet">
</head>

<style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'48
    }
</style>

<body>
    <div class="grid grid-cols-3 divide-x-4 divide-black bg-sky-400 h-10 sticky top-0">
        <div><a href="{{ url('/restaurants') }}"><img src="{{ Vite::asset('resources/images/restaurant.png') }}"
                    alt="panda logo" class="mx-auto h-9 w-9" /></a></div>
        <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/pandalogo.png') }}"
                    alt="panda logo" class="mx-auto h-9 w-9" /></a></div>
        <div class="grid grid-cols-3 divide-x-2 divide-black">
            <div>
                <div><a href="{{ url('/restaurantmanager') }}"><img
                            src="{{ Vite::asset('resources/images/manager.png') }}" alt="panda logo"
                            class="mx-auto h-9 w-9" /></a></div>
            </div>
            <div>
                @if ($user != null)
                    <p> {{ $user->name }} </p>
                @else
                    <a href="{{ url('/login') }}"><img src="{{ Vite::asset('resources/images/wultah.png') }}"
                            alt="walter logo" class="ml-[20%] mr-2 h-9 w-9 inline-block" /><span
                            class="">Bejelentkezés</span></a>
                @endif
            </div>
            <div><a href="{{ url('/cart') }}"><img src="{{ Vite::asset('resources/images/basket.png') }}"
                        alt="basket logo" class="ml-[20%] mr-2 h-9 w-9 inline-block" /><span
                        class="">Kosár</span></a></div>
        </div>

    </div>
    <div>
        @yield('content')
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div>
            <input type="submit" value="Kijelentkezés"><br>
        </div>
    </form>
    <div class="bg-sky-400">
        <span class="material-symbols-outlined">copyright</span>
        <p>Methlab™©®</p>
    </div>
</body>

</html>
