<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use BelongsToShop;

    public function ingredients(): BelongsToMany
    {
        return $this
            ->belongsToMany(Ingredient::class)
            ->using(IngredientRecipe::class)
            ->withPivot('quantity');
    }

    public function releaseOrderItems(): HasMany
    {
        return $this->hasMany(ReleaseOrderItem::class);
    }
}
