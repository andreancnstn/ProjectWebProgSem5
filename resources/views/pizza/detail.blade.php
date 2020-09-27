@extends('layouts.app')

@section('content')
<div class="container">
    <img src="/storage/{{ $pizza->image }}">
    <input id="pizzaName" value="{{ $pizza->pizza_name }}" disabled> name : {{ $pizza->pizza_name }}
    pizza desc : {{ $pizza->desc }}
    price : Rp. {{ $pizza->price }}
    @if (Auth::user()->role == 'member')
    <label>Quantity</label>
    <input type="text" id="qty" name="qty" placeholder="please select the amount">
    <button id="add_to_cart">add to cart</button>
    @endif
</div>

<script>
$('#add_to_cart').on('click', function() {
    window.location.href = "{{ route('add_cart') }}?pizza_name=" + $('#pizzaName').val()
});
</script>
@endsection