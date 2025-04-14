<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Fetch the logged-in user
        $user = Auth::user();

        // Retrieve cart items from the session (assuming cart is stored in the session)
        $cart = session()->get('cart', []); // Get cart from session
        $totalAmountSats = 0;

        // Example: USD to BTC conversion rate, 1 BTC = 100,000,000 Sats (you should update this dynamically)
        $usdToBtcRate = 0.000026; // Example rate, 1 USD = 0.000026 BTC (you can get the latest rate dynamically)
        $btcToSats = 100000000; // 1 BTC = 100,000,000 Sats
        
        // Calculate the total amount of items in the cart
        foreach ($cart as $item) {
            // Calculate the price in USD, then convert to BTC, then to Sats
            $priceInSats = $item['price'] * $usdToBtcRate * $btcToSats;

            // Add the total amount of this item (price in Sats * quantity) to the totalAmountSats
            $totalAmountSats += $priceInSats * $item['quantity'];
        }

        // Pass the user data and total amount in sats to the view
        return view('checkout.index', compact('user', 'totalAmountSats'));
    }

    public function confirm(Request $request)
    {
        $amountInSats = $request->input('amount_sats');
        $user = Auth::user();

        // Simulate payment processing or redirect to real payment gateway here
        return redirect()->route('checkout.index')->with('success', 'Payment confirmed for ' . number_format($amountInSats) . ' Sats');
    }
}