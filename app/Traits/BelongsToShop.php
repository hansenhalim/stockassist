<?php

namespace App\Traits;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToShop
{
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
