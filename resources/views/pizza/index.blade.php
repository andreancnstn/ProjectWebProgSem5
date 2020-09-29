@extends('layouts.app')

@section('content')
    @foreach ($pizzas as $pizza)
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/detail-pizza/{{ $pizza->id }}">
                    <img src="/storage/{{ $pizza->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                    <p>
                    <span class="font-weight-bold">
                        <a href="/detail-pizza/{{ $pizza->id }}">
                            <span class="text-dark">{{ $pizza->pizza_name }}</span>
                        </a>
                    </span> Rp.{{ $pizza->price }}
                    </p>
                    @if (Auth::user())
                        @if (Auth::user()->role == 'admin')
                            <a href="/edit-pizza/{{ $pizza->id }}">
                                <button>Update Pizza</button>
                            </a>
                            <form action="{{ route('delete_pizza', $pizza->id) }}" method="POST">
                                @csrf
                                <button>Delete Pizza</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection