<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function category(Category $category)
    {
        $posts = $category->posts()->published()->latest()->simplePaginate(5);

        return view('blog.category', compact(
            'category',
            'posts',
        ));
    }

    public function post(Category $category, Post $post)
    {
        $comments = $post->comments()->oldest()->simplePaginate(5);

        return view('blog.post', compact(
            'category',
            'comments',
            'post',
        ));
    }
}
