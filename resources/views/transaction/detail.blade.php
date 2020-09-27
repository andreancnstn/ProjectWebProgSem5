@extends('layouts.app')

@section('content')
    @foreach ($transacs as $transac)
        <img src="/storage/{{ $transac->image }}">
        {{ $transac->pizza_name}}
        {{ $transac->price }}
        {{ $transac->qty }}
        {{ $transac->total_price }}
    @endforeach
@endsection