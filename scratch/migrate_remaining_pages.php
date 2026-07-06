<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

use App\Models\Download;
use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

$pages = [
    'products' => [
        'title' => 'Products',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ INDUSTRIAL MACHINERY ]',
                    'headline' => 'Industrial Machinery & Food Processing Equipment',
                    'description' => 'Browse our catalog of world-class thermal processing units and specialized production line machinery.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'products',
                    'limit' => 100,
                ],
            ],
        ],
    ],
    'industries' => [
        'title' => 'Industries',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ TARGET INDUSTRIES ]',
                    'headline' => 'Food Processing Solutions That Drive Growth',
                    'description' => 'We design and manufacture high-performance food processing machinery that helps businesses improve productivity, product quality, and profitability.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'industries',
                    'limit' => 100,
                ],
            ],
        ],
    ],
    'gallery' => [
        'title' => 'Media Gallery',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ VISUAL DATA ]',
                    'headline' => 'Media Gallery',
                    'description' => 'Explore our state-of-the-art manufacturing facilities, recent installations, and machinery in action.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'galleries',
                    'limit' => 100,
                ],
            ],
        ],
    ],
    'downloads' => [
        'title' => 'Downloads',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ RESOURCE CENTER ]',
                    'headline' => 'Technical Resources & Brochures',
                    'description' => 'Download product specifications, operation manuals, and corporate brochures.',
                ],
            ],
            [
                'type' => 'downloads',
                'data' => [
                    'title' => 'Available Files',
                    'download_ids' => Download::pluck('id')->toArray(),
                ],
            ],
        ],
    ],
    'contact' => [
        'title' => 'Contact Us',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ GLOBAL NETWORK ]',
                    'headline' => 'Connect With Our Engineering Team',
                    'description' => 'Reach out to discuss your specific processing requirements. Our technical specialists are ready to architect a solution for your facility.',
                ],
            ],
            [
                'type' => 'contact_form',
                'data' => [
                    'title' => 'Send technical inquiry',
                    'description' => 'Get in touch with our technical team to discuss custom machinery designs.',
                    'badge' => '[ FORM-CONTROL ]',
                ],
            ],
        ],
    ],
    'blog' => [
        'title' => 'Blog',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ INTELLIGENCE ]',
                    'headline' => 'News & Insights',
                    'description' => 'The latest updates from DO-RYT Machine Corp, including technological advancements, project case studies, and industry trends.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'blogs', // We'll need to support blogs in entity_list
                    'limit' => 100,
                ],
            ],
        ],
    ],
    'certificates' => [
        'title' => 'Certificates',
        'content' => [
            [
                'type' => 'hero',
                'data' => [
                    'badge' => '[ QUALITY ASSURANCE ]',
                    'headline' => 'Certificates & Compliance',
                    'description' => 'Our commitment to manufacturing excellence is validated by international regulatory bodies and standard organizations.',
                ],
            ],
            [
                'type' => 'entity_list',
                'data' => [
                    'entity_type' => 'certificates', // We'll need to support certificates in entity_list
                    'limit' => 100,
                ],
            ],
        ],
    ],
];

foreach ($pages as $slug => $data) {
    Page::withTrashed()->updateOrCreate(
        ['slug' => $slug],
        [
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => 'published',
            'deleted_at' => null,
        ]
    );
}

echo "All remaining pages migrated successfully.\n";
