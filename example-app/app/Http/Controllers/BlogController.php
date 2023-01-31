<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    public function create(Request $request): View
    {
        if ($request->isMethod('post')) {
            $blog = new Blog();
            $blog->title = $request->post('title');
            $blog->description = $request->post('description');
            $blog->email = $request->post('email');

            $blog->save();
        }

        return view('blogs/create');
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
