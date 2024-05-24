<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum MeasurementUnit: string
{
    use Values;

    case MILLILITER = 'mL';
    case GRAM = 'g';
    case PIECES = 'pcs';

    public function display(): string
    {
        return match ($this) {
            self::MILLILITER => 'milliliter (mL)',
            self::GRAM => 'grams (g)',
            self::PIECES => 'pieces (pcs)',
        };
    }
}
