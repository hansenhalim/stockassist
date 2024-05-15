<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReleaseOrderItem extends Model
{
    public $timestamps = false;

    public function releaseOrder(): BelongsTo
    {
        return $this->belongsTo(ReleaseOrder::class);
    }

    public function releaseOrderItemDetails(): HasMany
    {
        return $this->hasMany(ReleaseOrderItemDetail::class);
    }
}
