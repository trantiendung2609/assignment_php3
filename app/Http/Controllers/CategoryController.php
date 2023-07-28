<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list_category_admin', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create_category_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images/categories/', $image);
        $path =
            $data = [
                'name' => $name,
                'description' => $description,
                'image' => $image,
            ];
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Đã thêm thành công');
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
    public function edit(Category $category)
    {

        return view('admin.categories.edit_category_admin', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $category->fill([
            'name' => $name,
            'description' => $description
        ])->save();
        if ($request->file('image') !== null) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/categories/', $image);
            $category->fill([
                'image' => $image,
            ])->save();
        }
        return redirect()->route('category.index')->with('success', 'Đã sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Đã xóa thành công');
    }
}
