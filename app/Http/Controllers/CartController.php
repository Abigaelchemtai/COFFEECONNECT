<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopItem;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('pages.checkout', compact('cart', 'totalPrice'));
    }
    
    public function add(Request $request, $id)
    {
        $item = ShopItem::findOrFail($id);

        // Sample session-based cart structure
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart!');
    }
    public function view()
{
    // Retrieve cart data from session
    $cart = session()->get('cart', []);
    
    // Calculate total price
    $totalPrice = array_reduce($cart, function($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    }, 0);

    return view('pages.cart', compact('cart', 'totalPrice'));
}
public function remove($id)
{
    $cart = session()->get('cart', []);

    // Remove the item from cart
    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    // Update the cart in session
    session()->put('cart', $cart);

    return redirect()->route('cart.view')->with('success', 'Item removed from cart');
}

}

