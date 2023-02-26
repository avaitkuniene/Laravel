<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('recipes')->paginate(10);

        return view('categories/index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id): View
    {
        $category = Category::find($id);
        $recipes = Recipe::where('category_id', $id)->get();

        if ($category === null) {
            abort(404);
        }

        return view('categories/show', [
            'category' => $category,
            'recipes' => $recipes
        ]);
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $request->validated();

        Category::create($request->all());

        return redirect('categories')
            ->with('success', 'Category created successfully!');
    }

    public function create(): View|RedirectResponse
    {
        return view('categories/create');
    }

    public function editView($id)
    {
        $category = Category::find($id);

        if ($category === null) {
            abort(404);
        }
        return view('categories/edit', [
            'category' => $category
        ]);
    }

    public function edit(StoreCategoryRequest $request, int $id): RedirectResponse
    {
        $category = Category::find($id);

        if ($category === null) {
            abort(404);
        }

        $request->validated();

        $category->fill($request->all());
        $category->is_active = $request->post('is_active', false);
        $category->save();

        return redirect('categories')->with('success', 'Category updated!');
    }

    public function delete(int $id)
    {
        $category = Category::find($id);

        if ($category === null) {
            abort(404);
        }

        $category->delete();

        return redirect('categories')->with('success', 'Category was removed!');
    }
}
