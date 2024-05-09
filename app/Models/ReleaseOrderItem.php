<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReleaseOrderItem extends Model
{
    public $timestamps = false;

    public function releaseOrder() : BelongsTo {
        return $this->belongsTo(ReleaseOrder::class);
    }
}
