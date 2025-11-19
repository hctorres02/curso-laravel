<?php

namespace App\Http\Middleware;

use App\Enums\PostStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePostIsPublished
{
    public function handle(Request $request, Closure $next): Response
    {
        $post = $request->route('post');
        $isPublished = $post?->status === PostStatus::Published;
        $canView = $isPublished || auth()->user();

        abort_if(! $canView, Response::HTTP_NOT_FOUND);

        return $next($request);
    }
}
