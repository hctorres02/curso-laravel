<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\IndexRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $authors = User::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $statuses = PostStatus::toArray();
        $searchParams = $request->validated();
        $query = Post::query()
            ->when($searchParams->get('category_id'), fn ($query, $category_id) => $query->where('category_id', $category_id))
            ->when($searchParams->get('search'), fn ($query, $search) => $query->whereLike('title', "%{$search}%"))
            ->when($searchParams->get('status'), fn ($query, $status) => $query->where('status', $status));
        $posts = $query->paginate();

        return view('admin.posts.index', compact(
            'authors',
            'categories',
            'posts',
            'searchParams',
            'statuses',
        ));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $statuses = PostStatus::toArray();

        return view('admin.posts.create', compact(
            'categories',
            'statuses',
        ));
    }

    public function preview(Request $request)
    {
        //
    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
    }

    public function show(Post $post)
    {
        return to_route('blog.post', [$post->category, $post]);
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $statuses = PostStatus::toArray();

        return view('admin.posts.edit', compact(
            'categories',
            'post',
            'statuses',
        ));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $attributes = $request->validated();

        return back();
    }

    public function destroy(Post $post)
    {
        return back();
    }

    public function forceDestroy(Post $post)
    {
        return to_route('admin.posts.index');
    }

    public function restore(Post $post)
    {
        return back();
    }
}
