<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncomingInventoryItem extends Model
{
    public $timestamps = false;

    public function incomingInventory(): BelongsTo
    {
        return $this->belongsTo(IncomingInventory::class);
    }
}
