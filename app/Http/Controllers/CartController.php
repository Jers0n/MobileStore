<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Gloudemans\Shoppingcart\Facades\Cart;
use \App\Models\Product;

class CartController extends Controller
{
    // Show all list cart items
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('cart', ['cartItems'=>$cartItems]);
    }

    // Add product to the cart
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $price = $product->sale_price ?? $product->regular_price;
        Cart::instance('cart')->add($product->product_id,$product->name,$request->quantity,$price)->associate('App\Models\Product');

        return redirect()->back()->with('message','Success ! Item has been added successfully!');
    }  

    // Updating product quantity from the Cart section
    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    } 

    // Removing the cart item from the Cart list
    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }

}
