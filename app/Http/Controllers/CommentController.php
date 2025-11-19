<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->with('author', 'post.category')->simplePaginate(5);

        return view('comments.index', compact(
            'comments',
        ));
    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();

        return back();
    }

    public function destroy(Comment $comment)
    {
        return back();
    }
}
