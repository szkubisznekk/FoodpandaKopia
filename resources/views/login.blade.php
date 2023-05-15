@extends('layouts.app')

@section('content')
    <div class="flex items-center flex-wrap justify-around">
        <div class="w-1/2 p-4 h-72 relative">
            <div
                class="h-full hover:scale-105 hover:border-red-800 hover:border-2 font-regular relative m-1 p-4 block rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] text-base leading-5 text-white opacity-100">
                <h2 class="text-4xl text-center mb-4 underline underline-offset-auto">Regisztráció</h2>
                <form method="POST" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="mt-2 text-xl">
                        <label for="name">Név:</label>
                        <input class="ml-7 text-black" type="text" name="name"><br>
                    </div>
                    <div class="mt-2 text-xl">
                        <label class="mr-[14]" for="email">Email:</label>
                        <input class="text-black" type="text" name="email"><br>
                    </div>
                    <div class="mt-2 text-xl">
                        <label for="password">Jelszó:</label>
                        <input class="ml-[7] text-black" type="text" name="password"><br>
                    </div>
                    <div class="text-right pr-2 absolute inset-x-0 bottom-0 h-16">
                        <input
                            class="hover:border-2 hover:border-pink-800 hover:text-pink-500 hover:bg-gray-200 ml-10 text-bs middle none center rounded-lg bg-pink-500 py-4 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="submit" value="REGISZTRÁCIÓ"><br>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/2 p-4 h-72 relative">
            <div
                class="hover:scale-105 hover:border-red-800 hover:border-2 h-full font-regular relative m-1 p-4 block rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] text-base leading-5 text-white opacity-100">
                <h2 class="text-4xl text-center mb-4 underline underline-offset-auto"> Bejelentkezés</h2>
                <form method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="mt-2 text-xl">
                        <label for="email">Email:</label>
                        <input class="ml-[15] text-black" type="text" name="email"><br>
                    </div>
                    <div class="mt-2 text-xl">
                        <label for="password">Jelszó:</label>
                        <input class="ml-2 text-black" type="text" name="password"><br>
                    </div>
                    <div class="text-right pr-2 absolute inset-x-0 bottom-0 h-16">
                        <input
                            class="hover:border-2 hover:border-pink-800 hover:text-pink-500 hover:bg-gray-200 ml-10 text-bs middle none center rounded-lg bg-pink-500 py-4 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="submit" value="BEJELENTKEZÉS"><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
