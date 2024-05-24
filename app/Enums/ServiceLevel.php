<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum ServiceLevel: string
{
    use Values;

    case LOW = 'low_90';
    case MEDIUM = 'medium_95';
    case HIGH = 'high_97_5';
    case VERY_HIGH = 'very_high_99';
    case ULTRA_HIGH = 'ultra_high_99_5';
    case EXTREMELY_HIGH = 'extremely_high_99_9';

    public function display(): string
    {
        return match ($this) {
            self::LOW => 'Low (90%)',
            self::MEDIUM => 'Medium (95%)',
            self::HIGH => 'High (97.5%)',
            self::VERY_HIGH => 'Very High (99%)',
            self::ULTRA_HIGH => 'Ultra High (99.5%)',
            self::EXTREMELY_HIGH => 'Extremely High (99.9%)',
        };
    }

    public function decimal(): float
    {
        return match ($this) {
            self::LOW => 0.90,
            self::MEDIUM => 0.95,
            self::HIGH => 0.975,
            self::VERY_HIGH => 0.99,
            self::ULTRA_HIGH => 0.995,
            self::EXTREMELY_HIGH => 0.999,
        };
    }

    public function ZScore(): float
    {
        return match ($this) {
            self::LOW => 1.28,
            self::MEDIUM => 1.65,
            self::HIGH => 1.96,
            self::VERY_HIGH => 2.33,
            self::ULTRA_HIGH => 2.58,
            self::EXTREMELY_HIGH => 3.09,
        };
    }
}
