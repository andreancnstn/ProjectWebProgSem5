@extends('layouts.app')

@section('title')
Phizza Hut | Delete Pizza
@endsection()

@section('content')
<form action="{{ route('destroy_pizza', $pizza->id) }}" enctype="multipart/form-data" method="POST">
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

                    <div class="form-group">
                        <button class="btn-danger">Delete Pizza</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection