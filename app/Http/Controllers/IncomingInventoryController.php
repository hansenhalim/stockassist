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

        $pendingIncomingInventories = $shop->incomingInventories()
            ->withCount('incomingInventoryItems')
            ->whereNotNull('expected_at')
            ->whereNull('fulfilled_at')
            ->oldest('expected_at')
            ->get();

        $pendingIncomingInventories->transform(function (IncomingInventory $incomingInventory) {
            $incomingInventory->supporting_text = $incomingInventory->incomingInventoryItems()
                ->take(3)
                ->pluck('ingredient_name')
                ->implode(', ');

            return $incomingInventory;
        });

        $pendingIncomingInventoriesGroups = $pendingIncomingInventories->groupBy(function (IncomingInventory $incomingInventory) {
            $date = $incomingInventory->expected_at->timezone('Asia/Jakarta');

            if ($date->isToday()) {
                $dateString = 'Today';
            } elseif ($date->isTomorrow()) {
                $dateString = 'Tomorrow';
            } else {
                $dateString = $date->locale('id')->format('l, j F Y');
            }

            return $dateString;
        });

        $completedIncomingInventories = $shop->incomingInventories()
            ->withCount('incomingInventoryItems')
            ->whereNotNull('expected_at')
            ->whereNotNull('fulfilled_at')
            ->latest('fulfilled_at')
            ->get();

        $completedIncomingInventories->transform(function (IncomingInventory $incomingInventory) {
            $incomingInventory->supporting_text = $incomingInventory->incomingInventoryItems()
                ->take(3)
                ->pluck('ingredient_name')
                ->implode(', ');

            return $incomingInventory;
        });

        $completedIncomingInventoriesGroups = $completedIncomingInventories->groupBy(function (IncomingInventory $incomingInventory) {
            $date = $incomingInventory->fulfilled_at->timezone('Asia/Jakarta');

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
            ->with('completedIncomingInventoriesGroups', $completedIncomingInventoriesGroups)
            ->with('pendingIncomingInventoriesGroups', $pendingIncomingInventoriesGroups);
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
            ->whereNull('expected_at')
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

    public function update(Request $request, IncomingInventory $incomingInventory)
    {
        $incomingInventory->fulfilled_at = now();

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
