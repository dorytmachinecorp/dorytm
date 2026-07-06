<?php

use App\Models\HeroSlide;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$s = HeroSlide::find(1);
if ($s) {
    $s->title = 'Precision<br><span class="text-primary-500">Engineering.</span><br>Global Scale.';
    $s->subtitle = '[ SYSTEM STATUS: ACTIVE // THERMAL CORE ONLINE ]';
    $s->description = 'DO-RYT Machine Corp architects world-class industrial dryers, dehydrators, food processing lines, and cold chain systems for the pharmaceutical, food, and industrial sectors.';
    $s->save();

    // Clear media and re-add if needed, but wait, the fallback image `hero_bg_1783126095772.png` is used if there is no media, or maybe it has a media image right now. Let's just remove its media so it uses the fallback which is correct.
    $s->clearMediaCollection('image');
}

$s2 = HeroSlide::find(2);
if ($s2) {
    $s2->delete();
}

echo 'Done.';
