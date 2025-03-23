@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Coffee Connect Shop</h2>

    <div class="row">
        @foreach($shopItems as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/share1.avif') }}" class="card-img-top" alt="{{ $item->name }}">
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
