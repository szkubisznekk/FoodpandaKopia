@extends('layouts.app')

@section('content')
    @if (isset($courier))
        @foreach ($orders as $order)
            <div class="flex items-center flex-wrap justify-around">
                <div class="w-1/2">
                    <p> Irányítószám: {{ $order->postal_code }} </p>
                    <p> Város: {{ $order->city }} </p>
                    <p> Cím: {{ $order->address }} </p>
                    <p> Telefon: {{ $order->phone_number }} </p>
                    <p> Fizetési mód: {{ $order->payment_method_name }} </p>
                    <p class="font-bold"> Rendelés státusza: {{ $order->status_name }} </p>
                </div>
                <div>
                    <form method="POST" action="{{ route('courier.changeOrderStatus') }}">
                        @csrf
                        <input type="hidden" name="courier_id" value="{{ $courier->id }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="order_status_id" value="{{ $order->status_id }}">
                        <input type="submit"
                            class="hover:border-2 hover:border-pink-800 hover:text-pink-500 hover:bg-gray-200 ml-10 text-bs middle none center rounded-lg bg-pink-500 py-4 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            value="{{ $order->status_id == 2 ? 'Kiszállítva' : 'Elfogad' }}">
                    </form>
                </div>
            </div>
        @endforeach
    @else
        {{-- <div>
            <form method="POST" action="{{ route('courier.login') }}">
                @csrf
                <div>
                    <label for="courier_id"> ID: </label>
                    <input type="text" name="courier_id">
                </div>
                <input type="submit" value="Login">
            </form>
        </div> --}}
        <hr class="w-1/2 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <h1 class="text-center text-4xl">Futár bejelentkezés</h1>
        <div class="flex items-center flex-wrap justify-around">
            <div
                class="flex items-center flex-wrap justify-around w-1/2 rounded-lg m-8 hover:scale-105 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                <form method="POST" action="{{ route('courier.login') }}">
                    @csrf
                    <div class="">
                        <label class="mr-8 text-xl" for="courier_id">Futár ID-je:</label>
                        <input class="text-black" type="text" name="courier_id"><br>
                    </div>
                    <div class="mt-4">
                        <label class="mr-1 text-xl" for="password">Futár jelszava:</label>
                        <input class="text-black" type="" name=""><br>
                    </div>
                    <div class="mt-8 text-center hover:scale-105 hover:text-pink-200">
                        <input class="outline-white rounded-lg outline outline-2 outline-offset-4" type="submit"
                            value="Bejelentkezés"><br>
                    </div>
                </form>
            </div>
        </div>
    @endif

@endsection
