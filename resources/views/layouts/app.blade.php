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
</head>

<body>
    <div class="grid grid-cols-3 divide-x-4 divide-black bg-sky-400 h-10 sticky top-0">
        <div>1</div>
        <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/rv.png') }}" alt="panda logo"
                    class="mx-auto h-9 w-9" /></a></div>
        <div class="grid grid-cols-3 divide-x-2 divide-black">
            <div></div>
            <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/wultah.png') }}"
                        alt="walter logo" class="ml-[20%] mr-2 h-9 w-9 inline-block" /><span
                        class="">Bejelentkezés</span></a></div>
            <div><a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/basket.png') }}"
                        alt="basket logo" class="ml-[20%] mr-2 h-9 w-9 inline-block" /><span
                        class="">Kosár</span></a></div>
        </div>

    </div>
    <div>
        @yield('content')
    </div>
</body>

</html>
