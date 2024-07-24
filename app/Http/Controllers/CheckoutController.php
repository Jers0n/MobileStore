<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        $subtotal = str_replace(',', '', Cart::instance('cart')->subtotal());

        $taxRate = 0.10; // 10% tax rate for each item
        $taxAmount = $subtotal * $taxRate;
        $totalPrice = $subtotal + $taxAmount;

        return view('checkout', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'taxAmount'=>$taxAmount]);
    }
}
