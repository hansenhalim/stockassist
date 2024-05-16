<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class LinkIngredient extends Controller
{
    public function __invoke(Request $request)
    {
        $recipe = Recipe::findOrFail($request->input('recipe_id'));

        $ingredient = Ingredient::findOrFail($request->input('ingredient_id'));

        $recipe->ingredients()->attach($ingredient, ['quantity' => $request->input('quantity')]);

        return back();
    }
}
