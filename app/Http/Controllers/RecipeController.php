<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $owner = $request->user()->authenticable;

        $recipes = $owner->selectedShop->recipes;

        return view('recipes.index')
            ->with('recipes', $recipes);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
