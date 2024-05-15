<?php

namespace App\Http\Controllers;

use App\Models\IncomingInventory;
use Illuminate\Http\Request;

class IncomingInventoryController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        return view('incoming-inventory.index')
            ->with('incoming-inventory', $shop->incomingInventories);
    }

    public function show(IncomingInventory $incomingInventory)
    {
        return view('incoming-inventory.show')
            ->with('incoming-inventory', $incomingInventory);
    }

    public function edit(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('finalized_at')
            ->first();

        if ($incomingInventory) {
            return view('incoming-inventory.edit')
                ->with('incoming-inventory', $incomingInventory);
        }

        $incomingInventory = new IncomingInventory;

        $incomingInventory->shop()->associate($shop);

        $incomingInventory->save();

        return view('incoming-inventory.edit')
            ->with('incoming-inventory', $incomingInventory);
    }

    public function update(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('finalized_at')
            ->first();

        $incomingInventory->finalized_at = now();

        $incomingInventory->save();

        return redirect()->route('ingredients.index');
    }
}
