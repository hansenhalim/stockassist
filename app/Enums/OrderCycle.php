<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum OrderCycle: string
{
    use Values;

    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case BIWEEKLY = 'bi-weekly';
    case MONTHLY = 'monthly';
    case QUARTERLY = 'quarterly';
    case BIANNUAL = 'bi-annual';
    case ANNUAL = 'annual';

    public function display(): string
    {
        return match ($this) {
            self::DAILY => 'Daily (every 1 days)',
            self::WEEKLY => 'Weekly (every 7 days)',
            self::BIWEEKLY => 'Bi-weekly (every 14 days)',
            self::MONTHLY => 'Monthly (every 30 days)',
            self::QUARTERLY => 'Quarterly (every 91 days)',
            self::BIANNUAL => 'Bi-annual (every 182 days)',
            self::ANNUAL => 'Annual (every 365 days)',
        };
    }

    public function durationInDays(): int
    {
        return match ($this) {
            self::DAILY => 1,
            self::WEEKLY => 7,
            self::BIWEEKLY => 14,
            self::MONTHLY => 30,
            self::QUARTERLY => 91,
            self::BIANNUAL => 182,
            self::ANNUAL => 365,
        };
    }
}
