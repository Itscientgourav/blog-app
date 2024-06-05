<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('created_by', Session::get('loginId'))->get();
        $UserName = User::where('id', Session::get('loginId'))->value('name');
        return view('blogs.index', compact('blogs' , 'UserName'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_post_date' => 'required|date',
            'blog_body' => 'required',
        ]);

        $path = $request->file('blog_img')->store('public/blog_images');

        Blog::create([
            'unique_identifier' => Str::random(30),
            'blog_title' => $request->blog_title,
            'blog_img' => basename($path),
            'blog_post_date' => $request->blog_post_date,
            'blog_body' => $request->blog_body,
            'created_by' => Session::get('loginId')
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blog_post_date' => 'required|date',
            'blog_body' => 'required',
        ]);

        if ($request->hasFile('blog_img')) {
            Storage::delete('public/blog_images/' . $blog->blog_img);
            $path = $request->file('blog_img')->store('public/blog_images');
            $blog->blog_img = basename($path);
        }

        $blog->update([
            'blog_title' => $request->blog_title,
            'blog_post_date' => $request->blog_post_date,
            'blog_body' => $request->blog_body,
            'created_by' => Session::get('loginId')
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        Storage::delete('public/blog_images/' . $blog->blog_img);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
