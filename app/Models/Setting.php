<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(fn () => static::clearCache());
        static::deleted(fn () => static::clearCache());
    }

    public static function clearCache(): void
    {
        Cache::forget('app_settings');
        Cache::forget('site_settings_all');
        Cache::forget('global_site_settings');
    }
}
