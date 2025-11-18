<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // info boxes
        $countCategories = 0;
        $countComments = 0;
        $countPosts = 0;
        $countUsers = 0;

        // charts
        $monthlyPosts = [];
        $monthlyComments = [];
        $storageUsage = [];
    }
}
