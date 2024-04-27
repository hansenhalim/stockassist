<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends User
{
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
