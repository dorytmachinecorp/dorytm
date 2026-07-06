<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Appearance
            ['group' => 'general', 'key' => 'primary_color', 'value' => '#27a74a'],
            ['group' => 'general', 'key' => 'bg_main', 'value' => '#ffffff'],
            ['group' => 'general', 'key' => 'bg_alt', 'value' => '#f3f4f6'],
            ['group' => 'general', 'key' => 'text_main', 'value' => '#0f2043'],
            ['group' => 'general', 'key' => 'text_muted', 'value' => '#6b7280'],

            // General
            ['group' => 'general', 'key' => 'site_name', 'value' => 'DO-RYT Machine Corp'],
            ['group' => 'general', 'key' => 'site_description', 'value' => 'Leading manufacturer of industrial freeze dryers, food processing equipment, and cold storage solutions.'],

            // SEO
            ['group' => 'seo', 'key' => 'meta_title_suffix', 'value' => '| DO-RYT Machine Corp'],
            ['group' => 'seo', 'key' => 'meta_description', 'value' => 'DO-RYT Machine Corp manufactures industrial freeze dryers, food processing equipment, and cold chain solutions for pharma, food, and nutraceutical industries.'],
            ['group' => 'seo', 'key' => 'meta_keywords', 'value' => 'freeze dryer, food processing, cold storage, industrial equipment, DO-RYT'],

            // Contact
            ['group' => 'contact', 'key' => 'email', 'value' => 'info@doryt.com'],
            ['group' => 'contact', 'key' => 'phone', 'value' => '+91 98765 43210'],
            ['group' => 'contact', 'key' => 'whatsapp', 'value' => '+91 98765 43210'],
            ['group' => 'contact', 'key' => 'address', 'value' => 'Industrial Area, Phase II, Chennai, Tamil Nadu 600058, India'],

            // Social
            ['group' => 'social', 'key' => 'linkedin', 'value' => 'https://linkedin.com/company/doryt'],
            ['group' => 'social', 'key' => 'facebook', 'value' => 'https://facebook.com/doryt'],
            ['group' => 'social', 'key' => 'twitter', 'value' => 'https://twitter.com/doryt'],
            ['group' => 'social', 'key' => 'youtube', 'value' => 'https://youtube.com/@doryt'],
            ['group' => 'social', 'key' => 'instagram', 'value' => 'https://instagram.com/doryt'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['group' => $setting['group'], 'key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
