@inject('payment_methods', 'App\Models\PaymentMethod')

@extends('layouts.app')

@section('content')
    @if ($order == null)
        <form method="POST" action="{{ route('order.place') }}">
            @csrf
            <div>
                <label for="postal_code">Postal Code</label>
                <input type="number" name="postal_code"><br>
            </div>
            <div>
                <label for="city">City</label>
                <input type="text" name="city"><br>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address"><br>
            </div>
            <div>
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number"><br>
            </div>

            <div>
                <label for="payment_method"> Payment Method</label>
                <select name="payment_method">
                    @foreach ($payment_methods::all() as $payment_method)
                        <option value="{{ $payment_method->id }}"> {{ $payment_method->name }} </option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Rendelés">
        </form>
    @else
        <div>
            <p> Irányítószám: {{ $order->postal_code }} </p>
            <p> Város: {{ $order->city }} </p>
            <p> Cím: {{ $order->address }} </p>
            <p> Telefon: {{ $order->phone_number }} </p>
            <p> Fizetési mód: {{ $order->payment_method }} </p>
            <p> Rendelés státusza: {{ $order->status }} </p>
        </div>
    @endif
@endsection
