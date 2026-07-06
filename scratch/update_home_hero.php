<?php

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$page = Page::where('slug', '/')->first();
if ($page && is_array($page->content)) {
    $content = $page->content;
    $modified = false;
    foreach ($content as &$block) {
        if ($block['type'] === 'hero') {
            $block['data']['size'] = 'large';
            $modified = true;
        }
    }
    if ($modified) {
        $page->content = $content;
        $page->save();
        echo "Updated hero size to large for page: {$page->slug}\n";
    }
}
