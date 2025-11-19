<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Post::published()
            ->latest()
            ->with('author', 'category')
            ->withCount('comments')
            ->simplePaginate(5);

        return view('home', compact(
            'posts',
        ));
    }
}
