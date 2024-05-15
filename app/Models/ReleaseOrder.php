<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReleaseOrder extends Model
{
    use BelongsToShop;

    protected function casts(): array
    {
        return ['finalized_at' => 'datetime'];
    }

    public function releaseOrderItems(): HasMany
    {
        return $this->hasMany(ReleaseOrderItem::class);
    }
}
