@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>

    @if (empty($cart))
        <div class="alert alert-info text-center">
            Your cart is empty. <a href="{{ route('shop.index') }}">Go back to shop</a>.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $details)
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>${{ number_format($details['price'], 2) }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td>
                                <!-- Remove Item Button -->
                                <form method="POST" action="{{ route('cart.remove', $id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <h4>Total: ${{ number_format($totalPrice, 2) }}</h4>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        </div>
    @endif
</div>
@endsection
