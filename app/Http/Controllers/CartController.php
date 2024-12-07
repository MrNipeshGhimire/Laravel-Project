<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = session()->get('cart');
        return view('frontend.pages.cart', compact('carts'));
    }

    public function addToCart(Request $request)
    {
        $product = $request->input('product');

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $product['id'] => $product
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity'] += $product['quantity'];
        } else {
            $cart[$product['id']] = $product;
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }
}
