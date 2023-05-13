@extends('layouts.app')

@section('content')
    <h1>
        Login
    </h1>
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name"><br>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email"><br>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="text" name="password"><br>
        </div>

        <div>
            <input type="submit" value="REGISZTRÁCIÓ"><br>
        </div>
    </form>
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="text" name="email"><br>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="text" name="password"><br>
        </div>

        <div>
            <input type="submit" value="BEJELENTKEZÉS"><br>
        </div>
    </form>
@endsection
