<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('blogs/index', [
            'blogs' => $blogs
        ]);
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        if ($blog === null) {
            abort(404);
        }

        return view('blogs/show', [
            'blog' => $blog
        ]);
    }
}
