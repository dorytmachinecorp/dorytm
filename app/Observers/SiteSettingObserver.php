<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\SiteSetting;
use App\Services\SiteSettingService;

class SiteSettingObserver
{
    public function saved(SiteSetting $setting): void
    {
        app(SiteSettingService::class)->clearCache();
    }

    public function deleted(SiteSetting $setting): void
    {
        app(SiteSettingService::class)->clearCache();
    }
}
