<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $authenticable = $request->user()->authenticable;

        if ($authenticable instanceof Admin) {
            return view('shop.show')
                ->with('shop', $authenticable->shop);
        }

        if ($authenticable instanceof Owner) {
            return view('shop.index')
                ->with('shops', $authenticable->shops)
                ->with('selectedShop', $authenticable->selectedShop);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Shop $shop)
    {
        return view('shop.show')
            ->with('shop', $shop);
    }

    public function edit(Shop $shop)
    {
        //
    }

    public function update(Request $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
