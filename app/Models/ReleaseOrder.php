<?php

namespace App\Models;

use App\Traits\BelongsToShop;
use Illuminate\Database\Eloquent\Model;

class ReleaseOrder extends Model
{
    use BelongsToShop;
}
