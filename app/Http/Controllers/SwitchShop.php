<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwitchShop extends Controller
{
    public function __invoke(Request $request)
    {
        $owner = $request->user()->authenticable;

        $owner->selectedShop()->associate($request->input('shop_id'));

        $owner->save();

        return back();
    }
}
