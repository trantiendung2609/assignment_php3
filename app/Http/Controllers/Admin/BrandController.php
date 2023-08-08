<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Http\Requests\Auth\LoginRequest;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.list_brand_admin', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create_brand_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $logo = $request->file('logo')->getClientOriginalName(); // lấy tên file
        $path = $request->file('logo')->storeAs('public/images/brands', $logo);
        $path =
            $data = [
                'name' => $name,
                'description' => $description,
                'logo' => $logo,
            ];
        Brand::create($data);  // tạo bản ghi
        return redirect()->route('brand.index')->with('success', 'Đã thêm thành công');
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
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit_brand_admin', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $brand->fill([
            'name' => $name,
            'description' => $description,
        ])->save();
        if ($request->file('logo') !== null) {
            $logo = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public/images/brands/', $logo);
            $oldImage = $brand->logo;
            Storage::delete('public/images/brands/' . $oldImage);
            $brand->fill([
                'logo' => $logo,
            ])->save();
        }
        return redirect()->route('brand.index')->with('success', 'Đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $oldImage = $brand->logo;
        $brand->delete();
        Storage::delete('public/images/brands/' . $oldImage);
        return redirect()->route('brand.index')->with('success', 'Đã xóa thành công');
    }
}
