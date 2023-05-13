@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('order.place') }}">
        @csrf
        <div>
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code"><br>
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
            <p> Payment Method </p>
        </div>
        <div>
            <label for="mastercard">MasterCard</label>
            <input type="radio" id="mastercard" name="payment_method" value="1"><br>
        </div>
        <div>
            <label for="maestro">Maestro</label>
            <input type="radio" id="maestro" name="payment_method" value="2"><br>
        </div>
        <div>
            <label for="visa">VISA</label>
            <input type="radio" id="visa" name="payment_method" value="3"><br>
        </div>
        <div>
            <label for="szep">SZÉP</label>
            <input type="radio" id="szep" name="payment_method" value="4"><br>
        </div>
        <div>
            <label for="revolut">Revolut</label>
            <input type="radio" id="revolut" name="payment_method" value="5"><br>
        </div>
        <div>
            <label for="cash">Készpénz</label>
            <input type="radio" id="cash" name="payment_method" value="6"><br>
        </div>

        <input type="submit" value="Rendelés">
    </form>
@endsection
