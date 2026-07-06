<?php

declare(strict_types=1);

namespace App\Enums;

enum SettingGroup: string
{
    case General = 'general';
    case Contact = 'contact';
    case Social = 'social';
    case Seo = 'seo';
    case Analytics = 'analytics';

    public function label(): string
    {
        return match ($this) {
            self::General => 'General',
            self::Contact => 'Contact',
            self::Social => 'Social',
            self::Seo => 'SEO',
            self::Analytics => 'Analytics',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::General => 'heroicon-o-cog-6-tooth',
            self::Contact => 'heroicon-o-envelope',
            self::Social => 'heroicon-o-share',
            self::Seo => 'heroicon-o-magnifying-glass',
            self::Analytics => 'heroicon-o-chart-bar',
        };
    }
}
