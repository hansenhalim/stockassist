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
            MeasurementUnit::MILLILITER => 'milliliter',
            MeasurementUnit::GRAM => 'grams',
            MeasurementUnit::PIECES => 'pieces',
        };
    }
}
