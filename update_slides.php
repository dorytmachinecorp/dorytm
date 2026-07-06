<?php

use App\Models\HeroSlide;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$s1 = HeroSlide::first();
if ($s1) {
    $s1->update([
        'title' => 'TWO DECADES OF INNOVATION',
        'subtitle' => '',
        'description' => 'Do-Ryt Machine Corp is one of the premier industrial machinery manufacturers in USA',
    ]);
    $s1->clearMediaCollection('image');
    $s1->addMedia(public_path('img/media__1783125879875.png'))->preservingOriginal()->toMediaCollection('image');
}

$s2 = HeroSlide::updateOrCreate(
    ['id' => 2],
    [
        'title' => 'OVER TWO DECADES OF INNOVATION',
        'subtitle' => '',
        'description' => 'Since 2004 we have been manufacturing Custom Built Pharmaceutical / Food Drying Machineries like Tray Dryers (Vacuum & Standard), Vacuum Belt Dryers, Fluid Bed Dryers (FBD), Rotary Vacuum Paddle Dryers (RVPD), Extruders and Spheronizers to all the major Pharmaceutical & Food product manufacturing Companies in & around the World.',
        'cta_text' => 'Explore Our Systems',
        'cta_url' => '/products',
        'sort_order' => 2,
        'status' => 'published',
    ]
);
$s2->clearMediaCollection('image');
$s2->addMedia(public_path('img/hero_bg_1783126095772.png'))->preservingOriginal()->toMediaCollection('image');

echo 'Slides updated successfully.';
