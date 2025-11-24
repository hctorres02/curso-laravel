<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $comments = $user->comments()
            ->with('author', 'post.category')
            ->latest()
            ->simplePaginate(5);

        return view('comments.index', compact(
            'comments',
        ));
    }

    public function store(StoreRequest $request)
    {
        $author = $request->user();
        $attributes = $request->validated();
        $comment = $author->comments()->create($attributes);

        return back();
    }

    public function destroy(Comment $comment)
    {
        return back();
    }
}
