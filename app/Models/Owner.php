<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Owner extends User
{
    public $timestamps = false;

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'authable');
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    public function selectedShop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function shop(): BelongsTo
    {
        return $this->selectedShop();
    }
}
