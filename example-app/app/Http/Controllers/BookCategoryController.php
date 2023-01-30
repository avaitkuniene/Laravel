<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories/index', [
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $books = Book::where('category_id', $id)->get();
        $category = Category::find($id);

        if ($category === null) {
            abort(404);
        }
        return view('categories/show', [
            'category' => $category,
            'books' => $books]);
    }
}
