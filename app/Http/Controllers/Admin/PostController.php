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
        $authors = User::orderBy('name')->pluck('name', 'id');
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $statuses = PostStatus::toArray();
        $searchParams = $request->validated();
        $posts = Post::searchable($searchParams)
            ->with('author', 'category')
            ->paginate();

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
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $statuses = PostStatus::toArray();

        return view('admin.posts.create', compact(
            'categories',
            'statuses',
        ));
    }

    public function preview(Request $request)
    {
        return decodeMarkdown($request->string('body'));
    }

    public function store(StoreRequest $request)
    {
        $author = $request->user();
        $attributes = $request->validated();
        $post = $author->posts()->create($attributes);

        return to_route('admin.posts.edit', $post);
    }

    public function show(Post $post)
    {
        return to_route('blog.post', ['category'=>$post->category, 'post'=>$post]);
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
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
