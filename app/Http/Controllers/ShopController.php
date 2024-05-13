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
        return view('shop.create');
    }

    public function store(StoreShopRequest $request)
    {
        $owner = $request->user()->authenticable;

        $shop = new Shop;

        $shop->owner()->associate($owner);

        $shop->name = $request->input('name');

        $shop->address = $request->input('address');

        $shop->zip_code = $request->input('zip_code');

        if ($request->file('photo')) {
            $shop->photo = $request->file('photo')->store('shops');
        }

        $shop->save();

        return back();
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

        return back();
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->route('shops.index');
    }
}
