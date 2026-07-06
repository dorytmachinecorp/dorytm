<?php

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

foreach (Page::all() as $page) {
    $content = $page->content;
    $modified = false;
    if (is_array($content)) {
        foreach ($content as &$block) {
            if ($block['type'] === 'hero') {
                $block['data']['size'] = 'standard';
                $modified = true;
            }
        }
    }
    if ($modified) {
        $page->content = $content;
        $page->save();
        echo "Updated hero size for page: {$page->slug}\n";
    }
}
