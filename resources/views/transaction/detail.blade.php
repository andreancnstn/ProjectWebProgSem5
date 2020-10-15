@extends('layouts.app')

@section('content')
    @foreach ($transacs as $transac)

    <div class="container">
        <div class="card m-3">
            <div class="d-flex p-3">
                <div class="col-md-3">
                    <img src="/storage/{{ $pizzas->where('id', $transac->pizza_id)->first()->image }}" class="w-100">
                </div>
    
                <div class="col-sm-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="font-weight-bold">
                                <span class="text-dark" style="font-size: 170%">{{ $pizzas->where('id', $transac->pizza_id)->first()->pizza_name }}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group" style="font-size: 120%">
                        <label>Rp. {{ $pizzas->where('id', $transac->pizza_id)->first()->price }}</label><br>
                        <label>Quantity</label><span>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</span>{{ $transac->qty }}<br>
                        <label>Total Price</label><span>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Rp.&nbsp;&nbsp;</span>{{ $transac->total_price }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection