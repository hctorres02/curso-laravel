<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = [];

        return view('comments.index', compact(
            'comments',
        ));
    }

    public function store(Request $request)
    {
        return back();
    }

    public function destroy(Comment $comment)
    {
        return back();
    }
}
