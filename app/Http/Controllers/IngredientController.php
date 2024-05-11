<?php

namespace App\Http\Controllers;

use App\Enums\MeasurementUnit;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(Request $request)
    {
        $owner = $request->user()->authenticable;

        $ingredients = $owner->selectedShop->ingredients;

        return view('ingredient.index')
            ->with('ingredients', $ingredients);
    }

    public function create()
    {
        return view('ingredient.create')
            ->with('measurement_units', MeasurementUnit::values());
    }

    public function store(StoreIngredientRequest $request)
    {
        $owner = $request->user()->authenticable;

        $ingredient = new Ingredient();

        $ingredient->shop()->associate($owner->selectedShop);

        $ingredient->name = $request->input('name');

        $ingredient->barcode = $request->input('barcode');

        $ingredient->description = $request->input('description');

        if ($request->file('photo')) {
            $ingredient->photo = $request->file('photo')->store('ingredients');
        }

        $ingredient->unit_of_measure = $request->input('unit_of_measure');

        $ingredient->save();

        return back();
    }

    public function show(Ingredient $ingredient)
    {
        return view('ingredient.show')
            ->with('ingredient', $ingredient);
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredient.edit')
            ->with('ingredient', $ingredient)
            ->with('measurement_units', MeasurementUnit::values());
    }

    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient->name = $request->input('name');

        $ingredient->barcode = $request->input('barcode');

        $ingredient->description = $request->input('description');

        if ($request->file('photo')) {
            $ingredient->photo = $request->file('photo')->store('ingredients');
        }

        $ingredient->unit_of_measure = $request->input('unit_of_measure');

        $ingredient->save();

        return back();
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index');
    }
}
