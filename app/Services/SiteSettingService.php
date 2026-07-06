<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SiteSettingService
{
    /**
     * Retrieve a setting by its group.key notation.
     *
     * @param  string  $key  e.g., 'contact.phone' or 'contact'
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $settings = $this->getAllCached();

        if (str_contains($key, '.')) {
            [$group, $name] = explode('.', $key, 2);
            $val = $settings[$group][$name] ?? null;

            return ($val !== null && $val !== '') ? $val : $default;
        }

        $val = $settings[$key] ?? null;

        return ($val !== null && $val !== '') ? $val : $default;
    }

    /**
     * Clear the cached settings.
     */
    public function clearCache(): void
    {
        Setting::clearCache();
    }

    /**
     * Get all settings grouped by their group name from cache.
     */
    protected function getAllCached(): array
    {
        $ttl = config('cms.cache.settings_ttl', 86400);

        return Cache::remember('site_settings_all', $ttl, function () {
            return Setting::all()
                ->groupBy('group')
                ->map(function ($groupSettings) {
                    return $groupSettings->pluck('value', 'key')->toArray();
                })
                ->toArray();
        });
    }
}
