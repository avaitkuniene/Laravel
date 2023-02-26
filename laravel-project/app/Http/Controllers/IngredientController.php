<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class IngredientController extends Controller
{
    public function index(): View
    {
        $ingredients = Ingredient::with('recipes')->paginate(10);

        return view('ingredients/index', [
            'ingredients' => $ingredients
        ]);
    }

    public function show(int $id): View
    {
        $ingredient = Ingredient::find($id);

        if ($ingredient === null) {
            abort(404);
        }

        return view('ingredients/show', [
            'ingredient' => $ingredient
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => 'required|max:50'
            ]
        );

        $ingredient = Ingredient::create($request->all());
        $ingredient->save();

        return redirect('ingredients')
            ->with('success', 'Ingredient created successfully!');
    }

    public function create(): View|RedirectResponse
    {
        return view('ingredients/create');
    }

    public function editView($id): View
    {
        $ingredient = Ingredient::find($id);

        if ($ingredient === null) {
            abort(404);
        }

        return view('ingredients/edit', [
            'ingredient' => $ingredient
        ]);
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $ingredient = Ingredient::find($id);

        if ($ingredient === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {

            $request->validate(
                [
                    'name' => 'required|max:50'
                ]
            );

            $ingredient->fill($request->all());
            $ingredient->is_active = $request->post('is_active', false);
            $ingredient->save();

            return redirect('categories')->with('success', 'Category updated!');
        }

        return view('categories/edit', [
            'ingredient' => $ingredient
        ]);
    }

    public function delete(int $id): RedirectResponse
    {
        $ingredient = Ingredient::find($id);

        if ($ingredient === null) {
            abort(404);
        }

        $ingredient->delete();

        return redirect('ingredients')->with('success', 'Ingredient was removed!');
    }
}
