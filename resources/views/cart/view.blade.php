@extends('layouts.app')

@section('content')
    @foreach ($carts as $cart)
    <form action="{{ route('update_cart', $cart->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        user_id = {{ $cart->user_id }}
        pizza_name = {{ $cart->pizza_name }}
        <img src="storage/{{$cart->image}}">
        qty = {{ $cart->qty }}
        qty <input type="text" id="qty" name="qty">
        <button>update cart</button>
    </form>
    @endforeach

    <form action="{{ route('add_transac', auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <button>Check Out</button>
    </form>
@endsection