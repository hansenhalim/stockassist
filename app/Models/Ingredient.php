<?php

namespace App\Models;

use App\Enums\MeasurementUnit;
use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use BelongsToShop;

    protected function casts(): array
    {
        return [
            'unit_of_measure' => MeasurementUnit::class,
        ];
    }

    public function recipes(): BelongsToMany
    {
        return $this
            ->belongsToMany(Recipe::class)
            ->using(IngredientRecipe::class)
            ->withPivot('quantity');
    }
}
