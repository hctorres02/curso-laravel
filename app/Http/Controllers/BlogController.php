<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function category(Category $category)
    {
        $query = $category->posts();
        $posts = $query->simplePaginate(5);

        return view('blog.category', compact(
            'category',
            'posts',
        ));
    }

    public function post(Category $category, Post $post)
    {
        $query = $post->comments();
        $comments = $query->simplePaginate(5);

        return view('blog.post', compact(
            'category',
            'comments',
            'post',
        ));
    }
}
