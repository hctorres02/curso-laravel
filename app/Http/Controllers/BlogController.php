<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function category(Category $category)
    {
        $posts = [];
    }

    public function post(Category $category, Post $post)
    {
        $comments = [];
    }
}
