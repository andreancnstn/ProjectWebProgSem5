@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
            <div class="card com-sm-4 mr-4 mt-4">
                <div class="card-header">
                    <label class="control-label col-12">User ID : {{ $user->id }}</label>
                </div>
                <div class="card-body">
                    <label class="control-label col-12">Username : {{ $user->name }}</label><br>
                    <label class="control-label col-12">Email : {{ $user->email }}</label><br>
                    <label class="control-label col-12">Address : {{ $user->address }}</label><br>
                    <label class="control-label col-12">Phone number : {{ $user->phone }}</label><br>
                    <label class="control-label col-12">Gender : {{ $user->gender }}</label><br>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection