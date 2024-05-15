<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class SwitchShop extends Controller
{
    public function __invoke(Request $request)
    {
        $shop = Shop::findOrFail($request->input('shop_id'));

        $owner = $request->user()->authable;

        $owner->selectedShop()->associate($shop);

        $owner->save();

        return back();
    }
}
