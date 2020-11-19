@extends('layouts.app')

@section('title')
Phizza Hut | {{auth()->user()->name}}'s Cart
@endsection()

@section('content')
    @foreach ($carts as $cart)
    <div class="container">
        <div class="card m-3">
            <div class="d-flex p-3">
                <div class="col-md-3">
                    <img src="{{ Storage::url($pizzas->where('id', $cart->pizza_id)->first()->image) }}" class="w-100">
                </div>
    
                <div class="col-sm-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="font-weight-bold">
                                <span class="text-dark" style="font-size: 170%">{{ $pizzas->where('id', $cart->pizza_id)->first()->pizza_name }}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group" style="font-size: 120%">
                        <label>Rp. {{ $pizzas->where('id', $cart->pizza_id)->first()->price }}</label><br>
                        <label>Quantity</label><span>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>{{ $cart->qty }}
                    </div>
                    <form action="{{ route('update_cart', $cart->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="Qty" class="col-sm-3 col-form-label text-md-right">Quantity</label>
                            <div class="col-md-8">
                                <input type="text" id="qty" name="qty" placeholder="Quantity" class="form-control" >
                            </div>
                        </div>
                        <button class="btn-primary">Update cart</button>
                    </form>
                    <form action="{{ route('destroy_cart', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger ml-3">Delete Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- TODO : PAS ENGK ADA BARANG< JGN SHOW BUTTON INSTEAD USE TULISAN AND BUTTON REDIRECT TO SHOP --}}
    <form action="{{ route('add_transac', auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="container">
            <button class="btn-success m-3">Check Out</button>
        </div>
    </form>
@endsection