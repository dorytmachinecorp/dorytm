<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->boot();

use App\Models\Page;
use Illuminate\Contracts\Console\Kernel;

// HOME PAGE
$homeContent = [
    [
        'type' => 'hero',
        'data' => [
            'badge' => 'System Status: Active // Thermal Core Online',
            'headline' => "Precision\nEngineering.\nGlobal Scale.",
            'description' => 'DO-RYT Machine Corp architects world-class industrial dryers, dehydrators, food processing lines, and cold chain systems for the pharmaceutical, food, and industrial sectors.',
            'buttons' => [
                ['label' => 'Explore Our Systems', 'url' => '/products', 'variant' => 'primary'],
                ['label' => 'View Capabilities', 'url' => '/about#manufacturing', 'variant' => 'outline'],
            ],
            'background_image' => null,
        ],
    ],
    [
        'type' => 'entity_list',
        'data' => [
            'badge' => '[ CORE SYSTEMS ]',
            'title' => 'Systems engineered for absolute operational dominance.',
            'entity_type' => 'categories',
            'limit' => 4,
        ],
    ],
    [
        'type' => 'features',
        'data' => [
            'badge' => '[ PROPRIETARY METALLURGY ]',
            'title' => 'The DO-RYT Standard',
            'description' => 'Every unit undergoes rigorous load-testing before leaving our facility.',
            'items' => [
                [
                    'icon' => 'heroicon-o-fire',
                    'title' => 'Thermal Equilibrium',
                    'description' => 'Advanced PLC-controlled heat distribution prevents hot-spots and ensures uniform drying across all batches.',
                ],
                [
                    'icon' => 'heroicon-o-shield-check',
                    'title' => 'Pharmaceutical Grade',
                    'description' => 'Built with 316L stainless steel, fully compliant with FDA and GMP standards for food and drug processing.',
                ],
                [
                    'icon' => 'heroicon-o-bolt',
                    'title' => 'Energy Recovery',
                    'description' => 'Integrated heat-exchangers recapture up to 40% of exhaust energy, drastically reducing operational costs.',
                ],
            ],
        ],
    ],
    [
        'type' => 'stats',
        'data' => [
            'title' => 'Operational Scale',
            'description' => 'Our footprint across global manufacturing floors.',
            'items' => [
                ['value' => '25+', 'label' => 'Years Experience'],
                ['value' => '400+', 'label' => 'Industrial Installations'],
                ['value' => '50+', 'label' => 'Countries Served'],
                ['value' => '24/7', 'label' => 'Operational Uptime'],
            ],
        ],
    ],
    [
        'type' => 'cta',
        'data' => [
            'badge' => '[ CAPACITY UPGRADE ]',
            'title' => 'Ready to upgrade your capacity?',
            'description' => 'Speak with our thermal engineering specialists to architect a processing line tailored to your specific throughput requirements.',
            'buttons' => [
                ['label' => 'Request Consultation', 'url' => '/contact', 'variant' => 'primary'],
                ['label' => 'Download Brochure', 'url' => '/downloads', 'variant' => 'outline'],
            ],
        ],
    ],
];

$homePage = Page::withTrashed()->updateOrCreate(
    ['slug' => '/'],
    [
        'title' => 'Home',
        'content' => $homeContent,
        'status' => 'published',
        'deleted_at' => null,
    ]
);

// ABOUT PAGE
$aboutContent = [
    [
        'type' => 'hero',
        'data' => [
            'badge' => '[ CORPORATE OVERVIEW ]',
            'headline' => 'Engineering the Future of Processing.',
            'description' => "Since 1999, DO-RYT has been at the forefront of industrial thermal technology, designing systems that power the world's most demanding manufacturing lines.",
            'buttons' => [
                ['label' => 'Our Heritage', 'url' => '#heritage', 'variant' => 'primary'],
            ],
        ],
    ],
    [
        'type' => 'content',
        'data' => [
            'body' => '<h3>Our Mission</h3><p>To provide uncompromising quality and precision in industrial processing machinery, ensuring our clients achieve maximum efficiency and compliance.</p>',
        ],
    ],
    [
        'type' => 'cta',
        'data' => [
            'badge' => '[ GET IN TOUCH ]',
            'title' => 'Discuss Your Project',
            'description' => 'Our engineering team is ready to analyze your requirements.',
            'buttons' => [
                ['label' => 'Contact Us', 'url' => '/contact', 'variant' => 'primary'],
            ],
        ],
    ],
];

$aboutPage = Page::withTrashed()->updateOrCreate(
    ['slug' => 'about'],
    [
        'title' => 'About Us',
        'content' => $aboutContent,
        'status' => 'published',
        'deleted_at' => null,
    ]
);

echo "Pages migrated successfully.\n";
