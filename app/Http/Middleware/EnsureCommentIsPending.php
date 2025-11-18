<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\CommentStatus;

class EnsureCommentIsPending
{
    public function handle(Request $request, Closure $next): Response
    {
        $comment = $request->route('comment');
        $isPending = $comment?->status === CommentStatus::Pending;

        abort_if(! $isPending, Response::HTTP_CONFLICT);

        return $next($request);
    }
}
