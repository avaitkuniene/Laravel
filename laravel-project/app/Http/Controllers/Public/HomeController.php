<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::take(10)->latest()->get();

        $categories = Category::all();

        return view('home/index', [
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }
}
