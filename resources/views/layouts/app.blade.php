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
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
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
    <nav class="navbar">
        <!-- LOGO -->
        <div class="compname">
            <h1 class="logo">Food<span style="color:#273b91;">panda</span>Kópia</h1>
        </div>
        <!-- NAVIGATION MENU -->
        <ul class="nav-links">
            <!-- USING CHECKBOX HACK -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="{{ url('/') }}">Kezdőoldal</a></li>
                <li><a href="{{ url('/restaurants') }}">Éttermek</a></li>
                <li><a href="{{ url('/restaurantmanager') }}">Étteremkezelő</a></li>
                <li><a href="#">Rólunk</a></li>
                @if ($user != null)
                    <li class="services">
                        <a href="#">{{ $user->name }}</a>
                        <!-- DROPDOWN MENU -->
                        <ul class="dropdown">
                            <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <div>
                                        <input type="submit" value="Kijelentkezés"><br>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('auth') }}">Bejelentkezés</a></li>
                @endif
                <li><a href="{{ url('cart') }}">Kosár</a></li>

            </div>


        </ul>

    </nav>
    <div>
        @yield('content')
    </div>
    <div class="bg-sky-400">
        <span class="material-symbols-outlined">copyright</span>
        <p>Methlab™©®</p>
    </div>

    <script src="script.js"></script>
</body>

</html>
