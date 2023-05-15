@extends('layouts.app')

@section('content')
    <div class="flex items-center flex-wrap justify-around">
        <a href="{{ url('/restaurants') }}">
            <div
                class="font-bold hover:bg-gradient-to-r hover:from-purple-400 hover:to-pink-600 text-white hover:text-white bg-purple-600 bg-of outline outline-pink-400 my-24 text-8xl text-center hover:scale-105 font-regular relative m-1 p-4 block rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] opacity-100">

                <h1 class="m-8 text-transparent bg-clip-text bg-gradient-to-r from-pink-800 to-purple-800">Food<span
                        style="color:white">panda</span>Kópia</h1>

            </div>
        </a>
    </div>
    <h2 class="mb-48 text-center italic font-bold text-2xl font-mono"> Mindent is kiszállítunk! </h2>
    </div>
@endsection
