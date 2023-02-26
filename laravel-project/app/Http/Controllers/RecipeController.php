<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::all();
        $recipes = Recipe::query();

        if ($request->query('category_id')) {
            $recipes->where('category_id', '=', $request->query('category_id'));
        }

        $categories = Category::where('is_active', '=', 1)->get();

        return view('recipes/index', [
            'recipes' => $recipes->with('category', 'ingredients')->paginate(5),
            'categories' => $categories,
            'category_id' => $request->query('category_id'),
            'users' => $users
        ]);
    }

    public function show($id): View
    {
        $recipe = Recipe::find($id);

        if ($recipe === null) {
            abort(404);
        }

        return view('recipes/show', [
            'recipe' => $recipe
        ]);
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $recipe = Recipe::find($id);

        if ($recipe === null) {
            abort(404);
        }

        $ingredients = Ingredient::all();
        $categories = Category::all();

        if ($request->isMethod('post')) {

            $request->validate(
                [
                    'name' => 'required|max:50',
                    'description' => 'required',
                    'category_id' => 'required'
                ]
            );

            $recipe->fill($request->all());
            $file = $request->file('image');
            $path = $file->store('recipe_images');
            $recipe->image = $path;

            $recipe->save();

            return redirect('recipes')->with('success', 'Recipe updated successfully!');
        }

        return view('recipes/edit', [
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'categories' => $categories
        ]);
    }

    public function delete(int $id): RedirectResponse
    {
        $recipe = Recipe::find($id);
        $recipe->ingredients()->detach();

        if ($recipe === null) {
            abort(404);
        }

        $recipe->delete();

        return redirect('recipes')->with('success', 'Recipe was removed successfully!');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'description' => 'required',
                'category_id' => 'required'
            ]
        );

        $recipe = Recipe::create($request->all());

        $file = $request->file('image');
        $path = $file->store('recipe_images');
        $recipe->image = $path;

        $recipe->save();

        $ingredients = Ingredient::find($request->post('ingredient_id'));

        $recipe->ingredients()->attach($ingredients);

        return redirect('recipes')
            ->with('success', 'Recipe added successfully!');
    }

    public function create(): View
    {
        $ingredients = Ingredient::all();
        $categories = Category::all();

        return view('recipes/create', [
            'ingredients' => $ingredients,
            'categories' => $categories
        ]);
    }
}
