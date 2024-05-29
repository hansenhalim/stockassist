<?php

namespace App\Models;

use App\Enums\MeasurementUnit;
use App\Enums\OrderCycle;
use App\Enums\ServiceLevel;
use App\Traits\BelongsToShop;
use HiFolks\Statistics\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    use BelongsToShop;

    protected function casts(): array
    {
        return [
            'unit_of_measure' => MeasurementUnit::class,
            'service_level' => ServiceLevel::class,
            'order_cycle' => OrderCycle::class,
        ];
    }

    public function recipes(): BelongsToMany
    {
        return $this
            ->belongsToMany(Recipe::class)
            ->using(IngredientRecipe::class)
            ->withPivot('quantity');
    }

    public function incomingInventoryItems(): HasMany
    {
        return $this->hasMany(IncomingInventoryItem::class);
    }

    public function releaseOrderItemDetails(): HasMany
    {
        return $this->hasMany(ReleaseOrderItemDetail::class);
    }

    public function recalculateStats(): void
    {
        $this->lead_time_avg = $this->getLeadTimeStats()['avg'];
        $this->lead_time_min = $this->getLeadTimeStats()['min'];
        $this->lead_time_sig = $this->getLeadTimeStats()['sig'];

        $this->demand_avg = $this->getDemandStats()['avg'];
        $this->demand_min = $this->getDemandStats()['min'];

        // SS = Z * σLT * Davg
        $this->safety_stock = $this->service_level->ZScore() * $this->lead_time_sig * $this->demand_avg;

        // ROP = (Davg * LTavg) + SS
        $this->reorder_point = ($this->demand_avg * $this->lead_time_avg) + $this->safety_stock;

        // OQ = OC * Davg
        $this->order_quantity = $this->order_cycle->durationInDays() * $this->demand_avg;

        // Lmax = ROP + OQ - (Dmin * LTmin)
        $this->inventory_level_max = $this->reorder_point + $this->order_quantity - ($this->demand_min * $this->lead_time_min);

        $this->save();
    }

    private function getLeadTimeStats(): array
    {
        $leadTimes = collect();

        $incomingInventoryItems = $this->incomingInventoryItems()->whereHas('incomingInventory', function (Builder $query) {
            $query->whereNotNull('fulfilled_at');
        })->get();

        foreach ($incomingInventoryItems as $incomingInventoryItem) {
            $createdAt = $incomingInventoryItem->incomingInventory->created_at;
            $fulfilledAt = $incomingInventoryItem->incomingInventory->fulfilled_at;

            $leadTimes->push($createdAt->diffInDays($fulfilledAt));
        }

        $leadTimeSig = null;

        if ($leadTimes->isNotEmpty()) {
            $leadTimeSig = Stat::pstdev($leadTimes->toArray());
        }

        return [
            'avg' => $leadTimes->avg(),
            'min' => $leadTimes->min(),
            'sig' => $leadTimeSig,
        ];
    }

    private function getDemandStats(): array
    {
        $demands = collect();

        $passedDaysCount = (int) ceil($this->created_at->diffInDays());

        $releaseOrderItemDetailsGroups = $this->releaseOrderItemDetails
            ->groupBy(function (ReleaseOrderItemDetail $releaseOrderItemDetail) {
                return $releaseOrderItemDetail
                    ->releaseOrderItem
                    ->releaseOrder
                    ->finalized_at
                    ->timezone('Asia/Jakarta')
                    ->toDateString();
            });

        for ($i = 0; $i < $passedDaysCount; $i++) {
            $date = $this->created_at->addDays($i)->timezone('Asia/Jakarta')->toDateString();

            $releaseOrderItemDetailsGroup = $releaseOrderItemDetailsGroups->get($date);

            if (! $releaseOrderItemDetailsGroup) {
                $demands->push(0);

                continue;
            }

            $demands->push($releaseOrderItemDetailsGroup->sum('quantity'));
        }

        return [
            'avg' => $demands->avg(),
            'min' => $demands->min(),
        ];
    }
}
