<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\IndexRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(IndexRequest $request)
    {
        $statuses = CommentStatus::toArray();
        $searchParams = $request->validated();
        $query = Comment::query()
            ->when($searchParams->get('status'), fn ($query, $status) => $query);
        $comments = $query->paginate();

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
