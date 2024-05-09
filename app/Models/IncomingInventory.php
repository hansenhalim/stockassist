<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;

class IncomingInventory extends Model
{
    use BelongsToShop;
}
