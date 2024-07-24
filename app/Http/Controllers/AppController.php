<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AppController extends Controller
{
    // Return the index 
    public function index()
    {
         // Retrieve the latest 12 products
        $latestProducts = Product::orderBy('created_at', 'desc')->take(12)->get();

        // Pass the latest products to the view
        return view('index', ['latestProducts' => $latestProducts]);
    }
}
