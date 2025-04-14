@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <div class="alert alert-warning text-center">
        Please <a href="{{ route('login') }}">log in</a> to view and purchase items.
    </div>
@endif

<div class="container">
    <h2 class="text-center my-4">Coffee Connect Shop</h2>

    <div class="row">
        @foreach($shopItems as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="#" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">${{ number_format($item->price, 2) }}</p>
                    <a href="{{ route('shop.show', $item->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
