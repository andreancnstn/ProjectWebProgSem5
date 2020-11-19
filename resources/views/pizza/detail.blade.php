@extends('layouts.app')

@section('title')
Phizza Hut | {{$pizza->pizza_name}} Pizza
@endsection()

@section('content')
<form action="{{ route('add_cart', $pizza->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="container">
        <div class="card">
            <div class="d-flex p-3">
                <div class="col-md-5">
                    <img src="{{Storage::url($pizza->image)}}" class="w-100">
                </div>

                <div class="col-sm-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="font-weight-bold">
                                <span class="text-dark" style="font-size: 170%">{{ $pizza->pizza_name }}</span>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p style="font-size: 120%">
                        {{ $pizza->desc }} <br>
                        Rp. {{ $pizza->price }}
                    </p>

                    @if (Auth::user())
                        @if (Auth::user()->role == 'member')
                            <div class="form-group">
                                {{-- <label>Quantity</label> --}}
                                <input type="text" id="qty" name="qty" placeholder="Quantity" class="form-control" required><br>
                                <button class="btn-primary">add to cart</button>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>





{{-- <div class="container">
    <form action="{{ route('add_cart', $pizza->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <img src="/storage/{{ $pizza->image }}">
        <h3>pizza name : {{ $pizza->pizza_name }}</h3>
        <h3>pizza desc : {{ $pizza->desc }}</h3>
        <h3>price : Rp. {{ $pizza->price }}</h3>
        @if (Auth::user())
            @if (Auth::user()->role == 'member')
                <label>Quantity</label>
                <input type="text" id="qty" name="qty" placeholder="please select the amount">
                <button>add to cart</button>
            @endif
        @endif
    </form>
</div> --}}
@endsection