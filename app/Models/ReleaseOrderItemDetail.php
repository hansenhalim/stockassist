<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReleaseOrderItemDetail extends Model
{
    public $timestamps = false;

    public function releaseOrderItem(): BelongsTo
    {
        return $this->belongsTo(ReleaseOrderItem::class);
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
