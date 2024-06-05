<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function homePage()
    {
        $today = date('Y-m-d');
        $todayBlogs = Blog::whereDate('blog_post_date', $today)
            ->orderBy('blog_post_date', 'desc')
            ->get();
        $otherDayBlogs = Blog::whereDate('blog_post_date', '!=', $today)
            ->orderBy('blog_post_date', 'desc')
            ->get();

        return view('welcome', compact('todayBlogs', 'otherDayBlogs'));
    }

    public function show($unique_identifier)
    {
        $viewBlog = Blog::where('unique_identifier', $unique_identifier)->firstOrFail();

        // Get today's date
        $today = Carbon::today();

        $todayBlogs = Blog::whereDate('blog_post_date', $today)
            ->where('id', '!=', $viewBlog->id)
            ->orderBy('blog_post_date', 'desc')
            ->get();
            
        $otherDayBlogs = Blog::whereDate('blog_post_date', '!=', $today)
            ->where('id', '!=', $viewBlog->id)
            ->orderBy('blog_post_date', 'desc')
            ->get();

        // Pass the data to the view
        return view('ViewBlog', compact('viewBlog', 'todayBlogs', 'otherDayBlogs'));
    }
}
