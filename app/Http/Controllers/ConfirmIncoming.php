<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmIncoming extends Controller
{
    public function __invoke(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $incomingInventory = $shop->incomingInventories()
            ->whereNull('expected_at')
            ->first();

        $incomingInventory->expected_at = $request->date('expected_at', tz: 'Asia/Jakarta')->timezone('UTC');

        $incomingInventory->save();

        return redirect()->route('ingredients.index');
    }
}
