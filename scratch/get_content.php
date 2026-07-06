<?php

use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

echo "INDUSTRIES:\n";
foreach (Industry::all() as $item) {
    echo '- '.$item->name."\n";
}

echo "\nCATEGORIES:\n";
foreach (Category::all() as $item) {
    echo '- '.$item->name."\n";
}

echo "\nPRODUCTS:\n";
foreach (Product::all() as $item) {
    echo '- '.$item->name."\n";
}
