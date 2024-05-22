<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum ServiceLevel: string
{
    use Values;

    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    case VERY_HIGH = 'very_high';
    case ULTRA_HIGH = 'ultra_high';
    case EXTREMELY_HIGH = 'extremely_high';

    public function display(): string {
        return match ($this) {
            ServiceLevel::LOW => 'Low',
            ServiceLevel::MEDIUM => 'Medium',
            ServiceLevel::HIGH => 'High',
            ServiceLevel::VERY_HIGH => 'Very High',
            ServiceLevel::ULTRA_HIGH => 'Ultra High',
            ServiceLevel::EXTREMELY_HIGH => 'Extremely High',
        };
    }

    public function decimal(): float {
        return match ($this) {
            ServiceLevel::LOW => 0.90,
            ServiceLevel::MEDIUM => 0.95,
            ServiceLevel::HIGH => 0.975,
            ServiceLevel::VERY_HIGH => 0.99,
            ServiceLevel::ULTRA_HIGH => 0.995,
            ServiceLevel::EXTREMELY_HIGH => 0.999,
        };
    }

    public function ZScore(): float
    {
        return match ($this) {
            ServiceLevel::LOW => 1.28,
            ServiceLevel::MEDIUM => 1.65,
            ServiceLevel::HIGH => 1.96,
            ServiceLevel::VERY_HIGH => 2.33,
            ServiceLevel::ULTRA_HIGH => 2.58,
            ServiceLevel::EXTREMELY_HIGH => 3.09,
        };
    }
}
