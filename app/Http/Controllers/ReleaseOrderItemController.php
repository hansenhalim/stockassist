<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReleaseOrderItemRequest;
use App\Http\Requests\UpdateReleaseOrderItemRequest;
use App\Models\Recipe;
use App\Models\ReleaseOrderItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReleaseOrderItemController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $releaseOrder = $shop->releaseOrders()
            ->whereNull('finalized_at')
            ->first();

        $recipes = $shop->recipes()
            ->whereDoesntHave('releaseOrderItems', function (Builder $query) use ($releaseOrder) {
                $query->where('release_order_id', $releaseOrder->id);
            })
            ->get();

        return view('release-order-item.index')
            ->with('recipes', $recipes);
    }

    public function create(Request $request)
    {
        $recipe = Recipe::findOrFail($request->input('recipe_id'));

        return view('release-order-item.create')
            ->with('recipe', $recipe);
    }

    public function store(StoreReleaseOrderItemRequest $request)
    {
        $shop = $request->user()->authable->shop;

        $releaseOrder = $shop->releaseOrders()
            ->whereNull('finalized_at')
            ->first();

        $recipe = Recipe::findOrFail($request->input('recipe_id'));

        $releaseOrderItem = new ReleaseOrderItem;

        $releaseOrderItem->releaseOrder()->associate($releaseOrder);

        $releaseOrderItem->recipe()->associate($recipe);

        $releaseOrderItem->quantity = $request->input('quantity');

        $releaseOrderItem->save();

        return redirect()->route('release-orders.edit');
    }

    public function edit(ReleaseOrderItem $releaseOrderItem)
    {
        return view('release-order-item.edit')
            ->with('releaseOrderItem', $releaseOrderItem);
    }

    public function update(UpdateReleaseOrderItemRequest $request, ReleaseOrderItem $releaseOrderItem)
    {
        $releaseOrderItem->quantity = $request->input('quantity');

        $releaseOrderItem->save();

        return redirect()->route('release-orders.edit');
    }

    public function destroy(ReleaseOrderItem $releaseOrderItem)
    {
        $releaseOrderItem->delete();

        return redirect()->route('release-orders.edit');
    }
}
