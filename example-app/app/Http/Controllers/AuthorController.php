<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors/index', [
            'authors' => $authors
        ]);
    }

    //atsakinga uz saugojima create formos
    public function store(Request $request) {

        $request->validate(
            [
                'name' => 'required|max:20',
                'last_name' => 'required|max:20',
                'country' => 'required|max:20',
                'date_of_birth' => 'required|date',
            ]
        );

        Author::create($request->all());

        //TODO change to authors list
        return redirect('authors')
            ->with('success', 'Author created successfully!');
    }

    //atsakinga uz atvaizdavima create formos
    public function create(): View
    {
        return view('authors/create');
    }

    public function show($id): View
    {
        $author = Author::find($id);


        if ($author === null) {
            abort(404);
        }

        return view('authors/show', [
            'author' => $author
        ]);
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $author = Author::find($id);

        if ($author === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {

            $request->validate(
                [
                    'name' => 'required|max:20',
                    'last_name' => 'required|max:20',
                    'country' => 'required|max:20',
                    'date_of_birth' => 'required|date',
                ]
            );

            $author->fill($request->all());
            $author->save();

            return redirect('authors')->with('success', 'Category updated!');
        }

        return view('authors/edit', [
            'author' => $author
        ]);
    }

    public function delete(int $id)
    {

        $author = Author::find($id);

        if ($author === null) {
            abort(404);
        }

        $author->delete();

        return redirect('authors')->with('success', 'Author was removed!');
    }
}
