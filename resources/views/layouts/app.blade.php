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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
    <header>
        <div class="inner-width">
          <h1 class="logo">Food<span style="color:#273b91;">panda</span>Kopia</h1>
          <i class="menu-toggle-btn fas fa-bars"></i>
          <nav class="navigation-menu">
            <a href="{{ url('/') }}"><i class="fas fa-home home"></i> Kezdőlap</a>
            <a href="{{ url('/restaurants') }}"></i> Éttermek</a>
            <a href="{{ url('/restaurantmanager') }}"></i> Étterem manager</a>
            <a href="#"></i>Kosár</a>
            <a href="#"></i> Rólunk</a>
            @if ($user != null)
            <a href="#" class="aj_btn"> <i class="fas fa-lock" aria-hidden="true"></i>{{ $user->name }}</a>
             @else
             <a href="{{ url('/login') }}" class="aj_btn"> <i class="fas fa-lock" aria-hidden="true"></i>Bejelentkezés</a>
            @endif
          </nav>
        </div>
    </header>
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



    <script src="script.js"></script>
</body>

</html>
