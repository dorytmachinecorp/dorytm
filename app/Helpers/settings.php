<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    /**
     * Get a setting value by key.
     *
     * @param  string  $key  The setting key in format "group.key"
     * @param  mixed  $default  The default value if not found
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        // Cache all settings forever, we will clear this cache when settings are saved
        $settings = Cache::rememberForever('app_settings', function () {
            return Setting::all()->keyBy(function ($setting) {
                return $setting->group.'.'.$setting->key;
            });
        });

        if ($settings->has($key)) {
            $val = $settings->get($key)->value;

            return ($val !== null && $val !== '') ? $val : $default;
        }

        return $default;
    }
}
