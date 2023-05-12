@extends('layouts.app')

@section('content')
@foreach ($restaurants as $restaurant)
    <p> {{ $restaurant->name}} </p>
@endforeach

@endsection
