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
        $monthlyPosts = Post::groupBy('month')
            ->countMonthly()
            ->pluck('posts', 'month')
            ->mapWithKeys(fn ($v, $k) => [formatDateFrom($k) => $v]);
        $monthlyPostsPublished = Post::groupBy('month')
            ->countMonthly()
            ->published()
            ->pluck('posts', 'month')
            ->mapWithKeys(fn ($v, $k) => [formatDateFrom($k) => $v]);
        $monthlyComments = Comment::groupBy('month')
            ->countMonthly()
            ->pluck('comments', 'month')
            ->mapWithKeys(fn ($v, $k) => [formatDateFrom($k) => $v]);
        $storageUsage = [];

        return view('admin.home', compact(
            'countCategories',
            'countComments',
            'countPosts',
            'countUsers',
            'monthlyPosts',
            'monthlyPostsPublished',
            'monthlyComments',
            'storageUsage',
        ));
    }
}
