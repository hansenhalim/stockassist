<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends Model
{
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }
}
