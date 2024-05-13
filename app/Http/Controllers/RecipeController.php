<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $authenticable = $request->user()->authenticable;

        if ($authenticable instanceof Owner) {
            $recipes = $authenticable->selectedShop->recipes;
        }

        if ($authenticable instanceof Admin) {
            $recipes = $authenticable->shop->recipes;
        }

        return view('recipe.index')
            ->with('recipes', $recipes);
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function store(StoreRecipeRequest $request)
    {
        $owner = $request->user()->authenticable;

        $recipe = new Recipe;

        $recipe->shop()->associate($owner->selectedShop);

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
        return view('recipe.show')
            ->with('recipe', $recipe);
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
