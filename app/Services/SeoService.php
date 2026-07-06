<?php

declare(strict_types=1);

namespace App\Services;

class SeoService
{
    public function __construct(protected SiteSettingService $settings) {}

    /**
     * Generate standard SEO metadata array for views.
     */
    public function getMeta(string $title = '', string $description = '', string $keywords = '', string $image = ''): array
    {
        $defaultTitle = $this->settings->get('seo.default_meta_title', 'DO-RYT Machine Corp');
        $defaultDesc = $this->settings->get('seo.default_meta_description', '');
        $defaultKeywords = $this->settings->get('seo.default_keywords', '');
        $defaultImage = $this->settings->get('seo.og_image', '');

        return [
            'title' => $title ?: $defaultTitle,
            'description' => $description ?: $defaultDesc,
            'keywords' => $keywords ?: $defaultKeywords,
            'image' => $image ?: $defaultImage,
        ];
    }
}
