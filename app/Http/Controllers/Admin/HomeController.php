<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // info boxes
        $countCategories = Category::count();
        $countComments = Comment::count();
        $countPosts = Post::count();
        $countUsers = User::count();

        // charts
        $monthlyPosts = [];
        $monthlyComments = [];
        $storageUsage = [];

        return view('admin.home', compact(
            'countCategories',
            'countComments',
            'countPosts',
            'countUsers',
            'monthlyPosts',
            'monthlyComments',
            'storageUsage',
        ));
    }
}
