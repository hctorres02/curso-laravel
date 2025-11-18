<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $statuses = CommentStatus::toArray();
        $searchParams = collect();
        $comments = [];

        return view('admin.comments.index', compact(
            'comments',
            'searchParams',
            'statuses',
        ));
    }

    public function approve(Comment $comment)
    {
        return back();
    }

    public function destroy(Comment $comment)
    {
        return back();
    }
}
