<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::all();
        // $sizes->load('products');
        return view('admin.sizes.list_size_admin', ['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.sizes.create_size_admin', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $name = $request->input('name');
        $product_id = $request->input('product_id');
        $data = [
            'name' => $name,
            'product_id' => $product_id,
        ];
        Size::create($data);
        return redirect()->route('size.index')->with('success', 'Đã thêm size thành công');
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
    public function edit(Size $size)
    {
        $products = Product::all();
        return view('admin.sizes.edit_size_admin', ['products' => $products], compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $name = $request->input('name');
        $product_id = $request->input('product_id');
        $size->fill([
            'name' => $name,
            'product_id' => $product_id,
        ])->save();
        return redirect()->route('size.index')->with('success', 'Đã thêm size thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('size.index')->with('success', 'Đã xóa size thành công');
    }
}
