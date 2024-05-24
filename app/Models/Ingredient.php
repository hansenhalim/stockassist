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
}
