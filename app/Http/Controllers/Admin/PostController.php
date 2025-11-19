<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = [];
        $statuses = PostStatus::toArray();
        $searchParams = collect();
        $posts = [];
    }

    public function create()
    {
        $categories = [];
        $statuses = PostStatus::toArray();
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
        $categories = [];
        $statuses = PostStatus::toArray();
    }

    public function update(Request $request, Post $post)
    {
        return back();
    }

    public function destroy(Post $post)
    {
        return back();
    }
}
