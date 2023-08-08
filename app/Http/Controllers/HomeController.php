<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Brand;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    function shop($id)
    {
        $products = Product::find($id);
        return view('shop', ['products' => $products]);
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

    public function DetailProduct($id)
    {
        $products = Product::find($id);
        $sizes = Size::all();
        // $categories_alike = DB::table('categories')->join('products','products.category_id' ,'=', 'products.categories');
        return view('product_detail', ['products' => $products, 'sizes' => $sizes]);
    }

    public function search_item(Request $request)
    {
        $search_product = Product::where('name', 'like', '%' . $request->search . '%')->get();
        return view('search', compact('search_product'));
    }
}