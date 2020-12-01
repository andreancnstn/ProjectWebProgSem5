@extends('layouts.app')

@section('title')
Phizza Hut | Edit {{$pizza->pizza_name}}
@endsection()

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3>Edit Pizza</h3></div>

                <div class="card-body">
                    <form action="{{ route('update_pizza', $pizza->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="pizza_name" class="col-md-4 col-form-label text-md-right">Pizza Name</label>

                            <div class="col-md-6">
                                <input value="{{ $pizza->pizza_name }}" id="pizza_name" type="text" class="form-control"  name="pizza_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input value="{{ $pizza->desc }}" id="desc" type="text" class="form-control"  name="desc" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input value="{{ $pizza->price }}" id="price" type="number" min="10000" step="100" class="form-control"  name="price" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                @if ($pizza->image != null)
                                    <a class="btn-warning form-control" type="hidden" href="{{ route('showImage', $pizza->image) }}">Lihat Gambar</a>
                                @endif
                                <input id="image" type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save Pizza</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection