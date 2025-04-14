<!-- resources/views/checkout/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    <!-- Display User Information -->
    <h4>Welcome, {{ $user->name }}</h4>
    <p>User ID: {{ $user->id }}</p>
    <p>Name: {{ $user->UserName }}</p>
    <p>Email: {{ $user->Email }}</p>
    <p>Phone: {{ $user->phone ?? 'N/A' }}</p> <!-- Example if you have phone in the user table -->
    <p>Address: {{ $user->address ?? 'N/A' }}</p> <!-- Example if you have address in the user table -->

    <!-- Checkout Amount -->
    <!-- Checkout Amount -->
    <p><strong>Total Amount:</strong> {{ number_format($totalAmountSats) }} Sats</p>

<form action="{{ route('checkout.confirm') }}" method="POST">
    @csrf
    <input type="hidden" name="amount_sats" value="{{ $totalAmountSats }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <button type="submit" class="btn btn-primary">Confirm & Pay</button>
</form>
@endsection
