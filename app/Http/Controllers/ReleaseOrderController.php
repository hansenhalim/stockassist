<?php

namespace App\Http\Controllers;

use App\Models\ReleaseOrder;
use App\Models\ReleaseOrderItemDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReleaseOrderController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $releaseOrders = $shop->releaseOrders()
            ->withCount('releaseOrderItems')
            ->whereNotNull('finalized_at')
            ->latest('finalized_at')
            ->get();

        $releaseOrders->transform(function (ReleaseOrder $releaseOrder) {
            $releaseOrder->supporting_text = $releaseOrder->releaseOrderItems()
                ->take(3)
                ->pluck('recipe_name')
                ->implode(', ');

            return $releaseOrder;
        });

        $releaseOrdersGroups = $releaseOrders->groupBy(function (ReleaseOrder $releaseOrder) {
            $date = $releaseOrder->finalized_at->timezone('Asia/Jakarta');

            if ($date->isToday()) {
                $dateString = 'Today';
            } elseif ($date->isYesterday()) {
                $dateString = 'Yesterday';
            } else {
                $dateString = $date->locale('id')->format('l, j F Y');
            }

            return $dateString;
        });

        return view('release-order.index')
            ->with('releaseOrdersGroups', $releaseOrdersGroups);
    }

    public function show(ReleaseOrder $releaseOrder)
    {
        return view('release-order.show')
            ->with('releaseOrder', $releaseOrder);
    }

    public function edit(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $releaseOrder = $shop->releaseOrders()
            ->whereNull('finalized_at')
            ->first();

        if ($releaseOrder) {
            return view('release-order.edit')
                ->with('releaseOrder', $releaseOrder);
        }

        $releaseOrder = new ReleaseOrder;

        $releaseOrder->shop()->associate($shop);

        $releaseOrder->save();

        return view('release-order.edit')
            ->with('releaseOrder', $releaseOrder);
    }

    public function update(Request $request)
    {
        $shop = $request->user()->authable->shop;

        $releaseOrder = $shop->releaseOrders()
            ->whereNull('finalized_at')
            ->first();

        $releaseOrder->finalized_at = now();

        DB::transaction(function () use ($releaseOrder) {
            $releaseOrder->save();

            foreach ($releaseOrder->releaseOrderItems as $releaseOrderItem) {
                $releaseOrderItem->recipe_name = $releaseOrderItem->recipe->name;
                $releaseOrderItem->recipe_photo = $releaseOrderItem->recipe->photo;

                $releaseOrderItem->save();

                foreach ($releaseOrderItem->recipe->ingredients as $ingredient) {
                    $releaseOrderItemDetail = new ReleaseOrderItemDetail;

                    $releaseOrderItemDetail->releaseOrderItem()->associate($releaseOrderItem);

                    $releaseOrderItemDetail->ingredient()->associate($ingredient);

                    $releaseOrderItemDetail->quantity = $releaseOrderItem->quantity * $ingredient->pivot->quantity;

                    $releaseOrderItemDetail->ingredient_name = $ingredient->name;
                    $releaseOrderItemDetail->ingredient_barcode = $ingredient->barcode;
                    $releaseOrderItemDetail->ingredient_description = $ingredient->description;
                    $releaseOrderItemDetail->ingredient_unit_of_measure = $ingredient->unit_of_measure;
                    $releaseOrderItemDetail->ingredient_photo = $ingredient->photo;
                    $releaseOrderItemDetail->ingredient_service_level = $ingredient->service_level;
                    $releaseOrderItemDetail->ingredient_order_cycle = $ingredient->order_cycle;

                    $releaseOrderItemDetail->save();
                }

                foreach ($releaseOrderItem->releaseOrderItemDetails as $releaseOrderItemDetail) {
                    if ($releaseOrderItemDetail->ingredient->remaining_amount < $releaseOrderItemDetail->quantity) {
                        abort(Response::HTTP_INTERNAL_SERVER_ERROR);
                    }

                    $releaseOrderItemDetail->ingredient->remaining_amount -= $releaseOrderItemDetail->quantity;

                    $releaseOrderItemDetail->ingredient->save();
                }
            }
        });

        return redirect()->route('recipes.index');
    }

    public function destroy(ReleaseOrder $releaseOrder)
    {
        $releaseOrder->delete();

        return back();
    }
}
