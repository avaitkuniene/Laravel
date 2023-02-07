<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    public function edit($id)
    {
        //1. Reikėtų atvaizduoti viską formoje, t.y. turimą informaciją
        //1.1. Reiktų gauti atitinkamą blog'a
        $blog = Blog::find($id);
        //1.2. Pasitikrinti ar tas blogas egzistuoja
        if ($blog === null) {
            abort(404);
        }
        //1.3. Pagrąžinti bloga į template
        //1.4. Išvesti blogo duomenis template
        //1.5. Pakurti atitinkamą route.
        //1.6. Nuoroda sąraše, kuri nuves į edit formą.

    }

    public function delete($id)
    {
        $blog = Blog::where('id', $id)->delete();

        if ($blog === null) {
            abort(404);
        }
        return redirect('blogs')->with('success', 'Blog deleted successfully!');
    }
}
