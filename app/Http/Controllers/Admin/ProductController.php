<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $products->load([
            'brand',
            'category',
        ]);
        return view('admin.products.list_product_admin', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create_product_admin', ['categories' => $categories, 'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $price = $request->input('price');
        $image = $request->file('image')->getClientOriginalName(); // lấy tên file
        $path = $request->file('image')->storeAs('public/images/products', $image);
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $brand_id = $request->input('brand_id');

        $path =
            $data = [
                'name' => $name,
                'gender' => $gender,
                'price' => $price,
                'image' => $image,
                'description' => $description,
                'category_id' => $category_id,
                'brand_id' => $brand_id,
            ];

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Đã thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit_product_admin', ['categories' => $categories, 'brands' => $brands], compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $brand_id = $request->input('brand_id');
        $product->fill([
            'name' => $name,
            'gender' => $gender,
            'price' => $price,
            'description' => $description,
            'category_id' => $category_id,
            'brand_id' => $brand_id,
        ])->save();
        if ($request->file('image') !== null) {
            $image = $request->file('image')->getClientOriginalName(); // lấy tên file
            $request->file('image')->storeAs('public/images/products/', $image);
            $oldImage = $product->image;
            Storage::delete('public/images/products/' . $oldImage);
            $product->fill([
                'image' => $image,
            ])->save();
        }
        return redirect()->route('product.index')->with('success', 'Đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $oldImage = $product->image;
        Storage::delete('public/images/products/' . $oldImage);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Đã xóa sản phẩm thành công');
    }
}
