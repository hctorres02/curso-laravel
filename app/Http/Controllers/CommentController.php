<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return view('comments.index');
    }

    public function store(StoreRequest $request)
    {
        return back();
    }

    public function destroy(Comment $comment)
    {
        return back();
    }
}
