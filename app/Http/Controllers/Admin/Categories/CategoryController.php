<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create(['name' => $request->name ]);
        return to_route('admin.category.index')->with('toast-success' , 'دسته بندی با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category , Request $request)
    {
        $inputs = $request->validate([
            'name' => 'required'
        ]);

        $category->update($inputs);
        return to_route('admin.category.index')->with('toast-success' , 'دسته بندی با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
