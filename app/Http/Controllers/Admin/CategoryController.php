<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\IndexRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index(IndexRequest $request)
    {
        $searchParams = $request->validated();
        $categories = Category::searchable($searchParams)
            ->withCount('posts')
            ->paginate();

        return view('admin.categories.index', compact(
            'categories',
            'searchParams',
        ));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        $category = Category::create($attributes);

        return to_route('admin.categories.edit', $category);
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

    public function update(UpdateRequest $request, Category $category)
    {
        $attributes = $request->validated();
        $category->update($attributes);

        return back();
    }

    public function destroy(Category $category)
    {
        $posts = $category->posts()->pluck('id');

        Comment::whereIn('post_id', $posts)->delete();
        Post::whereIn('id', $posts)->delete();

        $category->delete();

        return back();
    }

    public function forceDestroy(Category $category)
    {
        $category->posts()->forceDelete();
        $category->forceDelete();

        return to_route('admin.categories.index');
    }

    public function restore(Category $category)
    {
        $category->restore();
        $category->posts()->restore();
        $category->posts()->comments()->delete();

        return back();
    }
}
