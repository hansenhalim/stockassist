<?php

namespace App\Models;

use App\Enums\MeasurementUnit;
use App\Enums\OrderCycle;
use App\Enums\ServiceLevel;
use App\Traits\BelongsToShop;
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

    public function recalculateStats(): void {
        $this->lead_time_avg = $this->getLeadTimeAvg();
        $this->lead_time_min = 0;
        $this->lead_time_sig = 0;
        $this->demand_avg = 0;
        $this->demand_min = 0;

        $this->reorder_point = 0;
        $this->safety_stock = 0;
        $this->inventory_level_max = 0;

        $this->save();
    }

    private function getLeadTimeAvg(): int {
        return 0;
    }
}
