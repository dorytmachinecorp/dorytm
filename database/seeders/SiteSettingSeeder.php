<?php

namespace Database\Seeders;

use App\Enums\SettingGroup;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['group' => SettingGroup::General->value, 'key' => 'general.company_name', 'value' => 'DO-RYT Machine Corp', 'type' => 'text'],
            ['group' => SettingGroup::General->value, 'key' => 'general.tagline', 'value' => 'Engineering Excellence in Industrial Machinery', 'type' => 'text'],
            ['group' => SettingGroup::General->value, 'key' => 'general.logo', 'value' => 'settings/logo.svg', 'type' => 'image'],
            ['group' => SettingGroup::General->value, 'key' => 'general.logo_dark', 'value' => 'settings/logo-dark.svg', 'type' => 'image'],
            ['group' => SettingGroup::General->value, 'key' => 'general.favicon', 'value' => 'settings/favicon.ico', 'type' => 'image'],
            ['group' => SettingGroup::General->value, 'key' => 'general.footer_text', 'value' => '© 2026 DO-RYT Machine Corp. All Rights Reserved.', 'type' => 'text'],
            ['group' => SettingGroup::General->value, 'key' => 'general.business_hours', 'value' => 'Mon - Sat: 9:00 AM - 6:00 PM', 'type' => 'text'],

            ['group' => SettingGroup::Contact->value, 'key' => 'contact.phone', 'value' => '+91-XXXXXXXXXX', 'type' => 'text'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.phone_secondary', 'value' => '+91-XXXXXXXXXX', 'type' => 'text'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.email', 'value' => 'info@doryt.com', 'type' => 'text'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.email_sales', 'value' => 'sales@doryt.com', 'type' => 'text'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.address', 'value' => 'Industrial Area, Phase II, Chandigarh, India', 'type' => 'textarea'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.google_maps_embed', 'value' => '', 'type' => 'textarea'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.google_maps_link', 'value' => '', 'type' => 'text'],
            ['group' => SettingGroup::Contact->value, 'key' => 'contact.whatsapp', 'value' => '+91XXXXXXXXXX', 'type' => 'text'],

            ['group' => SettingGroup::Social->value, 'key' => 'social.facebook', 'value' => 'https://facebook.com/doryt', 'type' => 'text'],
            ['group' => SettingGroup::Social->value, 'key' => 'social.instagram', 'value' => 'https://instagram.com/doryt', 'type' => 'text'],
            ['group' => SettingGroup::Social->value, 'key' => 'social.linkedin', 'value' => 'https://linkedin.com/company/doryt', 'type' => 'text'],
            ['group' => SettingGroup::Social->value, 'key' => 'social.youtube', 'value' => '', 'type' => 'text'],
            ['group' => SettingGroup::Social->value, 'key' => 'social.twitter', 'value' => '', 'type' => 'text'],

            ['group' => SettingGroup::Seo->value, 'key' => 'seo.default_meta_title', 'value' => 'DO-RYT Machine Corp | Industrial Machinery Manufacturer', 'type' => 'text'],
            ['group' => SettingGroup::Seo->value, 'key' => 'seo.default_meta_description', 'value' => 'Leading manufacturer of freeze dryers, tray dryers, spray dryers, food processing machinery, and industrial equipment.', 'type' => 'textarea'],
            ['group' => SettingGroup::Seo->value, 'key' => 'seo.default_keywords', 'value' => 'freeze dryer, tray dryer, spray dryer, food processing machinery, industrial equipment, cold storage', 'type' => 'textarea'],
            ['group' => SettingGroup::Seo->value, 'key' => 'seo.og_image', 'value' => 'settings/og-image.jpg', 'type' => 'image'],

            ['group' => SettingGroup::Analytics->value, 'key' => 'analytics.google_analytics_id', 'value' => '', 'type' => 'text'],
            ['group' => SettingGroup::Analytics->value, 'key' => 'analytics.google_tag_manager_id', 'value' => '', 'type' => 'text'],
            ['group' => SettingGroup::Analytics->value, 'key' => 'analytics.facebook_pixel_id', 'value' => '', 'type' => 'text'],
            ['group' => SettingGroup::Analytics->value, 'key' => 'analytics.header_scripts', 'value' => '', 'type' => 'textarea'],
            ['group' => SettingGroup::Analytics->value, 'key' => 'analytics.footer_scripts', 'value' => '', 'type' => 'textarea'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
