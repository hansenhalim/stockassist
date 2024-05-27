<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $authable = $request->user()->authable;

        if ($authable instanceof Admin) {
            return view('shop.show')
                ->with('shop', $authable->shop);
        }

        if ($authable instanceof Owner) {
            return view('shop.index')
                ->with('shops', $authable->shops)
                ->with('selectedShop', $authable->selectedShop);
        }
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(StoreShopRequest $request)
    {
        $owner = $request->user()->authable;

        $shop = new Shop;

        $shop->owner()->associate($owner);

        $shop->name = $request->input('name');

        $shop->address = $request->input('address');

        $shop->zip_code = $request->input('zip_code');

        if ($request->file('photo')) {
            $shop->photo = $request->file('photo')->store('shops');
        }

        $shop->save();

        $owner->selectedShop()->associate($shop);

        $owner->save();

        return redirect()->route('shops.show', $shop);
    }

    public function show(Shop $shop)
    {
        return view('shop.show')
            ->with('shop', $shop);
    }

    public function edit(Shop $shop)
    {
        return view('shop.edit')
            ->with('shop', $shop);
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->name = $request->input('name');

        $shop->address = $request->input('address');

        $shop->zip_code = $request->input('zip_code');

        if ($request->file('photo')) {
            $shop->photo = $request->file('photo')->store('shops');
        }

        $shop->save();

        return redirect()->route('shops.show', $shop);
    }

    public function destroy(Request $request, Shop $shop)
    {
        $owner = $request->user()->authable;

        if ($owner->selectedShop == $shop) {
            $owner->selectedShop()->dissociate();

            $owner->save();
        }

        $shop->delete();

        return redirect()->route('shops.index');
    }
}
