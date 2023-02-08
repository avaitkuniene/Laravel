<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $books = Book::paginate(6);

        /*$books = Book::cursor()->filter(function ($book) {
            return $book->id > 1010;
        });*/

        //$books = Book::lazy();

        return view('books/index', [
            'books' => $books
        ]);
    }

    public function show($id): View
    {
        $book = Book::find($id);

        if ($book === null) {
            abort(404);
        }

        return view('books/show', [
            'book' => $book
        ]);
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $book = Book::find($id);

        if ($book=== null) {
            abort(404);
        }

        if ($request->isMethod('post')) {

            $request->validate(
                [
                    'name' => 'required|max:20',
                    'category_id' => 'required|max:20',
                    'author_id' => 'required|max:20',
                    'page_count' => 'required|date',
                ]
            );

            $book->fill($request->all());
            $book->save();

            return redirect('books')->with('success', 'Category updated!');
        }

        return view('books/edit', [
            'book' => $book
        ]);
    }

    public function delete(int $id)
    {

        $book = Book::find($id);

        if ($book=== null) {
            abort(404);
        }

        $book->delete();

        return redirect('books')->with('success', 'Book was removed!');
    }

    public function store(Request $request) {

        $request->validate(
            [
                'name' => 'required|max:30',
                'category_id' => 'required',
                'author_id' => 'required',
                'page_count' => 'required',
            ]
        );

        Book::create($request->all());

        //TODO change to authors list
        return redirect('books')
            ->with('success', 'Book added successfully!');
    }

    public function create(): View
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('books/create', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }
}
