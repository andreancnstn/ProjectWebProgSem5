@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('add_cart', $pizza->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <img src="/storage/{{ $pizza->image }}">
        <h3>pizza name : {{ $pizza->pizza_name }}</h3>
        <h3>pizza desc : {{ $pizza->desc }}</h3>
        <h3>price : Rp. {{ $pizza->price }}</h3>
        @if (Auth::user()->role == 'member')
        <label>Quantity</label>
        <input type="text" id="qty" name="qty" placeholder="please select the amount">
        <button>add to cart</button>
        @endif
    </form>
</div>
@endsection