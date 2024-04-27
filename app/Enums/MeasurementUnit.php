<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum MeasurementUnit: string
{
    use Values;

    case MILLILITER = 'ml';
    case GRAM = 'g';
    case PIECES = 'pcs';
}
