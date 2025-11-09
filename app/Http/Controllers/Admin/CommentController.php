<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        return response(status: 202);
    }

    public function destroy(Comment $comment)
    {
        return response(status: 204);
    }
}
