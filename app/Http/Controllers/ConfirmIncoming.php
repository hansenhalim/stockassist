<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmIncoming extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate(['expected_at' => ['required', 'date']]);

        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('expected_at')
            ->first();

        $incomingInventory->expected_at = $request->date('expected_at', tz: 'Asia/Jakarta')->timezone('UTC');

        DB::transaction(function () use ($incomingInventory) {
            $incomingInventory->save();

            foreach ($incomingInventory->incomingInventoryItems as $incomingInventoryItem) {
                $incomingInventoryItem->ingredient_name = $incomingInventoryItem->ingredient->name;
                $incomingInventoryItem->ingredient_barcode = $incomingInventoryItem->ingredient->barcode;
                $incomingInventoryItem->ingredient_description = $incomingInventoryItem->ingredient->description;
                $incomingInventoryItem->ingredient_unit_of_measure = $incomingInventoryItem->ingredient->unit_of_measure;
                $incomingInventoryItem->ingredient_photo = $incomingInventoryItem->ingredient->photo;
                $incomingInventoryItem->ingredient_service_level = $incomingInventoryItem->ingredient->service_level;
                $incomingInventoryItem->ingredient_order_cycle = $incomingInventoryItem->ingredient->order_cycle;

                $incomingInventoryItem->save();
            }
        });

        return redirect()->route('ingredients.index');
    }
}
