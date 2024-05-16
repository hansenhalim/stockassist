<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        return view('recipe.index')
            ->with('recipes', $shop->recipes);
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function store(StoreRecipeRequest $request)
    {
        $shop = $request->user()->authable->shop;

        $recipe = new Recipe;

        $recipe->shop()->associate($shop);

        $recipe->name = $request->input('name');

        $recipe->description = $request->input('description');

        if ($request->file('photo')) {
            $recipe->photo = $request->file('photo')->store('recipes');
        }

        $recipe->save();

        return back();
    }

    public function show(Recipe $recipe)
    {
        $ingredients = $recipe->shop->ingredients()
            ->whereDoesntHave('recipes', function (Builder $query) use ($recipe) {
                $query->where('id', $recipe->id);
            })
            ->get();

        return view('recipe.show')
            ->with('recipe', $recipe)
            ->with('ingredients', $ingredients);
    }

    public function edit(Recipe $recipe)
    {
        return view('recipe.edit')
            ->with('recipe', $recipe);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $recipe->name = $request->input('name');

        $recipe->description = $request->input('description');

        if ($request->file('photo')) {
            $recipe->photo = $request->file('photo')->store('recipes');
        }

        $recipe->save();

        return back();
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
