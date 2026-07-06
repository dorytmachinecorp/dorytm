<?php

declare(strict_types=1);

use App\Services\SiteSettingService;

if (! function_exists('site_setting')) {
    /**
     * Retrieve a site setting value.
     *
     * Supports dot notation (e.g. 'contact.phone').
     * If the key contains no dot, returns all settings for that group as an array.
     * Delegates to SiteSettingService; returns $default when the service
     * is not yet registered or the key is not found.
     */
    function site_setting(string $key, mixed $default = null): mixed
    {
        try {
            /** @var SiteSettingService $service */
            $service = app(SiteSettingService::class);

            return $service->get($key, $default);
        } catch (Throwable) {
            return $default;
        }
    }
}

if (! function_exists('format_phone')) {
    /**
     * Format a phone number for display.
     *
     * Strips non-digit characters (except a leading +) and applies
     * basic grouping for 10-digit and 11-digit numbers.
     */
    function format_phone(string $phone): string
    {
        $cleaned = preg_replace('/[^\d+]/', '', $phone);

        if ($cleaned === null) {
            return $phone;
        }

        // Preserve leading +
        $hasPlus = str_starts_with($cleaned, '+');
        $digits = ltrim($cleaned, '+');

        // 10-digit: (XXX) XXX-XXXX
        if (strlen($digits) === 10) {
            $formatted = sprintf(
                '(%s) %s-%s',
                substr($digits, 0, 3),
                substr($digits, 3, 3),
                substr($digits, 6),
            );

            return $hasPlus ? '+'.$formatted : $formatted;
        }

        // 11-digit with country code: +X (XXX) XXX-XXXX
        if (strlen($digits) === 11) {
            return sprintf(
                '%s%s (%s) %s-%s',
                $hasPlus ? '+' : '',
                substr($digits, 0, 1),
                substr($digits, 1, 3),
                substr($digits, 4, 3),
                substr($digits, 7),
            );
        }

        // Fallback: return the cleaned value as-is
        return $cleaned;
    }
}

if (! function_exists('format_file_size')) {
    /**
     * Convert bytes to a human-readable file size string.
     *
     * @param  int  $bytes  File size in bytes (must be >= 0)
     */
    function format_file_size(int $bytes): string
    {
        if ($bytes < 0) {
            return '0 B';
        }

        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = 0;
        $size = (float) $bytes;

        while ($size >= 1024 && $index < count($units) - 1) {
            $size /= 1024;
            $index++;
        }

        // Show decimals only for KB and above
        $precision = $index === 0 ? 0 : 2;

        return rtrim(rtrim(number_format($size, $precision), '0'), '.').' '.$units[$index];
    }
}

if (! function_exists('seo_title')) {
    /**
     * Build a full SEO page title by appending the configured suffix.
     *
     * Uses the separator and suffix from config('cms.seo').
     * Example: "Products" → "Products | DO-RYT Machine Corp"
     */
    function seo_title(string $title): string
    {
        $separator = config('cms.seo.title_separator', '|');
        $suffix = config('cms.seo.title_suffix', config('app.name', 'DO-RYT Machine Corp'));

        return trim($title).' '.$separator.' '.$suffix;
    }
}
