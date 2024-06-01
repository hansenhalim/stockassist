<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum LevelStatus: string
{
    use Values;

    case IN_STOCK = 'in_stock';
    case OVERSTOCK = 'overstock';
    case LOW_STOCK = 'low_stock';
    case CRITICAL = 'critical';

    public function display(): string
    {
        return match ($this) {
            self::IN_STOCK => 'In stock',
            self::OVERSTOCK => 'Overstock',
            self::LOW_STOCK => 'Low stock',
            self::CRITICAL => 'Critical',
        };
    }
}
