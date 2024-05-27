<?php

namespace App\Http\Controllers;

use App\Enums\MeasurementUnit;
use App\Enums\OrderCycle;
use App\Enums\ServiceLevel;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        return view('ingredient.index')
            ->with('ingredients', $shop->ingredients);
    }

    public function create()
    {
        return view('ingredient.create')
            ->with('measurement_units', MeasurementUnit::cases())
            ->with('service_levels', ServiceLevel::cases())
            ->with('order_cycles', OrderCycle::cases());
    }

    public function store(StoreIngredientRequest $request)
    {
        $shop = $request->user()->authable->shop;

        $ingredient = new Ingredient();

        $ingredient->shop()->associate($shop);

        $ingredient->name = $request->input('name');

        $ingredient->barcode = $request->input('barcode');

        $ingredient->description = $request->input('description');

        if ($request->file('photo')) {
            $ingredient->photo = $request->file('photo')->store('ingredients');
        }

        $ingredient->unit_of_measure = $request->input('unit_of_measure');

        $ingredient->save();

        return redirect()->route('ingredients.show', $ingredient);
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
            ->with('measurement_units', MeasurementUnit::cases())
            ->with('service_levels', ServiceLevel::cases())
            ->with('order_cycles', OrderCycle::cases());
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

        return redirect()->route('ingredients.show', $ingredient);
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index');
    }
}
