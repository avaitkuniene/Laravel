<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category', 'ingredients')->paginate(10);

        $categories = Category::all();

        return view('home/index', [
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }
}
