@extends('layouts.app')

@section('title')
Phizza Hut | All User Transaction
@endsection()

@section('content')
    <div class="container">
        @php
        $i = 1;
        @endphp
        @foreach ($data as $transac)
        <a href="{{ route('view_transac_detail', $transac->created_at) }}">
            <div class="row">
                <div class="card m-2 col-12">
                    <div class="card-body" style="color: black">
                        {{$i}}
                        @php
                            $i++;
                        @endphp
                        <label class="control-label">Transaction at {{ $transac->created_at }}</label><br>
                        <label class="control-label">User ID : {{ $transac->user_id }}</label><br>
                        <label class="control-label">Username : {{ $users->where('id', $transac->user_id)->first()->name }}</label>
                    </div>
                </div>
            </div>
        </a>

        @endforeach
    </div>
@endsection