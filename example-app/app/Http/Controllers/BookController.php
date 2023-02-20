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

        $books = Book::query(); //query builder
        if ($request->query('category_id')) {
            $books->where('category_id', '=', $request->query('category_id'));
        }
        if ($request->query('name')) {
            $books->where('name', 'like', '%' . $request->query('name') . '%');
        }
        $books = Book::with('category', 'authors')->paginate(10);

//        if ($request->query('category_id')) {
//            $books = Book::query()
//                ->where('category_id', '=', $request->query('category_id'))
//                ->paginate(10);
//        } else {
//            //$books = Book::with('category', 'authors')->paginate(10);
//
//        }

        $categories = Category::where('enabled', '=', 1)
            ->whereNull('category_id')->get();

        return view('books/index', [
            'books' => $books,
            'categories' => $categories,
            'category_id' => $request->query('category_id'),
            'name' => $request->query('name')
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
        #1. Reikia papildyti forma mygtuku <input type=file +
        #2. Pakeisti formos tipą +
        #3. Pasiziurėt requestą +
        #4. Patalpinti failą +
        #5. Prie knygos prisidėti lauką skirtą failo path: migraciją +
        #6. Galėsim pasaugoti book image value prie duomenų bazės
        #7. Pabandysim nuotrauką atvaizduoti template, tam reikės naudoti symlink ir reikės assetus.

        $request->validate(
            [
                'name' => 'required|max:30',
                'category_id' => 'required',
//                'author_id' => 'required',
                'page_count' => 'required',
            ]
        );


        $book = Book::create($request->all());
        $file = $request->file('image');
        $path = $file->store('book_images');
        $book->image = $path;

        $book->save();

        $authors = Author::find($request->post('author_id'));

        $book->authors()->attach($authors);

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
