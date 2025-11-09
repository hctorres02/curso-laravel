<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
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
        //
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
