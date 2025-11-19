<?php

use App\Http\Middleware\EnsureCommentIsPending;
use App\Http\Middleware\EnsurePostIsPublished;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'comment.is_pending' => EnsureCommentIsPending::class,
            'post.is_published' => EnsurePostIsPublished::class,
        ]);

        $middleware->redirectGuestsTo(fn () => route('login'));
        $middleware->redirectUsersTo(fn () => route('admin.home'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (HttpException $exception) {
            $status = $exception->getStatusCode();

            if (config('app.debug') && $status >= Response::HTTP_INTERNAL_SERVER_ERROR) {
                return null; // use default Laravel error page
            }

            if (! array_key_exists($status, Response::$statusTexts)) {
                $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            }

            $message = Response::$statusTexts[$status];

            return response()->view('error', compact('status', 'message'), $status);
        });
    })->create();
