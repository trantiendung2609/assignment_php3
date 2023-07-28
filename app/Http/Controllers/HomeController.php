<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    function shop()
    {
        return view('shop');
    }
    function about()
    {
        return view('about');
    }
    function contact()
    {
        return view('contact');
    }
    function cart()
    {
        return view('cart');
    }
}
