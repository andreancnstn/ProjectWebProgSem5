@extends('layouts.app')

@section('title')
Phizza Hut | Home
@endsection()

@section('content')
    <div class="container">

    
        @if (Auth::check())
            @if (Auth::user()->role == 'member')
            <form action="{{ route('home_pizza') }}" method="GET">
                <div class="row">
                    <div class="col-6 ml-3">
                        <input class="form-control" type="text" name="search" id="search" placeholder="Seacrh Pizza">
                    </div>
                    <button class="btn-primary form-control col-sm-1">Search</button>
                </div>
            </form>
            @else
                @if (Auth::user()->role == 'admin')
                    <a class="btn bg-color-dark-gray form-control col-sm-1 ml-3" href="{{ route('create_pizza') }}">Add Pizza</a>
                @endif
            @endif
        @endif
        @guest
            <form action="{{ route('home_pizza') }}" method="GET">
                <div class="row">
                    <div class="col-6 ml-3">
                        <input class="form-control" type="text" name="search" id="search" placeholder="Seacrh Pizza">
                    </div>
                    <button class="btn-primary form-control col-sm-1">Search</button>
                </div>
            </form>
        @endguest


        <div class="row">
            @foreach ($pizzas as $pizza)
            <div class="col-4">
                <div class="card-body p-2 m-2">

                    <div class="pizza-img-wrapper">
                        <a href="{{ route('show_pizza' , $pizza->id) }}">
                            <img src="{{Storage::url($pizza->image)}}" class="w-100">
                        </a>
                    </div>
                    
                    <p>
                        <span class="font-weight-bold">
                            <a href="{{ route('show_pizza' , $pizza->id) }}">
                                <span class="text-dark">{{ $pizza->pizza_name }}</span><br>
                            </a>
                        </span> Rp.{{ $pizza->price }}
                    </p>
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                        <div class="row col-12">
                            <a href="{{ route('edit_pizza' , $pizza->id) }}">
                                <button class="btn-success form-control">Update Pizza</button>
                            </a>
                            <a href="{{ route('delete_pizza' , $pizza->id) }}">
                                <button class="btn-danger ml-2 form-control">Delete Pizza</button>
                            </a>
                            {{-- <form action="{{ route('delete_pizza', $pizza->id) }}" method="POST">
                                @csrf
                                <button class="btn-danger ml-2 form-control">Delete Pizza</button>
                            </form> --}}
                        </div>
                        @endif
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="ml-3">
            {{ $pizzas->links() }}
        </div>
    </div>
    
@endsection