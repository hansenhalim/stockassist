<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Shop extends Model
{
    use Notifiable;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function incomingInventories(): HasMany
    {
        return $this->hasMany(IncomingInventory::class);
    }

    public function releaseOrders(): HasMany
    {
        return $this->hasMany(ReleaseOrder::class);
    }
}
