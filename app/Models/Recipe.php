<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use BelongsToShop;

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)->using(IngredientRecipe::class);
    }
}
