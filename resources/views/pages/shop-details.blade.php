@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $item->name }}</h2>
    <img src="{{ asset('images/share1.avif') }}" class="img-fluid my-3" alt="{{ $item->name }}">
    <p>{{ $item->description }}</p>
    <h4>Price: ${{ number_format($item->price, 2) }}</h4>
    <p>Stock: {{ $item->stock }}</p>
    <form method="POST" action="{{ route('cart.add', $item->id) }}">
    @csrf
    <button type="submit" class="btn btn-success">Add to Cart</button>
</form>

</div>
@endsection
