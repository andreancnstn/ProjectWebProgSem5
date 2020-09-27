@extends('layouts.app')

@section('content')
    @foreach ($transacs as $transac)
        <a href="{{ route('view_transac_detail', $transac->created_at) }}">
            <label>Transaction at {{ $transac->created_at }}</label><br>
        </a>
    @endforeach
@endsection