<?php

namespace App\Http\Controllers;

use App\Models\IncomingInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomingInventoryController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventories = $shop->incomingInventories()
            ->withCount('incomingInventoryItems')
            ->whereNotNull('finalized_at')
            ->latest('finalized_at')
            ->get();

        $incomingInventories->transform(function (IncomingInventory $incomingInventory) {
            $incomingInventory->supporting_text = $incomingInventory->incomingInventoryItems()
                ->take(3)
                ->pluck('ingredient_name')
                ->implode(', ');

            return $incomingInventory;
        });

        $incomingInventoriesGroups = $incomingInventories->groupBy(function (IncomingInventory $incomingInventory) {
            $date = $incomingInventory->finalized_at->timezone('Asia/Jakarta');

            if ($date->isToday()) {
                $dateString = 'Today';
            } elseif ($date->isYesterday()) {
                $dateString = 'Yesterday';
            } else {
                $dateString = $date->locale('id')->format('l, j F Y');
            }

            return $dateString;
        });

        return view('incoming-inventory.index')
            ->with('incomingInventoriesGroups', $incomingInventoriesGroups);
    }

    public function show(IncomingInventory $incomingInventory)
    {
        return view('incoming-inventory.show')
            ->with('incomingInventory', $incomingInventory);
    }

    public function edit(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('finalized_at')
            ->first();

        if ($incomingInventory) {
            return view('incoming-inventory.edit')
                ->with('incomingInventory', $incomingInventory);
        }

        $incomingInventory = new IncomingInventory;

        $incomingInventory->shop()->associate($shop);

        $incomingInventory->save();

        return view('incoming-inventory.edit')
            ->with('incomingInventory', $incomingInventory);
    }

    public function update(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('finalized_at')
            ->first();

        $incomingInventory->finalized_at = now();

        DB::transaction(function () use ($incomingInventory) {
            foreach ($incomingInventory->incomingInventoryItems as $incomingInventoryItem) {
                $incomingInventoryItem->ingredient->remaining_amount += $incomingInventoryItem->quantity;

                $incomingInventoryItem->ingredient->save();
            }

            $incomingInventory->save();
        });

        return redirect()->route('ingredients.index');
    }

    public function destroy(IncomingInventory $incomingInventory)
    {
        $incomingInventory->delete();

        return back();
    }
}
