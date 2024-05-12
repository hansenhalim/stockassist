<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientRecipe extends Pivot
{
    protected function quantity(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value / 1000,
            set: fn (string $value) => $value * 1000,
        );
    }
}
