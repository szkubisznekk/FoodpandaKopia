@inject('PAYMENT_METHODS', 'App\Models\PaymentMethod')

@extends('layouts.app')

@section('content')
    @if (isset($order))
        <div class="bg-center mx-auto w-1/2 rounded-lg m-8 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
            <p class="my-1"> Irányítószám: {{ $order->postal_code }} </p>
            <p class="my-1"> Város: {{ $order->city }} </p>
            <p class="my-1"> Cím: {{ $order->address }} </p>
            <p class="my-1"> Telefon: {{ $order->phone_number }} </p>
            <p class="my-1"> Fizetési mód: {{ $order->payment_method_name }} </p>
            <p class="my-1"> Rendelés státusza: {{ $order->status_name }} </p>
            <div>
                @foreach ($orderedItems as $orderedItem)
                    <div
                        class="mt-3 border-solid border-white border-4 font-regular relative mb-4 block w-full rounded-lg bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100">
                        <h2 class="pl-10 pb-1">{{ $orderedItem->name }} </h2>
                        <p> {{ $orderedItem->name }} </p>
                        <p> {{ $orderedItem->price }} Ft </p>
                        <p> {{ $orderedItem->amount }} db </p>
                    </div>
                @endforeach
            </div>
            <p> Összeg: {{ $price }} Ft </p>
        </div>
    @else
        <form class="bg-center mx-auto w-1/2 rounded-lg m-8 bg-gradient-to-tr from-[#9128ed] to-[#ff83e2] p-4 text-base leading-5 text-white opacity-100" method="POST" action="{{ route('order.place') }}">
            @csrf
            <div class="mt-4">
                <label class="mr-[41] text-xl" for="postal_code">IRSZ</label>
                <input class="text-black rounded" type="number" name="postal_code"><br>
            </div>
            <div class="mt-4">
                <label class="mr-[35] text-xl" for="city">Város</label>
                <input class="text-black rounded" type="text" name="city"><br>
            </div>
            <div class="mt-4">
                <label class="mr-[50] text-xl" for="address">Cím</label>
                <input class="text-black rounded" type="text" name="address"><br>
            </div>
            <div class="mt-4">
                <label class="mr-[38] text-xl" for="phone_number">Telefonszám</label>
                <input class="text-black rounded" type="text" name="phone_number"><br>
            </div>

            <div class="mt-4">
                <label class="mr-0 text-xl" for="payment_method"> Fizetési metódus</label>
                <select class="text-black rounded" name="payment_method">
                    @foreach ($PAYMENT_METHODS::all() as $payment_method)
                        <option value="{{ $payment_method->id }}"> {{ $payment_method->name }} </option>
                    @endforeach
                </select>
            </div>

            <input class="mt-4 hover:text-pink-500 hover:bg-gray-200 text-bs middle none center rounded-lg bg-pink-500 py-4 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit" value="Rendelés">
        </form>
    @endif
@endsection
