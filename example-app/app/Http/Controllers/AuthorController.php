<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors/index', [
            'authors' => $authors
        ]);
    }

    public function show($id)
    {
        $books = Book::where('author_id', $id)->get();
        $author = Author::find($id);

        if ($author === null) {
            abort(404);
        }
        return view('authors/show', [
            'author' => $author,
            'books' => $books]);

    }
}
