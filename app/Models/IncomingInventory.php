<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IncomingInventory extends Model
{
    use BelongsToShop;

    protected function casts(): array
    {
        return [
            'expected_at' => 'datetime',
            'fulfilled_at' => 'datetime',
        ];
    }

    public function incomingInventoryItems(): HasMany
    {
        return $this->hasMany(IncomingInventoryItem::class);
    }
}
