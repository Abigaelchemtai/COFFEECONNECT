@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $item->name }}</h2>
    <img src="{{ asset('images/share1.avif') }}" class="img-fluid my-3" alt="{{ $item->name }}">
    <p>{{ $item->description }}</p>
    <h4>Price: ${{ number_format($item->price, 2) }}</h4>
    <p>Stock: {{ $item->stock }}</p>
    <a href="#" class="btn btn-success">Buy Now</a>
</div>
@endsection
