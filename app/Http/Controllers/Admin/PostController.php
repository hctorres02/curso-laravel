<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function preview(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        return to_route('blog.post', [$post->category, $post]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit');
    }

    public function update(Request $request, Post $post)
    {
        return to_route('admin.posts.edit', $post);
    }

    public function destroy(Post $post)
    {
        return to_route('admin.posts.edit', $post);
    }

    public function restore(Post $post)
    {
        return to_route('admin.posts.edit', $post);
    }

    public function forceDestroy(Post $post)
    {
        return to_route('admin.posts.index');
    }
}
