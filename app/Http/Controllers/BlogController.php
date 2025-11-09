<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function category(Category $category)
    {
        return view('blog.category', compact(
            'category',
        ));
    }

    public function post(Category $category, Post $post)
    {
        return view('blog.post', compact(
            'category',
            'post',
        ));
    }
}
