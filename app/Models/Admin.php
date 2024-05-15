<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Admin extends User
{
    use BelongsToShop;

    public $timestamps = false;

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'authable');
    }
}
