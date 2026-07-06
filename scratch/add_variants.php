<?php

$file = 'database/seeders/ProductSeeder.php';
$content = file_get_contents($file);

$replacement = <<<'REPLACE'
'is_featured' => $1,
                'variants' => [
                    [
                        'name' => 'Standard Model',
                        'specifications' => ['Capacity' => 'Standard', 'Power' => '220V', 'Material' => 'SS-304'],
                    ],
                    [
                        'name' => 'Pro Model',
                        'specifications' => ['Capacity' => 'High', 'Power' => '440V', 'Material' => 'SS-316L'],
                    ],
                ],
REPLACE;

$content = preg_replace("/'is_featured'\s*=>\s*(true|false),/", $replacement, $content);

file_put_contents($file, $content);
echo "Variants added to ProductSeeder.php\n";
