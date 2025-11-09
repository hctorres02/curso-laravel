<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        return to_route('blog.category', $category);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact(
            'category',
        ));
    }

    public function update(Request $request, Category $category)
    {
        return to_route('admin.categories.edit', $category);
    }

    public function destroy(Category $category)
    {
        return to_route('admin.categories.edit', $category);
    }

    public function restore(Category $category)
    {
        return to_route('admin.categories.edit', $category);
    }

    public function forceDestroy(Category $category)
    {
        return to_route('admin.categories.index');
    }
}
