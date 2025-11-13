<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\IndexRequest;
use App\Http\Requests\Admin\Comment\UpdateRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(IndexRequest $request)
    {
        return view('admin.comments.index');
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        return response(status: 202);
    }

    public function destroy(Comment $comment)
    {
        return response(status: 204);
    }
}
