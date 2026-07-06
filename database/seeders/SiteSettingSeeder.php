<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['group' => 'general', 'key' => 'site_name', 'value' => 'DO-RYT Machine Corp', 'type' => 'string'],
            ['group' => 'general', 'key' => 'site_description', 'value' => 'Engineering excellence in industrial processing machinery. Delivering premium quality systems to manufacturers worldwide.', 'type' => 'string'],
            ['group' => 'general', 'key' => 'primary_color', 'value' => '#27a74a', 'type' => 'string'],
            ['group' => 'general', 'key' => 'bg_main', 'value' => '#ffffff', 'type' => 'string'],
            ['group' => 'general', 'key' => 'bg_alt', 'value' => '#f3f4f6', 'type' => 'string'],
            ['group' => 'general', 'key' => 'text_main', 'value' => '#0f2043', 'type' => 'string'],
            ['group' => 'general', 'key' => 'text_muted', 'value' => '#6b7280', 'type' => 'string'],
            ['group' => 'general', 'key' => 'site_logo', 'value' => 'settings/logo.svg', 'type' => 'string'],
            ['group' => 'general', 'key' => 'favicon', 'value' => 'settings/favicon.ico', 'type' => 'string'],

            // Contact
            ['group' => 'contact', 'key' => 'email', 'value' => 'sales@doryt.com', 'type' => 'string'],
            ['group' => 'contact', 'key' => 'phone', 'value' => '+1 (234) 567-890', 'type' => 'string'],
            ['group' => 'contact', 'key' => 'whatsapp', 'value' => '+1234567890', 'type' => 'string'],
            ['group' => 'contact', 'key' => 'address', 'value' => "123 Industrial Ave, Block B\nEngineering District, NY 10001", 'type' => 'string'],

            // Social
            ['group' => 'social', 'key' => 'linkedin', 'value' => 'https://linkedin.com/company/doryt', 'type' => 'string'],
            ['group' => 'social', 'key' => 'facebook', 'value' => 'https://facebook.com/doryt', 'type' => 'string'],
            ['group' => 'social', 'key' => 'twitter', 'value' => 'https://twitter.com/doryt', 'type' => 'string'],
            ['group' => 'social', 'key' => 'youtube', 'value' => 'https://youtube.com/c/doryt', 'type' => 'string'],
            ['group' => 'social', 'key' => 'instagram', 'value' => 'https://instagram.com/doryt', 'type' => 'string'],

            // SEO
            ['group' => 'seo', 'key' => 'meta_title_suffix', 'value' => '| DO-RYT Machine Corp', 'type' => 'string'],
            ['group' => 'seo', 'key' => 'meta_description', 'value' => 'DO-RYT Machine Corp specializes in high-quality industrial processing machinery, dryers, and complete manufacturing lines.', 'type' => 'string'],
            ['group' => 'seo', 'key' => 'meta_keywords', 'value' => 'freeze dryer, tray dryer, spray dryer, food processing machinery, industrial equipment, cold storage', 'type' => 'string'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['group' => $setting['group'], 'key' => $setting['key']],
                ['value' => $setting['value'], 'type' => $setting['type']]
            );
        }

        Setting::clearCache();
    }
}
