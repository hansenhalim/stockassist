<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Owner extends User
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
