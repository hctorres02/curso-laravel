<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function category(Category $category)
    {
        $posts = [];

        return view('blog.category', compact(
            'category',
            'posts',
        ));
    }

    public function post(Category $category, Post $post)
    {
        $comments = [];

        return view('blog.post', compact(
            'category',
            'comments',
            'post',
        ));
    }
}
