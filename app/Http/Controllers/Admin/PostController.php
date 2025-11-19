<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\IndexRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {
        $authors = [];
        $categories = [];
        $statuses = PostStatus::toArray();
        $searchParams = $request->validated();
        $posts = [];

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
        $categories = [];
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
        $categories = [];
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
