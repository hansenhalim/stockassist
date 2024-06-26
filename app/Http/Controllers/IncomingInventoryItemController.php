<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomingInventoryItemRequest;
use App\Http\Requests\UpdateIncomingInventoryItemRequest;
use App\Models\IncomingInventoryItem;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IncomingInventoryItemController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('expected_at')
            ->first();

        $ingredients = $shop->ingredients()
            ->whereDoesntHave('incomingInventoryItems', function (Builder $query) use ($incomingInventory) {
                $query->where('incoming_inventory_id', $incomingInventory->id);
            })
            ->get();

        return view('incoming-inventory-item.index')
            ->with('ingredients', $ingredients);
    }

    public function create(Request $request)
    {
        $ingredient = Ingredient::findOrFail($request->input('ingredient_id'));

        return view('incoming-inventory-item.create')
            ->with('ingredient', $ingredient);
    }

    public function store(StoreIncomingInventoryItemRequest $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('expected_at')
            ->first();

        $ingredient = Ingredient::findOrFail($request->input('ingredient_id'));

        $incomingInventoryItem = new IncomingInventoryItem;

        $incomingInventoryItem->incomingInventory()->associate($incomingInventory);

        $incomingInventoryItem->ingredient()->associate($ingredient);

        $incomingInventoryItem->quantity = $request->input('quantity');

        $incomingInventoryItem->save();

        return redirect()->route('incoming-inventories.edit');
    }

    public function edit(IncomingInventoryItem $incomingInventoryItem)
    {
        return view('incoming-inventory-item.edit')
            ->with('incomingInventoryItem', $incomingInventoryItem);
    }

    public function update(UpdateIncomingInventoryItemRequest $request, IncomingInventoryItem $incomingInventoryItem)
    {
        $incomingInventoryItem->quantity = $request->input('quantity');

        $incomingInventoryItem->save();

        return redirect()->route('incoming-inventories.edit');
    }

    public function destroy(IncomingInventoryItem $incomingInventoryItem)
    {
        $incomingInventoryItem->delete();

        return redirect()->route('incoming-inventories.edit');
    }
}
